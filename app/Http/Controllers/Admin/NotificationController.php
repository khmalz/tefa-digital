<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $notifications = DatabaseNotification::whereJsonContains('data->role', 'admin')
            ->where(function ($query) {
                $query->whereDate('created_at', '>=', now())
                    ->orWhere(function ($query) {
                        $query->whereDate('created_at', '<=', now())
                            ->whereNull('read_at');
                    });
            })->oldest('read_at')->oldest()->get();

        return view('admin.notification.index', compact('notifications'));
    }

    /**
     * Read all or specified notification
     */
    public function read(Request $request, string $id = null)
    {
        DatabaseNotification::whereJsonContains('data->role', 'admin')->when($id, function ($query) use ($id) {
            $query->find($id);
        })->update(['read_at' => now()]);

        return to_route('order.notification.index');
    }
}
