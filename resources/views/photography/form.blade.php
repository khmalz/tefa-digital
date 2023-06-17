@extends('layouts.form', ['title' => 'Photography'])

@section('content')
    <div class="col-md-7">
        <div class="card-form position-relative m-auto mb-3 overflow-hidden rounded">
            <h4 class="fw-semibold my-3 text-center text-white">Form Pemesanan Photography</h4>
            <div class="card-input position-relative mb-4 overflow-hidden rounded bg-white">
                <form action="" method="POST">
                    @csrf
                    <div class="p-5">
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="nameInput">Nama</label>
                            <input type="text" class="form-control form-control-sm" name="name_customer" id="nameInput"
                                placeholder="">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="phoneInput">Nomor telepon</label>
                            <input type="text" class="form-control form-control-sm" name="number_customer"
                                id="phoneInput" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label-sm" for="emailInput">Email</label>
                            <input type="email" class="form-control form-control-sm" name="email_customer" id="emailInput"
                                placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="descriptionInput" class="col-form-label-sm">Description</label>
                            <textarea class="form-control form-control-sm" name="description" id="descriptionInput" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="button" class="btn btn-general rounded-2">Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
