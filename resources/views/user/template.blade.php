<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card - Mazer Admin Dashboard</title>
    
    <!-- title icon -->
    <!-- <link rel="shortcut icon" href="/assets/compiled/svg/favicon.svg" type="image/x-icon"> -->
    <link rel="shortcut icon" href="data:image/png;" type="image/png">
    <link rel="stylesheet" href="assets/extensions/@fortawesome/fontawesome-free/css/all.min.css">
    
    <link rel="stylesheet" href="/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="/assets/compiled/css/iconly.css">

    <link rel="stylesheet" href="/assets/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="/assets/sweetalert2/animate.min.css">
  <style>
    .swal2-popup {
        font-size: 1rem !important;
    }
    .profile-center {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    }
    .profile-center-2 {
        display: flex;
        padding-left: 18px;
        justify-content: center;
        align-items: center;
        width: 100%; 
        height: 100%;
    }
    .avatar .profile-img{
        width: 110px;
        height: 110px;
        border: 2px #B9B9B9;
    }
    .input-bottom {
        border-top: 0;
        border-left: 0;
        border-right: 0;
    }
    .w-dropdown {
        width: 500px;
    }
    .message-dropown {
        font-size: 15px;
        line-height: 16px;
    }
    .date-dropdown {
        font-size: 11px;
    }

@media (min-width: 1201px) {
    .profile-center {
        margin-left: 18px;
    }
}
  </style>
  @stack('style')
</head>

<body>
    <script src="/assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-menu">
                    <ul class="menu">
                        <div class="clearfix mb-3">
                            <div class="float-start d-xl-none">
                                <i class="bi bi-chevron-left"></i>
                            </div>
                            <div class="profile-center">
                                profile
                            </div>
                        </div>
                        <form action="/update-profile/{{ Auth::user()->email }}" method="POST" id="userForm" name="userForm" class="form form-vertical" >
                            @method('PUT')
                            @csrf
                            <div class="avatar me-3 profile-center-2 mb-1">
                                <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="" srcset="" class="profile-img">
                            </div>
                            <div class="profile-center-2">
                                <p class="fs-5">{{ Auth::user()->nama }}</p>
                            </div>
                            <div class="profile-center-2">
                                <p class="text-muted" style="margin-top: -25px; font-size: 13px;">
                                    {{ Auth::user()->role == '1' ? 'Manajemen User' : 'User' }}
                                </p>
                            </div>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-right">
                                            <label for="email" class="text-gray-500 fs-6">Email</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control input-bottom"
                                                    value="{{ Auth::user()->email }}" id="email" name="email">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-pen"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <div class="form-group has-icon-right">
                                            <label for="password" class="text-gray-500 fs-6">Password</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control input-bottom" value="{{ Auth::user()->password }}"
                                                    id="password" name="password">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-pen"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-right">
                                            <label for="alamat" class="text-gray-500 fs-6">Alamat</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control input-bottom" value="{{ Auth::user()->alamat }}"
                                                    id="alamat" name="alamat">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-pen"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-right">
                                            <label for="no" class="text-gray-500 fs-6">Nomor HP (WA)</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control input-bottom" value="{{ Auth::user()->no }}"
                                                    id="no" name="no">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-pen"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-right">
                                            <label for="instagram" class="text-gray-500 fs-6">Instagram</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control input-bottom" value="{{ Auth::user()->instagram }}"
                                                    id="instagram" name="instagram" onchange="javascript:this.form.submit();">
                                                <div class="form-control-icon">
                                                    <label for="instagram">
                                                        <i class="bi bi-pen"></i>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                @stack('header')
            </header>
            
            <div class="page-heading">
                @yield('content')
            </div>

            @stack('footer')
        </div>
    </div>
    <script src="/assets/js/ajax_jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/assets/static/js/components/dark.js"></script>
    <script src="/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/compiled/js/app.js"></script>
    <script src="/assets/sweetalert2/sweetalert2.min.js"></script>
    @stack('script')
    <script>
    // $(document).ready(function() {
    //     $('.input-bottom').on('change', function () {

    //         var frm = document.getElementById("userForm");

    //     frm.submit();
    //     });
    // });
    // function formAutoSubmit () {

    //     var frm = document.getElementById("userForm");

    //     frm.submit();
    
    // }

    </script>
    
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
    @if (session()->has('gagal'))
        <script>
            let message = '{{ session('gagal') }}';
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: message,
            })
        </script>
    @endif
    @if (session()->has('relasi'))
        <script>
            let message = '{{ session('relasi') }}';
            Swal.fire({
                icon: 'info',
                title: 'Informasi!',
                text: message,
            })
        </script>
    @endif

    <script>
        $(function() {
            $(document).on('click', '#btn-delete', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                var action = form.attr('action');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        $(function() {
            $(document).on('click', '#logout', function(e) {
                e.preventDefault();
                var logoutUrl = $(this).attr('href');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan keluar dari akun.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, keluar!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = logoutUrl;
                    }
                });
            });
        });
    </script>
    
</body>

</html>