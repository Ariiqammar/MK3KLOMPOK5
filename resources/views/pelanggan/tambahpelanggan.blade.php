@extends('layouts.admin')

@section('judul', 'Tambah Profil Pelanggan')

@section('content')
    <form action="/pelanggan" method="POST">
        @csrf
        <div class="form-group p-3">
            <label>Merek </label>
            <input type="text" name='nama' class="form-control" placeholder="Masukan Merek Handphone">
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group p-3">
            <label>Procesor</label>
            <input type="text" name='nohp' class="form-control" placeholder="Masukan Spesifikasi Procesor">
            @error('nohp')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group p-3">
            <label>RAM & ROM</label>
            <input type="text" name='alamat' class="form-control" placeholder="Masukan Jumlah RAM & ROM">
            @error('alamat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="p-3">
            <button type="submit" class="btn btn-primary ">Submit</button>
        </div>

    </form>
@endsection
