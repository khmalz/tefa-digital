<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Admin\Printing;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PrintingRequest;

class PrintingFormController extends Controller
{
    public function index(): View
    {
        return view('printing.form');
    }

    public function store(PrintingRequest $request): RedirectResponse
    {
        $datas = $request->validated();
        $datas['user_id'] = $request->user()->id;

        $fileReq = $request->file('file');
        $fileName = $fileReq->getClientOriginalName();

        $file = $fileReq->store('order/printing');
        $datas['file'] = $file;

        $printing = Printing::create([
            'material' => $datas['material'],
            'scale' => $datas['scale'],
            'file_name' => $fileName,
            'file_content' => $datas['file'],
        ]);

        $order = $printing->order()->create($datas);

        return to_route('user.printing.form.success', [
            'nama' => $order->name_customer,
            'orderId' => $order->ulid
        ]);
    }

    public function success($nama, $orderId): RedirectResponse
    {
        $no_phone = config('app.no_phone');

        $message = "Halo, saya $nama, yang memesan orderan 3D Printing dengan no receipt *$orderId*.\n\nSaya ingin mendiskusikan lebih lanjut terkait pemesanan saya";
        $url = "https://api.whatsapp.com/send?phone=$no_phone&text=" . urlencode($message);

        // Redirect to the WhatsApp URL
        return redirect($url);
    }
}
