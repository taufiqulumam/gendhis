@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Galeri</h1>
    </div>

    
    
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')   
                @csrf
                <div class="form-group">
                    <label for="wedding_packages_id">Paket Wedding</label>
                    <select name="wedding_packages_id" class="form-control" required>
                        <option value="{{ $item->wedding_packages_id }}">Jangan diubah</option>
                            @foreach ($wedding_packages as $wedding_package)
                                <option value="{{ $wedding_package->id }}">
                                    {{ $wedding_package->title }}
                                </option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" placeholder="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            
                <button type="submit" class="btn btn-primary btn-block">
                    Ubah
                </button>
                <a href="{{ route('gallery.index') }}" class="btn btn-danger btn-block">
                    Batalkan
                </a>
            </form>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->

@endsection
