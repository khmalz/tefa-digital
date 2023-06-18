<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Photography;
use App\Http\Requests\PhotographyRequest;
use App\Models\Admin\PhotographyCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PhotographyFormController extends Controller
{
    public function index(Request $request): View
    {
        $categories = PhotographyCategory::with('plans')->get();
        $selectedCategory = $request->category;
        $selectedPlan = $request->plan;

        return view('photography.form', compact('categories', 'selectedCategory', 'selectedPlan'));
    }

    public function store(PhotographyRequest $request): RedirectResponse
    {
        $photography = Photography::create($request->validated());

        return to_route('user.photography.form.success', [
            'nama' => $photography->name_customer,
            'order' => $photography->order,
            'orderId' => $photography->ulid
        ]);
    }

    public function success($nama, $order, $orderId): RedirectResponse
    {
        $message = "Halo, saya $nama, yang memesan orderan $order dengan no receipt *$orderId*.\n\nSaya ingin mendiskusikan lebih lanjut terkait pemesanan saya";
        $keyboardOtomatis = "https://api.whatsapp.com/send?phone=6285936128829&text=" . urlencode($message);

        // Redirect to the WhatsApp URL
        return redirect($keyboardOtomatis);
    }
}
