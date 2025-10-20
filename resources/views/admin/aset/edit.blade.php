@extends('template.layouts')

@section('title', 'Edit Aset')

@section('konten')
<div class="card">
  <div class="card-body">
    <h2>Edit Aset</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('aset.update', $aset->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{ $aset->id }}">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Aset</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $aset->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Tersedia" {{ old('status', $aset->status) == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Dipinjam" {{ old('status', $aset->status) == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                <option value="Diperbaiki" {{ old('status', $aset->status) == 'Diperbaiki' ? 'selected' : '' }}>Diperbaiki</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <select name="kondisi" id="kondisi" class="form-control" required>
                <option value="baik" {{ old('kondisi', $aset->kondisi) == 'baik' ? 'selected' : '' }}>Baik</option>
                <option value="rusak ringan" {{ old('kondisi', $aset->kondisi) == 'rusak ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                <option value="rusak berat" {{ old('kondisi', $aset->kondisi) == 'rusak berat' ? 'selected' : '' }}>Rusak Berat</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ old('lokasi', $aset->lokasi) }}" required>
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="form-control" required>
                <option value=""> Pilih Kategori </option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id', $aset->kategori_id) == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto Aset (Opsional)</label>
            <input type="file" name="foto" id="foto" class="form-control">
            @if ($aset->foto)
                <p class="mt-2">Foto saat ini:</p>
                <img src="{{ asset('storage/' . $aset->foto) }}" alt="Foto Aset" width="150">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('aset.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</div>
@endsection
