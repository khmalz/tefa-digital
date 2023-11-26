<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactRequest;
use App\Models\Admin\Contact;
use App\Models\Title;
use Illuminate\Http\Request;

class ProfileAppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = Title::first();
        $contact = Contact::first();

        return view('admin.contact.index', compact('title', 'contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateContact(ContactRequest $request, Contact $contact)
    {
        $contact->update($request->validated());

        return to_route('profile-app.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateTitle(Request $request, Title $title)
    {
        $datas = $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'logo' => ['nullable', 'file', 'image', 'max:5'],
        ]);

        $title->update($datas);

        return to_route('profile-app.index');
    }
}
