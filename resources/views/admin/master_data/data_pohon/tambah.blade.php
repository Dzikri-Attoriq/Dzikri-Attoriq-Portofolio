@extends('admin.template')
@push('style')
<link rel="stylesheet" href="/assets/extensions/choices.js/public/assets/styles/choices.css">
<link rel="stylesheet" href="/assets/extensions/flatpickr/flatpickr.min.css">
<link rel="stylesheet" href="/map/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>
<style>
    .flatpickr-time {
        display: none;
    }
.container .card h4, .container .card label {
    font-weight: normal;
}

/* responsive */
@media (max-width: 560px) {
    .container .card h4 {
        font-size: 12px;
    }
    .container .card label {
        font-size: 10px;
    }
    .container .card input, .container .card select {
        height: 30px;
        font-size: 10px;
    }
    .container .card textarea {
        font-size: 10px;
    }
    .container .card button {
        font-size: 10px;
    }
    .container .card small {
        font-size: 8px;
    }
    #map { height: 200px; z-index: 0;}
}

@media (min-width: 561px) and (max-width: 992px) {
    .container .card h4 {
        font-size: 16px;
    }
    .container .card label {
        font-size: 14px;
    }
    .container .card input, .container .card select {
        height: 30px;
        font-size: 14px;
    }
    .container .card textarea {
        font-size: 14px;
    }
    .container .card button {
        font-size: 14px;
    }
    .container .card small {
        font-size: 12px;
    }
    #map { height: 250px; z-index: 0;}
}

@media (min-width: 992px) and (max-width: 1200px) {
    .container .card h4 {
        font-size: 18px;
    }
    .container .card label {
        font-size: 15px;
    }
    .container .card input, .container .card select {
        height: 40px;
        font-size: 15px;
    }
    .container .card textarea {
        font-size: 15px;
    }
    .container .card button {
        font-size: 15px;
    }
    .container .card small {
        font-size: 13px;
    }
    #map { height: 300px; z-index: 0;}
}

@media (min-width: 1201px) {
    .container .card h4 {
        font-size: 20px;
    }
    .container .card label {
        font-size: 16px;
    }
    .container .card input, .container .card select {
        height: 40px;
    }
    .container .card button {
        font-size: 16px;
    }
    .container .card small {
        font-size: 14px;
    }
    #map { height: 350px; z-index: 0;}
}

</style>
@endpush
@section('content')
<section id="input-style">
    <div class="container d-flex align-items-center justify-content-center">
        <div class="row w-100">
            <div class="col-12" >
                <div class="card">
                    <a href="/data-pohon"><i class="bi bi-chevron-left p-3"></i></a>
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data Pohon</h4>
                    </div>
                    <div class="card-body">
                        <form action="/data-pohon" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <label for="jenis_pohon_id">Jenis Pohon<span class="text-danger">*</span></label>
                                    <select class="choices form-select @error('jenis_pohon_id')
                                    is-invalid
                                    @enderror" name="jenis_pohon_id" id="jenis_pohon_id">
                                        <option value=" "></option>
                                        @foreach ($jenis_pohons as $jenis_pohon)
                                            <option value="{{ $jenis_pohon->id }}"
                                                {{ old('jenis_pohon_id') == $jenis_pohon->id ? 'selected' : '' }}>
                                                {{ $jenis_pohon->nama }}
                                            </option>
                                        @endforeach
                                    <select>
                                    @error('jenis_pohon_id')
                                        <small class="text-danger ms-3 fst-italic">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kawasan_id">Kawasan<span class="text-danger">*</span></label>
                                    <select class="choices form-select @error('kawasan_id')
                                    is-invalid
                                    @enderror" name="kawasan_id" id="kawasan_id">
                                        <option value=" "></option>
                                        @foreach ($kawasans as $kawasan)
                                            <option value="{{ $kawasan->id }}"
                                                {{ old('kawasan_id') == $kawasan->id ? 'selected' : '' }}>
                                                {{ $kawasan->nama }}
                                            </option>
                                        @endforeach
                                    <select>
                                    @error('kawasan_id')
                                        <small class="text-danger ms-3 fst-italic">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status_kawasan_id">Status Kawasan<span class="text-danger">*</span></label>
                                    <select class="choices form-select @error('status_kawasan_id')
                                    is-invalid
                                    @enderror" name="status_kawasan_id" id="status_kawasan_id">
                                        <option value=" "></option>
                                        @foreach ($status_kawasans as $status_kawasan)
                                            <option value="{{ $status_kawasan->id }}"
                                                {{ old('status_kawasan_id') == $status_kawasan->id ? 'selected' : '' }}>
                                                {{ $status_kawasan->nama }}
                                            </option>
                                        @endforeach
                                    <select>
                                    @error('status_kawasan_id')
                                        <small class="text-danger ms-3 fst-italic">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="umur_pohon">Umur Pohon<span class="text-danger">*</span></label>
                                        <input type="number" id="umur_pohon" name="umur_pohon" class="form-control round @error('umur_pohon')
                                        is-invalid
                                        @enderror" value="{{ old('umur_pohon') }}">
                                        @error('umur_pohon')
                                            <small class="text-danger ms-3 fst-italic">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pengelola_id">Pengelola<span class="text-danger">*</span></label>
                                    <select class="choices form-select @error('pengelola_id')
                                    is-invalid
                                    @enderror" name="pengelola_id" id="pengelola_id">
                                        <option value=" "></option>
                                        @foreach ($pengelolas as $pengelola)
                                            <option value="{{ $pengelola->id }}"
                                                {{ old('pengelola_id') == $pengelola->id ? 'selected' : '' }}>
                                                {{ $pengelola->nama }}
                                            </option>
                                        @endforeach
                                    <select>
                                    @error('pengelola_id')
                                        <small class="text-danger ms-3 fst-italic">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="koordinat">Koordinat<span class=" text-danger">* </span></label>
                                    <input type="text" class="form-control" id="koordinat" name="koordinat"
                                        value="{{ old('koordinat') }}"  onchange="moveMarkerToCoordinates()">
                                    @error('koordinat')
                                        <small class="text-danger ms-3 fst-italic">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div id="map" class="mb-3"></div>

                                <div class="text-end">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('script')
