@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Paket Wedding</h1>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('wedding-package.store') }}" method="POST">   
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="services">Services</label>
                    <textarea name="services" class="form-control @error('services') is-invalid @enderror">{{ old('services') }}</textarea>
                    @error('services')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Price" value="{{ old('price') }}">
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" placeholder="Location" value="{{ old('location') }}">
                    @error('location')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
                <a href="{{ route('wedding-package.index') }}" class="btn btn-danger btn-block">
                    Kembali
                </a>
            </form>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->

@endsection
