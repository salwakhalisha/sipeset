<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIPESET - Login</title>

    <!-- Fonts & Styles -->
    <link href="{{ asset('dist/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('dist/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        .login-card {
            max-width: 450px;
            margin: 5% auto;
        }
        .logo-login {
            width: 200px;
            height: auto;
            margin-bottom: 15px;
        }
        
    </style>
</head>

<body class="bg-gradient-primary">
    @if(Auth::check() && Auth::user()->role == 'admin')
        <script>window.location = "{{ route('dashboard.admin') }}";</script>
    @endif
 
     @if(Auth::check() && Auth::user()->role == 'pegawai')
        <script>window.location = "{{ route('dashboard.pegawai') }}";</script>
    @endif
    <div class="container">
        <div class="login-card card shadow-lg border-0">
            <div class="card-body">
                <div class="text-center mb-4">
                    <img src="{{ asset('dist/img/login-bg.png') }}" alt="SIPESET Logo" class="logo-login">
                </div>

                @if (session('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif


                <!-- Form Login -->
                <form method="POST" action="{{ route('login') }}" class="user">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="username" class="form-control form-control-user"
                            placeholder="Enter Username..." required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-user"
                            placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('dist/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/sb-admin-2.min.js') }}"></script>
</body>

</html>