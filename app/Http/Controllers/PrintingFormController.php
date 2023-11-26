<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrintingRequest;
use App\Models\Admin\Printing;
use App\Services\FormService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PrintingFormController extends Controller
{
    public function index(): View
    {
        return view('printing.form');
    }

    public function store(PrintingRequest $request, FormService $formService): RedirectResponse
    {
        $datas = $request->validated();
        $fileReq = $request->file('file');

        $datas['user_id'] = $request->user()->id;
        $datas['file_content'] = $formService->uploadedFile($fileReq, 'printing');
        $datas['file_name'] = $fileReq->getClientOriginalName();

        $printing = Printing::create($datas);

        $order = $printing->order()->create($datas);

        return to_route('user.printing.form.success', [
            'nama' => $order->name_customer,
            'orderId' => $order->ulid,
        ]);
    }

    public function success(string $nama, string $orderId): RedirectResponse
    {
        $no_phone = config('app.no_phone');

        $message = "Halo, saya $nama, yang memesan orderan 3D Printing dengan no receipt *$orderId*.\n\nSaya ingin mendiskusikan lebih lanjut terkait pemesanan saya";
        $url = "https://api.whatsapp.com/send?phone=$no_phone&text=".urlencode($message);

        // Redirect to the WhatsApp URL
        return redirect($url);
    }
}
