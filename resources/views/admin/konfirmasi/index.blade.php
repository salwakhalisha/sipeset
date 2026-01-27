@extends('template.layouts')

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
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-5">
            <h3 class="fw-bold mb-4 text-center text-primary">Konfirmasi Peminjaman Aset</h3>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            <table class="table table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Aset</th>
                        <th>Pegawai</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($meminjams as $m)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $m->aset->nama }}</td>
                        <td>{{ $m->pegawai->nama }}</td>
                        <td>{{ $m->tanggal }}</td>
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
                        <td>
                            <form action="{{ route('admin.konfirmasi.update', $m->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="disetujui">
                                <button class="btn btn-success btn-sm">Setujui</button>
                            </form>
                            <form action="{{ route('admin.konfirmasi.update', $m->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="ditolak">
                                <button class="btn btn-danger btn-sm">Tolak</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
