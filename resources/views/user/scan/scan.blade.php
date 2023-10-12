@extends('user/template')

@push('style')

<style>
.modal.scan-barcode .modal-dialog {
    transform: translateY(100%);
    transition: transform 0.4s ease-out;
  }

  .modal.scan-barcode.show .modal-dialog {
    transform: translateY(0);
  }
.scan-barcode .modal-header {
    border-bottom: none; 
}

/* responsive */
@media (max-width: 560px) {
    .section-2 video {
        width: 100%;
        height: 400px;
    }
}

@media (min-width: 561px) and (max-width: 992px) {
    .section-2 video {
        width: 100%;
        height: 420px;
    }
}

@media (min-width: 992px) and (max-width: 1200px) {
    .section-2 video {
        width: 100%;
        height: 430px;
    }
}

@media (min-width: 1201px) {
    .section-2 video {
        width: 100%;
        height: 500px;
    }
}

</style>
<link rel="stylesheet" href="/assets/css/dashboard/footer.css">
@endpush

@section('content')
<div class="konten">
    <section class="section-1 mb-3">
        <a href="javascript:void(0);" onclick="redirectBack();">
            <i class="bi bi-chevron-left"></i>
        </a>
    </section>
    <section class="section-2">
        <input type="hidden" name="result" id="result">
            <div id="reader">
                <video src=""></video>
            </div>
    </section>
</div>

@push('footer')
  <footer class="bg-white text-white">
    <div class="container">
        <div class="row">
            <div class="col-4 text-center">
                <a href="/">
                    <i class="icon bi bi-house"></i>
                    <p>Home</p>
                </a>
            </div>
            <div class="col-4 text-center">
                <div class="footer-circle-content">
                    <a href="/user-dashboard">
                        <i class="circle-icon bi bi-plus"></i>
                    </a>
                </div>
            </div>
            <div class="col-4 text-center">
                <a href="/pilih-profil-pohon">
                    <i class="icon bi bi-tree"></i> 
                    <p>Profil Pohon</p>
                </a>
            </div>
        </div>
    </div>
</footer>
@endpush
@endsection

@push('script')
<script src="/assets/js/html5-qrcode.min.js" type="text/javascript"></script>
<script src="/assets/js/ajax_jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // $('#result').val('test');
    function onScanSuccess(decodedText, decodedResult) {
        // alert(decodedText);
        $('#result').val(decodedText);
        let id = decodedText;                
        html5QrcodeScanner.clear().then(_ => {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('validasi') }}",
                type: 'POST',            
                data: {
                    _methode : "POST",
                    _token: CSRF_TOKEN, 
                    qr_code : id
                },            
                success: function (response) { 
                    console.log(response);
                    if(response.status == 200){
                        alert('berhasil');
                    }else{
                        alert('gagal');
                    }
                    
                }
            });   
        }).catch(error => {
            alert('something wrong');
        });
    }

    function onScanFailure(error) {
    
    }

    let config = {
        fps: 10,
        qrbox: {width: 220, height: 220},
        rememberLastUsedCamera: false,
        // Only support camera scan type.
        supportedScanTypes: [
            Html5QrcodeScanType.SCAN_TYPE_CAMERA,
            Html5QrcodeScanType.SCAN_TYPE_FILE]
    };

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", config, /* verbose= */ false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>

<script>
    function redirectBack() {
        window.history.back();
    }
</script>

@endpush