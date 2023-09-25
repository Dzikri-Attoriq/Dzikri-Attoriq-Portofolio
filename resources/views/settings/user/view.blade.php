@extends('template')

@section('content')
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">User</a></li>
            </ol>
        </nav>
    </div>
    <div class="page-options ml-2">
        <a href="/user/create" class="btn btn-primary btn-sm" title="Tambah"><i class="fas fa-plus"></i></a>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User</h5>
                        <table class="table table-bordered">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th scope="col" width="1%">#</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No. HP</th>
                                    <th scope="col">Instagram</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">
                                            {{ $loop->iteration + ($users->currentPage() - 1) * ($users->perPage()) }}
                                        </th>
                                        <th>
                                            <img src="{{ asset('storage/' . $user->image) }}" class="card-img-top img-fluid" style="width:50px; height:50px;" alt="...">
                                        </th>
                                        <th scope="row">{{ $user->nama }}</th>
                                        <th scope="row">{{ $user->email }}</th>
                                        <th scope="row">{{ $user->alamat }}</th>
                                        <th scope="row">{{ $user->no }}</th>
                                        <th scope="row">{{ $user->instagram }}</th>
                                        <th scope="row">{{ $user->role == '1' ? 'Manajemen User' : 'User' }}</th>
                                        <td>
                                            <center>
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
                                            </center>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="">{{ $users->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
