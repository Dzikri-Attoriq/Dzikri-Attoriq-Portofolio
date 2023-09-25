
<?php $__env->startSection('content'); ?>
<script src="/assets/image-jquery.js"></script>

    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Data Jenis Pohon</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="page-options ml-2">
        <a href="/data-jenis"><i class="material-icons btn btn-dark btn-sm">arrow_back</i></a>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Jenis Pohon</h5>
                        <form action="/data-jenis/<?php echo e($data_jenis->nama); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                                <label for="nama">Kelompok Tanaman<span class="text-muted text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="<?php echo e(old('nama', $data_jenis->nama)); ?>">
                                <?php $__errorArgs = ['nama'];
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
                                <label for="deskripsi">Deskripsi Pohon<span class="text-muted text-danger">*</span></label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?php echo e(old('deskripsi', $data_jenis->deskripsi)); ?></textarea>
                                <?php $__errorArgs = ['deskripsi'];
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
                                <label for="kelompok_tanaman_id">Kelompok Tanaman<span class="text-muted text-danger">*</span></label>
                                <select class="tom-select" placeholder="Pilih Kelompok Tanaman" id="kelompok_tanaman_id"
                                    name="kelompok_tanaman_id">
                                    <option value="">Pilih Kelompok Tanaman</option>
                                    <?php $__currentLoopData = $kelompok_tanamans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelompok_tanaman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($kelompok_tanaman->id); ?>"
                                            <?php echo e(old('kelompok_tanaman_id', $data_jenis->kelompok_tanaman_id) == $kelompok_tanaman->id ? 'selected' : ''); ?>>
                                            <?php echo e($kelompok_tanaman->nama); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['kelompok_tanaman_id'];
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
                                <label for="image" class="">Foto</label>
                                <img src="<?php echo e(asset('storage/' . $data_jenis->image)); ?>" class="img-preview img-fluid col-sm-4 mb-2">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="image" id="image" onchange="previewImage()">
                                  <label for="image" class="custom-file-label">Choose file</label>
                                </div>
                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger pl-3"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("Selected").html(fileName);
            console.log(fileName);
        });
    </script>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\App-pohon-DLH\resources\views/data_jenis/edit.blade.php ENDPATH**/ ?>