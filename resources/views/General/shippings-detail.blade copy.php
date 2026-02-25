@extends('layouts.app')

@section('title', 'Detail Pengiriman - RekaTrack')
@php($pageName = 'Detail Pengiriman ' . ($travelDocument->no_travel_document ?? ''))

@section('content')

<div class="row">
  <!-- Main Information Card - 8 columns -->
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Informasi Pengiriman</div>
      </div>
      <div class="card-body">
        <div class="row">
          <!-- Kepada -->
          <div class="col-md-6 mb-3">
            <div class="d-flex align-items-center">
              <div class="me-3">
                <i class="fa fa-user-circle fa-2x text-primary"></i>
              </div>
              <div class="flex-fill">
                <p class="text-muted mb-1">Kepada</p>
                <h5 class="fw-bold mb-0">{{ $travelDocument->send_to ?? '-' }}</h5>
              </div>
            </div>
          </div>

          <!-- Proyek -->
          <div class="col-md-6 mb-3">
            <div class="d-flex align-items-center">
              <div class="me-3">
                <i class="fa fa-project-diagram fa-2x text-success"></i>
              </div>
              <div class="flex-fill">
                <p class="text-muted mb-1">Proyek</p>
                <h5 class="fw-bold mb-0">{{ $travelDocument->project ?? '-' }}</h5>
              </div>
            </div>
          </div>

          <!-- Tanggal Dokumen -->
          <div class="col-md-6 mb-3">
            <div class="d-flex align-items-center">
              <div class="me-3">
                <i class="fa fa-calendar-alt fa-2x text-info"></i>
              </div>
              <div class="flex-fill">
                <p class="text-muted mb-1">Tanggal Dokumen</p>
                <h5 class="fw-bold mb-0">
                  @if($travelDocument->document_date)
                    {{ \Carbon\Carbon::parse($travelDocument->document_date)->format('d M Y') }}
                  @else
                    -
                  @endif
                </h5>
                @if($travelDocument->is_backdate)
                  <span class="badge badge-warning mt-1">
                    <i class="fa fa-history me-1"></i> Backdate
                  </span>
                @endif
              </div>
            </div>
          </div>

          <!-- Tanggal Posting -->
          <div class="col-md-6 mb-3">
            <div class="d-flex align-items-center">
              <div class="me-3">
                <i class="fa fa-calendar-check fa-2x text-warning"></i>
              </div>
              <div class="flex-fill">
                <p class="text-muted mb-1">Tanggal Posting</p>
                <h5 class="fw-bold mb-0">
                  @if($travelDocument->posting_date)
                    {{ \Carbon\Carbon::parse($travelDocument->posting_date)->format('d M Y') }}
                  @else
                    -
                  @endif
                </h5>
              </div>
            </div>
          </div>

          <!-- Waktu Mulai Kirim -->
          <div class="col-md-6 mb-3">
            <div class="d-flex align-items-center">
              {{-- <div class="me-3">
                <span class="badge badge-primary badge-lg">
                  <i class="fa fa-play"></i>
                </span>
              </div> --}}
              <div class="flex-fill">
                <p class="text-muted mb-1">Waktu Mulai Kirim</p>
                @if($travelDocument->start_time)
                  <h5 class="fw-bold text-primary mb-0">
                    {{ \Carbon\Carbon::parse($travelDocument->start_time)->format('d M Y, H:i') }} WIB
                  </h5>
                @else
                  <h5 class="text-muted mb-0">Belum dimulai</h5>
                @endif
              </div>
            </div>
          </div>

          <!-- Waktu Selesai Kirim -->
          <div class="col-md-6 mb-3">
            <div class="d-flex align-items-center">
              {{-- <div class="me-3">
                <span class="badge badge-success badge-lg">
                  <i class="fa fa-stop"></i>
                </span>
              </div> --}}
              <div class="flex-fill">
                <p class="text-muted mb-1">Waktu Selesai Kirim</p>
                @if($travelDocument->end_time)
                  <h5 class="fw-bold text-success mb-0">
                    {{ \Carbon\Carbon::parse($travelDocument->end_time)->format('d M Y, H:i') }} WIB
                  </h5>
                @else
                  <h5 class="text-muted mb-0">Belum selesai</h5>
                @endif
              </div>
            </div>
          </div>

          <!-- Duration Alert -->
          @if($travelDocument->start_time && $travelDocument->end_time)
            <div class="col-12">
              <div class="alert alert-info py-2 mb-0">
                <div class="d-flex align-items-center">
                  <i class="fa fa-stopwatch me-2"></i>
                  <span class="fw-bold">
                    Durasi Pengiriman: {{ \Carbon\Carbon::parse($travelDocument->start_time)->diffForHumans(\Carbon\Carbon::parse($travelDocument->end_time), true) }}
                  </span>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <!-- Reference Card - 4 columns (smaller) -->
  <div class="col-lg-4">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Referensi</div>
      </div>
      <div class="card-body">
        <!-- Status -->
        <div class="mb-3">
          <p class="text-muted mb-2">Status</p>
          @if($travelDocument->status == 'Belum terkirim')
            <span class="badge badge-warning">
              <i class="fa fa-clock me-1"></i> Belum Terkirim
            </span>
          @elseif($travelDocument->status == 'Sedang dikirim')
            <span class="badge badge-info">
              <i class="fa fa-truck me-1"></i> Sedang Dikirim
            </span>
          @elseif($travelDocument->status == 'Terkirim')
            <span class="badge badge-success">
              <i class="fa fa-check-circle me-1"></i> Terkirim
            </span>
          @else
            <span class="badge badge-secondary">-</span>
          @endif
        </div>

        <hr>

        <!-- Nomor SJN -->
        <div class="mb-3">
          <p class="text-muted mb-1">Nomor SJN</p>
          <h5 class="fw-bold">{{ $travelDocument->no_travel_document ?? '-' }}</h5>
        </div>

        <hr>

        <!-- PO Number -->
        <div class="mb-3">
          <p class="text-muted mb-1">PO Number</p>
          <h5 class="fw-bold">{{ $travelDocument->po_number ?? '-' }}</h5>
        </div>

        <hr>

        <!-- Reference -->
        <div>
          <p class="text-muted mb-1">Referensi</p>
          <h5 class="fw-bold">{{ $travelDocument->reference_number ?? '-' }}</h5>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Items Table -->
