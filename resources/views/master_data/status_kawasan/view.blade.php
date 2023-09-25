@extends('template')

@section('content')
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Status Kawasan</a></li>
            </ol>
        </nav>
    </div>
    <div class="page-options ml-2">
        <a href="/status-kawasan/create" class="btn btn-primary btn-sm" title="Tambah"><i class="fas fa-plus"></i></a>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Status Kawasan</h5>
                        <table class="table table-bordered">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th scope="col" width="1%">#</th>
                                    <th scope="col">Status Kawasan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($status_kawasans as $status_kawasan)
                                    <tr>
                                        <th scope="row">
                                            {{ $loop->iteration + ($status_kawasans->currentPage() - 1) * ($status_kawasans->perPage()) }}
                                        </th>
                                        <th scope="row">{{ $status_kawasan->nama }}</th>
                                        <td>
                                            <center>
                                                <a href="/status-kawasan/{{ $status_kawasan->nama }}/edit"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit" title="Edit"></i>
                                                </a>
                                                <form action="/status-kawasan/{{ $status_kawasan->nama }}" method="POST"
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
                        <div class="">{{ $status_kawasans->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
