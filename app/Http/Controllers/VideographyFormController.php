<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Admin\Videography;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\VideographyRequest;
use App\Models\Admin\VideographyCategory;

class VideographyFormController extends Controller
{
    public function index(Request $request): View
    {
        $categories = VideographyCategory::with('plans')->get();
        $selectedCategory = $request->category;
        $selectedPlan = $request->plan;

        return view('videography.form', compact('categories', 'selectedCategory', 'selectedPlan'));
    }

    public function store(VideographyRequest $request): RedirectResponse
    {
        $videography = Videography::create($request->validated());

        return to_route('user.videography.form.success', [
            'nama' => $videography->name_customer,
            'order' => $videography->order,
            'orderId' => $videography->ulid
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
