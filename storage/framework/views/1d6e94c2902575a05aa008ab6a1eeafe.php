
<?php $__env->startSection('content'); ?>
<script src="/assets/image-jquery.js"></script>
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav>
    </div>
    <div class="page-options ml-2">
        <a href="/user"><i class="material-icons btn btn-dark btn-sm">arrow_back</i></a>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah User</h5>
                        <form action="/user" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="nama">Nama<span class="text-muted text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="<?php echo e(old('nama')); ?>">
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
                                <label for="email">Email<span class="text-muted text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?php echo e(old('email')); ?>">
                                <?php $__errorArgs = ['email'];
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

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password<span class="text-muted text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        value="<?php echo e(old('password')); ?>">
                                    <?php $__errorArgs = ['password'];
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
                                <div class="form-group col-md-6">
                                    <label for="password_confirmation">Konfirmasi Password<span class="text-muted text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                        value="<?php echo e(old('password_confirmation')); ?>">
                                    <?php $__errorArgs = ['password_confirmation'];
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
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat<span class="text-muted text-danger">*</span></label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo e(old('alamat')); ?></textarea>
                                <?php $__errorArgs = ['alamat'];
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
                                <label for="no">No. Hp<span class="text-muted text-danger">* </span> <span
                                        class="text-muted footer-text"> (tidak perlu memakai +62/0)</span></label>
                                <input type="text" class="form-control" id="no" name="no"
                                    value="<?php echo e(old('no')); ?>" placeholder="896xxxxxxxx">
                                <?php $__errorArgs = ['no'];
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
                                <label for="instagram">Instagram<span class="text-muted text-danger">*</span> <span
                                    class="text-muted footer-text"> (tidak perlu memakai @)</span></label>
                                <input type="text" class="form-control" id="instagram" name="instagram"
                                    value="<?php echo e(old('instagram')); ?>">
                                <?php $__errorArgs = ['instagram'];
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
                                <label for="role">Role<span class="text-muted text-danger">*</span></label>
                                <select class="custom-select form-control" id="role" name="role">
                                    <option value=" ">Pilih Role User</option>
                                    <option value="1" <?php echo e(old('role') == '1' ? 'selected' : ''); ?>>Manajemen User</option>
                                    <option value="2" <?php echo e(old('role') == '2' ? 'selected' : ''); ?>>User</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image" class="">Foto<span class="text-muted text-danger">*</span></label>
                                <img alt="" class="img-preview img-fluid col-sm-4 mb-2">
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
                            <button type="submit" class="btn btn-primary">Tambah</button>
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

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\App-pohon-DLH\resources\views/settings/user/tambah.blade.php ENDPATH**/ ?>