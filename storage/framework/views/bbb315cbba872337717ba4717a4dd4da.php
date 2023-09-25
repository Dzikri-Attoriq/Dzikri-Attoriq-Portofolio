
<?php $__env->startSection('content'); ?>
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Kelompok Tanaman</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="page-options ml-2">
        <a href="/kelompok-tanaman"><i class="material-icons btn btn-dark btn-sm">arrow_back</i></a>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Data Kelompok Tanaman</h5>
                        <form action="/kelompok-tanaman/<?php echo e($kelompok_tanaman->nama); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                                <label for="nama">Kelompok Tanaman<span class="text-muted text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="<?php echo e(old('nama', $kelompok_tanaman->nama)); ?>">
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
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\App-pohon-DLH\resources\views/kelompok_tanaman/edit.blade.php ENDPATH**/ ?>