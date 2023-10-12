
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | {{ $title ?? 'SINFOJA' }}</title>
    <link rel="shortcut icon" href="data:image/png;" type="image/png">
    <link rel="stylesheet" href="assets/extensions/@fortawesome/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="/assets/compiled/css/iconly.css">

    <link rel="stylesheet" href="/assets/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="/assets/sweetalert2/animate.min.css">

<style>
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
    font-family: "Gabriela", sans-serif;
}
body {
    font-family: "poppins", sans-serif;
}
.sidebar-menu .menu .sidebar-title {
    font-weight: 390;
}
.sidebar-menu .menu {
    font-weight: 390;
}
.sidebar-menu .menu .sidebar-item .submenu .submenu-item .submenu-link {
    font-weight: 390;
}
.swal2-popup {
    font-size: 1rem !important;
}
</style>

@stack('style')

</head>
<body>
<script src="/assets/static/js/initTheme.js"></script>
<div id="app">
    <div id="sidebar">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header position-relative">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="sinfoja">
                        <small>SINFOJA</small>
                    </div>
                    <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                            role="img" class="iconify iconify--system-uicons" width="20" height="20"
                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                            <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                    opacity=".3"></path>
                                <g transform="translate(-210 -1)">
                                    <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                    <circle cx="220.5" cy="11.5" r="4"></circle>
                                    <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                </g>
                            </g>
                        </svg>
                        <div class="form-check form-switch fs-6">
                            <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                            <label class="form-check-label"></label>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                            role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                            </path>
                        </svg>
                    </div>
                    <div class="sidebar-toggler  x">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>

                    <li class="sidebar-item {{ Request()->segment(1) == 'dashboard-admin' ? 'active' : '' }}">
                        <a href="/dashboard-admin" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-item  has-sub {{ Request()->segment(1) == 'kelompok-tanaman' || Request()->segment(1) == 'data-kawasan' || Request()->segment(1) == 'status-kawasan' || Request()->segment(1) == 'data-pengelola' || Request()->segment(1) == 'data-jenis' || Request()->segment(1) == 'data-pohon' ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                            <span>Master Data</span>
                        </a>
                        <ul class="submenu {{ Request()->segment(1) == 'kelompok-tanaman' || Request()->segment(1) == 'data-kawasan' || Request()->segment(1) == 'status-kawasan' || Request()->segment(1) == 'data-pengelola' || Request()->segment(1) == 'data-jenis' || Request()->segment(1) == 'data-pohon' ? 'active submenu-open' : '' }}">
                            <li class="submenu-item {{ Request()->segment(1) == 'kelompok-tanaman' ? 'active' : '' }}">
                                <a href="/kelompok-tanaman" class="submenu-link">Kelompok Tanaman</a>
                            </li>
                            <li class="submenu-item {{ Request()->segment(1) == 'data-kawasan' ? 'active' : '' }}">
                                <a href="/data-kawasan" class="submenu-link">Kawasan</a>
                            </li>
                            <li class="submenu-item {{ Request()->segment(1) == 'status-kawasan' ? 'active' : '' }}">
                                <a href="/status-kawasan" class="submenu-link">Status Kawasan</a>
                            </li>
                            <li class="submenu-item {{ Request()->segment(1) == 'data-pengelola' ? 'active' : '' }}">
                                <a href="/data-pengelola" class="submenu-link">Pengelola</a>
                            </li>
                            <li class="submenu-item {{ Request()->segment(1) == 'data-jenis' ? 'active' : '' }}">
                                <a href="/data-jenis" class="submenu-link">Jenis Pohon</a>
                            </li>
                            <li class="submenu-item {{ Request()->segment(1) == 'data-pohon' ? 'active' : '' }}">
                                <a href="/data-pohon" class="submenu-link">Data Pohon</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li
                        class="sidebar-item  has-sub {{ Request()->segment(1) == 'admin' || Request()->segment(1) == 'user' ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="iconly-boldProfile"></i>
                            <span>Pengguna</span>
                        </a>
                        <ul class="submenu {{ Request()->segment(1) == 'admin' || Request()->segment(1) == 'user' ? 'active submenu-open' : '' }}">
                            <li class="submenu-item {{ Request()->segment(1) == 'admin' ? 'active' : '' }}">
                                <a href="/admin" class="submenu-link">Admin</a>
                            </li>
                            <li class="submenu-item {{ Request()->segment(1) == 'user' ? 'active' : '' }}">
                                <a href="/user" class="submenu-link">User</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item {{ Request()->segment(1) == 'jadwal-kegiatan' ? 'active' : '' }}">
                        <a href="/jadwal-kegiatan" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Jadwal Kegiatan</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request()->segment(1) == 'profile-admin' ? 'active' : '' }}">
                        <a href="/profile-admin" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Profile</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request()->segment(1) == 'logout' ? 'active' : '' }}">
                        <a href="/logout" class='sidebar-link' id="logout">
                            <i class="bi bi-grid-fill"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
            
        @yield('content')

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-end">
                    <p>Created with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                        by <a href="#">Greennusa</a></p>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="/assets/js/ajax_jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/assets/static/js/components/dark.js"></script>
<script src="/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/compiled/js/app.js"></script>
<!-- Need: Apexcharts -->
<script src="/assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="/assets/static/js/pages/dashboard.js"></script>
<script src="/assets/sweetalert2/sweetalert2.min.js"></script>

@stack('script')

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