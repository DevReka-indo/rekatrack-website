<?php $__env->startSection('title', 'Tambah Unit - RekaTrack'); ?>
<?php ($pageName = 'Tambah Data Unit'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card border-0 shadow-sm">
      <div class="card-header">
        <h4 class="card-title mb-0">Tambah Unit Baru</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="<?php echo e(route('units.store')); ?>">
          <?php echo csrf_field(); ?>

          <div class="mb-3">
            <label for="name" class="form-label">Nama Unit <span class="text-danger">*</span></label>
            <input
              type="text"
              name="name"
              id="name"
              value="<?php echo e(old('name')); ?>"
              class="form-control"
              placeholder="Contoh: PC"
              required
            />
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="d-flex justify-content-end gap-2">
            <a href="<?php echo e(route('units.index')); ?>" class="btn btn-secondary">
              <i class="fas fa-arrow-left me-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-save me-1"></i> Simpan Unit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/server/Reka/current-rekatrack/current/resources/views/General/units-add.blade.php ENDPATH**/ ?>