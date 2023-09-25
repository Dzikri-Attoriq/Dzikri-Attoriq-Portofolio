@extends('template')

@section('content')
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Data Pengelola</a></li>
            </ol>
        </nav>
    </div>
    <div class="page-options ml-2">
        <a href="/data-pengelola/create" class="btn btn-primary btn-sm" title="Tambah"><i class="fas fa-plus"></i></a>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Pengelola</h5>
                        <table class="table table-bordered">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th scope="col" width="1%">#</th>
                                    <th scope="col">Nama Pengelola</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_pengelolas as $data_pengelola)
                                    <tr>
                                        <th scope="row">
                                            {{ $loop->iteration + ($data_pengelolas->currentPage() - 1) * ($data_pengelolas->perPage()) }}
                                        </th>
                                        <th scope="row">{{ $data_pengelola->nama }}</th>
                                        <td>
                                            <center>
                                                <a href="/data-pengelola/{{ $data_pengelola->nama }}/edit"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit" title="Edit"></i>
                                                </a>
                                                <form action="/data-pengelola/{{ $data_pengelola->nama }}" method="POST"
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
                        <div class="">{{ $data_pengelolas->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
