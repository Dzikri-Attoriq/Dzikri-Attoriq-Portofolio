@extends('admin/template')

@push('style')
<style>

.modal.detail .modal-dialog {
    transform: translateY(100%);
    transition: transform 0.4s ease-out;
}

.modal.detail.show .modal-dialog {
    transform: translateY(0);
}
.modal .modal-body .img-modal {
    object-fit: cover;
}

.modal .judul-modal {
    color: black;
}

.card-1 {
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
    border-radius: 12px; 
    margin-bottom: 20px;
}
.card-1 .card-img-top-1 {
    object-fit: cover;
    height: 100%; 
    width: 100%;
}
.card-1 .top-title-1 {
    position: absolute;
    font-style: italic;
    right: 0;
    margin: 0;
    color: white;
}
.card-1 .card-title-1 {
    position: absolute;
    right: 0;
    color: white;
    margin: 0;
}

/* responsive */
@media (max-width: 576px) {
    .card-1 .card-img-top-1 {
        height: 250px;
    }
    .card-1 .top-title-1 {
        font-size: 6px;
        bottom: 13px;
        left: 7px;
        padding: 5px;
    }
    .card-1 .card-title-1 {
        font-size: 8px;
        bottom: 5px;
        left: 7px;
        padding: 5px;
    }
    .order-last {
        font-size: 8px;
    }
    .modal .modal-body .img-modal {
        height: 250px;
    }
    .modal .modal-body .status-modal {
        font-size: 10px;
    }
    .modal .modal-body .size-text {
        font-size: 12px;
    }
    .modal .judul-modal {
        font-size: 12px;
    }
}

@media (min-width: 576px) and (max-width: 992px) {
    .card-1 .card-img-top-1 {
        height: 250px;
    }
    .card-1 .top-title-1 {
        font-size: 9px;
        bottom: 18px;
        left: 7px;
        padding: 5px;
    }
    .card-1 .card-title-1 {
        font-size: 12px;
        bottom: 6px;
        left: 7px;
        padding: 5px;
    }
    .order-last {
        font-size: 12px;
    }
    .modal .modal-body .img-modal {
        height: 300px;
    }
    .modal .modal-body .status-modal {
        font-size: 12px;
    }
    .modal .modal-body .size-text {
        font-size: 14px;
    }
    .modal .judul-modal {
        font-size: 16px;
    }
}

@media (min-width: 992px) and (max-width: 1200px) {
    .card-1 .card-img-top-1 {
        height: 280px;
    }
    .card-1 .top-title-1 {
        font-size: 12px;
        bottom: 21px;
        left: 7px;
        padding: 5px;
    }
    .card-1 .card-title-1 {
        font-size: 15px;
        bottom: 6px;
        left: 7px;
        padding: 5px;
    }
    .order-last {
        font-size: 15px;
    }
    .modal .modal-body .img-modal {
        height: 350px;
    }
    .modal .modal-body .status-modal {
        font-size: 14px;
    }
    .modal .modal-body .size-text {
        font-size: 16px;
    }
    .modal .judul-modal {
        font-size: 18px;
    }
}

@media (min-width: 1201px) {
    .card-1 .card-img-top-1 {
        height: 300px;
    }
    .card-1 .top-title-1 {
        font-size: 15px;
        bottom: 24px;
        left: 7px;
        padding: 5px;
    }
    .card-1 .card-title-1 {
        font-size: 18px;
        bottom: 6px;
        left: 7px;
        padding: 5px;
    }
    .modal .modal-body .img-modal {
        height: 350px;
    }
    .modal .modal-body .status-modal {
        font-size: 14px;
    }
    .modal .modal-body .size-text {
        font-size: 16px;
    }
    .modal .judul-modal {
        font-size: 18px;
    }
}
</style>
@endpush

@section('content')
<section class="section-1">
    <div class="page-heading">
        <h5>User</h5>
        <a href="/user/create" class="btn btn-primary btn-sm" title="Tambah">
            <i class="fas fa-plus"></i>
        </a>
    </div> 
    <div class="cards-wrapper-1">
        <div class="row">
            @foreach ($users as $user)
            
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card-1">
                    <img src="{{ asset('storage/' . $user->image) }}" class="card-img-top-1" alt="Tree">
                    <p class="card-title-1">{{ $user->nama }}</p>
                    <small class="top-title-1">{{ $user->email }}</small>
                    <div class="card-title-1 text-end">
                        <a href="" class="btn btn-light btn-sm" id="set_dtl"
                            data-bs-toggle="modal" data-bs-target="#detail-user"
                            data-nama        ="{{ $user->nama }}"
                            data-email       ="{{ $user->email }}"
                            data-alamat      ="{{ $user->alamat }}"
                            data-no          ="{{ $user->no }}"
                            data-instagram   ="{{ $user->instagram }}"
                            data-image       ="{{ $user->image }}"
                            >
                                <i class="fa fa-eye"></i> 
                        </a>
                        <a href="/user/{{ $user->email }}/edit"
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-edit" title="Edit"></i>
                        </a>
                        <form action="/user/{{ $user->email }}" method="POST"
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
            @endforeach
        </div>
    </div>
  </section>

  <div class="modal fade detail" id="detail-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="judul-modal" id="exampleModalLabel">Detail User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-lg-6 col-md-12 d-flex justify-content-center">
                <img src="" class="img-fluid img-modal" id="image-modal" alt="Gambar User">
              </div>
              <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center">
                <table class="size-text table" >
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><span id="nama"></span></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><span id="email"></span></td>
                    </tr>
                    <tr>
                        <td>alamat</td>
                        <td>:</td>
                        <td><span id="alamat"></span></td>
                    </tr>
                    <tr>
                        <td>no</td>
                        <td>:</td>
                        <td><span id="no"></span></td>
                    </tr>
                    <tr>
                        <td>instagram</td>
                        <td>:</td>
                        <td><span id="instagram"></span></td>
                    </tr>
                </table>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

@push('script')
<script>
$(document).ready(function() {
    $(document).on('click', '#set_dtl', function() {
        var nama = $(this).data('nama');
        var email = $(this).data('email');
        var alamat = $(this).data('alamat');
        var no = $(this).data('no');
        var instagram = $(this).data('instagram'); //menyesuaikan dengan yang di data-('nama')
        var image = $(this).data('image');

        $('#nama').text(nama);
        $('#email').text(email);
        $('#alamat').text(alamat);
        $('#no').text(no);
        $('#instagram').text(instagram);
        $('#image-modal').attr('src', "{{ asset('storage/') }}/" + image);;
    })
})
</script>
@endpush
  
@endsection