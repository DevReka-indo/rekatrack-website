<?php $__env->startSection('title', 'Manajemen Pengguna - RekaTrack'); ?>
<?php ($pageName = 'Manajemen Pengguna'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title mb-0">Daftar Pengguna</h4>
        <a href="<?php echo e(route('users.add')); ?>" class="btn btn-primary btn-round">
          <i class="fas fa-plus me-1"></i> Tambah Pengguna
        </a>
      </div>
      <div class="card-body">
        <!-- Pencarian -->
        <div class="row mb-4">
          <div class="col-md-6">
            <form action="<?php echo e(route('users.index')); ?>" method="GET" class="d-flex">
              <input
                type="text"
                name="search"
                value="<?php echo e(request('search')); ?>"
                class="form-control"
                placeholder="Cari pengguna (nama, email, NIP...)"
              />
              <button type="submit" class="btn btn-outline-secondary ms-2">
                <i class="fas fa-search"></i>
              </button>
            </form>
          </div>
        </div>

        <!-- Tabel -->
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th>NIP</th>
                <th>Nama Pengguna</th>
                <th>Email</th>
                <th>Telepon</th>
                <th width="15%">Role</th>
                <th class="text-center" width="15%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                  <td><?php echo e($users->firstItem() + $index); ?></td>
                  <td><?php echo e($user->nip ?? '-'); ?></td>
                  <td><?php echo e($user->name); ?></td>
                  <td><?php echo e($user->email); ?></td>
                  <td><?php echo e($user->phone_number ?? '-'); ?></td>
                  <td>
                    <?php if($user->role): ?>
                      <span class="badge badge-info"><?php echo e($user->role->name); ?></span>
                    <?php else: ?>
                      <span class="text-muted">-</span>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <div class="form-button-action">
                      <a
                        href="<?php echo e(route('users.edit', $user->id)); ?>"
                        class="btn btn-link btn-secondary btn-lg"
                        title="Edit"
                      >
                        <i class="fas fa-edit"></i>
                      </a>
                      <form
                        action="<?php echo e(route('users.destroy', $user->id)); ?>"
                        method="POST"
                        class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus pengguna \"<?php echo e($user->name); ?>\"?')"
                      >
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-link btn-danger btn-lg" title="Hapus">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                  <td colspan="7" class="text-center py-4 text-muted">
                    <i class="fas fa-users fs-2 d-block mb-2"></i>
                    Tidak ada pengguna ditemukan
                  </td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

      <?php if($users->hasPages()): ?>
        <div class="card-footer d-flex justify-content-between align-items-center">
          <small class="text-muted">
            Menampilkan <?php echo e($users->firstItem()); ?>–<?php echo e($users->lastItem()); ?> dari <?php echo e($users->total()); ?> data
          </small>
          <nav aria-label="Navigasi halaman">
            <?php echo e($users->onEachSide(1)->links('pagination::bootstrap-5')); ?>

          </nav>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/server/Reka/current-rekatrack/current/resources/views/General/users.blade.php ENDPATH**/ ?>