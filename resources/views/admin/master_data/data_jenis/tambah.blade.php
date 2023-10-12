@extends('admin.template')
@push('style')
<link rel="stylesheet" type="text/css" href="/editor/trix.css">
<link rel="stylesheet" href="/assets/extensions/choices.js/public/assets/styles/choices.css">
<style>
.container .card h4, .container .card label {
    font-weight: normal;
}

trix-toolbar [data-trix-button-group="file-tools"] {
    display: none;
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
    .container .card button {
        font-size: 10px;
    }
    .container .card small {
        font-size: 8px;
    }
    .custom-font-size {
        font-size: 10px;
    }
    trix-editor.trix-size {
        font-size: 10px !important;
    }
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
    .container .card button {
        font-size: 14px;
    }
    .container .card small {
        font-size: 12px;
    }
    trix-editor.trix-size {
        font-size: 12px !important;
    }
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
    .container .card button {
        font-size: 15px;
    }
    .container .card small {
        font-size: 13px;
    }
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
}

</style>
@endpush
@section('content')
<section id="input-style">
    <div class="container d-flex align-items-center justify-content-center">
        <div class="row w-100">
            <div class="col-12" >
                <div class="card">
                    <a href="/data-jenis"><i class="bi bi-chevron-left p-3"></i></a>
                    <div class="card-header">
                        <h4 class="card-title">Tambah Jenis Pohon</h4>
                    </div>
                    
                    <div class="card-body">
                        <form action="/data-jenis" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nama">Nama Pohon<span class="text-danger">*</span></label>
                                        <input type="text" id="nama" name="nama" class="form-control round @error('nama')
                                        is-invalid
                                        @enderror" value="{{ old('nama') }}">
                                        @error('nama')
                                            <small class="text-danger ms-3 fst-italic">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi Pohon<span class="text-danger">*</span></label>
                                        <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
                                        <trix-editor class="trix-size" input="deskripsi"></trix-editor>
                                        @error('deskripsi')
                                            <small class="text-danger ms-3 fst-italic">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="manfaat">Manfaat Pohon<span class="text-danger">*</span></label>
                                        <input id="manfaat" type="hidden" name="manfaat" value="{{ old('manfaat') }}">
                                        <trix-editor class="trix-size" input="manfaat"></trix-editor>
                                        @error('manfaat')
                                            <small class="text-danger ms-3 fst-italic">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="kelompok_tanaman_id">Kelompok Tanaman<span class="text-danger">*</span></label>
                                        <select class="choices form-select @error('kelompok_tanaman_id')
                                        is-invalid
                                        @enderror" name="kelompok_tanaman_id" id="kelompok_tanaman_id">
                                            <option value=" "></option>
                                            @foreach ($kelompok_tanamans as $kelompok_tanaman)
                                                <option value="{{ $kelompok_tanaman->id }}"
                                                    {{ old('kelompok_tanaman_id') == $kelompok_tanaman->id ? 'selected' : '' }}>
                                                    {{ $kelompok_tanaman->nama }}
                                                </option>
                                            @endforeach
                                        <select>
                                        @error('kelompok_tanaman_id')
                                            <small class="text-danger ms-3 fst-italic">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status<span class="text-danger">*</span></label>
                                        <select class="form-select @error('status')
                                        is-invalid
                                        @enderror" id="status" name="status">
                                            <option value=" "></option>
                                            <option value="Indoor" {{ old('status') == 'Indoor' ? 'selected' : '' }}>Indoor</option>
                                            <option value="Outdoor" {{ old('status') == 'Outdoor' ? 'selected' : '' }}>Outdoor</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger ms-3 fst-italic">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <img alt="" class="img-preview img-fluid d-block col-sm-4 mb-2">
                                        <label for="image" class="">Foto<span class="text-danger">*</span></label>
                                        <input class="form-control @error('status')
                                        is-invalid
                                        @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                        @error('image')
                                            <small class="text-danger pl-3">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
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
<script type="text/javascript" src="/editor/trix.umd.min.js"></script>
<script src="/assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
<script src="/assets/static/js/pages/form-element-select.js"></script>
<script>
document.addEventListener('trix-file-accept', function (e) {
    e.preventDefault();
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
@endpush
@endsection