<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotographyRequest;
use App\Models\Admin\Photography;
use App\Models\Admin\PhotographyCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        $datas = $request->validated();
        $datas['user_id'] = $request->user()->id;

        $photography = Photography::create([
            'photography_plan_id' => $request->photography_plan_id,
        ]);

        $order = $photography->order()->create($datas);

        return to_route('user.photography.form.success', [
            'nama' => $order->name_customer,
            'order' => $photography->category->title,
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
