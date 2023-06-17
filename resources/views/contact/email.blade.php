@component('mail::message')
    # Ada pesan baru untuk Tefa Digital dari Contact Us

    Nama: {{ $name }}

    Email: {{ $email }}

    Pesan:

    {{ $message }}
@endcomponent
