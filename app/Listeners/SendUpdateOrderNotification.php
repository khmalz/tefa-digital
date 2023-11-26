<?php

namespace App\Listeners;

use App\Events\UpdateOrderEvent;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UpdateOrderNotification;

class SendUpdateOrderNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UpdateOrderEvent $event): void
    {
        $order = $event->order;

        try {
            Notification::send($order->user, new UpdateOrderNotification(
                $event->category,
                $order->name_customer,
                $order->ulid,
                $order->status
            ));
        } catch (\Exception $e) {
            Log::error("Error send notif dengan pesan: {$e->getMessage()}");
        }
    }
}
