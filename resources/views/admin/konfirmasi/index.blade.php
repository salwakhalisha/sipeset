@extends('template.layouts')

@section('konten')
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white text-center fw-bold fs-4">
            Konfirmasi Peminjaman Aset
        </div>
        <div class="card-body p-4">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary text-white text-center">
                        <tr>
                            <th>No</th>
                            <th class="text-start">Aset</th>
                            <th class="text-start">Pegawai</th>
                            <th>Tanggal Pinjam</th>
                            <th class="text-start">Keterangan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($meminjams as $m)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-start">{{ $m->aset->nama }}</td>
                            <td class="text-start">{{ $m->pegawai->nama }}</td>
                            <td class="text-center">
                                {{ $m->tanggal_pinjam ? \Carbon\Carbon::parse($m->tanggal_pinjam)->format('d-m-Y') : '-' }}
                            </td>
                            <td class="text-start">{{ $m->keterangan ?? '-' }}</td>
                            <td class="text-center">
                                @if($m->status == 'menunggu')
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif($m->status == 'disetujui')
                                    <span class="badge bg-success">Disetujui</span>
                                @elseif($m->status == 'dikembalikan')
                                    <span class="badge bg-secondary">Dikembalikan</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                            <td class="d-flex justify-content-center gap-1">
                                @if($m->status == 'menunggu')
                                    <form action="{{ route('admin.konfirmasi.update', $m->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="disetujui">
                                        <button class="btn btn-success btn-sm">Setujui</button>
                                    </form>
                                    <form action="{{ route('admin.konfirmasi.update', $m->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="ditolak">
                                        <button class="btn btn-danger btn-sm">Tolak</button>
                                    </form>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Belum ada data peminjaman</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Daftar Aset yang Sudah Dikembalikan</h5>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Aset</th>
                        <th>Nama Pegawai</th>
                        <th>Tanggal Pinjam</th>
                        <th>Batas Kembali</th>
                        <th>Tanggal Kembali</th>
                        <th>Hari Telat</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($pengembalians as $index => $p)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $p->aset->nama ?? '-' }}</td>
                            <td>{{ $p->pegawai->nama ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($p->batas_kembali)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($p->tanggal_kembali)->format('d M Y') }}</td>
                            <td>
                                @if($p->hari_telat > 0)
                                    <span class="badge bg-danger">
                                        {{ $p->hari_telat }} hari
                                    </span>
                                @else
                                    <span class="badge bg-success">
                                        Tepat Waktu
                                    </span>
                                @endif
                            </td>
                            <td>{{ $p->keterangan ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-muted">
                                Belum ada data pengembalian.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .table td, .table th {
        vertical-align: middle;
        color: #000;
    }
    .table-hover tbody tr:hover {
        background-color: #f1f8ff;
    }
    .badge {
        font-size: 0.85rem;
        padding: 0.4em 0.6em;
    }
    .btn-sm {
        padding: 0.25rem 0.5rem;
    }
    .table th {
        text-align: center;
    }
</style>
@endsection
