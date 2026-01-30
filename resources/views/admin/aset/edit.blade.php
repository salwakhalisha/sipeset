@extends('template.layouts')

@section('title', 'Edit Aset')

<style>
    .container {
    color: #000;

    }   

    .table td,
    .table th {
        color: #000 !important;
    }

</style>

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

<!-- @extends('template.layouts')
@section('title', 'Edit Aset')

@section('konten')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Aset</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
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

                <div class="form-group">
                    <label>Nama Aset</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $aset->nama) }}">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value=""> Pilih Status </option>
                        <option value="Tersedia" {{ old('status', $aset->status)=='Tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="Diperbaiki" {{ old('status', $aset->status)=='Diperbaiki' ? 'selected' : '' }}>Diperbaiki</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kondisi</label>
                    <select name="kondisi" class="form-control">
                        <option value=""> Pilih Kondisi </option>
                        <option value="Baik" {{ old('kondisi', $aset->kondisi)=='Baik' ? 'selected' : '' }}>Baik</option>
                        <option value="Rusak Ringan" {{ old('kondisi', $aset->kondisi)=='Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                        <option value="Rusak Berat" {{ old('kondisi', $aset->kondisi)=='Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $aset->lokasi) }}">
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori_id" class="form-control">
                        <option value=""> Pilih Kategori </option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id', $aset->kategori_id)==$kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>

                    @if($aset->foto && file_exists(public_path('/foto/' . $aset->foto)))
                        <div class="mt-2">
                            <p>Foto Saat Ini:</p>
                            <img src="{{ asset('foto/'.$aset->foto) }}" alt="Foto Aset" style="max-width:150px; border:1px solid #ccc; padding:5px;">
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('aset.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection -->
