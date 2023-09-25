@extends('template')

@section('content')
<script src="/assets/image-jquery.js"></script>
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Data Pohon</a></li>
            </ol>
        </nav>
    </div>
    <div class="page-options ml-2">
        <a href="/data-pohon/create" class="btn btn-primary btn-sm" title="Tambah"><i class="fas fa-plus"></i></a>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Pohon</h5>
                        <table class="table table-bordered">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th scope="col" width="1%">#</th>
                                    {{-- <th scope="col">Jenis Pohon</th> --}}
                                    <th scope="col">Kawasan</th>
                                    <th scope="col">Status Kawasan</th>
                                    <th scope="col">Kode Pohon</th>
                                    <th scope="col">Umur Pohon</th>
                                    <th scope="col">Pengelola</th>
                                    <th scope="col">Koordinat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $jenisPohonSebelumnya = null;
                                @endphp
                                @foreach ($data_pohons as $data_pohon)
                                    <tr>
                                        @if ($jenisPohonSebelumnya !== $data_pohon->jenis_pohon->nama)
                                            <tr>
                                                <th colspan="8" scope="row" style="font-weight: bold">
                                                    {{ $data_pohon->jenis_pohon->nama }}
                                                </th>
                                            </tr>
                                            @php
                                                $jenisPohonSebelumnya = $data_pohon->jenis_pohon->nama;
                                            @endphp
                                        @endif
                                        <th scope="row">
                                            {{ $loop->iteration + ($data_pohons->currentPage() - 1) * ($data_pohons->perPage()) }}
                                        </th>
                                        <th scope="row">{{ $data_pohon->kawasan->nama }}</th>
                                        <th scope="row">{{ $data_pohon->status_kawasan->nama }}</th>
                                        <th scope="row">{{ $data_pohon->kode_pohon }}</th>
                                        <th scope="row">{{ $data_pohon->umur_pohon }} Tahun</th>
                                        <th scope="row">{{ $data_pohon->pengelola->nama }}</th>
                                        <th scope="row">{{ $data_pohon->koordinat }}</th>
                                        <td>
                                            <center>
                                                <a href="/data-pohon/{{ $data_pohon->kode_pohon }}/edit"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit" title="Edit"></i>
                                                </a>
                                                <form action="/data-pohon/{{ $data_pohon->kode_pohon }}" method="POST"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn border-0 btn-danger btn-sm"
                                                        title="Hapus" id="btn-delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </center>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="">{{ $data_pohons->links() }}</div>
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
