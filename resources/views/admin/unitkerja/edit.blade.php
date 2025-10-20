@extends('template.layouts')

@section('title', 'data jabatan')

@section('konten')
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Data Unit Kerja</h4>

    <form action="{{ route('unitkerja.update', $unitkerja->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <input type="hidden" name="id" value="{{ $unitkerja->id }}">

      <div class="forms-sample">
        <div class="form-group">
          <label for="nama">Nama Unit Kerja</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Unit Kerja" value="{{ $unitkerja->nama }}">
        </div>

        <button type="submit" class="btn btn-primary me-2">Simpan</button>

        {{-- Perbaikan tombol cancel menggunakan <a> sebagai tombol --}}
        <a href="{{ route('unitkerja.index') }}" class="btn btn-dark">Cancel</a>
        
      </div>
    </form>
    
  </div>
</div>
@endsection
