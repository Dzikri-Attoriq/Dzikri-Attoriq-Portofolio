@extends('template')

@section('content')
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Kelompok Tanaman</a></li>
            </ol>
        </nav>
    </div>
    <div class="page-options ml-2">
        <a href="/kelompok-tanaman/create" class="btn btn-primary btn-sm" title="Tambah"><i class="fas fa-plus"></i></a>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Kelompok Tanaman</h5>
                        <table class="table table-bordered">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th scope="col" width="1%">#</th>
                                    <th scope="col">Kelompok Tanaman</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelompok_tanamans as $kelompok_tanaman)
                                    <tr>
                                        <th scope="row">
                                            {{ $loop->iteration + ($kelompok_tanamans->currentPage() - 1) * ($kelompok_tanamans->perPage()) }}
                                        </th>
                                        <th scope="row">
                                            {{ $kelompok_tanaman->nama }}
                                            @if ($kelompok_tanaman->jenis_pohon != '')
                                                <ol>
                                                    @foreach ($kelompok_tanaman->jenis_pohon as $item)
                                                        <li>{{ $item->nama }}</li>
                                                    @endforeach
                                                </ol>
                                            @endif
                                        </th>
                                        <td>
                                            <center>
                                                <a href="/kelompok-tanaman/{{ $kelompok_tanaman->nama }}/edit"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit" title="Edit"></i>
                                                </a>
                                                <form action="/kelompok-tanaman/{{ $kelompok_tanaman->nama }}" method="POST"
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
                        <div class="">{{ $kelompok_tanamans->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
