@extends('template')
@section('content')
<link rel="stylesheet" href="/assets/map/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>
<style>
    #map { height: 350px; }
</style>
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Data Pohon</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav>
    </div>
    <div class="page-options ml-2">
        <a href="/data-pohon"><i class="material-icons btn btn-dark btn-sm">arrow_back</i></a>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Pohon</h5>
                        <form action="/data-pohon" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="jenis_pohon_id">Jenis Pohon<span class="text-muted text-danger">*</span></label>
                                <select class="tom-select" placeholder="Pilih Jenis Pohon" id="jenis_pohon_id"
                                    name="jenis_pohon_id">
                                    <option value="">Pilih Jenis Pohon</option>
                                    @foreach ($jenis_pohons as $jenis_pohon)
                                        <option value="{{ $jenis_pohon->id }}"
                                            {{ old('jenis_pohon_id') == $jenis_pohon->id ? 'selected' : '' }}>
                                            {{ $jenis_pohon->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jenis_pohon_id')
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kawasan_id">Kawasan<span class="text-muted text-danger">*</span></label>
                                <select class="tom-select-2" placeholder="Pilih Kawasan" id="kawasan_id"
                                    name="kawasan_id">
                                    <option value="">Pilih Kawasan</option>
                                    @foreach ($kawasans as $kawasan)
                                        <option value="{{ $kawasan->id }}"
                                            {{ old('kawasan_id') == $kawasan->id ? 'selected' : '' }}>
                                            {{ $kawasan->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kawasan_id')
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status_kawasan_id">Status Kawasan<span class="text-muted text-danger">*</span></label>
                                <select class="tom-select-3" placeholder="Pilih Status Kawasan" id="status_kawasan_id"
                                    name="status_kawasan_id">
                                    <option value="">Pilih Status Kawasan</option>
                                    @foreach ($status_kawasans as $status_kawasan)
                                        <option value="{{ $status_kawasan->id }}"
                                            {{ old('status_kawasan_id') == $status_kawasan->id ? 'selected' : '' }}>
                                            {{ $status_kawasan->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('status_kawasan_id')
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="umur_pohon">Umur Pohon<span class="text-muted text-danger">* </span></label>
                                <input type="number" class="form-control" id="umur_pohon" name="umur_pohon"
                                    value="{{ old('umur_pohon') }}" placeholder="">
                                @error('umur_pohon')
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pengelola_id">Pengelola<span class="text-muted text-danger">*</span></label>
                                <select class="tom-select-4" placeholder="Pilih Pengelola" id="pengelola_id"
                                    name="pengelola_id">
                                    <option value="">Pilih Pengelola</option>
                                    @foreach ($pengelolas as $pengelola)
                                        <option value="{{ $pengelola->id }}"
                                            {{ old('pengelola_id') == $pengelola->id ? 'selected' : '' }}>
                                            {{ $pengelola->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('pengelola_id')
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="koordinat">Koordinat<span class="text-muted text-danger">* </span></label>
                                <input type="text" class="form-control" id="koordinat" name="koordinat"
                                    value="{{ old('koordinat') }}" placeholder="">
                                @error('koordinat')
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic">{{ $message }}</small>
                                @enderror
                            </div>
                            <div id="map" class="mb-3"></div>

                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/map/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <script src="/my/tom-select.complete.min.js"></script>

    <script>
        const map = L.map('map').setView([-0.4920409, 117.1355364], 19);

        // map
        L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);

        // custom marker
        var greenIcon = L.icon({
            iconUrl: '/assets/map/marker.png',
            iconSize:     [32, 50], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        let marker = {};
        map.on('click', function(e) {
            // alert(e.latlng);
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

    </script>

    <script>
        new TomSelect(".tom-select", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
        new TomSelect(".tom-select-2", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
        new TomSelect(".tom-select-3", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
        new TomSelect(".tom-select-4", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
    </script>
@endsection
