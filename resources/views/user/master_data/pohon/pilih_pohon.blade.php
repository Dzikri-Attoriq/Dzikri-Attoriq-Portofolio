@extends('user/template')

@push('style')
<link rel="stylesheet" href="/assets/css/master-data/pohon/pilih_pohon.css">
<link rel="stylesheet" href="/assets/css/dashboard/footer.css">
@endpush

@section('content')

<section class="section-1 vertical-menu">
    <div class="card mx-auto">
        <img src="/assets/image/pohon/beringin.jpg" class="card-img-top" alt="Gambar Pohon">
        <a href="javascript:void(0);" onclick="redirectBack();" class="tombol-kembali">
            <i class="bi bi-chevron-left"></i>
        </a>
        <div class="card-body">
            <small class="top-text">Outdoor</small>
            <p class="center-text">Beringin</p>
            <p class="deskripsi-text">Pohon trembesi merupakan salah satu jenis tumbuhan di Indonesia yang mempunyai tajuk sangat lebar. Bahkan lebar dan pertumbuhan tajuknya melebihi tinggi tanaman tersebut. Karena tajuknya yang sangat lebar, tanaman ini bermanfaat sebagai pohon peneduh.
                Tidak hanya itu, tanaman trembesi juga mempunyai bentuk yang cantik, sehingga dijadikan sebagai ornamen untuk mempercantik kota.
                Tumbuhan ini juga lumayan awam di kalangan masyarakat kita, karena tanaman ini terkadang dapat dijumpai di taman kota yang berada di pinggir jalan. Pohon trembesi ini berumur panjang, bisa hidup sampai ratusan tahun.
                Pohon trembesi (Albizia saman) tergolong ke dalam keluarga Albizia dan memiliki sinonim latin Samanea saman. Pohon ini juga dikenal dengan nama Monkey pod tree dan Saman.
                Di Indonesia, pohon trembesi dikenal dengan sebutan yang berbeda di beberapa daerah. Contohnya kayu ambon di daerah Melayu, Ki hujan di Sunda, dan Punggur, Munggur, Trembesi, Meh di daerah Jawa.
                Akar dari tanaman ini dapat menyerap air tanah dengan kuat, sehingga membuat tajuk dari tanaman ini dapat mengeluarkan air atau tetesan air. Karena itu, pohon trembesi disebut juga sebagai pohon hujan.
                Ketika cuaca mendung atau gelap, daun dari tumbuhan ini akan menutup dengan bersamaan, sehingga pada saat hujan datang, airnya bisa langsung jatuh menyentuh tanah.</p>
        </div>
        <div class="card-button">
            <button class="btn">
                <i class="bi bi-heart icon"></i>
            </button>
        </div>
    </div>
</section>

@push('footer')
<footer class="bg-white text-white">
    <div class="container">
        <div class="row">
            <div class="col-4 text-center">
                <a href="/dashboard-user">
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
                <a href="/pilih-profil-pohon">
                    <i class="icon bi bi-tree"></i> 
                    <p>Profil Pohon</p>
                </a>
            </div>
        </div>
    </div>
</footer>
@endpush

@push('script')
<script>
    function redirectBack() {
        window.history.back();
    }
</script>
@endpush

@endsection

