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
        <h1 class="h3 mb-0 text-gray-800">Galeri</h1>
        <a href="{{ route('gallery.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Galeri
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
                <table class="table table-bordered" width="100%" cellspacing="0" id="dataTables">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Paket Wedding</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($packages as $package)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $package->wedding_package->title }}</td>
                            <td>
                                <img src="{{ Storage::url($package->image) }}" alt="" style="width:150px" class="img-thumbnail"> 
                            </td>
                            <td>
                                <a href="{{ route('gallery.edit', $package->id) }}" class="btn btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                {{-- <form action="{{ route('gallery.destroy', $package->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form> --}}

                                <!--With Modal-->
                                <button type="button" class="btn btn-danger btn-trash d-inline" data-toggle="modal" data-target="#ModalDelete" data-id="{{ $package->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                    
                                <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Foto Paket</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapusnya?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <form action="{{ route('gallery.destroy', $package->id) }}" method="POST">
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
                                    Data Kosong
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

    <script src="{{ url('backend/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ url('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables').DataTable();
        } );
    </script>
@endpush