@extends('template')
@section('content')
<script src="/assets/image-jquery.js"></script>

    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Data Jenis Pohon</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav>
    </div>
    <div class="page-options ml-2">
        <a href="/data-jenis"><i class="material-icons btn btn-dark btn-sm">arrow_back</i></a>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Jenis Pohon</h5>
                        <form action="/data-jenis" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Kelompok Tanaman<span class="text-muted text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ old('nama') }}">
                                @error('nama')
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Pohon<span class="text-muted text-danger">*</span></label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kelompok_tanaman_id">Kelompok Tanaman<span class="text-muted text-danger">*</span></label>
                                <select class="tom-select" placeholder="Pilih Kelompok Tanaman" id="kelompok_tanaman_id"
                                    name="kelompok_tanaman_id">
                                    <option value="">Pilih Kelompok Tanaman</option>
                                    @foreach ($kelompok_tanamans as $kelompok_tanaman)
                                        <option value="{{ $kelompok_tanaman->id }}"
                                            {{ old('kelompok_tanaman_id') == $kelompok_tanaman->id ? 'selected' : '' }}>
                                            {{ $kelompok_tanaman->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kelompok_tanaman_id')
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image" class="">Foto<span class="text-muted text-danger">*</span></label>
                                <img alt="" class="img-preview img-fluid col-sm-4 mb-2">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="image" id="image" onchange="previewImage()">
                                  <label for="image" class="custom-file-label">Choose file</label>
                                </div>
                                @error('image')
                                    <small class="text-danger pl-3">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/my/tom-select.complete.min.js"></script>
    <script>
        new TomSelect(".tom-select", {
            create: false,
            sortField: {
                // field: "text",
                direction: "asc"
            }
        });

        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("Selected").html(fileName);
            console.log(fileName);
        });
    
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
