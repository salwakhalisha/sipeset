@extends('template_pegawai.layouts')

@section('konten')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm rounded-4">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4 class="mb-0">Ubah Password</h4>
                </div>
                <div class="card-body p-4">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('pegawai.update_password') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Password Lama (placeholder) -->
                        <div class="mb-3">
                            <label for="passwordLama" class="form-label">Password Lama</label>
                            <input type="password" id="passwordLama" class="form-control" 
                                   placeholder="Password lama tidak ditampilkan" readonly>
                        </div>

                        <!-- Password Baru -->
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Password Baru</label>
                            <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Masukkan password baru" required>
                        </div>

                        <!-- Konfirmasi Password Baru -->
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" placeholder="Konfirmasi password baru" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
