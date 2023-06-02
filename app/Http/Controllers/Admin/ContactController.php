<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::first();
        return view('admin.contact.index', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $datas = [
            'location' => $request->location,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ];

        $contact->update($datas);

        return to_route('contact.index');
    }
}