<script src="/assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
<script src="/assets/static/js/pages/form-element-select.js"></script>

<script src="/assets/extensions/flatpickr/flatpickr.min.js"></script>
<script src="/assets/static/js/pages/date-picker.js"></script>

<script src="/map/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>

<script>
const map = L.map('map').setView([-0.4920409, 117.1355364], 19);

// map
L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
}).addTo(map);

// custom marker
var greenIcon = L.icon({
    iconUrl: '/map/marker.png',
    iconSize:     [32, 50], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});

let marker = {};

// Fungsi untuk memindahkan marker ke koordinat yang diinput
function moveMarkerToCoordinates() {
    const koordinatInput = document.getElementById('koordinat').value;
    const [latitude, longitude] = koordinatInput.split(', ').map(parseFloat);

    if (!isNaN(latitude) && !isNaN(longitude) && latitude >= -90 && latitude <= 90 && longitude >= -180 && longitude <= 180) {
        if (marker !== undefined) {
            map.removeLayer(marker);
        }
        var popup = L.popup()
            .setLatLng([latitude, longitude])
            .setContent("Koordinat : " + latitude + ", " + longitude)
            .openOn(map);
        marker = L.marker([latitude, longitude], { icon: greenIcon }).addTo(map);
        map.setView([latitude, longitude], 19);
    } else {
        Swal.fire({
            icon: 'info',
            title: 'Tidak Valid!',
            text: 'Koordinat tidak valid. Harap masukkan koordinat yang valid.',
        })
        document.getElementById('koordinat').focus();
        document.getElementById('koordinat').value = '';
    }
}

map.on('click', function(e) {
    let latitude = e.latlng.lat.toString().substring(0, 15);
    let longtitude = e.latlng.lng.toString().substring(0, 15);

    if(marker != undefined) {
        map.removeLayer(marker);
    }
    var popup = L.popup()
        .setLatLng([latitude, longtitude])
        .setContent("Koordinat : " + latitude + ", " + longtitude)
        .openOn(map);
    marker = L.marker([latitude, longtitude], {icon: greenIcon}).addTo(map);

    // Mengisi input koordinat dengan nilai latitude dan longitude
    document.getElementById('koordinat').value = latitude + ", " + longtitude;
})

// Cek apakah ada koordinat yang disimpan di local storage saat halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
    // Pastikan halaman sepenuhnya dimuat sebelum memeriksa koordinat dan menampilkan marker
    const koordinatInput = document.getElementById('koordinat').value;
    if (koordinatInput) {
        moveMarkerToCoordinates();
    }
});

</script>
@endpush
@endsection