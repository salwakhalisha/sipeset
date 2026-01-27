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
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Peminjaman Aset</h3>
        <a href="{{ route('pegawai.meminjam.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Pinjam Aset
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Aset</th>
                        <th>Pegawai</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($meminjams as $index => $m)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $m->aset->nama ?? '-' }}</td>
                            <td>{{ $m->pegawai->nama ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($m->tanggal)->format('d M Y') }}</td>
                            <td>{{ $m->keterangan }}</td>
                            <td>
                                @if($m->status == 'menunggu')
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif($m->status == 'disetujui')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-muted">Belum ada data peminjaman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
