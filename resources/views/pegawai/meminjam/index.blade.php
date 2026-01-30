@extends('template_pegawai.layouts')

@section('konten')

<style>
    .table td, .table th {
        color: #000 !important;
        vertical-align: middle;
    }
</style>

<div class="container py-5">

    <!-- HEADER -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="bg-primary text-white text-center py-3">
            <h4 class="fw-bold mb-0">Peminjaman Aset</h4>
        </div>
    </div>

    <!-- ERROR -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- SUCCESS ALERT -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    <!-- FORM PEMINJAMAN -->
    <div class="card shadow-sm border-0 mb-5">
        <div class="card-body bg-light">
            <form action="{{ route('meminjam.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Aset -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Aset</label>
                        <select name="aset_id" class="form-control" required>
                            <option value="">Pilih Aset</option>
                            @foreach($asets as $aset)
                                <option value="{{ $aset->id }}">{{ $aset->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pegawai -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Pegawai</label>
                        <input type="hidden" name="pegawai_id" value="{{ auth()->user()->pegawai->id }}">
                        <input type="text" class="form-control" value="{{ auth()->user()->pegawai->nama }}" readonly>
                    </div>

                    <!-- Tanggal Pinjam -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" required>
                    </div>

                    <!-- Batas Kembali -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Batas Kembali</label>
                        <input type="date" name="batas_kembali" id="batas_kembali" class="form-control" readonly>
                    </div>

                    <!-- Keterangan -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" placeholder="Keperluan peminjaman" required>
                    </div>

                    <!-- Foto -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Foto</label>
                        <input type="file" name="foto" id="fotoInput" class="form-control" required>
                        <img id="fotoPreview" src="#" alt="Preview Foto" width="50" style="display:none; margin-top:10px;">
                    </div>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-save me-1"></i> Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- TABEL PEMINJAMAN -->
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Aset</th>
                        <th>Tanggal Pinjam</th>
                        <th>Batas Kembali</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peminjams as $index => $m)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $m->aset->nama ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($m->tanggal_pinjam)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($m->batas_kembali)->format('d M Y') }}</td>
                            <td>{{ $m->keterangan }}</td>
                            <td>
                                @if($m->status == 'menunggu')
                                    <span class="btn bg-warning text-white">Menunggu</span>
                                @elseif($m->status == 'disetujui')
                                    <span class="btn bg-success text-white">Disetujui</span>
                                @elseif($m->status == 'dikembalikan')
                                    <span class="btn bg-secondary text-white">Dikembalikan</span>
                                @else
                                    <span class="btn bg-danger text-white">Ditolak</span>
                                @endif
                            </td>
                            <td>
                                @if(!empty($m->foto))
                                    <img src="{{ asset($m->foto) }}" alt="Foto" width="50">
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if($m->status === 'disetujui' && !$m->tanggal_kembali)
                                    <form action="{{ route('pengembalian.store', $m->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary"
                                            onclick="return confirm('Yakin ingin mengembalikan aset ini?')">
                                            Kembalikan
                                        </button>
                                    </form>
                                @elseif($m->tanggal_kembali)
                                    <span class="btn btn-secondary">Sudah Dikembalikan</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-muted">Belum ada data peminjaman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Set Batas Kembali otomatis + Preview Foto
    const tanggalPinjam = document.getElementById('tanggal_pinjam');
    const batasKembali = document.getElementById('batas_kembali');
    const fotoInput = document.getElementById('fotoInput');
    const fotoPreview = document.getElementById('fotoPreview');

    tanggalPinjam.addEventListener('change', function () {
        if (!this.value) {
            batasKembali.value = '';
            return;
        }
        let date = new Date(this.value);
        date.setDate(date.getDate() + 5);
        let yyyy = date.getFullYear();
        let mm   = String(date.getMonth() + 1).padStart(2, '0');
        let dd   = String(date.getDate()).padStart(2, '0');
        batasKembali.value = `${yyyy}-${mm}-${dd}`;
    });

    fotoInput.addEventListener('change', function(){
        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = function(e){
                fotoPreview.src = e.target.result;
                fotoPreview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            fotoPreview.style.display = 'none';
        }
    });
</script>

@endsection
