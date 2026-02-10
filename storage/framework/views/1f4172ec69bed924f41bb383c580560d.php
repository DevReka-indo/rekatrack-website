<?php $__env->startSection('title', 'Tambah Pengiriman - RekaTrack'); ?>
<?php ($pageName = 'Tambah Data Pengiriman'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-0">Form Pengiriman Baru</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="<?php echo e(route('shippings.store')); ?>" id="shippingForm">
          <?php echo csrf_field(); ?>

          <!-- Nomor SJN dan Tanggal Dokumen -->
          <div class="row mb-4">
            <div class="col-md-6">
              <label class="form-label">Nomor SJN <span class="text-danger">*</span></label>
              <input
                type="text"
                name="numberSJN"
                value="<?php echo e(old('numberSJN')); ?>"
                class="form-control <?php $__errorArgs = ['numberSJN'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                placeholder="Masukkan nomor surat jalan"
                required
              />
              <?php $__errorArgs = ['numberSJN'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-md-6">
              <label class="form-label">Tanggal Dokumen</label>
              <input
                type="date"
                name="documentDate"
                value="<?php echo e(old('documentDate', date('Y-m-d'))); ?>"
                class="form-control form-control-lg <?php $__errorArgs = ['documentDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                
              />
              <small class="text-muted">Kosongkan untuk menggunakan tanggal hari ini</small>
              <?php $__errorArgs = ['documentDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>

          <!-- Data Pengiriman Lain -->
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <label class="form-label">Kepada <span class="text-danger">*</span></label>
              <input
                type="text"
                name="sendTo"
                value="<?php echo e(old('sendTo')); ?>"
                class="form-control <?php $__errorArgs = ['sendTo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                placeholder="Nama penerima"
                required
              />
              <?php $__errorArgs = ['sendTo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-md-6">
              <label class="form-label">Nomor Ref <span class="text-danger">*</span></label>
              <input
                type="text"
                name="numberRef"
                value="<?php echo e(old('numberRef')); ?>"
                class="form-control <?php $__errorArgs = ['numberRef'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                placeholder="Nomor referensi"
                required
              />
              <?php $__errorArgs = ['numberRef'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-md-6">
              <label class="form-label">Proyek <span class="text-danger">*</span></label>
              <input
                type="text"
                name="projectName"
                value="<?php echo e(old('projectName')); ?>"
                class="form-control <?php $__errorArgs = ['projectName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                placeholder="Nama proyek"
                required
              />
              <?php $__errorArgs = ['projectName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-md-6">
              <label class="form-label">Nomor PO <span class="text-danger">*</span></label>
              <input
                type="text"
                name="poNumber"
                value="<?php echo e(old('poNumber')); ?>"
                class="form-control <?php $__errorArgs = ['poNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                placeholder="Nomor purchase order"
                required
              />
              <?php $__errorArgs = ['poNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>

          <!-- Bagian Barang -->
          <div class="card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Data Barang</h5>
              <div class="d-flex align-items-center gap-2">
                <span class="text-muted">Total: <span id="totalBarang">1</span> item</span>
                <button type="button" class="btn btn-primary btn-sm" id="addItemBtn">
                  <i class="fas fa-plus me-1"></i> Tambah Barang
                </button>
              </div>
            </div>
            <div class="card-body">
              <div id="itemsContainer">
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="item-row mb-4 p-3 bg-light rounded">
                    <div class="row g-3">
                      <div class="col-md-3">
                        <label class="form-label">Nama Barang <span class="text-danger">*</span></label>
                        <input
                          type="text"
                          name="itemName[]"
                          value="<?php echo e(old("itemName.$index", $item['itemName'])); ?>"
                          class="form-control <?php $__errorArgs = ["itemName.$index"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                          placeholder="Contoh: Baut M10"
                          required
                        />
                        <?php $__errorArgs = ["itemName.$index"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Kode Barang <span class="text-danger">*</span></label>
                        <input
                          type="text"
                          name="itemCode[]"
                          value="<?php echo e(old("itemCode.$index", $item['itemCode'])); ?>"
                          class="form-control <?php $__errorArgs = ["itemCode.$index"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                          placeholder="SKU/Part No"
                          required
                        />
                        <?php $__errorArgs = ["itemCode.$index"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Satuan <span class="text-danger">*</span></label>
                        <select name="unitType[]" class="form-select <?php $__errorArgs = ["unitType.$index"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                          <option value="">-- pilih --</option>
                          <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($unit->id); ?>" <?php echo e(old("unitType.$index", $item['unitType']) == $unit->id ? 'selected' : ''); ?>>
                              <?php echo e($unit->name); ?>

                            </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ["unitType.$index"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                      <div class="col-md-1">
                        <label class="form-label">Qty Kirim</label>
                        <input
                          type="number"
                          name="quantitySend[]"
                          value="<?php echo e(old("quantitySend.$index", $item['quantitySend'])); ?>"
                          class="form-control <?php $__errorArgs = ["quantitySend.$index"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                          placeholder="0"
                        />
                        <?php $__errorArgs = ["quantitySend.$index"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                      <div class="col-md-1">
                        <label class="form-label">Qty PO</label>
                        <input
                          type="text"
                          name="qtyPreOrder[]"
                          value="<?php echo e(old("qtyPreOrder.$index", $item['qtyPreOrder'])); ?>"
                          class="form-control <?php $__errorArgs = ["qtyPreOrder.$index"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                          placeholder="-"
                        />
                        <?php $__errorArgs = ["qtyPreOrder.$index"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Total Kirim <span class="text-danger">*</span></label>
                        <input
                          type="number"
                          name="totalSend[]"
                          value="<?php echo e(old("totalSend.$index", $item['totalSend'])); ?>"
                          class="form-control <?php $__errorArgs = ["totalSend.$index"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                          placeholder="0"
                          required
                        />
                        <?php $__errorArgs = ["totalSend.$index"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                      <div class="col-md-3">
                        <label class="form-label">Keterangan</label>
                        <input
                          type="text"
                          name="information[]"
                          value="<?php echo e(old("information.$index", $item['information'])); ?>"
                          class="form-control <?php $__errorArgs = ["information.$index"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                          placeholder="Opsional"
                        />
                        <?php $__errorArgs = ["information.$index"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                      <div class="col-md-12 d-flex justify-content-end mt-2">
                        <button type="button" class="btn btn-sm btn-outline-danger remove-item"
                          <?php echo e(count($items) <= 1 ? 'disabled' : ''); ?>>
                          <i class="fas fa-trash me-1"></i> Hapus
                        </button>
                      </div>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>

          <!-- Aksi Bawah -->
          <div class="d-flex justify-content-between mt-4 pt-3 border-top">
            <a href="<?php echo e(route('shippings.index')); ?>" class="btn btn-light">
              <i class="fas fa-arrow-left me-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-success btn-round">
              <i class="fas fa-save me-1"></i> Simpan Pengiriman
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('itemsContainer');
    const addItemBtn = document.getElementById('addItemBtn');
    const documentDateInput = document.querySelector('input[name="documentDate"]');
    let itemCount = <?php echo e(count($items)); ?>;
    const units = <?php echo json_encode($units, 15, 512) ?>;

    function getUnitOptions() {
      let html = '<option value="">-- pilih --</option>';
      units.forEach(unit => {
        html += `<option value="${unit.id}">${unit.name}</option>`;
      });
      return html;
    }

    function createNewItemRow() {
      return `
        <div class="item-row mb-4 p-3 bg-light rounded">
          <div class="row g-3">
            <div class="col-md-3">
              <label class="form-label">Nama Barang <span class="text-danger">*</span></label>
              <input type="text" name="itemName[]" class="form-control" placeholder="Contoh: Baut M10" required />
            </div>
            <div class="col-md-2">
              <label class="form-label">Kode Barang <span class="text-danger">*</span></label>
              <input type="text" name="itemCode[]" class="form-control" placeholder="SKU/Part No" required />
            </div>
            <div class="col-md-2">
              <label class="form-label">Satuan <span class="text-danger">*</span></label>
              <select name="unitType[]" class="form-select" required>
                ${getUnitOptions()}
              </select>
            </div>
            <div class="col-md-1">
              <label class="form-label">Qty Kirim</label>
              <input type="number" name="quantitySend[]" class="form-control" placeholder="0" />
            </div>
            <div class="col-md-1">
              <label class="form-label">Qty PO</label>
              <input type="text" name="qtyPreOrder[]" class="form-control" placeholder="-" />
            </div>
            <div class="col-md-2">
              <label class="form-label">Total Kirim <span class="text-danger">*</span></label>
              <input type="number" name="totalSend[]" class="form-control" placeholder="0" required />
            </div>
            <div class="col-md-3">
              <label class="form-label">Keterangan</label>
              <input type="text" name="information[]" class="form-control" placeholder="Opsional" />
            </div>
            <div class="col-md-12 d-flex justify-content-end mt-2">
              <button type="button" class="btn btn-sm btn-outline-danger remove-item">
                <i class="fas fa-trash me-1"></i> Hapus
              </button>
            </div>
          </div>
        </div>
      `;
    }

    function updateTotalBarang() {
      document.getElementById('totalBarang').textContent = container.querySelectorAll('.item-row').length;
    }

    // // Validasi tanggal tidak boleh lebih dari hari ini
    // if (documentDateInput) {
    //   documentDateInput.addEventListener('change', function() {
    //     const selectedDate = new Date(this.value);
    //     const today = new Date();
    //     today.setHours(0, 0, 0, 0);

    //     if (selectedDate > today) {
    //       alert('Tanggal dokumen tidak boleh melebihi tanggal hari ini');
    //       this.value = today.toISOString().split('T')[0];
    //     }
    //   });
    // }

    addItemBtn.addEventListener('click', function () {
      if (itemCount >= 50) return;
      container.insertAdjacentHTML('beforeend', createNewItemRow());
      itemCount++;
      updateTotalBarang();
    });

    container.addEventListener('click', function (e) {
      if (e.target.closest('.remove-item')) {
        const row = e.target.closest('.item-row');
        if (container.querySelectorAll('.item-row').length > 1) {
          row.remove();
          updateTotalBarang();
        }
      }
    });

    updateTotalBarang();
  });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/server/Reka/current-rekatrack/current/resources/views/General/shippings-add.blade.php ENDPATH**/ ?>