@extends('template_pegawai.layouts')

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
<div class="container py-5">
    <div class="card shadow-sm border-0" style="border-radius:0;">
        <!-- Header -->
        <div class="bg-primary text-white text-center py-4" style="border-radius:0;">
            <h3 class="fw-bold mb-0">Halaman Peminjaman</h3>
        </div>

        <div class="card-body p-5 bg-light" style="border-radius:0;">
            <form action="{{ route('pegawai.meminjam.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="form-label fw-semibold">Aset</label>
                    <select name="aset_id" class="form-control" required>
                        <option value=""> Pilih Aset </option>
                        @foreach($asets as $aset)
                            <option value="{{ $aset->id }}">{{ $aset->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Tanggal Peminjaman</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" placeholder="Keperluan peminjaman" required>
                </div>

                <!-- Info pengguna login -->
                <div class="alert alert-secondary d-flex align-items-center mt-4">
                    <i class="bi bi-person-circle fs-4 me-2"></i>
                    <div>
                        <strong>{{ Auth::user()->username }}</strong> 
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-5 py-2 shadow-none" style="border-radius:0;">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                    <a href="{{ route('pegawai.meminjam.index') }}" class="btn btn-outline-secondary px-5 py-2 shadow-none" style="border-radius:0;">
                        <i class="fas fa-x-circle me-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
