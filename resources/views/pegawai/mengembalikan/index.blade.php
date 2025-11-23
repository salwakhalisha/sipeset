@extends('template_pegawai.layouts')

@section('konten')
<div class="container mt-4">
    <h2 class="fw-bold mb-4"><i class="bi bi-arrow-return-left"></i> Data Pengembalian</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



  <div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-white border-bottom-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-semibold text-primary">
            <i class="bi bi-plus-circle me-2"></i> Tambah Data Pengembalian
        </h5>
    </div>

    <div class="card-body pt-2">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Terjadi kesalahan!</strong>
                <ul class="mb-0 mt-2 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{ route('mengembalikan.store') }}" method="POST" class="row gy-3 align-items-end">
            @csrf

            <div class="col-md-3">
                <label class="form-label fw-semibold mb-1">Barang</label>
                <div class="input-group">
                    <select name="meminjam_id" class="form-control" required>
                        <option value=""> Pilih Barang </option>
                        @foreach($meminjams as $meminjam)
                            <option value="{{ $meminjam->id }}" {{ old('meminjam_id') == $meminjam->id ? 'selected' : '' }}>
                                {{ $meminjam->aset->nama ?? '-' }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <label class="form-label fw-semibold mb-1">Tanggal Pengembalian</label>
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
            </div>

            <div class="col-md-2">
                <label class="form-label fw-semibold mb-1">Kondisi Barang</label>
                <select name="kondisi" class="form-control" required>
                    <option value=""> Pilih </option>
                    <option value="baik" {{ old('kondisi') == 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="rusak ringan" {{ old('kondisi') == 'rusak ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="rusak berat" {{ old('kondisi') == 'rusak berat' ? 'selected' : '' }}>Rusak Berat</option>
                    <option value="hilang" {{ old('kondisi') == 'hilang' ? 'selected' : '' }}>Hilang</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label fw-semibold mb-1">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" placeholder="Opsional" value="{{ old('keterangan') }}">
            </div>

           <button type="submit" class="btn btn-primary me-2">Simpan</button>
        </form>
    </div>
</div>




    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h5 class="card-title mb-3"><i class="bi bi-table"></i> Daftar Pengembalian</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Peminjam</th>
                            <th>Tanggal</th>
                            <th>Kondisi</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mengembalikans as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->meminjam->pegawai->username ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d M Y') }}</td>
                                <td>
                                    <span class="badge 
                                        {{ $data->kondisi === 'baik' ? 'bg-success' : ($data->kondisi === 'rusak' ? 'bg-danger' : 'bg-secondary') }}">
                                        {{ ucfirst($data->kondisi) }}
                                    </span>
                                </td>
                                <td>{{ $data->keterangan ?? '-' }}</td>
                                <td>
                                    <form action="{{ route('mengembalikan.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-muted">Belum ada data pengembalian.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
