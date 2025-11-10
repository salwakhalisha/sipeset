@extends('template_pegawai.layouts')

@section('konten')
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient" 
             style="background: linear-gradient(135deg, #007bff 0%, #00c4cc 100%); color: white; padding: 2rem 1rem;">
            <h3 class="fw-bold text-center mb-0">Halaman Peminjaman</h3>
        </div>

        <div class="card-body p-5 bg-light">
            <form action="{{ route('pegawai.meminjam.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="form-label fw-semibold text-primary">Aset</label>
                    <select name="aset_id" class="form-control shadow-sm" required>
                        <option value=""> Pilih Aset </option>
                        @foreach($asets as $aset)
                            <option value="{{ $aset->id }}">{{ $aset->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-primary">Tanggal Peminjaman</label>
                    <input type="date" name="tanggal" class="form-control shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-primary">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control shadow-sm" placeholder="Keperluan peminjaman" required>
                </div>

                <!-- Info pengguna login -->
                <div class="alert alert-info d-flex align-items-center mt-4">
                    <i class="bi bi-person-circle fs-4 me-2"></i>
                    <div>
                        <strong>{{ Auth::user()->username }}</strong> 
                    </div>
                </div>

                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-gradient px-5 py-2 rounded-pill shadow-sm me-2">
                        <i class="bi bi-save me-1"></i> Simpan
                    </button>
                    <a href="{{ route('pegawai.meminjam.index') }}" class="btn btn-outline-secondary px-5 py-2 rounded-pill">
                        <i class="bi bi-x-circle me-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .btn-gradient {
        background: linear-gradient(135deg, #00c4cc, #007bff);
        border: none;
        color: white;
        transition: 0.3s;
    }
    .btn-gradient:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }
    .form-control:focus, .form-select:focus {
        border-color: #00c4cc;
        box-shadow: 0 0 0 0.2rem rgba(0, 196, 204, 0.25);
    }
    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
</style>
@endsection
