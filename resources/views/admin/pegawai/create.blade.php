@extends('template.layouts')

@section('title', 'Tambah Pegawai')

@section('konten')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Pegawai</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('pegawai.store') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- NIP -->
                    <div class="col-md-6 mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" name="nip" id="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}" required>
                        @error('nip')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nama -->
                    <div class="col-md-6 mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="col-md-12 mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Telepon -->
                    <div class="col-md-6 mb-3">
                        <label for="telp" class="form-label">Nomor Telepon</label>
                        <input type="text" name="telp" id="telp" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp') }}" required>
                        @error('telp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="col-md-6 mb-3">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-select @error('jk') is-invalid @enderror" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L" {{ old('jk') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jk') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Username -->
                    <div class="col-md-6 mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Jabatan -->
                    <div class="col-md-4 mb-3">
                        <label for="jabatan_id" class="form-label">Jabatan</label>
                        <select name="jabatan_id" id="jabatan_id" class="form-select @error('jabatan_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Jabatan --</option>
                            @foreach ($jabatans as $jabatan)
                                <option value="{{ $jabatan->id }}" {{ old('jabatan_id') == $jabatan->id ? 'selected' : '' }}>
                                    {{ $jabatan->nama_jabatan }}
                                </option>
                            @endforeach
                        </select>
                        @error('jabatan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Unit Kerja -->
                    <div class="col-md-4 mb-3">
                        <label for="unitkerja_id" class="form-label">Unit Kerja</label>
                        <select name="unitkerja_id" id="unitkerja_id" class="form-select @error('unitkerja_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Unit Kerja --</option>
                            @foreach ($unitkerjas as $unit)
                                <option value="{{ $unit->id }}" {{ old('unitkerja_id') == $unit->id ? 'selected' : '' }}>
                                    {{ $unit->nama_unit }}
                                </option>
                            @endforeach
                        </select>
                        @error('unitkerja_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('pegawai.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
