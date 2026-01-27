@extends('template.layouts')
@section('title', 'Tambah Aset')

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

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Aset Baru</h4>

            <form action="{{ route('aset.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Nama Aset</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Aset" value="{{ old('nama') }}">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value=""> Pilih Status </option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Diperbaiki">Diperbaiki</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kondisi</label>
                    <select name="kondisi" class="form-control">
                        <option value=""> Pilih Kondisi </option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak Ringan">Rusak Ringan</option>
                        <option value="Rusak Berat">Rusak Berat</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" placeholder="Masukkan Lokasi" value="{{ old('lokasi') }}">
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori_id" class="form-control">
                        <option value=""> Pilih Kategori </option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('aset.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

@endsection
