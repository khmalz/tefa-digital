@extends('layouts.pdf')

@section('title')
    <title>Design_{{ $design->ulid }}</title>
@endsection

@section('content')
    <section class="upper-part contained text-center">
        <h1 class="rc">Tefa Digital SMKN 46</h1>
        <span class="rc">Jl. B7 Cipinang Pulo No.19, RT.7/RW.14, Cipinang Besar Utara, Kecamatan
            Jatinegara</span><br />
        <p class="rc-bold mt-4">{{ $design->order }} - {{ $design->plan->title }}</p>
    </section>
    <div class="divider contained mt-5">
        <hr />
    </div>
    <section class="middle-part contained text-center">
        <table class="table-moment">
            <tr>
                <td class="text-left">Receipt No.</td>
                <td class="text-right">{{ $design->ulid }}</td>
            </tr>
            <tr>
                <td class="text-left">Customer</td>
                <td class="text-right">{{ $design->name_customer }}</td>
            </tr>
            <tr>
                <td class="text-left">Customer No.</td>
                <td class="text-right">{{ $design->number_customer }}</td>
            </tr>
            <tr>
                <td class="text-left">Time</td>
                <td class="text-right">{{ $design->created_at->format('d F Y H:i:s') }}</td>
            </tr>
        </table>
        <div class="divider">
            <hr />
        </div>
        <table class="table-moment">
            <tr>
                <td class="text-left">Order</td>
                <td class="text-right">{{ $design->order }}</td>
            </tr>
            <tr>
                <td class="text-left">Plan</td>
                <td class="text-right">{{ $design->plan->title }}</td>
            </tr>
            <tr>
                <td class="text-left">Color</td>
                <td class="text-right">{{ $design->color }}</td>
            </tr>
            @if (!empty($design->slogan))
                <tr>
                    <td class="text-left">Slogan</td>
                    <td class="text-right">{{ $design->slogan }}</td>
                </tr>
            @endif
        </table>
    </section>
    <div class="divider contained">
        <hr />
    </div>
    <section class="lower-part contained">
        <table class="table-moment">
            <tr>
                <td class="text-left">Price</td>
                <td class="text-right">{{ number_format($design->price, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td class="text-left">Total</td>
                <td class="text-right">{{ number_format($design->price, 0, ',', '.') }}</td>
            </tr>
        </table>
    </section>
@endsection
