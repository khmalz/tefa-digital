<?php

namespace App\Http\Controllers;

use App\Http\Requests\DesignRequest;
use App\Models\Admin\Design;
use App\Models\Admin\DesignCategory;
use App\Services\FormService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function store(DesignRequest $request, FormService $formService): RedirectResponse
    {
        $datas = $request->validated();
        $datas['user_id'] = $request->user()->id;

        $design = Design::create($datas);

        $order = $design->order()->create($datas);

        if ($request->hasFile('gambar.*')) {
            foreach ($request->file('gambar') as $picture) {
                $image = $formService->uploadedFile($picture, 'design');
                $design->images()->create(['path' => $image]);
            }
        }

        return to_route('user.design.form.success', [
            'nama' => $order->name_customer,
            'order' => $design->category->title,
            'orderId' => $order->ulid,
        ]);
    }

    public function success(string $nama, string $order, string $orderId): RedirectResponse
    {
        $no_phone = config('app.no_phone');

        $message = "Halo, saya $nama, yang memesan orderan $order dengan no receipt *$orderId*.\n\nSaya ingin mendiskusikan lebih lanjut terkait pemesanan saya";
        $url = "https://api.whatsapp.com/send?phone=$no_phone&text=".urlencode($message);

        // Redirect to the WhatsApp URL
        return redirect($url);
    }
}
