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

                            @if (session ('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            
                            <ul class="list-group col-lg-6">
                                <li class="list-group-item">Nama <br> 
                                    {{ Auth::user()->name }}
                                </li>
                                <li class="list-group-item">Email <br>
                                    {{ Auth::user()->email }}
                                </li>
                                <li class="list-group-item">Nomor Telepon<br>
                                    {{ Auth::user()->phone_number}}    
                                </li>             
                            </ul>
                            <br>
                            <a class="btn btn-package-details mt-0 col-lg-2 col-md-auto col-sm-auto" href="{{ $user->id }}/edit">Ubah data</a>
                            <a class="text-muted" href="/">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection