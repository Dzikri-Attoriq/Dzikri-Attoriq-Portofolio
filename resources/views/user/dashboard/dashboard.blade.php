@extends('user/template')

@push('style')
<link rel="stylesheet" href="/assets/css/dashboard/content-1.css">
<link rel="stylesheet" href="/assets/css/dashboard/content-2.css">
<link rel="stylesheet" href="/assets/css/dashboard/footer.css">
@endpush

@section('content')

@push('header')
<div class="clearfix ">
    <div class="float-start media d-flex align-items-center">
        <!-- burger-btn d-block d-xl-none -->
        <div class="burger-btn d-block d-xl-none avatar me-3">
            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="" srcset="">
            <span class="avatar-status bg-success"></span>
        </div>
        <div class="burger-btn d-block d-xl-none name flex-grow-1">
            <h6 class="mb-0">{{ Auth::user()->nama }}</h6>
            <span class="text-xs">{{ Auth::user()->role == '1' ? 'Manajemen User' : 'User' }}</span>
        </div>
    </div>
    <div class="float-end">
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
            <div class="form-check form-switch fs-6" style="margin-right: -7px;">
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
            <div class="btn-group dropstart mb-1">
                <button type="button" class="btn border-0 "
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-bell"></i>
                </button>
                <div class="dropdown-menu email-user-list w-dropdown clearfix">
                    <ul class="users-list-wrapper media-list">
                        <li class="media mail-read">
                            <div class="float-start" style="margin-right: 10px">
                                <div class="avatar avatar-lg">
                                    <img src="../assets/compiled/jpg/1.jpg" alt="avtar img holder">
                                </div>
                            </div>
                            <div class="media-body ml-2">
                                <div class="mail-message">
                                    <p class="list-group-item-text truncate mb-0 message-dropown">Penambahan jadwal Penambahan jadwal Penambahan jadwal Penambahan jadwal  kegiatan oleh <b>John Doe</b></p>
                                    <div class="mail-meta-item">
                                        <span class="float-right">
                                            <span class="mail-date text-muted date-dropdown">28 Januari 2023 10:23 AM</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-2">
                                <div class="avatar avatar-lg">
                                    <img src="../assets/compiled/jpg/1.jpg" alt="avtar img holder">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title">Penambahan jadwal kegiatan oleh <b>John Doe</b></h5>
                                    <p class="card-text list-group-item-text truncate mb-0 message-dropown">
                                        Penambahan jadwal Penambahan jadwal Penambahan jadwal Penambahan jadwal  kegiatan oleh <b>John Doe</b>
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted date-dropdown">28 Januari 2023 10:23 AM</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
    </div>
</div>
@endpush

<section class="section-1">
    <div class="page-title" style="margin-bottom: -10px">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <p style="color: #055e2f;">Jenis-Jenis Pohon</p>
            </div>
        </div>
    </div>
    <div class="cards-wrapper-1">
        <div class="card-1">
            <img src="/assets/compiled/jpg/3.jpg" class="card-img-top-1" alt="Tree">
            <small class="top-title-1">outdor</small>
            <p class="card-title-1">Nama Pohon</p>
        </div>
        <div class="card-1">
            <img src="/assets/compiled/jpg/3.jpg" class="card-img-top-1" alt="Tree">
            <small class="top-title-1">outdor</small>
            <p class="card-title-1">Nama Pohon</p>
        </div>
        <div class="card-1">
            <img src="/assets/compiled/jpg/3.jpg" class="card-img-top-1" alt="Tree">
            <small class="top-title-1">outdor</small>
            <p class="card-title-1">Nama Pohon</p>
        </div>
        <div class="card-1">
            <img src="/assets/compiled/jpg/3.jpg" class="card-img-top-1" alt="Tree">
            <small class="top-title-1">outdor</small>
            <p class="card-title-1">Nama Pohon</p>
        </div>
        <div class="card-1">
            <img src="/assets/compiled/jpg/3.jpg" class="card-img-top-1" alt="Tree">
            <small class="top-title-1">outdor</small>
            <p class="card-title-1">Nama Pohon</p>
        </div>
        <div class="card-1">
            <img src="/assets/compiled/jpg/3.jpg" class="card-img-top-1" alt="Tree">
            <small class="top-title-1">outdor</small>
            <p class="card-title-1">Nama Pohon</p>
        </div>
        <div class="card-1">
            <img src="/assets/compiled/jpg/3.jpg" class="card-img-top-1" alt="Tree">
            <small class="top-title-1">outdor</small>
            <p class="card-title-1">Nama Pohon</p>
        </div>
        <div class="card-1">
            <img src="/assets/compiled/jpg/3.jpg" class="card-img-top-1" alt="Tree">
            <small class="top-title-1">outdor</small>
            <p class="card-title-1">Nama Pohon</p>
        </div>
    </div>
  </section>


  <section>
    <div class="vertical-menu">
        <div class="cards-wrapper">
            <div class="row">
                <div class="col-md-12 col-lg-6 card-margin-2">
                    <div class="card-container-2">
                        <div class="card-text-2">
                            <h6 style="color: white;">Emisi Karbon</h6>
                            <p>sudah seharusnya kita bersama-sama menekan global warming dengan memahami dampak negatif emisi karbon dan cara menguranginya.</p>
                        </div>
                        <div class="card-image">
                            <img src="/assets/image/emisi-karbon.png" alt="Tree" class="image-1">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 card-margin-2">
                    <div class="card-container-2">
                        <div class="card-text-2">
                            <h6 style="color: white;">Jadwal Penanaman</h6>
                            <p>Apa tujuan dari penanaman pohon? Manfaat menanam pohon juga penting untuk menjaga kelestarian hidup hewan dan tumbuhan.</p>
                        </div>
                        <div class="card-image">
                            <img src="/assets/image/jadwal-penanaman.png" alt="Tree" class="image-2">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 card-margin-2">
                    <div class="card-container-2">
                        <div class="card-text-2">
                            <h6 style="color: white;">Dokumentasi</h6>
                            <p>galeri para petugas pendataan pohon di seluruh wilayah Kota Samarinda, Kalimantan TImur</p>
                        </div>
                        <div class="card-image">
                            <img src="/assets/image/dokumentasi.png" alt="Tree" class="image-3">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 card-margin-2">
                    <div class="card-container-2">
                        <div class="card-text-2">
                            <h6 style="color: white;">Pencarian</h6>
                            <p>mencari jadwal ataupun jenis-jenis pohon menggunakan kode pohon</p>
                        </div>
                        <div class="card-image">
                            <img src="/assets/image/pencariann.png" alt="Tree" class="image-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  @push('footer')
  <footer class="bg-white text-white">
    <div class="container">
        <div class="row">
            <div class="col-4 text-center">
                <i class="icon bi bi-house"></i>
                <p>Home</p>
            </div>
            <div class="col-4 text-center">
                <div class="footer-circle-content">
                    <a href="/user-dashboard">
                        <i class="circle-icon bi bi-plus"></i>
                    </a>
                </div>
            </div>
            <div class="col-4 text-center">
                <a href="/pilih-profil-pohon">
                    <i class="icon bi bi-tree"></i> 
                    <p>Profil Pohon</p>
                </a>
            </div>
        </div>
    </div>
</footer>
@endpush

@endsection