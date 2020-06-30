@extends('layouts.app')

@section('title')
    Details Package {{ $package->title }}
@endsection

@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Paket Pernikahan
                                </li>
                                <li class="breadcrumb-item active">
                                    Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1>{{ $package->title }}</h1>
                            <div class="card card-gallery">
                                @if ($package->galleries->count())
                                {{-- <div class="gallery">
                                    <div class="xzoom-container">
                                        <img src="{{ Storage::url($package->galleries->first()->image) }}" 
                                        class="xzoom" 
                                        id="xzoom-default" 
                                        xoriginal="{{ Storage::url($package->galleries->first()->image) }}">
                                    </div>
                                    <div class="xzoom-thumbs">
                                        @foreach ($package->galleries as $gallery)
                                            <a href="{{ Storage::url($gallery->image) }}">
                                                <img src="{{ Storage::url($gallery->image) }}" 
                                                class="xzoom-gallery" 
                                                width="110">
                                            </a>
                                        @endforeach
                                    </div>
                                </div> --}}

                                <div class="gallery">
                                    <div class="xzoom-container">
                                        <img src="{{ url('storage/'. $package->galleries->first()->image) }}" 
                                        class="xzoom" 
                                        id="xzoom-default" 
                                        xoriginal="{{ url('storage/'. $package->galleries->first()->image) }}">
                                    </div>
                                    <div class="xzoom-thumbs">
                                        @foreach ($package->galleries as $gallery)
                                            <a href="{{ url('storage/'. $gallery->image) }}">
                                                <img src="{{ url('storage/'. $gallery->image) }}" 
                                                class="xzoom-gallery" 
                                                width="110">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                            <h2 class="service-title">Layanan Paket</h2>
                            <p class="service">
                                {!! $package->services !!}
                            </p>
                            <h3 class="disclaimer-header">Note</h3>
                            <p class="disclaimer">
                                Layanan paket sudah termasuk Professional Wedding Planner dan Organizer Crew
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Package Informations</h2>
                            <table class="package-informations">
                                <tr>
                                    <th width="50%">Harga</th>
                                    <td width="50%" class="text-right">Rp {{number_format($package->price, 0, ",",".") }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Lokasi</th>
                                    <td width="50%" class="text-right">{{ $package->location }}</td>
                                </tr>
                            </table>
                            <div class="book-container">
                                @auth
                                    <form action="{{ route('checkout-process', $package->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-book-now btn-block mt-3 py-2" type="submit">
                                            Book Now
                                        </button>
                                    </form>
                                @endauth

                                @guest
                                    <a href="{{ route('login') }}" class="btn btn-book-now btn-block mt-3 py-2">
                                    Login to Book
                                    </a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                xoffset: 15
            });
        });
    </script>
@endpush