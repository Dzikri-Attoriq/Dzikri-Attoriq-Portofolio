@extends('template')

@push('style')

<style>
body {
    background-image: url('/assets/image/login.png');
    background-size: 100% 40%; 
    background-repeat: no-repeat; 
    background-position-y: -20px;
    position: relative;
}
.section-1 ::placeholder {
    font-family: "Poppins", sans-serif;
    font-weight: 280;
    color: black;
}
.section-1 .input-group input {
    border-radius: 10px
}
.section-1 .input-group button {
    border-radius: 10px
}

.vertical-menu {
    overflow-y: auto;
}
.vertical-menu::-webkit-scrollbar {
    width: 0; 
}

.content-2 {
    font-family: "Poppins", sans-serif;
    font-weight: 290;
}
.content-2 .g-0 {
    height: 100%
}
.content-2 .card-header {
    color: #2fc374;
    font-weight: 260;
}
.content-2 .card-title {
    font-weight: 420; 
    color: #055e2f;
}
.content-2 .card-text {
    font-weight: 280;
    color: #055e2f;
    font-style: italic;
}

.content-2 .img-fluid {
    width: 100%;
    object-fit: cover; 
}
.content-2 .gradient {
    position: relative;
}

.content-2 .gradient::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 30%; 
    background: linear-gradient(to right, #FFF 23.04%, rgba(255, 255, 255, 0.00) 100%);
}
.content-2 img {
    border: 1px solid transparent;
    border-image: linear-gradient(transparent, transparent), linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
    border-image-slice: 1;
}

/* responsive */
@media (max-width: 560px) {
    .input-group input.form-control {
        font-size: 12px;
    }
    .input-group button.btn {
        font-size: 12px;
    }
    .vertical-menu {
        height: 560px;
    }
    .content-2 .card {
        height: 20vh;
    }
    .content-2 .card-header {
        margin-bottom: -28px;
        font-size: 12px;
    }
    .content-2 .card-title {
        font-size: 12px;
        margin-bottom: 15px;
    }
    .content-2 .card-text {
        font-size: 12px; 
        font-style: italic;
    }
}

@media (min-width: 561px) and (max-width: 992px) {
    .input-group input.form-control {
        font-size: 14px;
    }
    .input-group button.btn {
        font-size: 14px;
    }
    .vertical-menu {
        height: 540px;
    }
    .content-2 .card {
        height: 20vh;
    }
    .content-2 .card-header {
        margin-bottom: -28px;
        font-size: 14px;
    }
    .content-2 .card-title {
        font-size: 14px;
        margin-bottom: 15px;
    }
    .content-2 .card-text {
        font-size: 14px; 
        font-style: italic;
    }
}

@media (min-width: 992px) and (max-width: 1200px) {
    .input-group input.form-control {
        font-size: 16px;
    }
    .input-group button.btn {
        font-size: 16px;
    }
    .vertical-menu {
        height: 550px;
    }
    .content-2 .card {
        height: 20vh;
    }
    .content-2 .card-header {
        margin-bottom: -28px;
        font-size: 14px;
    }
    .content-2 .card-title {
        font-size: 16px;
        margin-bottom: 15px;
    }
    .content-2 .card-text {
        font-size: 14px; 
        font-style: italic;
    }
}

@media (min-width: 1201px) {
    .input-group input.form-control {
        font-size: 18px;
    }
    .input-group button.btn {
        font-size: 18px;
    }
    .vertical-menu {
        height: 570px;
    }
    .content-2 .card {
        height: 20vh;
    }
    .content-2 .card-header {
        margin-bottom: -28px;
        font-size: 14px;
    }
    .content-2 .card-title {
        font-size: 18px;
        margin-bottom: 15px;
    }
    .content-2 .card-text {
        font-size: 14px; 
        font-style: italic;
    }
}

</style>
<link rel="stylesheet" href="/assets/css/dashboard/footer.css">
@endpush


@section('content')

<section class="section-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 mb-1">
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control" placeholder="Search">
                    <button class="btn btn-light" type="button" id="button-addon2">
                        <i class="fa fa-search"></i>
                    </button>
                  </div>    
            </div>    
        </div> 
    </div>
</section>


