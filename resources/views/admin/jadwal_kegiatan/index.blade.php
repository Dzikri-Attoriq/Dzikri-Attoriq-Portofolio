@extends('admin/template')

@push('style')
<link rel="stylesheet" href="/map/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>
<script src="/map/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>
<style>
.card .text-header {
    font-weight: 280;
    color: #055e2f;
    margin: 0;
}
.card .text-bold {
    font-weight: bold;
    color: #055e2f;
    margin: 0;
}
.card .garis {
    border-top: 1px solid #8b8a8a;
    margin: 0 auto;
    width: 90%;
}
.card .text-sedang {
    font-weight: 280;
    color: #17a659;
}
.card .text-small {
    font-weight: 270;
    color: #17a659;
    margin: 0;
}
.card .alamat-card {
    font-weight: 270;
    color: #17a659;
}
.card .judul-card {
    font-weight: bold;
    margin: 0;
    color: #055e2f;
}
/* responsive */
@media (max-width: 560px) {
    .card .text-header, .card .text-sedang {
        font-size: 10px;
    }
    .card .judul-card {
        font-size: 12px;
    }
    .card .text-bold {
        font-size: 10px;
    }
    .card .text-small, .card .alamat-card {
        font-size: 8px;
    }
    .card .map { height: 150px; z-index: 0;}
}

@media (min-width: 561px) and (max-width: 992px) {
    .card .text-header, .card .text-sedang {
        font-size: 12px;
    }
    .card .judul-card {
        font-size: 14px;
    }
    .card .text-bold {
        font-size: 12px;
    }
    .card .text-small, .card .alamat-card {
        font-size: 10px;
    }
    .card .map { height: 200px; z-index: 0;}
}

@media (min-width: 992px) and (max-width: 1200px) {
    .card .text-header, .card .text-sedang {
        font-size: 14px;
    }
    .card .judul-card {
        font-size: 16px;
    }
    .card .text-bold {
        font-size: 14px;
    }
    .card .text-small, .card .alamat-card {
        font-size: 12px;
    }
    .card .map { height: 250px; z-index: 0;}
}

@media (min-width: 1201px) {
    .card .text-header, .card .text-sedang {
        font-size: 14px;
    }
    .card .judul-card {
        font-size: 16px;
    }
    .card .text-bold {
        font-size: 14px;
    }
    .card .text-small, .card .alamat-card {
        font-size: 12px;
    }
    .card .map { height: 250px; z-index: 0;}
}
</style>
@endpush

@section('content')
    <!-- Hoverable rows start -->
<section class="container">
    <div class="page-heading">
        <h5>Jadwal Kegiatan</h5>
        <a href="/jadwal-kegiatan/create" class="btn btn-primary btn-sm" title="Tambah">
            <i class="fas fa-plus"></i>
        </a>
    </div> 

    <div class="row">
        @foreach ($jadwal_kegiatans as $jadwal_kegiatan)
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            <p class="text-header">Tanggal</p>
                            <p class="text-bold">{{ date("d M Y", strtotime($jadwal_kegiatan->tanggal)) }}</p>
                        </div>
                        <div class="col">
                            <p class="text-header">Kode Pohon</p>
                            <p class="text-bold">{{ $jadwal_kegiatan->jenis_pohon->kode_pohon }}</p>
                        </div>
                    </div>
                </div>
                <div class="garis mb-3"></div>
                <div class="card-body">
                    <p class="card-title judul-card">{{ $jadwal_kegiatan->judul }}</p>
                    <p class="card-text alamat-card">{{ $jadwal_kegiatan->alamat }}</p>
                    <p class="card-text text-small">Status Kawasan :</p>
                    <p class="card-text text-sedang">{{ $jadwal_kegiatan->status_kawasan->nama }}</p>
                    <p class="card-text text-small">Pengelola :</p>
                    <p class="card-text text-sedang">{{ $jadwal_kegiatan->pengelola->nama }}</p>
                    <div id="map_{{ $jadwal_kegiatan->id }}" class="mb-3 map"></div>
                    <script>
                        // Di dalam script JavaScript untuk setiap jadwal kegiatan
                        const map_{{ $jadwal_kegiatan->id }} = L.map('map_{{ $jadwal_kegiatan->id }}').setView([{{ $jadwal_kegiatan->koordinat }}], 19);
                        
                        // Menambahkan peta
                        L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
                            maxZoom: 20,
                            subdomains:['mt0','mt1','mt2','mt3']
                        }).addTo(map_{{ $jadwal_kegiatan->id }});
                        
                        // custom marker
                        var greenIcon = L.icon({
                            iconUrl: '/map/marker.png',
                            iconSize:     [32, 50], // size of the icon
                            shadowSize:   [50, 64], // size of the shadow
                            iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                            shadowAnchor: [4, 62],  // the same for the shadow
                            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
                        });

                        // Menambahkan marker
                        let marker_{{ $jadwal_kegiatan->id }} = L.marker([{{ $jadwal_kegiatan->koordinat }}], {icon: greenIcon}).addTo(map_{{ $jadwal_kegiatan->id }});

                        marker_{{ $jadwal_kegiatan->id }}.bindPopup("Koordinat : {{ $jadwal_kegiatan->koordinat }}").openPopup();
                    </script>
                    <div class="text-end">
                        <a href="/jadwal-kegiatan/{{ $jadwal_kegiatan->id }}/edit"
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-edit" title="Edit"></i>
                        </a>
                        <form action="/jadwal-kegiatan/{{ $jadwal_kegiatan->id }}" method="POST"
                            class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn border-0 btn-danger btn-sm"
                                title="Hapus" id="btn-delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</section>

@endsection