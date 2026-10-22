@extends('layouts.app')

@section('title', 'Tambah Motor')

@section('content')
<div class="mb-4">
    <a href="{{ route('sepeda-motor.index') }}" class="link-secondary text-decoration-none small">← Kembali ke daftar motor</a>
    <div class="eyebrow mt-3 mb-2">Tambah data</div>
    <h1 class="page-title h2 mb-2">Tambah sepeda motor</h1>
    <p class="text-secondary mb-0">Lengkapi informasi motor di bawah ini untuk memasukkannya ke katalog.</p>
</div>
<div class="surface p-3 p-md-4 p-lg-5">
    <form action="{{ route('sepeda-motor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('sepeda-motor._form')
        <div class="d-flex gap-2 justify-content-end border-top pt-4 mt-2">
            <a href="{{ route('sepeda-motor.index') }}" class="btn btn-light border px-4">Batal</a>
            <button type="submit" class="btn btn-primary px-4 fw-semibold">Simpan motor</button>
        </div>
    </form>
</div>
@endsection
