@extends('layouts.app')

@section('title', 'Tambah Pengiriman - RekaTrack')
@php($pageName = 'Tambah Data Pengiriman')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-0">Form Pengiriman Baru</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('shippings.store') }}" id="shippingForm">
          @csrf

          <!-- Nomor SJN dan Tanggal Dokumen -->
          <div class="row mb-4">
            <div class="col-md-6">
              <label class="form-label">Nomor SJN <span class="text-danger">*</span></label>
              <input
                type="text"
                name="numberSJN"
                value="{{ old('numberSJN') }}"
                class="form-control @error('numberSJN') is-invalid @enderror"
                placeholder="Masukkan nomor surat jalan"
                required
              />
              @error('numberSJN')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label class="form-label">Tanggal Dokumen</label>
              <input
                type="date"
                name="documentDate"
                value="{{ old('documentDate', date('Y-m-d')) }}"
                class="form-control form-control-lg @error('documentDate') is-invalid @enderror"
                {{-- max="{{ date('Y-m-d') }}" --}}
              />
              <small class="text-muted">Kosongkan untuk menggunakan tanggal hari ini</small>
              @error('documentDate')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Data Pengiriman Lain -->
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <label class="form-label">Kepada <span class="text-danger">*</span></label>
              <input
                type="text"
                name="sendTo"
                value="{{ old('sendTo') }}"
                class="form-control @error('sendTo') is-invalid @enderror"
                placeholder="Nama penerima"
                required
              />
              @error('sendTo')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label class="form-label">Nomor Ref <span class="text-danger">*</span></label>
              <input
                type="text"
                name="numberRef"
                value="{{ old('numberRef') }}"
                class="form-control @error('numberRef') is-invalid @enderror"
                placeholder="Nomor referensi"
                required
              />
              @error('numberRef')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label class="form-label">Tanggal Ref</label>
              <input
                type="date"
                name="referenceDate"
                value="{{ old('referenceDate') }}"
                class="form-control @error('referenceDate') is-invalid @enderror"
              />
              @error('referenceDate')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label class="form-label">Proyek <span class="text-danger">*</span></label>
              <input
                type="text"
                name="projectName"
                value="{{ old('projectName') }}"
                class="form-control @error('projectName') is-invalid @enderror"
                placeholder="Nama proyek"
                required
              />
              @error('projectName')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label class="form-label">Nomor PO <span class="text-danger">*</span></label>
              <input
                type="text"
                name="poNumber"
                value="{{ old('poNumber') }}"
                class="form-control @error('poNumber') is-invalid @enderror"
                placeholder="Nomor purchase order"
                required
              />
              @error('poNumber')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
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
                @foreach ($items as $index => $item)
                  <div class="item-row mb-4 p-3 bg-light rounded">
                    <div class="row g-3">
                      <div class="col-md-3">
                        <label class="form-label">Nama Barang <span class="text-danger">*</span></label>
                        <input
                          type="text"
                          name="itemName[]"
                          value="{{ old("itemName.$index", $item['itemName']) }}"
                          class="form-control @error("itemName.$index") is-invalid @enderror"
                          placeholder="Contoh: Baut M10"
                          required
                        />
                        @error("itemName.$index")
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Kode Barang <span class="text-danger">*</span></label>
                        <input
                          type="text"
                          name="itemCode[]"
                          value="{{ old("itemCode.$index", $item['itemCode']) }}"
                          class="form-control @error("itemCode.$index") is-invalid @enderror"
                          placeholder="SKU/Part No"
                          required
                        />
                        @error("itemCode.$index")
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Satuan <span class="text-danger">*</span></label>
                        <select name="unitType[]" class="form-select @error("unitType.$index") is-invalid @enderror" required>
                          <option value="">-- pilih --</option>
                          @foreach ($units as $unit)
                            <option value="{{ $unit->id }}" {{ old("unitType.$index", $item['unitType']) == $unit->id ? 'selected' : '' }}>
                              {{ $unit->name }}
                            </option>
                          @endforeach
                        </select>
                        @error("unitType.$index")
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-1">
                        <label class="form-label">Qty Kirim</label>
                        <input
                          type="number"
                          name="quantitySend[]"
                          value="{{ old("quantitySend.$index", $item['quantitySend']) }}"
                          class="form-control @error("quantitySend.$index") is-invalid @enderror"
                          placeholder="0"
                        />
                        @error("quantitySend.$index")
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-1">
                        <label class="form-label">Qty PO</label>
                        <input
                          type="text"
                          name="qtyPreOrder[]"
                          value="{{ old("qtyPreOrder.$index", $item['qtyPreOrder']) }}"
                          class="form-control @error("qtyPreOrder.$index") is-invalid @enderror"
                          placeholder="-"
                        />
                        @error("qtyPreOrder.$index")
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Total Kirim <span class="text-danger">*</span></label>
                        <input
                          type="number"
                          name="totalSend[]"
                          value="{{ old("totalSend.$index", $item['totalSend']) }}"
                          class="form-control @error("totalSend.$index") is-invalid @enderror"
                          placeholder="0"
                          required
                        />
                        @error("totalSend.$index")
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-3">
                        <label class="form-label">Keterangan</label>
                        <input
                          type="text"
                          name="information[]"
                          value="{{ old("information.$index", $item['information']) }}"
                          class="form-control @error("information.$index") is-invalid @enderror"
                          placeholder="Opsional"
                        />
                        @error("information.$index")
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-12 d-flex justify-content-end mt-2">
                        <button type="button" class="btn btn-sm btn-outline-danger remove-item"
                          {{ count($items) <= 1 ? 'disabled' : '' }}>
                          <i class="fas fa-trash me-1"></i> Hapus
                        </button>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>

          <!-- Aksi Bawah -->
          <div class="d-flex justify-content-between mt-4 pt-3 border-top">
            <a href="{{ route('shippings.index') }}" class="btn btn-light">
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
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('itemsContainer');
    const addItemBtn = document.getElementById('addItemBtn');
    const documentDateInput = document.querySelector('input[name="documentDate"]');
    let itemCount = {{ count($items) }};
    const units = @json($units);

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
@endpush
