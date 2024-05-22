@extends('layouts.admin')

@section('judul')
Hasil Pencarian
@endsection

@section('tabel')

<div class="row">
    @forelse ($profile as $profile)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    {{ $profile->nama_lengkap }}
                </div>
                <div class="card-body">
                    <p>Procesor: {{ $profile->no_hp }}</p>
                    <p>RAM & ROM: {{ $profile->alamat }}</p>
                </div>
                <a href="/pelanggan" class="btn btn-primary my-3">Kembali</a>
</div>
            </div>
        </div>
    @empty
        <div class="col">
            <p>No Data</p>
        </div>
    @endforelse
</div>

@endsection
