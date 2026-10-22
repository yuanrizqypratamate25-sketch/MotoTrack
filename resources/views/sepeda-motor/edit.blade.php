@extends('layouts.app')

@section('title', 'Edit Motor')

@section('content')
<div class="mb-4">
    <a href="{{ route('sepeda-motor.index') }}" class="link-secondary text-decoration-none small">← Kembali ke daftar motor</a>
    <div class="eyebrow mt-3 mb-2">Perbarui data · ID #{{ $motor->id_sepeda_motor }}</div>
    <h1 class="page-title h2 mb-2">Edit sepeda motor</h1>
    <p class="text-secondary mb-0">Ubah informasi produk lalu simpan perubahan.</p>
</div>
<div class="surface p-3 p-md-4 p-lg-5">
    <form action="{{ route('sepeda-motor.update', $motor) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('sepeda-motor._form')
        <div class="d-flex gap-2 justify-content-end border-top pt-4 mt-2">
            <a href="{{ route('sepeda-motor.index') }}" class="btn btn-light border px-4">Batal</a>
            <button type="submit" class="btn btn-primary px-4 fw-semibold">Simpan perubahan</button>
        </div>
    </form>
</div>
@endsection
