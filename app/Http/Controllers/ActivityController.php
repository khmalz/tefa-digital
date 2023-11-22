<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $activities = $request->user()->notifications()->whereJsonContains('data->client_id', $request->user()->id)->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->get();

        return view('profile.activity', compact('activities'));
    }

    /**
     * Read all or specified notification
     */

    public function read(Request $request, ?string $id = null)
    {
        DatabaseNotification::whereJsonContains('data->client_id', $request->user()->id)->when($id, function ($query) use ($id) {
            $query->find($id);
        })->update(['read_at' => now()]);

        return to_route('user.order.activity.index');
    }
}
