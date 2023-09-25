

<?php $__env->startSection('content'); ?>
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Status Kawasan</a></li>
            </ol>
        </nav>
    </div>
    <div class="page-options ml-2">
        <a href="/status-kawasan/create" class="btn btn-primary btn-sm" title="Tambah"><i class="fas fa-plus"></i></a>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Status Kawasan</h5>
                        <table class="table table-bordered">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th scope="col" width="1%">#</th>
                                    <th scope="col">Status Kawasan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $status_kawasans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_kawasan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo e($loop->iteration + ($status_kawasans->currentPage() - 1) * ($status_kawasans->perPage())); ?>

                                        </th>
                                        <th scope="row"><?php echo e($status_kawasan->nama); ?></th>
                                        <td>
                                            <center>
                                                <a href="/status-kawasan/<?php echo e($status_kawasan->nama); ?>/edit"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit" title="Edit"></i>
                                                </a>
                                                <form action="/status-kawasan/<?php echo e($status_kawasan->nama); ?>" method="POST"
                                                    class="d-inline">
                                                    <?php echo method_field('delete'); ?>
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn border-0 btn-danger btn-sm"
                                                        title="Hapus" id="btn-delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </center>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class=""><?php echo e($status_kawasans->links()); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\App-pohon-DLH\resources\views/status_kawasan/view.blade.php ENDPATH**/ ?>