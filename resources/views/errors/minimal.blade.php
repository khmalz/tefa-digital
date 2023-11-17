@extends('layouts.main')

@push('styles')
    <style>
        .bg-body {
            background-color: #fde8d0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50vh;
            margin-top: 50px;
        }

        .card {
            background-color: #ff9a2e;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            border: 4px solid #000000;
            width: 300px;
        }
    </style>
@endpush


@section('main')
    <div class="bg-body">
        <div class="card">
            <i>
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M2.73 21h18.53c.77 0 1.25-.83.87-1.5l-9.27-16a.996.996 0 0 0-1.73 0l-9.27 16c-.38.67.1 1.5.87 1.5zM13 18h-2v-2h2v2zm-1-4c-.55 0-1-.45-1-1v-2c0-.55.45-1 1-1s1 .45 1 1v2c0 .55-.45 1-1 1z" />
                </svg>
            </i>
            <h2>@yield('code')</h2>
            <p>@yield('message')</p>
            <a href="{{ route('home') }}" style="color: #000000">
                <<< Back to Home</a>
        </div>
    </div>
@endsection