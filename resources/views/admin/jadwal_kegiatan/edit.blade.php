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
                    <a href="/jadwal-kegiatan"><i class="bi bi-chevron-left p-3"></i></a>
                    <div class="card-header">
                        <h4 class="card-title">Edit Jadwal Kegiatan</h4>
                    </div>
                    
                    <div class="card-body">
                        <form action="/jadwal-kegiatan/{{ $jadwal_kegiatan->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group">
                                    <label for="jenis_pohon_id">Jenis Pohon<span class="text-danger">*</span></label>
                                    <select class="choices form-select @error('jenis_pohon_id')
                                    is-invalid
                                    @enderror" name="jenis_pohon_id" id="jenis_pohon_id">
                                        <option value=" "></option>
                                        @foreach ($jenis_pohons as $jenis_pohon)
                                            <option value="{{ $jenis_pohon->id }}"
                                                {{ old('jenis_pohon_id', $jadwal_kegiatan->jenis_pohon_id) == $jenis_pohon->id ? 'selected' : '' }}>
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
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="judul">Judul Kegiatan<span class="text-danger">*</span></label>
                                        <input type="text" id="judul" name="judul" class="form-control round @error('judul')
                                        is-invalid
                                        @enderror" value="{{ old('judul', $jadwal_kegiatan->judul) }}">
                                        @error('judul')
                                            <small class="text-danger ms-3 fst-italic">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="alamat">Alamat<span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('alamat')
                                        is-invalid
                                        @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat', $jadwal_kegiatan->alamat) }}</textarea>
                                        @error('alamat')
                                            <small class="text-danger ms-3 fst-italic">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal Kegiatan<span class="text-danger">*</span></label>
                                        <input type="date" id="tanggal" name="tanggal" class="form-control flatpickr-no-config @error('tanggal')
                                        is-invalid
                                        @enderror" value="{{ old('tanggal', $jadwal_kegiatan->tanggal) }}">
                                        @error('tanggal')
                                            <small class="text-danger ms-3 fst-italic">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status_kawasan_id">Status Kawasan<span class="text-danger">*</span></label>
                                    <select class="choices form-select @error('status_kawasan_id')
                                    is-invalid
                                    @enderror" name="status_kawasan_id" id="status_kawasan_id">
                                        <option value=" "></option>
                                        @foreach ($status_kawasans as $status_kawasan)
                                            <option value="{{ $status_kawasan->id }}"
                                                {{ old('status_kawasan_id', $jadwal_kegiatan->status_kawasan_id) == $status_kawasan->id ? 'selected' : '' }}>
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
                                <div class="form-group">
                                    <label for="pengelola_id">Pengelola<span class="text-danger">*</span></label>
                                    <select class="choices form-select @error('pengelola_id')
                                    is-invalid
                                    @enderror" name="pengelola_id" id="pengelola_id">
                                        <option value=" "></option>
                                        @foreach ($pengelolas as $pengelola)
                                            <option value="{{ $pengelola->id }}"
                                                {{ old('pengelola_id', $jadwal_kegiatan->pengelola_id) == $pengelola->id ? 'selected' : '' }}>
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
                                        value="{{ old('koordinat', $jadwal_kegiatan->koordinat) }}" onchange="moveMarkerToCoordinates()">
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
// Ambil koordinat dari database dan simpan dalam variabel JavaScript
var koordinat = {!! json_encode($jadwal_kegiatan->koordinat) !!};

const map = L.map('map').setView([{{ $jadwal_kegiatan->koordinat }}], 19);

// map
L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 21,
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

// Membuat marker pada peta menggunakan koordinat dari database
if (koordinat) {
    var coordinates = koordinat.split(', '); // Pisahkan koordinat menjadi latitude dan longitude
    var latitude = parseFloat(coordinates[0]);
    var longitude = parseFloat(coordinates[1]);
    
    // custom marker
    var redIcon = L.icon({
        iconUrl: '/map/marker-edit.png',
        iconSize:     [32, 50], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62],  // the same for the shadow
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });
    // Buat marker dan tambahkan ke peta
    let marker = L.marker([latitude, longitude], { icon: redIcon }).addTo(map);
    
    // Tampilkan popup jika perlu
    marker.bindPopup("Koordinat : " + latitude + ", " + longitude).openPopup();
}

marker = {};

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
        document.getElementById('koordinat').value = "{{ $jadwal_kegiatan->koordinat }}";
        if(marker != undefined) {
            map.removeLayer(marker);
        }
    }
}

map.on('click', function(e) {
    // alert(e.latlng);
    let latitude = e.latlng.lat.toString().substring(0, 15);
    let longitude = e.latlng.lng.toString().substring(0, 15);

    if(marker != undefined) {
        map.removeLayer(marker);
    }
    var popup = L.popup()
        .setLatLng([latitude, longitude])
        .setContent("Koordinat : " + latitude + ", " + longitude)
        .openOn(map);
    marker = L.marker([latitude, longitude], {icon: greenIcon}).addTo(map);

    // Mengisi input koordinat dengan nilai latitude dan longitude
    document.getElementById('koordinat').value = latitude + ", " + longitude;
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