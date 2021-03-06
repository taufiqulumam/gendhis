@extends('layouts.admin')

@section('content')

@push('addon-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Transaksi</h1>
        {{-- <div class="col-lg-4 col-md-4 pl-5">
            <form class="mt-2" action="" method="GET">
                <div class="input-group">
                    <input class="form-control bg-white border-0 small" type="text" name="search" placeholder="ID Transaksi" value="{{ Request::get('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary text-white" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div> --}}
    </div>

    @if (session ('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-stats order-table ov-h" width="100%" cellspacing="0" id="dataTables">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">ID Transaksi</th>
                            <th class="text-center">Paket Wedding</th>
                            <th class="text-center">Pemesan</th>
                            <th class="text-center">Total Transaksi</th>
                            <th class="text-center">Status Transaksi</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($packages as $package)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $package->id }}</td>
                            <td>{{ $package->wedding_package->title }}</td>
                            <td>{{ $package->user->name }}</td>
                            <td>Rp {{number_format($package->transaction_total, 0, ",",".") }}</td>
                            <td>
                                @if($package->transaction_status == 'PENDING')
                                    <span class="badge badge-warning">
                                @elseif($package->transaction_status == 'SUCCESS')
                                    <span class="badge badge-success">
                                @elseif($package->transaction_status == 'CANCEL')
                                    <span class="badge badge-danger">
                                @elseif($package->transaction_status == 'IN_CART')
                                    <span class="badge badge-secondary">
                                @else
                                    <span>
                                @endif
                                    {{ $package->transaction_status }}
                                    </span>
                            </td>
                            <td>
                                <a href="{{ route('transaction.show', $package->id) }}" class="btn btn-success">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('transaction.edit', $package->id) }}" class="btn btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                {{-- <form action="{{ route('transaction.destroy', $package->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form> --}}

                                <!--With Modal--> 
                                {{-- <button type="button" class="btn btn-danger btn-trash d-inline" data-toggle="modal" data-target="#ModalDelete" data-id="{{ $package->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                    
                                <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Transaksi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapusnya?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <form action="{{ route('transaction.destroy', $package->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="id" id="input-id">
                                                    <button class="btn btn-danger btn-delete">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>  --}}

                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="7">
                                    Data Tidak Ditemukan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->

@endsection

{{-- @push('addon-script')
    <script src="{{ url('backend/vendor/jquery/jquery.min.js') }}"></script> 
    <script type="text/javascript">
        $(function() {
            $('.btn-trash').click(function() {
                id = $(this).attr('data-id');
                $('#input-id').val(id);
                
                // alert( $('#input-id').val() )
            });
        });
    </script>
@endpush --}}

@push('addon-script')
    <script src="{{ url('backend/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ url('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables').DataTable();
        } );
    </script>
@endpush