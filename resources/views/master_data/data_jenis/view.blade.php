@extends('template')

@section('content')
<script src="/assets/image-jquery.js"></script>
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Data Jenis Pohon</a></li>
            </ol>
        </nav>
    </div>
    <div class="page-options ml-2">
        <a href="/data-jenis/create" class="btn btn-primary btn-sm" title="Tambah"><i class="fas fa-plus"></i></a>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Jenis Pohon</h5>
                        <div class="row">
                            @foreach ($jenis_pohons as $jenis_pohon)
                            <div class="card col-md-4" style="width: 18rem;">
                                <img src="{{ asset('storage/' . $jenis_pohon->image) }}" class="card-img-top img-fluid" style="height: 230px" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">{{ $jenis_pohon->nama }}</h5>
                                  <a href="" class="btn btn-default btn-xs" id="set_dtl"
                                        data-toggle="modal" data-target="#detailJenisPohon"
                                        data-nama       ="<?= $jenis_pohon->nama ?>"
                                        data-deskripsi  ="<?= $jenis_pohon->deskripsi ?>"
                                        data-kelompok_tanaman_id ="<?= $jenis_pohon->kelompok_tanaman->nama ?>"
                                        data-image ="<?= $jenis_pohon->image ?>"
                                        >
                                            <i class="fa  fa-eye"></i> 
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
                            @endforeach
                        </div>
                        <div class="">{{ $jenis_pohons->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="modal fade" id="detailJenisPohon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Jenis Pohon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Isi modal -->
                    <img src="" alt="Gambar Barang" class="img-fluid" id="image-modal">
                    <h5 id="nama"></h5>
                    <span id="kelompok_tanaman_id"></span>
                    <p id="deskripsi">.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#set_dtl', function() {
                var nama = $(this).data('nama');
                var deskripsi = $(this).data('deskripsi'); //menyesuaikan dengan yang di data-('nama')
                var kelompok_tanaman_id = $(this).data('kelompok_tanaman_id');
                var image = $(this).data('image');
    
                $('#nama').text(nama);
                $('#deskripsi').text(deskripsi);
                $('#kelompok_tanaman_id').text(kelompok_tanaman_id);
                $('#image-modal').attr('src', "{{ asset('storage/') }}/" + image);;
            })
        })
    </script>
@endsection
