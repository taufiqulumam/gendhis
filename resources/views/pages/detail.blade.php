@extends('layouts.app')

@section('title')
    Details Package
@endsection

@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1>{{ $package->title }}</h1>
                            <div class="card card-gallery">
                                <div class="gallery">
                                    <img src="{{ Storage::url($package->galleries->first()->image) }}" width="600px">
                                </div>
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
                                    <form action="{{ route('checkout_process', $package->id) }}" method="POST">
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