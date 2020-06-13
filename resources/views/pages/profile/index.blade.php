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
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-group">
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
                                </div>
                                <div class="col-lg-6 d-none d-lg-block">
                                    <div class="profile-illustration">
                                        <img src="{{ url('frontend/images/profile.png') }}" alt="">
                                    </div>
                                </div>
                            </div>

                            <br>
                            <a class="btn btn-package-details mt-0 col-lg-2 col-md-auto col-sm-auto" href="{{ route('profile_edit', Auth::user()->id) }}">Ubah data</a>
                            <a class="text-muted mt-2" href="/">Kembali</a>
                        </div>

                        
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection