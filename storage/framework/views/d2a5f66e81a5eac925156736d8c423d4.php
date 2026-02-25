<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title><?php echo $__env->yieldContent('title', 'RekaTrack'); ?></title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?php echo e(asset('images/logo/logo-rekatrack.png')); ?>">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <!-- Fonts and icons (mengikuti Kaiadmin) -->
  <script src="<?php echo e(asset('assets/js/plugin/webfont/webfont.min.js')); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    WebFont.load({
      google: { families: ["Public Sans:300,400,500,600,700"] },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["<?php echo e(asset('assets/css/fonts.min.css')); ?>"],
      },
      active: function () {
        sessionStorage.fonts = true;
      },
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins.min.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/kaiadmin.min.css')); ?>" />
  


  <!-- Custom CSS (jika ada tambahan di masa depan) -->
  <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <?php echo $__env->make('Template.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Main Panel -->
    <div class="main-panel">
      <!-- Main Header -->
      <?php echo $__env->make('Template.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

      <!-- Page Content -->
      <div class="container">
        <div class="page-inner">
          <!-- Judul Halaman (opsional) -->
          <?php if(isset($pageName) || (isset($breadcrumbs) && count($breadcrumbs) > 1)): ?>
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              <div>
                <?php if(isset($pageName)): ?>
                  <h3 class="fw-bold mb-3"><?php echo e($pageName); ?></h3>
                <?php endif; ?>
                <!-- Breadcrumb opsional (jika butuh multi-level) -->
                <?php if(isset($breadcrumbs)): ?>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($loop->last): ?>
                          <li class="breadcrumb-item active" aria-current="page"><?php echo e($breadcrumb['label']); ?></li>
                        <?php else: ?>
                          <li class="breadcrumb-item">
                            <a href="<?php echo e($breadcrumb['url']); ?>" class="text-decoration-none"><?php echo e($breadcrumb['label']); ?></a>
                          </li>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                  </nav>
                <?php endif; ?>
              </div>
              <!-- Area tombol aksi (opsional per halaman) -->
              <?php if (! empty(trim($__env->yieldContent('page-actions')))): ?>
                <div class="ms-md-auto py-2 py-md-0">
                  <?php echo $__env->yieldContent('page-actions'); ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endif; ?>

          <!-- Alert -->
          <?php echo $__env->make('partials.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

          <!-- Konten Utama -->
          <?php echo $__env->yieldContent('content'); ?>
        </div>
      </div>

      <!-- Footer -->
      <footer class="footer">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <div class="container-fluid d-flex justify-content-between">
          <div class="copyright">
            &copy; <?php echo e(date('Y')); ?> RekaTrack by <b>TI Rekaindo</b>. All rights reserved.
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!-- Modal -->
  <?php echo $__env->yieldPushContent('modals'); ?>

  <!-- Delete Form (global) -->
  <form id="deleteForm" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
  </form>

  <!-- Core JS Files -->
  <script src="<?php echo e(asset('assets/js/core/jquery-3.7.1.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/core/popper.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/core/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/kaiadmin.min.js')); ?>"></script>

  <!-- Custom JS -->
  <script>
    // Sidebar toggle mobile
    document.querySelector('[data-bs-toggle="sidebar"]')?.addEventListener('click', function () {
      document.querySelector('.sidebar').classList.toggle('toggled');
    });

    // Global delete confirmation (opsional)
    window.deleteItem = function (url) {
      if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        const form = document.getElementById('deleteForm');
        form.action = url;
        form.submit();
      }
    };
  </script>

  <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /home/server/Reka/current-rekatrack/current/resources/views/layouts/app.blade.php ENDPATH**/ ?>