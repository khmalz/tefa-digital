<?php

namespace App\Http\Controllers;

use App\Models\Admin\Order;
use Illuminate\Http\Request;
use App\Models\Admin\Printing;
use App\Models\Admin\DesignImage;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DesignRequest;
use App\Http\Requests\PrintingRequest;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\Admin\PhotographyPlan;
use App\Models\Admin\VideographyPlan;
use App\Http\Requests\PhotographyRequest;
use App\Http\Requests\VideographyRequest;

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

        return view('profile.order-edit.photography', compact('order', 'plans'));
    }

    public function updatePhotography(PhotographyRequest $request, Order $order)
    {
        $datas = $request->validated();

        $photography = $order->orderable;
        $photography->update([
            'photography_plan_id' => $datas['photography_plan_id'],
        ]);

        $order->update($datas);

        return redirect()->route('user.order.list')->with('Success', 'Data has been updated!');
    }

    public function editVideography(Order $order)
    {
        $order->load('orderable');
        $plans = VideographyPlan::where('videography_category_id', $order->orderable->category->id)->get();

        return view('profile.order-edit.videography', compact('order', 'plans'));
    }

    public function updateVideography(VideographyRequest $request, Order $order)
    {
        $datas = $request->validated();

        $videography = $order->orderable;
        $videography->update([
            'videography_plan_id' => $datas['videography_plan_id'],
        ]);

        $order->update($datas);

        return redirect()->route('user.order.list')->with('Success', 'Data has been updated!');
    }

    public function editPrinting(Order $order)
    {
        $order->load('orderable');
        return view('profile.order-edit.printing', compact('order'));
    }

    public function updatePrinting(PrintingRequest $request, Order $order)
    {
        $datas = $request->validated();

        DB::beginTransaction();

        try {
            $order->update([
                'number_customer' => $datas['number_customer'],
                'description' => $datas['description'],
            ]);

            if ($request->hasFile('file')) {
                $fileReq = $request->file('file');
                $fileName = $fileReq->getClientOriginalName();

                Storage::delete($order->orderable->file_content);

                $file = $fileReq->store('order/printing');
                $datas['file'] = $file;
            }

            $printing = $order->orderable;
            $printing->update([
                'material' => $datas['material'],
                'scale' => $datas['scale'],
                'file_name' => $fileName ?? $order->orderable->file_name,
                'file_content' => $datas['file'] ?? $order->orderable->file_content,
            ]);

            DB::commit();

            return to_route('user.order.list')->with('success', 'Successfully updated a order');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->with('error', 'Failed to save changes: ' . $e->getMessage());
        }
    }

    public function downloadFile(Printing $printing): StreamedResponse
    {
        $filename = $printing->file_name;

        return Storage::download(
            $printing->file_content,
            $filename
        );
    }
}
