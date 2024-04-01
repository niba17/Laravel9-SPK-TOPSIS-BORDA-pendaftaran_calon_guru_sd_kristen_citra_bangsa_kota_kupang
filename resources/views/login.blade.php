<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('template') }}/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('template') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('template') }}/dist/css/adminlte.min.css?v=3.2.0">

    <!-- SweetAlert2 -->
    <script src="{{ asset('/plugin') }}/sweetAlert2/sweetalert2.all.min.js"></script>

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Form Login</b>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Masukkan Username & Password</p>
                <form action="/login" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                            id="username" name="username" value="{{ old('username') }}" placeholder="Username ...">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Password ...">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="btn btn-block btn-primary">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </form>

                <p class="mt-2 mb-1">
                    <a href="#" onclick="l_password()">Lupa password?</a>
                </p>
                <p class="mb-1">
                    <a href="/">Kembali</a>
                </p>
            </div>
        </div>


        <script src="{{ asset('template') }}/plugins/jquery/jquery.min.js"></script>

        <script src="{{ asset('template') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="{{ asset('template') }}/dist/js/adminlte.min.js?v=3.2.0"></script>

        <script>
            @if (Session::has('succMessage'))
                Swal.fire({
                    icon: 'success',
                    title: '{{ Session::get('succMessage') }}',
                    timer: 3000
                })
            @elseif (Session::has('errMessage'))
                Swal.fire({
                    icon: 'error',
                    title: '{{ Session::get('errMessage') }}'
                    // timer: 3000
                })
            @endif

            function l_password() {
                Swal.fire({
                    icon: 'warning',
                    title: '<h1><b>Lupa Password?</b></h1><br><div class="alert alert-warning"><h3><b>Hubungi pihak developer untuk pemulihan password!</b></h3><h4>Whatsapp : +6212345678912<br>Email : example@gmail.com</h4></div>'
                });
            }
        </script>
</body>

</html>
