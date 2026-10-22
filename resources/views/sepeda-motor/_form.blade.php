<div class="mb-3">
    <label for="nama_produk" class="form-label fw-semibold">Nama motor <span class="required-mark">*</span></label>
    <input type="text" id="nama_produk" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk', $motor->nama_produk) }}" placeholder="Contoh: Yamaha MX King 150" maxlength="150" required autofocus>
    @error('nama_produk') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label for="spesifikasi" class="form-label fw-semibold">Deskripsi / spesifikasi <span class="required-mark">*</span></label>
    <textarea id="spesifikasi" name="spesifikasi" rows="5" class="form-control @error('spesifikasi') is-invalid @enderror" placeholder="Tuliskan kapasitas mesin, jenis transmisi, fitur utama, warna, atau keterangan produk…" maxlength="5000" required>{{ old('spesifikasi', $motor->spesifikasi) }}</textarea>
    @error('spesifikasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="row g-3">
    <div class="col-12 col-md-6 mb-3">
        <label for="harga_produk" class="form-label fw-semibold">Harga (Rupiah) <span class="required-mark">*</span></label>
        <div class="input-group">
            <span class="input-group-text bg-light">Rp</span>
            <input type="number" id="harga_produk" name="harga_produk" class="form-control @error('harga_produk') is-invalid @enderror" value="{{ old('harga_produk', $motor->harga_produk) }}" placeholder="25000000" min="0" max="999999999999" step="1" required>
            @error('harga_produk') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-text">Masukkan angka tanpa titik pemisah, contoh 25000000.</div>
    </div>
    <div class="col-12 col-md-6 mb-3">
        <label for="jumlah_produk" class="form-label fw-semibold">Jumlah stok (unit) <span class="required-mark">*</span></label>
        <input type="number" id="jumlah_produk" name="jumlah_produk" class="form-control @error('jumlah_produk') is-invalid @enderror" value="{{ old('jumlah_produk', $motor->jumlah_produk ?? 0) }}" min="0" max="1000000" step="1" required>
        @error('jumlah_produk') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-4">
    <label for="gambar" class="form-label fw-semibold">Foto sepeda motor</label>
    @if ($motor->gambar)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $motor->gambar) }}" alt="Foto {{ $motor->nama_produk }}" style="max-width:240px;max-height:160px;object-fit:contain" class="rounded border p-1">
        </div>
    @endif
    <input type="file" id="gambar" name="gambar" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" class="form-control @error('gambar') is-invalid @enderror">
    <div class="form-text">Format JPG, PNG, atau WEBP. Maksimal 2 MB. Kosongkan jika tidak ingin mengganti foto.</div>
    @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
