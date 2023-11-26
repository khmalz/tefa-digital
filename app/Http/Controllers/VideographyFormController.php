<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideographyRequest;
use App\Models\Admin\Videography;
use App\Models\Admin\VideographyCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
        $datas = $request->validated();
        $datas['user_id'] = $request->user()->id;

        $videography = Videography::create([
            'videography_plan_id' => $request->videography_plan_id,
        ]);

        $order = $videography->order()->create($datas);

        return to_route('user.videography.form.success', [
            'nama' => $order->name_customer,
            'order' => $videography->category->title,
            'orderId' => $order->ulid,
        ]);
    }

    public function success($nama, $order, $orderId): RedirectResponse
    {
        $no_phone = config('app.no_phone');

        $message = "Halo, saya $nama, yang memesan orderan $order dengan no receipt *$orderId*.\n\nSaya ingin mendiskusikan lebih lanjut terkait pemesanan saya";
        $url = "https://api.whatsapp.com/send?phone=$no_phone&text=".urlencode($message);

        // Redirect to the WhatsApp URL
        return redirect($url);
    }
}
