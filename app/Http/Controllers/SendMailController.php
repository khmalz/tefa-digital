<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    /**
     * Summary of sendMail
     */
    public function sendMail(MailRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();

        try {
            Mail::to('tefadigital.smk46@gmail.com')->send(new ContactMail($data['name'], $data['email'], $data['subject'], $data['message']));

            return back()->with('success', 'Pesan Anda telah terkirim!');
        } catch (\Exception $e) {
            return back()->with('failure', 'Gagal mengirim pesan. Silakan coba lagi.');
        }
    }
}
