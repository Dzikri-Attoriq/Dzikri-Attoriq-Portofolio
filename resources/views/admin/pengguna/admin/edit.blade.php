@extends('admin.template')
@push('style')
<style>
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
    .container .card input {
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
}

@media (min-width: 561px) and (max-width: 992px) {
    .container .card h4 {
        font-size: 16px;
    }
    .container .card label {
        font-size: 14px;
    }
    .container .card input {
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
}

@media (min-width: 992px) and (max-width: 1200px) {
    .container .card h4 {
        font-size: 18px;
    }
    .container .card label {
        font-size: 15px;
    }
    .container .card input {
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
}

@media (min-width: 1201px) {
    .container .card h4 {
        font-size: 20px;
    }
    .container .card label {
        font-size: 16px;
    }
    .container .card input {
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
                    <a href="/admin"><i class="bi bi-chevron-left p-3"></i></a>
                    <div class="card-header">
                        <h4 class="card-title">Edit Admin</h4>
                    </div>
                    
                    <div class="card-body">
                        <form action="/admin/{{ $admin->email }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nama">Nama<span class="text-danger">*</span></label>
                                        <input type="text" id="nama" name="nama" class="form-control round @error('nama')
                                        is-invalid
                                        @enderror" value="{{ old('nama', $admin->nama) }}">
                                        @error('nama')
                                            <small class="text-danger ms-3 fst-italic">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email">Email<span class="text-danger">*</span></label>
                                        <input type="text" id="email" name="email" class="form-control round @error('email')
                                        is-invalid
                                        @enderror" value="{{ old('email', $admin->email) }}">
                                        @error('email')
                                            <small class="text-danger ms-3 fst-italic">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password">Password<span class="text-muted footer-text"> (Kosongkan jika tidak ingin diganti)</span></label>
                                        <input type="password" id="password" name="password" class="form-control round @error('password')
                                        is-invalid
                                        @enderror" value="{{ old('password') }}">
                                        @error('password')
                                            <small class="text-danger ms-3 fst-italic">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Konfirmasi Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control round @error('password_confirmation')
                                        is-invalid
                                        @enderror" value="{{ old('password_confirmation') }}">
                                        @error('password_confirmation')
                                            <small class="text-danger ms-3 fst-italic">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="alamat">Alamat<span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('nama')
                                        is-invalid
                                        @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat', $admin->alamat) }}</textarea>
                                        @error('nama')
                                            <small class="text-danger ms-3 fst-italic">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="no">No. HP<span class="text-danger">*</span> <span
                                            class="text-muted footer-text"> (tidak perlu memakai +62/0)</span></label>
                                        <input type="text" id="no" name="no" class="form-control round @error('no')
                                        is-invalid
                                        @enderror" value="{{ old('no', $admin->no) }}">
                                        @error('no')
                                            <small class="text-danger ms-3 fst-italic">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="instagram">Instagram<span class="text-danger">*</span></label>
                                        <input type="text" id="instagram" name="instagram" class="form-control round @error('instagram')
                                        is-invalid
                                        @enderror" value="{{ old('instagram', $admin->instagram) }}">
                                        @error('instagram')
                                            <small class="text-danger ms-3 fst-italic">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <img src="{{ asset('storage/' . $admin->image) }}" class="img-preview img-fluid d-block col-sm-4 mb-2">
                                        <label for="image" class="">Foto</label>
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
<script>
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