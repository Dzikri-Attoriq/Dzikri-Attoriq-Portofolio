
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>SINFOJA | {{ $title ?? "DLH" }}</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">

      
        <!-- Theme Styles -->
        <link href="/assets/css/connect.min.css" rel="stylesheet">
        <link href="/assets/css/dark_theme.css" rel="stylesheet">
        <link href="/assets/css/custom.css" rel="stylesheet">

        <link rel="stylesheet" href="/assets/sweetalert2/sweetalert2.min.css">

        <link href="/my/tom-select.css" rel="stylesheet">

        <style>
            .swal2-popup {
                font-size: 1rem !important;
            }
        </style>
    </head>
    <body>
        {{-- <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div> --}}
        <div class="connect-container align-content-stretch d-flex flex-wrap">
            <div class="page-sidebar">
                <div class="logo-box"><a href="#" class="logo-text">SINFOJA</a><a href="#" id="sidebar-close"><i class="material-icons">close</i></a> <a href="#" id="sidebar-state"><i class="material-icons">adjust</i><i class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a></div>
                <div class="page-sidebar-inner slimscroll">
                    <ul class="accordion-menu">
                        <li class="sidebar-title">
                            Main Data
                        </li>
                        <li class="{{ Request()->segment(1) == '' ? 'active-page' : '' }}">
                            <a href="/" class="active"><i class="material-icons-outlined">dashboard</i>Dashboard</a>
                        </li>
                        <li class="{{ Request()->segment(1) == 'kelompok-tanaman' || Request()->segment(1) == 'data-jenis' || Request()->segment(1) == 'data-kawasan' || Request()->segment(1) == 'status-kawasan' || Request()->segment(1) == 'data-pengelola' || Request()->segment(1) == 'data-pohon' ? 'open' : '' }}">
                            <a href="#"><i class="material-icons">text_format</i>Master Data<i class="material-icons has-sub-menu">add</i></a>
                            <ul class="sub-menu">
                                <li class="{{ Request()->segment(1) == 'kelompok-tanaman' ? 'active-page' : '' }}">
                                    <a href="/kelompok-tanaman">Kelompok Tananaman</a>
                                </li>
                                <li class="{{ Request()->segment(1) == 'data-jenis' ? 'active-page' : '' }}">
                                    <a href="/data-jenis">Data Jenis Pohon</a>
                                </li>
                                <li class="{{ Request()->segment(1) == 'data-kawasan' ? 'active-page' : '' }}">
                                    <a href="/data-kawasan">Data Kawasan</a>
                                </li>
                                <li class="{{ Request()->segment(1) == 'status-kawasan' ? 'active-page' : '' }}">
                                    <a href="/status-kawasan">Status Kawasan</a>
                                </li>
                                <li class="{{ Request()->segment(1) == 'data-pengelola' ? 'active-page' : '' }}">
                                    <a href="/data-pengelola">Data Pengelola</a>
                                </li>
                                <li class="{{ Request()->segment(1) == 'data-pohon' ? 'active-page' : '' }}">
                                    <a href="/data-pohon">Data Pohon</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-title">
                            settings
                        </li>
                        <li class="{{ Request()->segment(1) == 'user' ? 'active-page' : '' }}">
                            <a href="/user"><i class="material-icons">input</i>User</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="page-container">
                <div class="page-header">
                    <nav class="navbar navbar-expand">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <ul class="navbar-nav">
                            <li class="nav-item small-screens-sidebar-link">
                                <a href="#" class="nav-link"><i class="material-icons-outlined">menu</i></a>
                            </li>
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="profile image">
                                    <span>{{ Auth::user()->nama }}</span><i class="material-icons dropdown-icon">keyboard_arrow_down</i>
                                </a>
                                {{-- {{ dd(Auth::user()) }} --}}
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Calendar<span class="badge badge-pill badge-info float-right">2</span></a>
                                    <a class="dropdown-item" href="#">Settings &amp Privacy</a>
                                    <a class="dropdown-item" href="#">Switch Account</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/logout" id="logout">Log out</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><i class="material-icons-outlined">mail</i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><i class="material-icons-outlined">notifications</i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="dark-theme-toggle"><i class="material-icons-outlined">brightness_2</i><i class="material-icons">brightness_2</i></a>
                            </li>
                        </ul>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Projects</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Tasks</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Reports</a>
                                </li>
                            </ul>
                        </div>
                        <div class="navbar-search">
                            <form>
                                <div class="form-group">
                                    <input type="text" name="search" id="nav-search" placeholder="Search...">
                                </div>
                            </form>
                        </div>
                    </nav>
                </div>
                <div class="page-content">
                    @yield("content")
                </div>
                
                <div class="page-footer text-center">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="footer-text">{{ date("Y") }} Created With ❤️</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Javascripts -->
        <script src="/assets/plugins/jquery/jquery-3.4.1.min.js"></script>
        <script src="/assets/plugins/bootstrap/popper.min.js"></script>
        <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="/assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
        <script src="/assets/plugins/blockui/jquery.blockUI.js"></script>
        <script src="/assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="/assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="/assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="/assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="/assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="/assets/js/connect.min.js"></script>
        <script src="/assets/js/pages/dashboard.js"></script>
        <script src="/assets/sweetalert2/sweetalert2.min.js"></script>

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

            // new TomSelect(".tom-select", {
            //     create: false,
            //     sortField: {
            //         // field: "text",
            //         direction: "asc"
            //     }
            // });

            // $('.custom-file-input').on('change', function() {
            //     let fileName = $(this).val().split('\\').pop();
            //     $(this).next('.custom-file-label').addClass("Selected").html(fileName);
            // });
        </script>
    </body>
</html>