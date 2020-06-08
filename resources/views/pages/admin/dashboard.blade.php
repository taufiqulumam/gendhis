@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Paket Wedding</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $wedding_package }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-gift fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Transaksi</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $transaction }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-funnel-dollar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Transaksi Pending</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $transaction_pending }}</div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-spinner fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Transaksi Sukses</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $transaction_success }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-check fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Transaksi Terbaru</h1>
    </div>

    <div class="orders">
      <div class="row">
        <div class="col-xl-8">
          <div class="card">
              <div class="card-body-- shadow">
                  <div class="table-stats order-table ov-h">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>ID Transaksi</th>
                                  <th>Paket Wedding</th>
                                  <th>Pemesan</th>
                                  <th>Total Transaksi</th>
                                  <th>Status</th>
                              </tr>
                          </thead>
                          <tbody>
                              @forelse ($items as $item)
                                  <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $item->id }}</td>
                                      <td>{{ $item->wedding_package->title }}</td>
                                      <td>{{ $item->user->name }}</td>
                                      <td>Rp {{number_format($item->transaction_total, 0, ",",".") }}</td>
                                      <td>
                                          @if($item->transaction_status == 'PENDING')
                                              <span class="badge badge-warning">
                                          @elseif($item->transaction_status == 'SUCCESS')
                                              <span class="badge badge-success">
                                          @elseif($item->transaction_status == 'FAILED')
                                              <span class="badge badge-danger">
                                          @elseif($item->transaction_status == 'CANCEL')
                                              <span class="badge badge-dark">
                                          @elseif($item->transaction_status == 'IN_CART')
                                              <span class="badge badge-light">
                                          @else
                                              <span>
                                          @endif
                                              {{ $item->transaction_status }}
                                              </span>
                                      </td>
                                  </tr>
                              @empty
                                  <tr>
                                      <td class="text-center p-5" colspan="6">
                                          Data Tidak Tersedia
                                      </td>
                                  </tr>
                              @endforelse
                          </tbody>
                      </table>
                  </div>
              </div>
          </div> <!-- /.card -->
      </div>  <!-- /.col-lg-8 -->
      </div>
    </div>
    
  </div>

  <!-- /.container-fluid -->
@endsection