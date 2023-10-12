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
            });
        }
    })
    .catch(error => {
        console.error('Terjadi kesalahan:', error);
    });
}