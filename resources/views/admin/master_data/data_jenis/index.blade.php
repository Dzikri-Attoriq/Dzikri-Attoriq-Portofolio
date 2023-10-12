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
.modal .modal-body .status-modal,
.modal .modal-body .kode_pohon-modal,
.modal .modal-body .nama-modal {
    margin-bottom: 0px;
}
.modal .modal-body .deskripsi-text,
.modal .modal-body .manfaat-text {
    margin-bottom: 0px;
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
        height: 300px;
    }
    .modal .modal-body .status-modal {
        font-size: 10px;
    }
    .modal .modal-body .kode_pohon-modal,
    .modal .modal-body .nama-modal,
    .modal .modal-body .kelompok_tanaman_id-modal,
    .modal .modal-body .deskripsi-text,
    .modal .modal-body .deskripsi-modal,
    .modal .modal-body .manfaat-text,
    .modal .modal-body .manfaat-modal {
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
        height: 350px;
    }
    .modal .modal-body .status-modal {
        font-size: 12px;
    }
    .modal .modal-body .kode_pohon-modal,
    .modal .modal-body .nama-modal,
    .modal .modal-body .kelompok_tanaman_id-modal,
    .modal .modal-body .deskripsi-text,
    .modal .modal-body .deskripsi-modal,
    .modal .modal-body .manfaat-text,
    .modal .modal-body .manfaat-modal {
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
        height: 400px;
    }
    .modal .modal-body .status-modal {
        font-size: 14px;
    }
    .modal .modal-body .kode_pohon-modal,
    .modal .modal-body .nama-modal,
    .modal .modal-body .kelompok_tanaman_id-modal,
    .modal .modal-body .deskripsi-text,
    .modal .modal-body .deskripsi-modal,
    .modal .modal-body .manfaat-text,
    .modal .modal-body .manfaat-modal {
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
        height: 400px;
    }
    .modal .modal-body .status-modal {
        font-size: 14px;
    }
    .modal .modal-body .kode_pohon-modal,
    .modal .modal-body .nama-modal,
    .modal .modal-body .kelompok_tanaman_id-modal,
    .modal .modal-body .deskripsi-text,
    .modal .modal-body .deskripsi-modal,
    .modal .modal-body .manfaat-text,
    .modal .modal-body .manfaat-modal {
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
        <h5>Jenis Pohon</h5>
        <a href="/data-jenis/create" class="btn btn-primary btn-sm" title="Tambah">
            <i class="fas fa-plus"></i>
        </a>
    </div> 
    <div class="cards-wrapper-1">
        <div class="row">
            @foreach ($jenis_pohons as $jenis_pohon)
            
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card-1">
                    <img src="{{ asset('storage/' . $jenis_pohon->image) }}" class="card-img-top-1" alt="Tree">
                    <small class="top-title-1">{{ $jenis_pohon->status }}</small>
                    <p class="card-title-1">{{ $jenis_pohon->nama }}</p>
                    <div class="card-title-1 text-end">
                        <a href="" class="btn btn-light btn-sm" id="set_dtl"
                            data-bs-toggle="modal" data-bs-target="#detail-pohon"
                            data-kode_pohon          ="{{ $jenis_pohon->kode_pohon }}"
                            data-nama                ="{{ $jenis_pohon->nama }}"
                            data-deskripsi           ="{!! $jenis_pohon->deskripsi !!}"
                            data-kelompok_tanaman_id ="{{ $jenis_pohon->kelompok_tanaman->nama }}"
                            data-manfaat             ="{!! $jenis_pohon->manfaat !!}"
                            data-status              ="{{ $jenis_pohon->status }}"
                            data-image               ="{{ $jenis_pohon->image }}"
                            >
                                <i class="fa fa-eye"></i> 
                        </a>
                        <a href="/data-jenis/{{ $jenis_pohon->nama }}/edit"
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-edit" title="Edit"></i>
                        </a>
                        <form action="/data-jenis/{{ $jenis_pohon->nama }}" method="POST"
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

  <div class="modal fade detail" id="detail-pohon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="judul-modal" id="exampleModalLabel">Detail Pohon</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
              <img src="" class="img-fluid img-modal" id="image-modal" alt="Gambar Pohon">
              <p class="status-modal fst-italic"><small id="status"></small></p>
              <p id="nama" class="nama-modal"></p>
              <p class="kode_pohon-modal"><small>Kode Pohon : </small><small id="kode_pohon"></small></p>
              <p class="kelompok_tanaman_id-modal"><small>Kelompok Tanaman : </small><small id="kelompok_tanaman_id"></small></p>
              <p class="deskripsi-text">Deskripsi :</p>
              <p id="deskripsi" class="deskripsi-modal"></p>
              <p class="manfaat-text">Manfaat :</p>
              <p id="manfaat" class="manfaat-modal"></p>
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
        var kode_pohon = $(this).data('kode_pohon');
        var nama = $(this).data('nama');
        var deskripsi = $(this).data('deskripsi'); //menyesuaikan dengan yang di data-('nama')
        var kelompok_tanaman_id = $(this).data('kelompok_tanaman_id');
        var manfaat = $(this).data('manfaat');
        var status = $(this).data('status');
        var image = $(this).data('image');

        $('#kode_pohon').text(kode_pohon);
        $('#nama').text(nama);
        $('#deskripsi').html(deskripsi);
        $('#kelompok_tanaman_id').text(kelompok_tanaman_id);
        $('#manfaat').html(manfaat);
        $('#status').text(status);
        $('#image-modal').attr('src', "{{ asset('storage/') }}/" + image);;
    })
})
</script>
@endpush
  
@endsection