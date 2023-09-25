@extends('template')
@section('content')
<script src="/assets/image-jquery.js"></script>
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="page-options ml-2">
        <a href="/user"><i class="material-icons btn btn-dark btn-sm">arrow_back</i></a>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit User</h5>
                        <form action="/user/{{ $user->email }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">Nama<span class="text-muted text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ old('nama', $user->nama) }}">
                                @error('nama')
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email<span class="text-muted text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password <span class="text-muted footer-text"> (kosongkan jika tidak ingin mengganti password)</span></label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        value="{{ old('password') }}">
                                    @error('password')
                                        <small class="form-text text-muted text-danger pl-3"
                                            style="font-style: italic">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                        value="{{ old('password_confirmation') }}">
                                    @error('password_confirmation')
                                        <small class="form-text text-muted text-danger pl-3"
                                            style="font-style: italic">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat<span class="text-muted text-danger">*</span></label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat', $user->alamat) }}</textarea>
                                @error('alamat')
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="no">No. Hp<span class="text-muted text-danger">* </span> <span
                                        class="text-muted footer-text"> (tidak perlu memakai +62/0)</span></label>
                                <input type="text" class="form-control" id="no" name="no"
                                    value="{{ old('no', $user->no) }}" placeholder="896xxxxxxxx">
                                @error('no')
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="instagram">Instagram<span class="text-muted text-danger">*</span> <span
                                    class="text-muted footer-text"> (tidak perlu memakai @)</span></label>
                                <input type="text" class="form-control" id="instagram" name="instagram"
                                    value="{{ old('instagram', $user->instagram) }}">
                                @error('instagram')
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="role">Role<span class="text-muted text-danger">*</span></label>
                                <select class="custom-select form-control" id="role" name="role">
                                    <option value=" ">Pilih Role User</option>
                                    <option value="1" {{ old('role', $user->role) == '1' ? 'selected' : '' }}>Manajemen User</option>
                                    <option value="2" {{ old('role', $user->role) == '2' ? 'selected' : '' }}>User</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image" class="">Foto<span class="text-muted text-danger">*</span></label>
                                <img src="{{ asset('storage/' . $user->image) }}" class="img-preview img-fluid col-sm-4 mb-2">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="image" id="image" onchange="previewImage()">
                                  <label for="image" class="custom-file-label">Choose file</label>
                                </div>
                                @error('image')
                                    <small class="text-danger pl-3">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("Selected").html(fileName);
            console.log(fileName);
        });
    </script>

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
@endsection
