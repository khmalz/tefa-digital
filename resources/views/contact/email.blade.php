@component('mail::message')
    # Ada pesan baru untuk {{ $websiteTitle || config('app.name') }} dari Contact Us

    Nama: {{ $name }}

    Email: {{ $email }}

    Pesan:

    {{ $message }}
@endcomponent
