@extends('layouts.app')

@section('title', 'Daftar Motor')

@section('content')
<div class="d-flex justify-content-between gap-3 mb-4 page-header">
    <div>
        <div class="eyebrow mb-2">Manajemen inventaris</div>
        <h1 class="page-title h2 mb-2">Data Sepeda Motor</h1>
        <p class="text-secondary mb-0">Kelola katalog motor, deskripsi, harga, dan jumlah stok dalam satu tempat.</p>
    </div>
    <a href="{{ route('sepeda-motor.create') }}" class="btn btn-primary align-self-start px-4 py-2 fw-semibold">＋ Tambah Motor</a>
</div>

<div class="row g-3 mb-4">
    <div class="col-12 col-md-4">
        <div class="surface stat-card">
            <div class="stat-label mb-2">Total jenis motor</div>
            <div class="stat-value">{{ number_format($totalJenis, 0, ',', '.') }} <span class="fs-6 fw-normal text-secondary">jenis</span></div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="surface stat-card">
            <div class="stat-label mb-2">Total unit tersedia</div>
            <div class="stat-value">{{ number_format($totalStok, 0, ',', '.') }} <span class="fs-6 fw-normal text-secondary">unit</span></div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="surface stat-card">
            <div class="stat-label mb-2">Perkiraan nilai seluruh stok</div>
            <div class="stat-value">Rp {{ number_format($totalNilaiStok, 0, ',', '.') }}</div>
        </div>
    </div>
</div>

<div class="surface overflow-hidden">
    <div class="p-3 p-lg-4 d-flex justify-content-between align-items-center flex-wrap gap-3 border-bottom">
        <div>
            <h2 class="h5 fw-bold mb-1">Katalog motor</h2>
            <div class="small text-secondary">{{ $motors->total() }} data ditemukan</div>
        </div>
        <form action="{{ route('sepeda-motor.index') }}" method="GET" class="d-flex gap-2" role="search">
            <input type="search" name="search" value="{{ $search }}" class="form-control" placeholder="Cari nama atau spesifikasi motor…" aria-label="Cari motor" style="min-width:min(290px, 62vw)">
            <button class="btn btn-primary px-3" type="submit">⌕ Cari</button>
            @if ($search !== '')
                <a class="btn btn-light border" href="{{ route('sepeda-motor.index') }}">Reset</a>
            @endif
        </form>
    </div>

    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th scope="col" class="ps-4">No.</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama motor</th>
                    <th scope="col">Deskripsi / spesifikasi</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                    <th scope="col" class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($motors as $motor)
                    <tr>
                        <td class="ps-4 text-secondary">{{ $motors->firstItem() + $loop->index }}</td>
                        <td>
                            @if ($motor->gambar)
                                <img src="{{ asset('storage/' . $motor->gambar) }}" alt="Foto {{ $motor->nama_produk }}" loading="lazy" style="width:88px;height:64px;object-fit:contain" class="rounded border bg-white p-1">
                            @else
                                <div class="d-flex align-items-center justify-content-center rounded border bg-light text-secondary small" style="width:88px;height:64px">Belum ada</div>
                            @endif
                        </td>
                        <td><div class="motor-name">{{ $motor->nama_produk }}</div><div class="text-secondary small">ID #{{ $motor->id_sepeda_motor }}</div></td>
                        <td><div class="motor-description">{{ \Illuminate\Support\Str::limit($motor->spesifikasi, 105) }}</div></td>
                        <td>
                            <span class="stock-pill {{ $motor->jumlah_produk === 0 ? 'stock-empty' : '' }}">{{ number_format($motor->jumlah_produk, 0, ',', '.') }} unit</span>
                        </td>
                        <td class="money">Rp {{ number_format($motor->harga_produk, 0, ',', '.') }}</td>
                        <td class="text-end pe-4">
                            <div class="d-inline-flex flex-wrap justify-content-end gap-1">
                                <a href="{{ route('sepeda-motor.show', $motor) }}" class="btn btn-sm btn-light border" title="Detail">Detail</a>
                                <a href="{{ route('sepeda-motor.edit', $motor) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('sepeda-motor.destroy', $motor) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus {{ addslashes($motor->nama_produk) }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center py-5">
                        <div class="fw-bold mb-1">Data motor belum ditemukan</div>
                        <div class="text-secondary small mb-3">Coba ubah kata pencarian atau tambahkan motor baru.</div>
                        <a href="{{ route('sepeda-motor.create') }}" class="btn btn-primary btn-sm">Tambah motor pertama</a>
                    </td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($motors->hasPages())
        <div class="p-3 p-lg-4 border-top d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="small text-secondary">Menampilkan {{ $motors->firstItem() }}–{{ $motors->lastItem() }} dari {{ $motors->total() }} data</div>
            {{ $motors->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
<div class="small text-secondary mt-3">Catatan: harga dan stok contoh perlu disesuaikan dengan data toko yang sebenarnya.</div>
@endsection
