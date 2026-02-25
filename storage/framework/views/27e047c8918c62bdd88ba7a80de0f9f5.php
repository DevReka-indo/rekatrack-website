<?php $__env->startSection('title', 'Trash - Manajemen Pengiriman'); ?>
<?php ($pageName = 'Trash Pengiriman'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Trash Pengiriman</h4>
                <a href="<?php echo e(route('shippings.index')); ?>" class="btn btn-outline-secondary btn-round">
                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar
                </a>
            </div>
            <div class="card-body">
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if($trashedDocuments->isEmpty()): ?>
                    <div class="text-center py-5">
                        <i class="fas fa-recycle fs-1 d-block mb-3 text-muted"></i>
                        <p class="text-muted mb-0">Tidak ada data di trash</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor SJN</th>
                                    <th>Kepada</th>
                                    <th>Proyek</th>
                                    <th>Status</th>
                                    <th>Dihapus pada</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $trashedDocuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($trashedDocuments->firstItem() + $index); ?></td>
                                        <td><?php echo e($doc->no_travel_document ?? '-'); ?></td>
                                        <td><?php echo e($doc->send_to ?? '-'); ?></td>
                                        <td><?php echo e($doc->project ?? '-'); ?></td>
                                        <td>
                                            <?php if($doc->status == 'Belum terkirim'): ?>
                                                <span class="badge badge-warning">Belum terkirim</span>
                                            <?php elseif($doc->status == 'Sedang dikirim'): ?>
                                                <span class="badge badge-info">Sedang dikirim</span>
                                            <?php elseif($doc->status == 'Terkirim'): ?>
                                                <span class="badge badge-success">Terkirim</span>
                                            <?php else: ?>
                                                <span class="badge badge-secondary">-</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($doc->deleted_at): ?>
                                                <?php echo e($doc->deleted_at->format('d/m/Y H:i')); ?>

                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <form action="<?php echo e(route('shippings.restore', $doc->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Kembalikan data ini ke daftar utama?')">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-link btn-success" title="Kembalikan">
                                                    <i class="fas fa-undo"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <?php echo e($trashedDocuments->links('pagination::simple-bootstrap-5')); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/server/Reka/current-rekatrack/current/resources/views/General/shippings-trash.blade.php ENDPATH**/ ?>