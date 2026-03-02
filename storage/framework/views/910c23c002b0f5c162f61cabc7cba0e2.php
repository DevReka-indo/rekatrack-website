<?php $__env->startSection('title', 'Manajemen Pengiriman - RekaTrack'); ?>
<?php ($pageName = 'Manajemen Pengiriman'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Stats Cards (versi Kaiadmin) -->
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-boxes"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Pengiriman</p>
                                <h4 class="card-title"><?php echo e($totalPengiriman); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-warning bubble-shadow-small">
                                <i class="fas fa-clock"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Belum Terkirim</p>
                                <h4 class="card-title"><?php echo e($totalBelumTerkirim); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Sedang Dikirim</p>
                                <h4 class="card-title"><?php echo e($totalSedangDikirim); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="fas fa-check-circle"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Terkirim</p>
                                <h4 class="card-title"><?php echo e($totalTerkirim); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Controls (SERVER SIDE via GET /shippings) -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Daftar Pengiriman</h4>
                    <div class="d-flex gap-2">
                        <a href="<?php echo e(route('shippings.add')); ?>" class="btn btn-primary btn-round">
                            <i class="fas fa-plus me-1"></i> Tambah Pengiriman
                        </a>
                        <button type="button" class="btn btn-success btn-round" data-bs-toggle="modal"
                                data-bs-target="#exportModal">
                            <i class="fas fa-file-export me-1"></i> Export
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <form method="GET" action="<?php echo e(route('shippings.index')); ?>" id="filterForm">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <select class="form-select" id="statusFilter" name="status" onchange="this.form.submit()">
                                    <option value="">Semua Status</option>
                                    <option value="Belum terkirim" <?php echo e(request('status') == 'Belum terkirim' ? 'selected' : ''); ?>>Belum Terkirim</option>
                                    <option value="Sedang dikirim" <?php echo e(request('status') == 'Sedang dikirim' ? 'selected' : ''); ?>>Sedang Dikirim</option>
                                    <option value="Terkirim" <?php echo e(request('status') == 'Terkirim' ? 'selected' : ''); ?>>Terkirim</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                
                                <input type="hidden" name="date_type" id="dateTypeInput" value="<?php echo e(request('date_type', 'document')); ?>">
                                <input type="hidden" name="start_date" id="startDateInput" value="<?php echo e(request('start_date')); ?>">
                                <input type="hidden" name="end_date" id="endDateInput" value="<?php echo e(request('end_date')); ?>">

                                <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal"
                                        data-bs-target="#dateFilterModal">
                                    <i class="fas fa-calendar-alt me-1"></i> Filter Tanggal
                                    <span id="dateFilterBadge"
                                          class="badge bg-primary ms-1"
                                          style="<?php echo e((request('start_date') || request('end_date')) ? '' : 'display: none;'); ?>">
                                        1
                                    </span>
                                </button>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-white">
                                        <i class="fas fa-search text-muted"></i>
                                    </span>
                                    <input type="text"
                                           class="form-control"
                                           id="searchInput"
                                           name="search"
                                           value="<?php echo e(request('search')); ?>"
                                           placeholder="Cari nomor SJN, tujuan, proyek, atau item..." />
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                </div>
                            </div>
                        </div>

                        
                        <?php if(request('search') || request('status') || request('start_date') || request('end_date')): ?>
                            <div id="activeFilters" class="mt-3">
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <small class="text-muted">Filter aktif:</small>

                                    <?php if(request('search')): ?>
                                        <span class="badge bg-light text-dark border">
                                            <i class="fas fa-search me-1"></i> <?php echo e(request('search')); ?>

                                        </span>
                                    <?php endif; ?>

                                    <?php if(request('status')): ?>
                                        <span class="badge bg-light text-dark border">
                                            <i class="fas fa-filter me-1"></i> <?php echo e(request('status')); ?>

                                        </span>
                                    <?php endif; ?>

                                    <?php if(request('start_date') || request('end_date')): ?>
                                        <span class="badge bg-light text-dark border">
                                            <i class="fas fa-calendar-alt me-1"></i>
                                            <span>
                                                [<?php echo e(request('date_type','document') === 'posting' ? 'Posting' : 'Dokumen'); ?>]
                                                <?php echo e(request('start_date') ?: '...'); ?> - <?php echo e(request('end_date') ?: '...'); ?>

                                            </span>
                                            <button type="button"
                                                    class="btn-close btn-close-sm ms-2"
                                                    onclick="clearDateFilter()"
                                                    style="font-size: 0.6rem;">
                                            </button>
                                        </span>
                                    <?php endif; ?>

                                    <a href="<?php echo e(route('shippings.index')); ?>" class="btn btn-sm btn-outline-secondary ms-2">
                                        Reset Semua
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="shippingsTable">
                            <thead>
                                <tr>
                                    <th class="text-center" width="60">No</th>
                                    <th>Nomor SJN</th>
                                    <th>Tanggal Dokumen</th>
                                    <th>Tanggal Posting</th>
                                    <th>Kepada</th>
                                    <th>Proyek</th>
                                    <th>Status</th>
                                    <th class="text-center">Waktu Mulai</th>
                                    <th class="text-center">Waktu Selesai</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $listTravelDocument; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="text-center text-muted"><?php echo e($listTravelDocument->firstItem() + $index); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('shippings.detail', $doc->id)); ?>" class="text-primary fw-bold">
                                                <?php echo e($doc->no_travel_document ?: '-'); ?>

                                            </a>
                                            <?php if($doc->is_backdate): ?>
                                                <span class="badge badge-warning ms-1" title="Backdate">
                                                    <i class="fas fa-history"></i>
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="text-muted">
                                                <?php if($doc->document_date): ?>
                                                    <?php echo e(\Carbon\Carbon::parse($doc->document_date)->format('d/m/Y')); ?>

                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-muted">
                                                <?php if($doc->posting_date): ?>
                                                    <?php echo e(\Carbon\Carbon::parse($doc->posting_date)->format('d/m/Y')); ?>

                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <i class="fas fa-map-marker-alt text-danger me-1"></i>
                                            <?php echo e($doc->send_to ?: '-'); ?>

                                        </td>
                                        <td><?php echo e($doc->project ?: '-'); ?></td>
                                        <td>
                                            <?php if($doc->status == 'Belum terkirim'): ?>
                                                <span class="badge badge-warning badge-status">Belum terkirim</span>
                                            <?php elseif($doc->status == 'Sedang dikirim'): ?>
                                                <span class="badge badge-info badge-status">Sedang dikirim</span>
                                            <?php elseif($doc->status == 'Terkirim'): ?>
                                                <span class="badge badge-success badge-status">Terkirim</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary"><?php echo e($doc->status); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <!-- Waktu Mulai -->
                                        <td class="text-center">
                                            <?php if($doc->start_time): ?>
                                                <?php echo e(\Carbon\Carbon::parse($doc->start_time)->format('d/m/Y H:i')); ?>

                                            <?php else: ?>
                                                <span class="text-muted">-</span>
                                            <?php endif; ?>
                                        </td>
                                        <!-- Waktu Selesai -->
                                        <td class="text-center">
                                            <?php if($doc->end_time): ?>
                                                <?php echo e(\Carbon\Carbon::parse($doc->end_time)->format('d/m/Y H:i')); ?>

                                            <?php else: ?>
                                                <span class="text-muted">-</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-button-action">
                                                <?php if($doc->status === 'Terkirim'): ?>
                                                    <a href="<?php echo e(route('shippings.report', $doc->id)); ?>"
                                                       class="btn btn-link btn-success btn-lg"
                                                       title="Lihat Laporan Surat Jalan">
                                                        <i class="fas fa-file-alt"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a href="<?php echo e(route('shippings.detail', $doc->id)); ?>"
                                                   class="btn btn-link btn-primary btn-lg" title="Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <button type="button" class="btn btn-link btn-danger btn-lg"
                                                        onclick="confirmDelete(<?php echo e($doc->id); ?>)" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="10" class="text-center py-5">
                                            <i class="fas fa-inbox fs-1 d-block mb-3 text-muted"></i>
                                            <p class="mb-0 text-muted">Tidak ada data pengiriman</p>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        Menampilkan <?php echo e($listTravelDocument->firstItem() ?? 0); ?>–<?php echo e($listTravelDocument->lastItem() ?? 0); ?>

                        dari <?php echo e($listTravelDocument->total()); ?> data
                    </small>
                    <nav aria-label="Page navigation">
                        <?php echo e($listTravelDocument->onEachSide(1)->links('pagination::simple-bootstrap-5')); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Form (Hidden) -->
    <form id="deleteForm" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('modals'); ?>
    <!-- Date Filter Modal -->
    <div class="modal fade" id="dateFilterModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-calendar-alt me-2"></i> Filter Rentang Tanggal
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Tipe Tanggal</label>
                        <select class="form-select" id="filterDateType">
                            <option value="document" <?php echo e(request('date_type','document')=='document' ? 'selected' : ''); ?>>Tanggal Dokumen</option>
                            <option value="posting" <?php echo e(request('date_type')=='posting' ? 'selected' : ''); ?>>Tanggal Posting</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="filterStartDate" value="<?php echo e(request('start_date')); ?>" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="filterEndDate" value="<?php echo e(request('end_date')); ?>" />
                    </div>
                    <div class="alert alert-info mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Kosongkan untuk menampilkan semua tanggal.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-outline-danger" onclick="clearDateFilter()">
                        <i class="fas fa-times me-1"></i> Reset
                    </button>
                    <button type="button" class="btn btn-primary" onclick="applyDateFilter()">
                        <i class="fas fa-filter me-1"></i> Terapkan Filter
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Export Modal -->
    <div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo e(route('shippings.export')); ?>" method="GET">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-file-export me-2"></i> Export Data Pengiriman
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="start_date" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="end_date" />
                        </div>
                        <div class="alert alert-info mb-0">
                            <i class="fas fa-info-circle me-2"></i>
                            Kosongkan tanggal untuk export semua data.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-file-excel me-1"></i> Export Excel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        function applyDateFilter() {
            const startDate = document.getElementById('filterStartDate').value;
            const endDate = document.getElementById('filterEndDate').value;
            const dateType = document.getElementById('filterDateType').value;

            document.getElementById('startDateInput').value = startDate;
            document.getElementById('endDateInput').value = endDate;
            document.getElementById('dateTypeInput').value = dateType;

            document.getElementById('filterForm').submit();
        }

        function clearDateFilter() {
            // reset hanya filter tanggal, search/status tetap ada di query string,
            // tapi karena kita submit form, value input search/status masih ikut.
            document.getElementById('startDateInput').value = '';
            document.getElementById('endDateInput').value = '';
            document.getElementById('dateTypeInput').value = 'document';

            document.getElementById('filterForm').submit();
        }

        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data pengiriman ini?')) {
                const form = document.getElementById('deleteForm');
                form.action = `/shippings/${id}`;
                form.submit();
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/server/Reka/current-rekatrack/current/resources/views/General/shippings.blade.php ENDPATH**/ ?>