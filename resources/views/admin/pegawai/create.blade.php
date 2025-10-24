@extends('template.layouts')
@section('title', 'Tambah Pegawai')
@section('konten')

<div class="card">
    <div class="card-header bg-primary text-white">
        <h4 class="card-title mb-0">Tambah Pegawai</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('pegawai.store') }}" method="POST" novalidate>
            @csrf
            <div class="row g-3">
                <!-- NIP -->
                <div class="col-md-4 mt-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukkan NIP" required>
                </div>

                <!-- Nama -->
                <div class="col-md-8 mt-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" required>
                </div>

                <!-- Alamat -->
                <div class="col-12 mt-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" rows="3" placeholder="Masukkan Alamat" required></textarea>
                </div>

                <!-- Telepon & Jenis Kelamin -->
                <div class="col-md-6 mt-3">
                    <label for="telp" class="form-label">Nomor Telepon</label>
                    <input type="text" name="telp" id="telp" class="form-control" placeholder="Masukkan Nomor Telepon" required>
                </div>
                <div class="col-md-6 mt-3">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L" {{ old('jk') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jk') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <!-- Username, Password, Email -->
                <div class="col-md-4 mt-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" required>
                </div>
                <div class="col-md-4 mt-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required>
                </div>
                <div class="col-md-4 mt-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" required>
                </div>

                <!-- Jabatan -->
                <div class="col-md-6 mt-3">
                    <label for="jabatan_id" class="form-label">Jabatan</label>
                    <select name="jabatan_id" id="jabatan_id" class="form-control" required>
                        <option value="">Pilih Jabatan</option>
                        @foreach ($jabatans as $jabatan)
                            <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Unit Kerja -->
                <div class="col-md-6 mt-3">
                    <label for="unitkerja_id" class="form-label">Unit Kerja</label>
                    <select name="unitkerja_id" id="unitkerja_id" class="form-control" required>
                        <option value="">Pilih Unit Kerja</option>
                        @foreach ($unitkerjas as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary me-4">Batal</a>
                <button type="submit" class="btn btn-primary me-4">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
