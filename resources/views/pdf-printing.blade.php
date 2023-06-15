@extends('layouts.pdf')

@section('title')
    <title>Printing_{{ $printing->ulid }}</title>
@endsection

@section('content')
    <section class="upper-part contained text-center">
        <h1 class="rc">Tefa Digital SMKN 46</h1>
        <span class="rc">Jl. B7 Cipinang Pulo No.19, RT.7/RW.14, Cipinang Besar Utara, Kecamatan
            Jatinegara</span><br />
        <p class="rc-bold mt-4">Printing</p>
    </section>
    <div class="divider contained mt-5">
        <hr />
    </div>
    <section class="middle-part contained text-center">
        <table class="table-moment">
            <tr>
                <td class="text-left">No.</td>
                <td class="text-right">{{ $printing->ulid }}</td>
            </tr>
            <tr>
                <td class="text-left">Customer</td>
                <td class="text-right">{{ $printing->name_customer }}</td>
            </tr>
            <tr>
                <td class="text-left">Customer No.</td>
                <td class="text-right">{{ $printing->number_customer }}</td>
            </tr>
            <tr>
                <td class="text-left">Time</td>
                <td class="text-right">{{ $printing->created_at->format('d F Y H:i:s') }}</td>
            </tr>
        </table>
        <div class="divider">
            <hr />
        </div>
        <table class="table-moment">
            <tr>
                <td class="text-left">Order</td>
                <td class="text-right">Printing</td>
            </tr>
            <tr>
                <td class="text-left">Material</td>
                <td class="text-right">{{ $printing->material }}</td>
            </tr>
            <tr>
                <td class="text-left">Scale</td>
                <td class="text-right">{{ $printing->scale }}</td>
            </tr>
        </table>
    </section>
@endsection
