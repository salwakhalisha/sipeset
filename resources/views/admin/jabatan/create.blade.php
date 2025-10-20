@extends('template.layouts')

@section('title', 'data Jabatan')

@section('konten')
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Data Jabatan</h4>

    <form action="{{ route('jabatan.store') }}" method="POST">
      @csrf

      <div class="forms-sample">
        <div class="form-group">
          <label for="nama">Nama Jabatan</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Jabatan">
        </div>

        <button type="submit" class="btn btn-primary me-2">Submit</button>

        {{-- Cancel button diperbaiki --}}
        <a href="{{ route('jabatan.index') }}" class="btn btn-dark">Cancel</a>

      </div>
    </form>

  </div>
</div>
@endsection
