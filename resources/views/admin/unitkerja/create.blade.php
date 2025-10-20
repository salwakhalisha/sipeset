@extends('template.layouts')

@section('title', 'data unitkerja')

@section('konten')
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Data Unit Kerja</h4>

    <form action="{{ route('unitkerja.store') }}" method="POST">
      @csrf

      <div class="forms-sample">
        <div class="form-group">
          <label for="nama">Nama Unit Kerja</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Unit Kerja">
        </div>

        <button type="submit" class="btn btn-primary me-2">Submit</button>

        <a href="{{ route('unitkerja.index') }}" class="btn btn-dark">Cancel</a>

      </div>
    </form>

  </div>
</div>
@endsection
