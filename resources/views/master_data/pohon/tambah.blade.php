@push('style')

<link rel="stylesheet" href="assets/extensions/choices.js/public/assets/styles/choices.css">
<style>
.modal.tambah-pohon .modal-dialog {
    transform: translateY(100%);
    transition: transform 0.4s ease-out;
  }

  .modal.tambah-pohon.show .modal-dialog {
    transform: translateY(0);
  }

.tambah-pohon {
    font-family: "Poppins", sans-serif;
    font-weight: 300;
}
.tambah-pohon .modal-header {
    border-bottom: none; 
}

/* responsive */
@media (max-width: 560px) {
    .tambah-pohon .text-header {
        font-size: 12px;
    }
    .tambah-pohon .label-size {
        font-size: 10px;
    }
    .tambah-pohon .btn-submit {
        font-size: 10px;
    }
    .tambah-pohon .text-error {
        font-size: 8px;
    }
}

@media (min-width: 561px) and (max-width: 992px) {
    .tambah-pohon .text-header {
        font-size: 14px;
    }
    .tambah-pohon .label-size {
        font-size: 12px;
    }
    .tambah-pohon .btn-submit {
        font-size: 12px;
    }
    .tambah-pohon .text-error {
        font-size: 9px;
    }
}

@media (min-width: 992px) and (max-width: 1200px) {
    .tambah-pohon .text-header {
        font-size: 16px;
    }
    .tambah-pohon .label-size {
        font-size: 14px;
    }
    .tambah-pohon .btn-submit {
        font-size: 14px;
    }
    .tambah-pohon .text-error {
        font-size: 11px;
    }
}

@media (min-width: 1201px) {
    .tambah-pohon .text-header {
        font-size: 18px;
    }
    .tambah-pohon .label-size {
        font-size: 16px;
    }
    .tambah-pohon .btn-submit {
        font-size: 16px;
    }
    .tambah-pohon .text-error {
        font-size: 12px;
    }
}
</style>
@endpush


<!-- Modal -->
<div class="modal fade tambah-pohon" id="tambah-pohon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <button type="" class="btn btn-lg" data-bs-dismiss="modal">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                </div>
                <div class="col-4 text-center text-header" style="margin-top: 10px">Tambah Data Pohon</div>
            </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form id="tambah-pohon-form" action="/data-pohon" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 mb-2">
                        <label for="jenis_pohon_id" class="label-size">Jenis Pohon</label>
                        <div class="form-group">
                            <select class="choices form-select" name="jenis_pohon_id" id="jenis_pohon_id">
                                <option value=" "></option>
                                @foreach ($jenis_pohons as $jenis_pohon)
                                    <option value="{{ $jenis_pohon->id }}"
                                        {{ old('jenis_pohon_id') == $jenis_pohon->id ? 'selected' : '' }}>
                                        {{ $jenis_pohon->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-error" id="jenis_pohon_id_error"
                                style="font-style: italic; color: red">
                            </small>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="kawasan_id" class="label-size">Kawasan</label>
                        <div class="form-group">
                            <select class="choices form-select" name="kawasan_id" id="kawasan_id">
                                <option value=" "></option>
                                @foreach ($kawasans as $kawasan)
                                    <option value="{{ $kawasan->id }}" 
                                        {{ old('kawasan_id') == $kawasan->id ? 'selected' : '' }}>
                                        {{ $kawasan->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-error" id="kawasan_id_error"
                                style="font-style: italic; color: red">
                            </small>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="status_kawasan_id" class="label-size">Status Kawasan</label>
                        <div class="form-group">
                            <select class="choices form-select" name="status_kawasan_id" id="status_kawasan_id">
                                <option value=" "></option>
                                @foreach ($status_kawasans as $status_kawasan)
                                    <option value="{{ $status_kawasan->id }}"
                                        {{ old('status_kawasan_id') == $status_kawasan->id ? 'selected' : '' }}>
                                        {{ $status_kawasan->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-error" id="status_kawasan_id_error"
                                style="font-style: italic; color: red">
                            </small>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="umur_pohon" class="label-size">Umur Pohon</label>
                        <div class="form-group">
                            <input type="number" id="umur_pohon" class="form-control"
                                name="umur_pohon">
                        </div>
                        <small class="text-error" id="umur_pohon_error"
                            style="font-style: italic; color: red">
                        </small>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="pengelola_id" class="label-size">Pengelola</label>
                        <div class="form-group">
                            <select class="choices form-select dropup" name="pengelola_id" id="pengelola_id" data-direction="ltr">
                                <option value=" "></option>
                                @foreach ($pengelolas as $pengelola)
                                    <option value="{{ $pengelola->id }}"
                                        {{ old('pengelola_id') == $pengelola->id ? 'selected' : '' }}>
                                        {{ $pengelola->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-error" id="pengelola_id_error"
                                style="font-style: italic; color: red">
                            </small>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="koordinat" class="label-size">Koordinat Pohon <span>(perkelompok tanam)</span></label>
                        <div class="form-group position-relative has-icon-right">
                            <input type="text" id="koordinat" class="form-control"
                                name="koordinat">
                            <div class="form-control-icon">
                                <i class="bi bi-eye"></i>
                            </div>
                        </div>
                        <small class="text-error" id="koordinat_error"
                            style="font-style: italic; color: red">
                        </small>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-success btn-submit" type="button" onclick="submitForm()">Submit Data</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

@push('script')
<script src="assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
<script src="assets/static/js/pages/form-element-select.js"></script>
<script>
function submitForm() {
    const form = document.querySelector('form#tambah-pohon-form'); 
    
    // Mengirimkan formulir dengan Fetch API
    fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Tambahkan token CSRF Laravel
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.errors) {
            // Tampilkan pesan kesalahan di bawah bidang yang sesuai dengan ID yang sesuai
            if (data.errors.jenis_pohon_id) {
                document.getElementById('jenis_pohon_id_error').innerHTML  = data.errors.jenis_pohon_id[0];
            }
            if (data.errors.kawasan_id) {
                document.getElementById('kawasan_id_error').innerHTML  = data.errors.kawasan_id[0];
            }
            if (data.errors.status_kawasan_id) {
                document.getElementById('status_kawasan_id_error').innerHTML  = data.errors.status_kawasan_id[0];
            }
            if (data.errors.umur_pohon) {
                document.getElementById('umur_pohon_error').innerHTML  = data.errors.umur_pohon[0];
            }
            if (data.errors.pengelola_id) {
                document.getElementById('pengelola_id_error').innerHTML  = data.errors.pengelola_id[0];
            }
            if (data.errors.koordinat) {
                document.getElementById('koordinat_error').innerHTML  = data.errors.koordinat[0];
            }
        } else {
            // Jika tidak ada kesalahan validasi, tutup modal
            $('#tambah-pohon').modal('hide');

            // Lakukan tindakan lain seperti mereset formulir
            form.reset();
            Swal.fire({
                icon: 'success',
                title: 'Succes!',
                text: data.message,
            })
        }
    })
    .catch(error => {
        console.error('Terjadi kesalahan:', error);
    });
}

</script>
    

@endpush