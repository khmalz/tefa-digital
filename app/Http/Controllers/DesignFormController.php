<?php

namespace App\Http\Controllers;

use App\Models\Admin\Design;
use Illuminate\Http\Request;
use App\Http\Requests\DesignRequest;
use App\Models\Admin\DesignCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
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
        $design = Design::create($request->validated());

        if ($request->hasFile('gambar.*')) {
            foreach ($request->file('gambar') as $picture) {
                $image = $picture->store('order/design');
                $design->images()->create(['image' => $image]);
            }
        }

        return to_route('user.design.form.success', [
            'nama' => $design->name_customer,
            'order' => $design->order,
            'orderId' => $design->ulid
        ]);
    }

    public function success($nama, $order, $orderId): Redirector
    {
        $message = "Halo, saya $nama, yang memesan orderan $order dengan no receipt *$orderId*.\n\nSaya ingin mendiskusikan lebih lanjut terkait pemesanan saya";
        $keyboardOtomatis = "https://api.whatsapp.com/send?phone=6285936128829&text=" . urlencode($message);

        // Redirect to the WhatsApp URL
        return redirect($keyboardOtomatis);
    }
}
