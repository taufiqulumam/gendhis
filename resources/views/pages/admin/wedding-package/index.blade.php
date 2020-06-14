@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Paket Wedding</h1>
        <a href="{{ route('wedding-package.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Paket Wedding
        </a>
    </div>

    @if (session ('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Location</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($packages as $package)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $package->title }}</td>
                            <td>Rp {{number_format($package->price, 0, ",",".") }}</td>
                            <td>{{ $package->location }}</td>
                            <td>
                                <a href="{{ route('wedding-package.edit', $package->id) }}" class="btn btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                {{-- <form action="{{ route('wedding-package.destroy', $package->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form> --}}

                                
                                <button type="button" class="btn btn-danger btn-trash d-inline" data-toggle="modal" data-target="#modalDelete" data-id="{{ $package->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                                
                                <!-- With Modal -->
                                <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Paket</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapusnya?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <form action="{{ route('wedding-package.destroy', $package->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="id" id="input-id">
                                                    <button class="btn btn-danger btn-delete">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="5">
                                    Data Tidak Tersedia
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

@push('addon-script')
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
@endpush