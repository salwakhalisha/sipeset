@extends('template.layouts')

@section('title', 'data jabatan')

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
    <h4 class="card-title">Data Jabatan</h4>

    <form action="{{ route('jabatan.update', $jabatan->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <input type="hidden" name="id" value="{{ $jabatan->id }}">

      <div class="forms-sample">
        <div class="form-group">
          <label for="nama">Nama Jabatan</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Jabatan" value="{{ $jabatan->nama }}">
        </div>

        <button type="submit" class="btn btn-primary me-2">Simpan</button>

        {{-- Perbaikan tombol cancel menggunakan <a> sebagai tombol --}}
        <a href="{{ route('jabatan.index') }}" class="btn btn-dark">Cancel</a>
        
      </div>
    </form>
    
  </div>
</div>
@endsection
