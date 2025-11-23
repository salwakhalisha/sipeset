@extends('template_pegawai.layouts')

@section('konten')
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="card-body p-5 bg-light">

            <div class="text-center mb-4">
                <h3 class="fw-bold text-primary">Ubah Password</h3>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('pegawai.update_password', $pegawai->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Password Lama (readonly) -->
                <div class="mb-3 position-relative">
                    <label class="form-label">Password Lama</label>
                    <input type="password" id="passwordLama" class="form-control" 
                           value="{{ $passwordLama }}" readonly>
                    <button type="button" class="btn btn-sm btn-outline-secondary position-absolute top-50 end-0 translate-middle-y me-2" 
                            onclick="togglePassword('passwordLama', this)">
                        👁️
                    </button>
                </div>

                <!-- Password Baru -->
                <div class="mb-3">
                    <label class="form-label">Password Baru</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>

                <!-- Konfirmasi Password Baru -->
                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="new_password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
            </form>

        </div>
    </div>
</div>

<!-- Script toggle show/hide -->
<script>
function togglePassword(inputId, btn) {
    const input = document.getElementById(inputId);
    if (input.type === "password") {
        input.type = "text";
        btn.textContent = "🙈"; // ikon berubah
    } else {
        input.type = "password";
        btn.textContent = "👁️";
    }
}
</script>
@endsection
