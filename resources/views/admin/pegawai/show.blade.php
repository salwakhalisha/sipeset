@extends('template.layouts')
@section('title', 'Detail Data Pegawai')
@section('konten')

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Data Pegawai</h4>
    
    <div class="forms-sample">
      <div class="form-group">
        <label for="nip">NIP</label>
        <input type="text" id="nip" class="form-control" value="{{ $pegawai->nip }}" readonly>
      </div>
      <div class="form-group">
        <label for="nama">Nama pegawai</label>
        <input type="text" id="nama" class="form-control" value="{{ $pegawai->nama }}" readonly>
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" class="form-control" value="{{ $pegawai->alamat }}" readonly>
      </div>
      <div class="form-group">
        <label for="telp">No Telepon</label>
        <input type="text" id="telp" class="form-control" value="{{ $pegawai->telp }}" readonly>
      </div>
      <div class="form-group">
        <label for="jk">Jenis Kelamin</label>
        <input type="text" id="jk" class="form-control" value="{{ $pegawai->jk }}" readonly>
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" class="form-control" value="{{ $pegawai->username }}" readonly>
      </div>
      <div class="form-group">
        <label for="password">password</label>
        <input type="text" id="password" class="form-control" value="{{ $pegawai->password }}" readonly>
      </div>
      

      <a href="{{ route('pegawai.index') }}" class="btn btn-dark">Kembali</a>
    </div>
  </div>
</div>

@endsection
