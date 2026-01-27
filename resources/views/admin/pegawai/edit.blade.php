@extends('template.layouts')
@section('title', 'Edit Pegawai')

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
    <div class="card-header bg-warning text-white">
        <h4 class="card-title mb-0">Edit Data Pegawai</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" novalidate>
            @csrf
            @method('PUT')

            <div class="row g-3">
                <!-- NIP -->
                <div class="col-md-4 mt-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control" name="nip" id="nip" value="{{ old('nip', $pegawai->nip) }}" required>
                </div>

                <!-- Nama -->
                <div class="col-md-8 mt-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $pegawai->nama) }}" required>
                </div>

                <!-- Alamat -->
                <div class="col-12 mt-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" rows="3" required>{{ old('alamat', $pegawai->alamat) }}</textarea>
                </div>

                <!-- Telepon -->
                <div class="col-md-6 mt-3">
                    <label for="telp" class="form-label">Nomor Telepon</label>
                    <input type="text" name="telp" id="telp" class="form-control" value="{{ old('telp', $pegawai->telp) }}" required>
                </div>

                <!-- Jenis Kelamin -->
                <div class="col-md-6 mt-3">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L" {{ old('jk', $pegawai->jk) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jk', $pegawai->jk) == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                 <!-- Username
                <div class="col-md-4 mt-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="{{ old('username', $pegawai->username) }}" required>
                </div> -->

                <!--Password 
                 <div class="col-md-4 mt-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Isi jika ingin ubah password">
                </div> -->

                <!-- Email -->
                <!-- <div class="col-md-4 mt-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email"
                        value="{{ old('email', $pegawai->user->email ?? '') }}" required>
                </div> -->

                <!-- Jabatan -->
                <div class="col-md-6 mt-3">
                    <label for="jabatan_id" class="form-label">Jabatan</label>
                    <select name="jabatan_id" id="jabatan_id" class="form-control" required>
                        <option value="">Pilih Jabatan</option>
                        @foreach ($jabatans as $jabatan)
                            <option value="{{ $jabatan->id }}"
                                {{ old('jabatan_id', $pegawai->jabatan_id) == $jabatan->id ? 'selected' : '' }}>
                                {{ $jabatan->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Unit Kerja -->
                <div class="col-md-6 mt-3">
                    <label for="unitkerja_id" class="form-label">Unit Kerja</label>
                    <select name="unitkerja_id" id="unitkerja_id" class="form-control" required>
                        <option value="">Pilih Unit Kerja</option>
                        @foreach ($unitkerjas as $unit)
                            <option value="{{ $unit->id }}"
                                {{ old('unitkerja_id', $pegawai->unitkerja_id) == $unit->id ? 'selected' : '' }}>
                                {{ $unit->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary me-3">Batal</a>
                <button type="submit" class="btn btn-warning text-white">Perbarui</button>
            </div>
        </form>
    </div>
</div>

@endsection
