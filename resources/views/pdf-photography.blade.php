@extends('layouts.pdf')

@section('title')
    <title>Photography_{{ $photography->ulid }}</title>
@endsection

@section('content')
    <section class="upper-part contained text-center">
        <h1 class="rc">Tefa Digital SMKN 46</h1>
        <span class="rc">Jl. B7 Cipinang Pulo No.19, RT.7/RW.14, Cipinang Besar Utara, Kecamatan
            Jatinegara</span><br />
        <p class="rc-bold mt-4">{{ $photography->order }} - {{ $photography->plan->title }}</p>
    </section>
    <div class="divider contained mt-5">
        <hr />
    </div>
    <section class="middle-part contained text-center">
        <table class="table-moment">
            <tr>
                <td class="text-left">No.</td>
                <td class="text-right">{{ $photography->ulid }}</td>
            </tr>
            <tr>
                <td class="text-left">Customer</td>
                <td class="text-right">{{ $photography->name_customer }}</td>
            </tr>
            <tr>
                <td class="text-left">Customer No.</td>
                <td class="text-right">{{ $photography->number_customer }}</td>
            </tr>
            <tr>
                <td class="text-left">Time</td>
                <td class="text-right">{{ $photography->created_at->format('d F Y H:i:s') }}</td>
            </tr>
        </table>
        <div class="divider">
            <hr />
        </div>
        <table class="table-moment">
            <tr>
                <td class="text-left">Order</td>
                <td class="text-right">{{ $photography->order }}</td>
            </tr>
            <tr>
                <td class="text-left">Plan</td>
                <td class="text-right">{{ $photography->plan->title }}</td>
            </tr>
        </table>
    </section>
    <div class="divider contained">
        <hr />
    </div>
    <section class="lower-part contained">
        <table class="table-moment">
            <tr>
                <td class="text-left">Price</td>
                <td class="text-right">{{ number_format($photography->price, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td class="text-left">Total</td>
                <td class="text-right">{{ number_format($photography->price, 0, ',', '.') }}</td>
            </tr>
        </table>
    </section>
@endsection