<section class="content-2">
    <div class="vertical-menu">
        <div class="cards-wrapper">
            <div class="row">
                <div class="col-md-12 col-lg-6 card-margin-2">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-8">
                                <div class="card-header">
                                    Pohon Outdoor
                                </div>
                                <div class="card-body text-success">
                                    <p class="card-title">Pohon Cemara Kantor Gubernur</p>
                                    <p class="card-text">by Ferli Sudut</p>
                                </div>
                            </div>
                            <div class="col-4 gradient" >
                                <img src="/assets/image/pohon/beringin.jpg" style="height: 100%" class="img-fluid rounded-end" alt="Gambar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 card-margin-2">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-8">
                                <div class="card-header">
                                    Pohon Outdoor
                                </div>
                                <div class="card-body text-success">
                                    <p class="card-title">Pohon Cemara Kantor Gubernur</p>
                                    <p class="card-text">by Ferli Sudut</p>
                                </div>
                            </div>
                            <div class="col-4 gradient">
                                <img src="/assets/image/pohon/beringin.jpg" style="height: 100%" class="img-fluid rounded-end" alt="Gambar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 card-margin-2">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-8">
                                <div class="card-header">
                                    Pohon Outdoor
                                </div>
                                <div class="card-body text-success">
                                    <p class="card-title">Pohon Cemara Kantor Gubernur</p>
                                    <p class="card-text">by Ferli Sudut</p>
                                </div>
                            </div>
                            <div class="col-4 gradient">
                                <img src="/assets/image/pohon/beringin.jpg" style="height: 100%" class="img-fluid rounded-end" alt="Gambar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 card-margin-2">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-8">
                                <div class="card-header">
                                    Pohon Outdoor
                                </div>
                                <div class="card-body text-success">
                                    <p class="card-title">Pohon Cemara Kantor Gubernur</p>
                                    <p class="card-text">by Ferli Sudut</p>
                                </div>
                            </div>
                            <div class="col-4 gradient">
                                <img src="/assets/image/pohon/beringin.jpg" style="height: 100%" class="img-fluid rounded-end" alt="Gambar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 card-margin-2">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-8">
                                <div class="card-header">
                                    Pohon Outdoor
                                </div>
                                <div class="card-body text-success">
                                    <p class="card-title">Pohon Cemara Kantor Gubernur</p>
                                    <p class="card-text">by Ferli Sudut</p>
                                </div>
                            </div>
                            <div class="col-4 gradient">
                                <img src="/assets/image/pohon/beringin.jpg" style="height: 100%" class="img-fluid rounded-end" alt="Gambar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 card-margin-2">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-8">
                                <div class="card-header">
                                    Pohon Outdoor
                                </div>
                                <div class="card-body text-success">
                                    <p class="card-title">Pohon Cemara Kantor Gubernur</p>
                                    <p class="card-text">by Ferli Sudut</p>
                                </div>
                            </div>
                            <div class="col-4 gradient">
                                <img src="/assets/image/pohon/beringin.jpg" style="height: 100%" class="img-fluid rounded-end" alt="Gambar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 card-margin-2">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-8">
                                <div class="card-header">
                                    Pohon Outdoor
                                </div>
                                <div class="card-body text-success">
                                    <p class="card-title">Pohon Cemara Kantor Gubernur</p>
                                    <p class="card-text">by Ferli Sudut</p>
                                </div>
                            </div>
                            <div class="col-4 gradient">
                                <img src="/assets/image/pohon/beringin.jpg" style="height: 100%" class="img-fluid rounded-end" alt="Gambar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 card-margin-2">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-8">
                                <div class="card-header">
                                    Pohon Outdoor
                                </div>
                                <div class="card-body text-success">
                                    <p class="card-title">Pohon Cemara Kantor Gubernur</p>
                                    <p class="card-text">by Ferli Sudut</p>
                                </div>
                            </div>
                            <div class="col-4 gradient">
                                <img src="/assets/image/pohon/beringin.jpg" style="height: 100%" class="img-fluid rounded-end" alt="Gambar">
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
                <a href="/">
                    <i class="icon bi bi-house"></i>
                    <p>Home</p>
                </a>
            </div>
            <div class="col-4 text-center">
                <div class="footer-circle-content">
                    <a href="/scan">
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
                    </a>
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

@endsection

