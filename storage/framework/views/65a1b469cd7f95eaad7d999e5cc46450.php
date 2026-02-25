<?php if(session('success') || session('error') || session('warning') || session('info')): ?>
  <?php
    $types = ['success', 'error', 'warning', 'info'];
    $sessionType = collect($types)->first(fn($type) => session()->has($type));
    $message = session($sessionType);
    $bootstrapType = [
      'success' => 'success',
      'error' => 'danger',
      'warning' => 'warning',
      'info' => 'info',
    ][$sessionType] ?? 'info';
  ?>

  <div class="alert alert-<?php echo e($bootstrapType); ?> alert-dismissible fade show" role="alert">
    <?php echo e($message); ?>

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<?php if($errors->any()): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Terjadi kesalahan validasi:</strong>
    <ul class="mb-0 mt-2 ps-3">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>
<?php /**PATH /home/server/Reka/current-rekatrack/current/resources/views/partials/alert/alert.blade.php ENDPATH**/ ?>