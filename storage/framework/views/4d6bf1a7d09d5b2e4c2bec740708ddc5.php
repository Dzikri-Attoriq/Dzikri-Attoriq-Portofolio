
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="/assets/map/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>
<style>
    #map { height: 350px; }
</style>
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Data Pohon</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="page-options ml-2">
        <a href="/data-pohon"><i class="material-icons btn btn-dark btn-sm">arrow_back</i></a>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Data Pohon</h5>
                        <form action="/data-pohon/<?php echo e($data_pohon->kode_pohon); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                                <label for="jenis_pohon_id">Jenis Pohon<span class="text-muted text-danger">*</span></label>
                                <select class="tom-select" placeholder="Pilih Jenis Pohon" id="jenis_pohon_id"
                                    name="jenis_pohon_id">
                                    <option value="">Pilih Jenis Pohon</option>
                                    <?php $__currentLoopData = $jenis_pohons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis_pohon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($jenis_pohon->id); ?>"
                                            <?php echo e(old('jenis_pohon_id', $data_pohon->jenis_pohon_id) == $jenis_pohon->id ? 'selected' : ''); ?>>
                                            <?php echo e($jenis_pohon->nama); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['jenis_pohon_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="kawasan_id">Kawasan<span class="text-muted text-danger">*</span></label>
                                <select class="tom-select-2" placeholder="Pilih Kawasan" id="kawasan_id"
                                    name="kawasan_id">
                                    <option value="">Pilih Kawasan</option>
                                    <?php $__currentLoopData = $kawasans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kawasan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($kawasan->id); ?>"
                                            <?php echo e(old('kawasan_id', $data_pohon->kawasan_id) == $kawasan->id ? 'selected' : ''); ?>>
                                            <?php echo e($kawasan->nama); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['kawasan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="status_kawasan_id">Status Kawasan<span class="text-muted text-danger">*</span></label>
                                <select class="tom-select-3" placeholder="Pilih Status Kawasan" id="status_kawasan_id"
                                    name="status_kawasan_id">
                                    <option value="">Pilih Status Kawasan</option>
                                    <?php $__currentLoopData = $status_kawasans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_kawasan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($status_kawasan->id); ?>"
                                            <?php echo e(old('status_kawasan_id', $data_pohon->status_kawasan_id) == $status_kawasan->id ? 'selected' : ''); ?>>
                                            <?php echo e($status_kawasan->nama); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['status_kawasan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="umur_pohon">Umur Pohon<span class="text-muted text-danger">* </span></label>
                                <input type="number" class="form-control" id="umur_pohon" name="umur_pohon"
                                    value="<?php echo e(old('umur_pohon', $data_pohon->umur_pohon)); ?>" placeholder="">
                                <?php $__errorArgs = ['umur_pohon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="pengelola_id">Pengelola<span class="text-muted text-danger">*</span></label>
                                <select class="tom-select-4" placeholder="Pilih Pengelola" id="pengelola_id"
                                    name="pengelola_id">
                                    <option value="">Pilih Pengelola</option>
                                    <?php $__currentLoopData = $pengelolas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengelola): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($pengelola->id); ?>"
                                            <?php echo e(old('pengelola_id', $data_pohon->pengelola_id) == $pengelola->id ? 'selected' : ''); ?>>
                                            <?php echo e($pengelola->nama); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['pengelola_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="koordinat">Koordinat<span class="text-muted text-danger">* </span></label>
                                <input type="text" class="form-control" id="koordinat" name="koordinat"
                                    value="<?php echo e(old('koordinat', $data_pohon->koordinat)); ?>" placeholder="">
                                <?php $__errorArgs = ['koordinat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="form-text text-muted text-danger pl-3"
                                        style="font-style: italic"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div id="map" class="mb-3"></div>

                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/map/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <script src="/my/tom-select.complete.min.js"></script>

    <script>
        // Ambil koordinat dari database dan simpan dalam variabel JavaScript
        var koordinat = <?php echo json_encode($data_pohon->koordinat); ?>;

        const map = L.map('map').setView([-0.4920409, 117.1355364], 19);

        // map
        L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 21,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);

        // custom marker
        var greenIcon = L.icon({
            iconUrl: '/assets/map/marker.png',
            iconSize:     [32, 50], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
        
        // Membuat marker pada peta menggunakan koordinat dari database
        if (koordinat) {
            var coordinates = koordinat.split(', '); // Pisahkan koordinat menjadi latitude dan longitude
            var latitude = parseFloat(coordinates[0]);
            var longitude = parseFloat(coordinates[1]);
            
            // custom marker
            var redIcon = L.icon({
                iconUrl: '/assets/map/marker-edit.png',
                iconSize:     [32, 50], // size of the icon
                shadowSize:   [50, 64], // size of the shadow
                iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                shadowAnchor: [4, 62],  // the same for the shadow
                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });
            // Buat marker dan tambahkan ke peta
            let marker = L.marker([latitude, longitude], { icon: redIcon }).addTo(map);
            
            // Tampilkan popup jika perlu
            marker.bindPopup("Koordinat : " + latitude + ", " + longitude).openPopup();
        }

        marker = {};
        map.on('click', function(e) {
            // alert(e.latlng);
            let latitude = e.latlng.lat.toString().substring(0, 15);
            let longitude = e.latlng.lng.toString().substring(0, 15);

            if(marker != undefined) {
                map.removeLayer(marker);
            }
            var popup = L.popup()
                .setLatLng([latitude, longitude])
                .setContent("Koordinat : " + latitude + ", " + longitude)
                .openOn(map);
            marker = L.marker([latitude, longitude], {icon: greenIcon}).addTo(map);

            // Mengisi input koordinat dengan nilai latitude dan longitude
            document.getElementById('koordinat').value = latitude + ", " + longitude;
        })

    </script>

    <script>
        new TomSelect(".tom-select", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
        new TomSelect(".tom-select-2", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
        new TomSelect(".tom-select-3", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
        new TomSelect(".tom-select-4", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\App-pohon-DLH\resources\views/master_data/data_pohon/edit.blade.php ENDPATH**/ ?>