<?php

namespace App\Http\Controllers;

use App\Events\UpdateOrderEvent;
use App\Http\Requests\DesignRequest;
use App\Http\Requests\PhotographyRequest;
use App\Http\Requests\PrintingRequest;
use App\Http\Requests\VideographyRequest;
use App\Models\Admin\DesignImage;
use App\Models\Admin\Order;
use App\Models\Admin\Printing;
use App\Services\FormService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class OrderClientSystemController extends Controller
{
    public function updateDesign(DesignRequest $request, Order $order, FormService $formService)
    {
        $datas = $request->validated();

        DB::beginTransaction();

        try {
            $design = $order->orderable;
            $design->update($datas);

            $order->update($datas);

            $deleted = $request->img_deleted;
            if ($deleted) {
                $designImages = DesignImage::whereIn('id', $deleted)->get();

                $designImages->each(function ($image) use ($formService) {
                    $formService->deletedUploadedFile($image->path);
                });

                DesignImage::destroy($deleted);
            }

            if ($request->hasFile('gambar.*')) {
                foreach ($request->file('gambar') as $picture) {
                    $image = $formService->uploadedFile($picture, 'design');
                    $design->images()->create(['path' => $image]);
                }
            }

            DB::commit();

            event(new UpdateOrderEvent($order, 'design'));

            return to_route('user.order.list')->with('success', 'Successfully updated a order');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->with('error', 'Failed to save changes: '.$e->getMessage());
        }
    }

    public function updatePhotography(PhotographyRequest $request, Order $order)
    {
        $datas = $request->validated();

        $photography = $order->orderable;
        $photography->update([
            'photography_plan_id' => $datas['photography_plan_id'],
        ]);

        $order->update($datas);

        event(new UpdateOrderEvent($order, 'photography'));

        return redirect()->route('user.order.list')->with('success', 'Successfully updated a order');
    }

    public function updateVideography(VideographyRequest $request, Order $order)
    {
        $datas = $request->validated();

        $videography = $order->orderable;
        $videography->update([
            'videography_plan_id' => $datas['videography_plan_id'],
        ]);

        $order->update($datas);

        event(new UpdateOrderEvent($order, 'videography'));

        return redirect()->route('user.order.list')->with('success', 'Successfully updated a order');
    }

    public function updatePrinting(PrintingRequest $request, Order $order, FormService $formService)
    {
        $datas = $request->validated();

        DB::beginTransaction();

        try {
            $order->update($datas);

            if ($request->hasFile('file')) {
                $fileReq = $request->file('file');
                $fileName = $fileReq->getClientOriginalName();

                $formService->deletedUploadedFile($order->orderable->file_content);

                $filePath = $formService->uploadedFile($fileReq, 'printing');
            }

            $datas['file_content'] = $filePath ?? $order->orderable->file_content;
            $datas['file_name'] = $fileName ?? $order->orderable->file_name;

            $printing = $order->orderable;
            $printing->update($datas);

            DB::commit();

            event(new UpdateOrderEvent($order, 'printing'));

            return to_route('user.order.list')->with('success', 'Successfully updated a order');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->with('error', 'Failed to save changes: '.$e->getMessage());
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

    public function cancel(Order $order)
    {
        abort_if($order->status !== 'pending', 403, 'Only pending order can be canceled');

        $order->update([
            'status' => 'cancel',
        ]);

        return to_route('user.order.list')->with('success', 'Successfully canceled a order');
    }
}
