@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail ID Transaksi #{{ $item->id }}</h1>
    </div>

    
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID Transaksi</th>
                    <td>{{ $item->id }}</td>
                </tr>
                <tr>
                    <th>Paket Wedding</th>
                    <td>{{ $item->wedding_package->title }}</td>
                </tr>
                <tr>
                    <th>Total Transaksi</th>
                    <td>Rp {{number_format($item->transaction_total, 0, ",",".") }}</td>
                </tr>
                <tr>
                    <th>Status Transaksi</th>
                    <td>{{ $item->transaction_status }}</td>
                </tr>
                <tr>
                    <th>Detail</th>
                    <td>
                        <table class="table table-bordered">
                            <tr>
                                <th>User ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No. Telepon</th>
                                <th>Tanggal Pernikahan</th>
                            </tr>
                            <tr>
                                @foreach ($item->details as $detail)
                                    <td>{{ $detail->transaction->user->id }}</td>
                                    <td>{{ $detail->transaction->user->name }}</td>
                                    <td>{{ $detail->email }}</td>
                                    <td>{{ $detail->phone_number }}</td>
                                    <td>{{ $detail->wedding_date }}</td>
                                @endforeach   
                            </tr>
                        </table>
                    </td>
                </tr>
            </table> 
            
            <a href="{{ route('transaction.index') }}" class="btn btn-danger btn-block">
                Kembali
            </a>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->

@endsection
