@extends('layouts.app')

@section('title', 'Detail Motor')

@section('content')
<div class="mb-4">
    <a href="{{ route('sepeda-motor.index') }}" class="link-secondary text-decoration-none small">← Kembali ke daftar motor</a>
    <div class="eyebrow mt-3 mb-2">Detail produk · ID #{{ $motor->id_sepeda_motor }}</div>
    <h1 class="page-title h2 mb-2">{{ $motor->nama_produk }}</h1>
    <p class="text-secondary mb-0">Rincian produk dan informasi stok.</p>
</div>
<div class="surface p-3 p-md-4 p-lg-5">
    <div class="row g-4">
        @if ($motor->gambar)
            <div class="col-12">
                <img src="{{ asset('storage/' . $motor->gambar) }}" alt="Foto {{ $motor->nama_produk }}" class="img-fluid rounded-4 border bg-white p-2" style="max-height:320px;object-fit:contain">
            </div>
        @endif
        <div class="col-12 col-lg-8">
            <div class="eyebrow mb-2">Deskripsi / spesifikasi</div>
            <p class="mb-0" style="white-space:pre-line; line-height:1.85">{{ $motor->spesifikasi }}</p>
        </div>
        <div class="col-12 col-lg-4">
            <div class="bg-light rounded-4 p-4 h-100">
                <div class="small text-secondary mb-2">Harga produk</div>
                <div class="h3 fw-bold mb-4">Rp {{ number_format($motor->harga_produk, 0, ',', '.') }}</div>
                <div class="small text-secondary mb-2">Jumlah stok</div>
                <div class="h4 fw-bold mb-4">{{ number_format($motor->jumlah_produk, 0, ',', '.') }} <span class="fs-6 fw-normal text-secondary">unit</span></div>
                <div class="small text-secondary">Nilai stok produk</div>
                <div class="h5 fw-bold mb-0">Rp {{ number_format($motor->harga_produk * $motor->jumlah_produk, 0, ',', '.') }}</div>
            </div>
        </div>
    </div>
    <div class="d-flex gap-2 justify-content-end border-top pt-4 mt-4">
        <a href="{{ route('sepeda-motor.index') }}" class="btn btn-light border px-4">Kembali</a>
        <a href="{{ route('sepeda-motor.edit', $motor) }}" class="btn btn-primary px-4">Edit data</a>
    </div>
</div>
@endsection
