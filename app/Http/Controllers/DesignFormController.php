<?php

namespace App\Http\Controllers;

use App\Models\Admin\Design;
use Illuminate\Http\Request;
use App\Http\Requests\DesignRequest;
use App\Models\Admin\DesignCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DesignFormController extends Controller
{
    public function index(Request $request): View
    {
        $categories = DesignCategory::with('plans')->get();
        $selectedCategory = $request->category;
        $selectedPlan = $request->plan;

        return view('design.form', compact('categories', 'selectedCategory', 'selectedPlan'));
    }

    public function store(DesignRequest $request): RedirectResponse
    {
        $order = $request->user()->orders()->create($request->validated());

        $design = $order->designs()->create([
            'design_plan_id' => $request->design_plan_id,
            'slogan' => $request->slogan,
            'color' => $request->color,
            'description' => $request->description,
        ]);

        if ($request->hasFile('gambar.*')) {
            foreach ($request->file('gambar') as $picture) {
                $image = $picture->store('order/design');
                $design->images()->create(['image' => $image]);
            }
        }

        return to_route('user.design.form.success', [
            'nama' => $order->name_customer,
            'order' => $design->category->title,
            'orderId' => $order->ulid
        ]);
    }

    public function success($nama, $order, $orderId): RedirectResponse
    {
        $no_phone = config('app.no_phone');

        $message = "Halo, saya $nama, yang memesan orderan $order dengan no receipt *$orderId*.\n\nSaya ingin mendiskusikan lebih lanjut terkait pemesanan saya";
        $url = "https://api.whatsapp.com/send?phone=$no_phone&text=" . urlencode($message);

        // Redirect to the WhatsApp URL
        return redirect($url);
    }
}
