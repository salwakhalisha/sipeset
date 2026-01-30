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
@endsection
