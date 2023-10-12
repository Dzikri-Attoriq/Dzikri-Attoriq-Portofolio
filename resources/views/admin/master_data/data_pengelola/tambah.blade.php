@extends('admin.template')
@push('style')
<style>
.container .card h4, .container .card label {
    font-weight: normal;
}

/* responsive */
@media (max-width: 560px) {
    .container {
        height: 500px;
    }
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
    .container .card button {
        font-size: 10px;
    }
    .container .card small {
        font-size: 8px;
    }
}

@media (min-width: 561px) and (max-width: 992px) {
    .container {
        height: 500px;
    }
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
    .container .card button {
        font-size: 14px;
    }
    .container .card small {
        font-size: 12px;
    }
}

@media (min-width: 992px) and (max-width: 1200px) {
    .container {
        height: 500px;
    }
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
    .container .card button {
        font-size: 15px;
    }
    .container .card small {
        font-size: 13px;
    }
}

@media (min-width: 1201px) {
    .container {
        height: 600px;
    }
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
                    <a href="/data-pengelola"><i class="bi bi-chevron-left p-3"></i></a>
                    <div class="card-header">
                        <h4 class="card-title">Tambah Pengelola</h4>
                    </div>
                    
                    <div class="card-body">
                        <form action="/data-pengelola" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nama">Nama Pengelola<span class="text-danger">*</span></label>
                                        <input type="text" id="nama" name="nama" class="form-control round @error('nama')
                                        is-invalid
                                        @enderror" value="{{ old('nama') }}">
                                        @error('nama')
                                            <small class="text-danger ms-3 fst-italic">
                                                {{ $message }}
                                            </small>
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
@endsection