@extends('admin/template')

@push('style')
<style>
.container .card h4 {
    font-weight: normal;
}
.container .card th {
    font-weight: normal;
}
.container .card td {
    font-weight: 300;
}

/* responsive */
@media (max-width: 560px) {
    .container .card h4 {
        font-size: 14px;
    }
    .container .card th {
        font-size: 12px;
    }
    .container .card td {
        font-size: 12px;
    }
}

@media (min-width: 561px) and (max-width: 992px) {
    .container .card h4 {
        font-size: 16px;
    }
    .container .card th {
        font-size: 14px;
    }
    .container .card td {
        font-size: 14px;
    }
}

@media (min-width: 992px) and (max-width: 1200px) {
    .container .card h4 {
        font-size: 18px;
    }
    .container .card th {
        font-size: 16px;
    }
    .container .card td {
        font-size: 14px;
    }
}

@media (min-width: 1201px) {
    .container .card h4 {
        font-size: 18px;
    }
    .container .card th {
        font-size: 16px;
    }
    .container .card td {
        font-size: 14px;
    }
}
</style>
@endpush

@section('content')
    <!-- Hoverable rows start -->
    <section class="container">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kelompok Tanaman</h4>
                    </div>
                    <div class="card-content">
                        <div style="margin-left: 8px;">
                            <a href="/kelompok-tanaman/create" class="btn btn-primary btn-sm" title="Tambah">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelompok Tanaman</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kelompok_tanamans as $kelompok_tanaman)
                                    <tr>
                                        <td scope="row">
                                            {{ $loop->iteration + ($kelompok_tanamans->currentPage() - 1) * ($kelompok_tanamans->perPage()) }}
                                        </td>
                                        <td scope="row">
                                            {{ $kelompok_tanaman->nama }}
                                        </td>
                                        <td>
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
                                        </td>
                                    </tr>
                                @endforeach    
                                </tbody>
                            </table>
                            <div class="mt-2 p-2">{{ $kelompok_tanamans->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection