<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SINFOJA - {{ $title ?? "Login" }}</title>
    <!-- untuk title icon -->
    <!-- <link rel="shortcut icon" href="/assets/compiled/svg/favicon.svg" type="image/x-icon"> -->
    <link rel="shortcut icon" href="data:image/png;" type="image/png">
    <link rel="stylesheet" href="/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="/assets/compiled/css/auth.css">

    <link rel="stylesheet" href="/assets/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="/assets/sweetalert2/animate.min.css">

    <style>
        .swal2-popup {
            font-size: 1rem !important;
        }
        .login {
            background: #ededed;
            position: relative;
            overflow: hidden;
        }

        .union {
            position: absolute;
            left: -2px;
            top: 192.74px;
            overflow: visible;
        }
        .sinfoja {
            background: -webkit-linear-gradient(rgb(16, 217, 109, 1), rgb(5, 93, 45, 1));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            color: linear-gradient(
                    180deg,
                    rgba(16, 217, 109, 1) 0%,
                    rgba(5, 93, 45, 1) 100%
                );
            position: relative;
            font-size: 55px;
            font-family: "Gabriela", sans-serif;
        }
        .penghijauan {
            position: relative;
        }
        .btn:hover {
            background: #040a07;
        }
        .daftar {
            color: #055e2f;
        }
        @media (max-width: 560px) {
            body {
                background: black;
            }
            #auth {
                background: #d9d9d9;
            }
            img {
                border: 2px solid transparent;
                border-image: linear-gradient(transparent, transparent), linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
                border-image-slice: 1;
            }
        }

        @media (min-width: 561px) and (max-width: 996px) {
            body {
                background: black;
            }
            #auth {
                background: #fff;
            }
            .container {
                max-width: max-content;
            }
            img {
                border: 2px solid transparent;
                border-image: linear-gradient(transparent, transparent), linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
                border-image-slice: 1;
            }
        }

        @media (min-width: 997px) and (max-width: 1024px) {
            .container {
                height: 100%;
            }
            #auth {
                background: #ffffff;
            }
            img {
                border: 2px solid transparent;
                border-image: linear-gradient(transparent, transparent), linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
                border-image-slice: 1;
            }
        }

        @media (min-width: 1025px) {
            .container {
                height: 100%;
            }
            #auth {
                background: #ffffff;
            }
        }

    </style>
</head>
<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="auth">
        <div class="container">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-lg-4 col-12 p-0">
                    <div id="" class="card" style="background: #d9d9d9;" >
                        <div class="login" style="margin-bottom: -90px;">
                            <img src="/assets/image/login.png" alt="Logo">
                            <svg class="union" viewBox="0 0 362 448" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                <g filter="url(#filter0_d_1_10)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0 3.49998C9.33333 -0.500023 39.6 -3.20002 86 18C143.547 44.2932 171.561 32.6849 206.182 18.339L207 18C242 3.49998 296.5 -3.00003 314 18C328 34.8 351.833 34.6666 362 32.5V34V86.5V448H2V86.5H0V3.49998Z"
                                        fill="#D9D9D9" />
                                </g>
                            </svg>
                        </div>
                        <h1 class="auth-title text-center sinfoja" style="margin-bottom: -8px;">SINFOJA</h1>
                        <p class="penghijauan auth-subtitle text-center mb-5 fs-6 fst-italic" style="color: #055e2f;">Sistem Informasi Penghijauan</p>
                        <div class="row h-100 justify-content-center align-items-center">
                            <form action="/login" method="POST" style="margin-top: -20px;" class="col-8">
                                @csrf
                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="text" class="form-control form-control-md rounded-pill @error('email')
                                        is-invalid
                                    @enderror" placeholder="Email" name="email" id="email">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    @error('email')
                                        <small class="text-danger pl-3">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="password" class="form-control form-control-md rounded-pill @error('password')
                                    is-invalid
                                    @enderror" placeholder="password" name="password" id="password">
                                    <div class="form-control-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                    @error('password')
                                        <small class="text-danger pl-3">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="clearfix mb-3" style="font-size: 13px;">
                                    <div class="form-check form-check-xs d-flex align-items-end float-start text-muted">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                            Remember me
                                        </label>
                                    </div>
                                    <div class="float-end" style="margin-top: 4px;">
                                        <span><a href="" class="text-black text-gray-600">forgot password?</a></span>
                                    </div>
                                </div>
                                <button class="btn btn-block rounded-pill text-white" style="background: #17a659;">Log in</button>
                            </form>
                            <div class="text-center mt-2">
                                <p class="" style="color: #17a659;">Silahkan login menggunakan akun anda</p>
                                <p style="color: #17a659; margin-top: -18px;">Belum memilik akun?, klik <a class="font-bold fst-italic daftar" href="auth-forgot-password.html">Daftar</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/sweetalert2/sweetalert2.min.js"></script>
    @if (session()->has('gagalLogin'))
            <script>
                let message = '{{ session('gagalLogin') }}';
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: message,
                })
            </script>
        @endif
        @if (session()->has('success'))
            <script>
                let message = '{{ session('success') }}';
                Swal.fire({
                    icon: 'success',
                    title: 'Succes!',
                    text: message,
                })
            </script>
        @endif

</body>
</html>