<div class="row mt-4">
  <div class="col-md-12">
    <div class="card card-round">
      <div class="card-header">
        <div class="card-head-row">
          <div class="card-title">
            <i class="fas fa-boxes me-2"></i> Daftar Barang
          </div>
          <div class="card-tools">
            <span class="badge badge-primary badge-lg">
              {{ $travelDocument->items->count() }} Item
            </span>
          </div>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover table-head-bg-primary">
            <thead>
              <tr>
                <th class="text-center" width="5%">No</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th class="text-center">QTY Kirim</th>
                <th class="text-center">QTY PO</th>
                <th class="text-center">Total Kirim</th>
                <th class="text-center">Satuan</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              @forelse($travelDocument->items as $index => $item)
                <tr>
                  <td class="text-center fw-bold">{{ $index + 1 }}</td>
                  <td>
                    <div class="fw-bold">{{ $item->item_name }}</div>
                  </td>
                  <td>
                    <span class="badge badge-light">{{ $item->item_code }}</span>
                  </td>
                  <td class="text-center">
                    <span class="fw-bold text-primary">{{ $item->qty_send ?? '-' }}</span>
                  </td>
                  <td class="text-center">
                    <span class="fw-bold text-info">{{ $item->qty_po ?? '-' }}</span>
                  </td>
                  <td class="text-center">
                    <span class="fw-bold text-success">{{ $item->total_send ?? '-' }}</span>
                  </td>
                  <td class="text-center">
                    <span class="badge badge-secondary">{{ $item->unit->name ?? '-' }}</span>
                  </td>
                  <td>
                    <small class="text-muted">{{ $item->information ?? '-' }}</small>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="8" class="text-center py-5">
                    <i class="fas fa-box-open fa-3x text-muted mb-3 d-block opacity-50"></i>
                    <p class="text-muted mb-0">Tidak ada barang dalam pengiriman ini</p>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Action Buttons -->
<div class="row mt-4 mb-4">
  <div class="col-md-12">
    {{-- <div class="card card-round"> --}}
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <a href="{{ route('shippings.index') }}" class="btn btn-light btn-round">
              <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
          </div>
          <div class="d-flex gap-2">
            @if($travelDocument->status === 'Terkirim')
              <a href="{{ route('shippings.report', $travelDocument->id) }}"
                  class="btn btn-success btn-round">
                <i class="fas fa-file-invoice me-1"></i> Bukti Pengiriman
              </a>
            @endif
            <a href="{{ route('shippings.edit', $travelDocument->id) }}"
               class="btn btn-warning btn-round">
              <i class="fas fa-edit me-1"></i> Edit
            </a>
            <form action="{{ route('shippings.print', $travelDocument->id) }}" method="GET" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-primary btn-round">
                <i class="fas fa-print me-1"></i> Cetak Surat Jalan
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
.badge-lg {
  padding: 8px 12px;
  font-size: 14px;
}

.table-head-bg-primary thead {
  background: linear-gradient(135deg, #1572e8 0%, #0d5bbd 100%);
}

.table-head-bg-primary thead th {
  color: white !important;
  font-weight: 600;
  border: none;
  padding: 14px 12px;
  vertical-align: middle;
}

.table-hover tbody tr {
  transition: background-color 0.2s ease;
}

.table-hover tbody tr:hover {
  background-color: #f1f4f9;
}
</style>
@endsection
