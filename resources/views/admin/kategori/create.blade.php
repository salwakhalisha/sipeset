@extends('template.layouts')

@section('title', 'data Kategori Aset')

@section('konten')
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Data Kategori Aset</h4>

    <form action="{{ route('kategori.store') }}" method="POST">
      @csrf

      <div class="forms-sample">
        <div class="form-group">
          <label for="nama">Nama Kategori Aset</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Kategori Aset">
        </div>

        <button type="submit" class="btn btn-primary me-2">Submit</button>

        <a href="{{ route('kategori.index') }}" class="btn btn-dark">Cancel</a>

      </div>
    </form>

  </div>
</div>
@endsection
