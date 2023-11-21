<?php

namespace App\Http\Controllers;

use App\Models\Admin\Order;
use Illuminate\Http\Request;
use App\Models\Admin\DesignImage;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DesignRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PhotographyRequest;
use App\Models\Admin\PhotographyPlan;

class OrderClientController extends Controller
{
    public function list(Request $request)
    {
        // Jangan yang ada di dalam [7, 30, 100, 500]
        $defaultLength = 10;

        $orders = Order::with('orderable')->whereBelongsTo($request->user())
            ->when($request->has('category') && in_array($request->category, ['all', 'design', 'photography', 'videography', 'printing']), function ($query) use ($request) {
                if ($request->category !== 'all') {
                    return $query->whereHasMorph('orderable', ['App\Models\Admin\\' . $request->category], null);
                }
            })
            ->when($request->has('date'), function ($query) use ($request) {
                switch ($request->date) {
                    case 'week':
                        return $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                    case 'month':
                        return $query->whereMonth('created_at', now()->month);
                    case 'year':
                        return $query->whereYear('created_at', now()->year);
                    case 'all':
                        return $query;
                    default:
                        return $query->whereDate('created_at', now());
                }
            }, function ($query) {
                // Query default jika parameter date tidak ada
                return $query->whereDate('created_at', now());
            })
            ->paginate($defaultLength);

        return view('profile.order-list', compact('orders', 'defaultLength'));
    }

    public function show(Order $order)
    {
        $order->load('orderable');
        if ($order->orderable_type === 'App\Models\Admin\Design') {
            $order->orderable->load('images');
        }

        return view('profile.detail', compact('order'));
    }

    public function editDesign(Order $order)
    {
        $order->load('orderable.images');

        return view('profile.order-edit.design', compact('order'));
    }

    public function updateDesign(DesignRequest $request, Order $order)
    {
        $datas = $request->validated();

        DB::beginTransaction();

        try {
            $design = $order->orderable;
            $design->update([
                'slogan' => $request->slogan,
                'color' => $request->color,
            ]);

            $order->update($datas);

            $deleted = $request->img_deleted;
            if ($deleted) {
                $designImages = DesignImage::whereIn('id', $deleted)->get();

                $designImages->each(function ($image) {
                    Storage::delete($image->path);
                });

                DesignImage::destroy($deleted);
            }

            if ($request->hasFile('gambar.*')) {
                foreach ($request->file('gambar') as $picture) {
                    $image = $picture->store('order/design');
                    DesignImage::create(['design_id' => $design->id, 'path' => $image]);
                }
            }

            DB::commit();

            return to_route('user.order.list')->with('success', 'Successfully updated a order');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->with('error', 'Failed to save changes: ' . $e->getMessage());
        }
    }

    public function editPhotography(Order $order)
    {
        $order->load('orderable');
        $plans = PhotographyPlan::where('photography_category_id', $order->orderable->category->id)->get();
        // return $order;

        return view('profile.order-edit.photography', compact('order', 'plans'));
    }

    public function updatePhotography(PhotographyRequest $request, Order $order)
    {
        $datas = $request->validated();
    }
}
