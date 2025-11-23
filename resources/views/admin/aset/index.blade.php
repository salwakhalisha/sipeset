@extends ('template.layouts')
@section ('title', 'Data Aset')
@section ('konten')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Aset</h4>
            <a href="{{ route('aset.create') }}" class="btn btn-danger btn-icon-text mb-3">
                <i class="mdi mdi-upload btn-icon-prepend"></i> Upload
            </a>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            <form action="{{ route('aset.filter') }}" method="GET" class="row g-3 mb-3">
                <div class="col-md-3">
                    <select name="kategori_id" class="form-control">
                        <option value=""> Pilih Kategori </option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ request('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <select name="status" class="form-control">
                        <option value=""> Pilih Status </option>
                        <option value="tersedia" {{ request('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <select name="kondisi" class="form-control">
                        <option value=""> Pilih Kondisi </option>
                        <option value="baik" {{ request('kondisi') == 'baik' ? 'selected' : '' }}>Baik</option>
                        <option value="rusak" {{ request('kondisi') == 'rusak' ? 'selected' : '' }}>Rusak</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <input type="text" name="lokasi" class="form-control" placeholder="Lokasi" value="{{ request('lokasi') }}">
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </form>


            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Lokasi</th>
                            <th>Kondisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asets as $at)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $at->nama }}</td>
                                <td>{{ $at->kategori ? $at->kategori->nama : 'Kategori tidak ditemukan' }}</td>
                                <td>{{ $at->status }}</td>
                                <td>{{ $at->lokasi }}</td>
                                <td>{{ $at->kondisi }}</td>
                                <td>
                                    <a href="{{ route('aset.edit', $at->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('aset.delete', $at->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="mt-3">
                <a href="{{ route('aset.export.excel', request()->query()) }}" class="btn btn-success btn-icon-text me-2">
                    <i class="mdi mdi-file-excel btn-icon-prepend"></i> Rekap Excel
                </a>
                <a href="{{ route('aset.export.pdf', request()->query()) }}" class="btn btn-primary btn-icon-text">
                    <i class="mdi mdi-file-pdf btn-icon-prepend"></i> Rekap PDF
                </a>
            </div>

        </div>
    </div>
</div>

@endsection
