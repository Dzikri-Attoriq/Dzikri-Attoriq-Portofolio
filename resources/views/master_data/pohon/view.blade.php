@extends('template')

@push('style')
<style>
.section-1 .img-fluid {
    width: 100%; 
    height: 100%; 
    object-fit: cover; 
}
.section-1 .size-tr {
    font-family: "Poppins", sans-serif;
    font-weight: 300;
}

.section-1 .btn-submit {
    font-family: "Poppins", sans-serif;
    font-weight: 300;
}

/* responsive */
@media (max-width: 390px) {
    .section-1 .size-tr {
        font-size: 8px;
    }
    .section-1 .l-margin {
        padding-left: 10px;
    }
    .section-1 .btn-submit {
        font-size: 8px;
    }
}

@media (min-width: 390px) and (max-width: 540px) {
    .section-1 .size-tr {
        font-size: 11px;
    }
    .section-1 .l-margin {
        padding-left: 13px;
    }
    .section-1 .btn-submit {
        font-size: 11px;
    }
    .section-1 .size-tr {
        margin-bottom: 8px;
    }
}

@media (min-width: 540px) and (max-width: 992px) {
    .section-1 .size-tr {
        font-size: 14px;
    }
    .section-1 .l-margin {
        padding-left: 15px;
    }
    .section-1 .btn-submit {
        font-size: 14px;
    }
}

@media (min-width: 992px) and (max-width: 1200px) {
    .section-1 .size-tr {
        font-size: 16px;
    }
    .section-1 .l-margin {
        padding-left: 20px;
    }
    .section-1 .btn-submit {
        font-size: 16px;
    }
}

@media (min-width: 1201px) {
    .section-1 .size-tr {
        font-size: 18px;
    }
    .section-1 .l-margin {
        padding-left: 50px;
    }
    .section-1 .btn-submit {
        font-size: 18px;
    }
}
</style>
<link rel="stylesheet" href="/assets/css/dashboard/footer.css">
@endpush

@section('content')

@push('header')
@push('header')
<div class="clearfix ">
    <div class="float-start media d-flex align-items-center">
        <div class="d-block d-xl-none name flex-grow-1">
            <i class="bi bi-chevron-left"></i>
        </div>
    </div>
</div>
@endpush
@endpush

<section class="section-1">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="card mx-auto">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <img src="/assets/image/pohon/beringin.jpg" class="img-fluid" alt="Gambar">
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="card-body">
                            <table>
                                <tr class="size-tr">
                                    <td>Jenis Pohon</td>
                                    <td class="l-margin">:</td>
                                    <td class="l-margin">Trembesi</td>
                                </tr>
                                <tr class="size-tr">
                                    <td>Kawasan</td>
                                    <td class="l-margin">:</td>
                                    <td class="l-margin">Siradj Salman</td>
                                </tr>
                                <tr class="size-tr">
                                    <td>Status Kawasan</td>
                                    <td class="l-margin">:</td>
                                    <td class="l-margin">Ruang Terbuka Hijau Publik</td>
                                </tr>
                                <tr class="size-tr">
                                    <td>Kode Pohon</td>
                                    <td class="l-margin">:</td>
                                    <td class="l-margin">A1 - B - RTHP - C1 - 10000</td>
                                </tr>
                                <tr class="size-tr">
                                    <td>Umur Pohon</td>
                                    <td class="l-margin">:</td>
                                    <td class="l-margin">12 tahun</td>
                                </tr>
                                <tr class="size-tr">
                                    <td>Pengelola</td>
                                    <td class="l-margin">:</td>
                                    <td class="l-margin">Dinas Lingkungan Hidup</td>
                                </tr>
                                <tr class="size-tr">
                                    <td>Koordinat</td>
                                    <td class="l-margin">:</td>
                                    <td class="l-margin">-0.4921328251446621, 117.13550736196511</td>
                                </tr>
                            </table>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="d-grid gap-2 mt-3">
                                        <button class="btn btn-success btn-submit" type="button" data-bs-toggle="modal" data-bs-target="#tambah-pohon">Tambah Data</button>
                                        <button class="btn btn-warning btn-submit" type="button">Edit Data</button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="visible-print text-center">
                                        {!! QrCode::size(110)->generate(Request::url()); !!}
                                    </div>
                                </div>
                            </div>
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
                      <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                          <rect width="1" height="7" rx="0.5" fill="white"/>
                          <rect x="7" width="1" height="7" rx="0.5" transform="rotate(90 7 0)" fill="white"/>
                          <rect x="36" width="1" height="7" rx="0.5" transform="rotate(90 36 0)" fill="white"/>
                          <rect x="36" y="7" width="1" height="7" rx="0.5" transform="rotate(-180 36 7)" fill="white"/>
                          <rect x="36" y="36" width="1" height="7" rx="0.5" transform="rotate(-180 36 36)" fill="white"/>
                          <rect x="29" y="36" width="1" height="7" rx="0.5" transform="rotate(-90 29 36)" fill="white"/>
                          <rect y="36" width="1" height="7" rx="0.5" transform="rotate(-90 0 36)" fill="white"/>
                          <rect y="29" width="1" height="7" rx="0.5" fill="white"/>
                      </svg>
                  </div>
              </div>
              <div class="col-4 text-center">
                  <i class="icon bi bi-tree"></i> 
                  <p>Profil Pohon</p>
              </div>
          </div>
      </div>
  </footer>
  @endpush

  
  @include('master_data.pohon.tambah')
  @endsection
