@extends('admin.template')

@push('style')
<style>
.card .img-fluid {
    object-fit: cover;
}

/* responsive */
@media (max-width: 576px) {
    .card .img-fluid {
       height: 230px;
    }
    .card .card-body .card-text {
        font-size: 12px;
    }
    .card .card-body .text-end {
        font-size: 12px;
    }
}

@media (min-width: 576px) and (max-width: 992px) {
    .card .img-fluid {
       height: 250px;
    }
    .card .card-body .card-text {
        font-size: 14px;
    }
    .card .card-body .text-end {
        font-size: 14px;
    }
}

@media (min-width: 992px) and (max-width: 1200px) {
    .card .img-fluid {
       height: 280px;
    }
    .card .card-body .card-text {
        font-size: 16px;
    }
    .card .card-body .text-end {
        font-size: 16px;
    }
}

@media (min-width: 1201px) {
    .card .img-fluid {
       height: 300px;
    }
    .card .card-body .card-text {
        font-size: 16px;
    }
    .card .card-body .text-end {
        font-size: 16px;
    }
}
</style>
@endpush

@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class=" col-md-4 d-flex justify-content-center align-items-center">
      <img src="{{ asset('storage/' . Auth::user()->image) }}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8 d-flex justify-content-center align-items-center">
      <div class="card-body">
            <table class="table card-text">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ Auth::user()->nama }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ Auth::user()->email }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ Auth::user()->alamat }}</td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td>:</td>
                    <td>{{ Auth::user()->no }}</td>
                </tr>
                <tr>
                    <td>Instagram</td>
                    <td>:</td>
                    <td>{{ Auth::user()->instagram }}</td>
                </tr>
            </table>
            <div class="text-end">
                <a href="/profile-admin/edit" class="btn btn-primary btn-sm">
                    <i class="fas fa-edit" title="Edit"></i> Update
                </a>
            </div>
      </div>
    </div>
  </div>
</div>
@endsection