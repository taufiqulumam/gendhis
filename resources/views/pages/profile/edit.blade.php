@extends('layouts.app')

@section('title')
    Profil saya
@endsection

@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pl-lg-0">
                        <div class="card card-details">
                            <h1>Profil saya</h1>
                            
                            <form method="POST" action="{{ route('profile_update', $user->id) }}">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                     <label for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama" name="name" value="{{ Auth::user()->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email" value="{{ Auth::user()->email }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label for="phone_number">Nomor telepon</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Masukkan Nomor Telepon" name="phone_number" value="{{ Auth::user()->phone_number }}">
                                    @error('phone_number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <br>
                                <button class="btn btn-package-details mt-0 col-lg-2 col-md-auto col-sm-auto" type="submit">Simpan</button>
                                <a class="text-muted" href="/profile/1">Kembali</a>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection