@push('style')

<link rel="stylesheet" href="assets/extensions/choices.js/public/assets/styles/choices.css">
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
    .scan-barcode .reader {
        width: 100%;
        height: 200px;
    }
}

@media (min-width: 561px) and (max-width: 992px) {
    .scan-barcode .reader {
        font-size: 18px;
    }
}

@media (min-width: 992px) and (max-width: 1200px) {
    .scan-barcode .reader {
        font-size: 18px;
    }
}

@media (min-width: 1201px) {
    .scan-barcode .reader {
        width: 100%;
    }
}

</style>
@endpush


<!-- Modal -->
<div class="modal fade scan-barcode" id="scan-barcode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            </div>
        </div>
      </div>
      <div class="modal-body">
            <input type="hidden" name="result" id="result">
            <div id="reader" style="position: relative;"></div>
      </div>
    </div>
  </div>
</div>

@push('script')
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader",
    { fps: 10, qrbox: {width: 250, height: 250} },
    /* verbose= */ false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>

@endpush