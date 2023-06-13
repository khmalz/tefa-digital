@extends('layouts.form')

@section('input')
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="">
        <label for="floatingInput">Nama</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="">
        <label for="floatingInput">Nomor telepon</label>
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="">
        <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating mb-4">
        <input type="text" class="form-control" id="floatingInput" placeholder="">
        <label for="floatingInput">Deskripsi</label>
    </div>
    <div class="mb-1">
        <button type="button" class="btn btn-form rounded-5">Pesan</button>
    </div>
@endsection