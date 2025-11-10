@extends('template_pegawai.layouts')

@section('konten')
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="card-body p-5 bg-light">

            <!-- Header -->
            <div class="text-center mb-5">
                <img src="{{ asset('images/default-avatar.png') }}" 
                     alt="Foto Profil" 
                     class="rounded-circle shadow-sm mb-3"
                     style="width: 120px; height: 120px; object-fit: cover;">
                <h3 class="fw-bold text-primary mb-1">{{ $pegawai->nama }}</h3>
                <p class="text-muted mb-0">{{ $pegawai->jabatan->nama ?? '-' }}</p>
                <small class="text-secondary">{{ $pegawai->unitkerja->nama ?? '-' }}</small>
            </div>

            <!-- Detail Profil -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="list-group list-group-flush">

                        <div class="list-group-item py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-semibold text-secondary">NIP</span>
                                <span class="text-dark">{{ $pegawai->nip }}</span>
                            </div>
                        </div>

                        <div class="list-group-item py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-semibold text-secondary">Alamat</span>
                                <span class="text-dark text-end">{{ $pegawai->alamat }}</span>
                            </div>
                        </div>

                        <div class="list-group-item py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-semibold text-secondary">Telepon</span>
                                <span class="text-dark">{{ $pegawai->telp }}</span>
                            </div>
                        </div>

                        <div class="list-group-item py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-semibold text-secondary">Jenis Kelamin</span>
                                <span class="text-dark">
                                    {{ $pegawai->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Tombol -->
            <div class="text-center mt-5">
                <a href="{{ route('dashboard.pegawai') }}" class="btn btn-primary px-4 rounded-pill shadow-sm">
                    <i class="bi bi-arrow-left-circle me-2"></i> Kembali ke Dashboard
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
