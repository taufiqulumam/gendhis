@extends('layouts.app')

@section('title')
    Gendhis Wedding   
@endsection


@section('content')
        <!-- Header-->
        <header class="text-center">
            <h1>
                Jadikan Momen Spesial Anda <br> Lebih Berkesan Bersama Kami
            </h1>
            <p class="mt-3">
                We believe every couple must have <br> a special moment in their life
            </p>
            <a href="#package" class="btn btn-book-now px-4 mt-4">
                Book Now
            </a>
        </header>
    
        <main>
            <!-- Stats 
                <div class="container">
                <section class="section-stats row justify-content-center" id="stats">
                    <div class="col-3 col-md-2 stats-detail">
                        <h2 class="text-center">
                            3
                        </h2>
                        <p class="text-center">
                            Wedding Packages
                        </p>
                    </div>
                    <div class="col-3 col-md-2 stats-detail">
                        <h2 class="text-center">
                            200
                        </h2>
                        <p class="text-center">
                            Crew Organizer
                        </p>
                    </div>
                    <div class="col-3 col-md-2 stats-detail">
                        <h2 class="text-center">
                            1000
                        </h2>
                        <p class="text-center">
                            Couple
                        </p>
                    </div>
                    <div class="col-3 col-md-2 stats-detail">
                        <h2 class="text-center">
                            52
                        </h2>
                        <p class="text-center">
                            Partners
                        </p>
                    </div>
                </section>
            </div> 
            -->
    
            <section class="section-service" id="service">
                <div class="container">
                    <div class="row">
                        <div class="col text-center section-service-heading">
                            <h2>Our Provide Service</h2>
                            <p>Always providing the best <br> service for customers</p>
                        </div>
                    </div>
                </div>
            </section>
    
            <div class="container">
                <section class="section-service-content row justify-content-center" id="contentservice">
                    <div class="col col-sm-12 col-md-4 col-lg-3">
                        <div class="card d-flex">
                            <div class="card-body">
                                <div class="icon-service media d-flex">
                                    <img src="{{ url('frontend/images/ic_calendar.png') }}" class="align-self-center mx-auto" alt="">
                                </div>
                                <h4 class="text-center">Wedding Planning</h4>
                                <p class="text-center">
                                    Merencanakan pernikahan <br> sampai hari pernikahan
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-sm-12 col-md-4 col-lg-3">
                        <div class="card d-flex">
                            <div class="card-body">
                                <div class="icon-service media d-flex">
                                    <img src="{{ url('frontend/images/ic_package.png') }}" class="align-self-center mx-auto" alt="">
                                </div>
                                <h4 class="text-center">Wedding Package</h4>
                                <p class="text-center">
                                    Beragam paket pernikahan <br> yang sesuai keinginan
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-sm-12 col-md-4 col-lg-3">
                        <div class="card d-flex">
                            <div class="card-body">
                                <div class="icon-service media d-flex">
                                    <img src="{{ url('frontend/images/ic_catering.png') }}" class="align-self-center mx-auto" alt="">
                                </div>
                                <h4 class="text-center">Wedding Catering</h4>
                                <p class="text-center">
                                    Menyajikan beragam menu <br> masakan acara pernikahan
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
    
            <div class="container d-flex">
                <section class="picture-group">
                    <img src="{{ url('frontend/images/picture_group.png') }}" alt="">
                </section>
            </div>
    
            <section class="section-package" id="package">
                <div class="row">
                    <div class="col text-center section-package-heading">
                        <h2>Our Packages</h2>
                        <p>Various packages that <br>you can choose</p>
                    </div>
                </div>
            </section>  
            
            <div class="container">
                <section class="section-package-content row justify-content-center" id="contentpackage">
                    @foreach ($packages as $package)
                    <div class="col col-sm-6 col-md-5 col-lg-3">
                        <div class="card card-body d-flex rounded text-center shadow">
                            <h5 class="package-name">{{ $package->title }}</h5>
                            <h5 class="package-price">Rp {{number_format($package->price, 0, ",",".") }}</h5>
                            <ul class="package-detail list-unstyled">
                                <li>Gedung & Fasilitas</li>
                                <li>Kartu Undangan</li>
                                <li>Buffe Utama Ratusan Porsi</li>
                                <li>Gubukan Sesuai Selera</li>
                                <li>Dekorasi</li>
                                <li>Tata Rias & Busana</li>
                                <li>Dokumentasi</li>
                                <li>Entertainment</li>
                                <li>
                                    <strike>Master of Ceremony</strike>
                                </li>
                                <li>
                                    <strike>Entertainment</strike>
                                </li>
                                <li>
                                    <strike>Logam Mulia</strike>
                                </li>
                                <li>
                                    <strike>Food Stall</strike>
                                </li>
                                <li>
                                    <strike>Wedding Car</strike>
                                </li>
                            </ul>
                            <div class="mt-auto">
                                <a href="{{ route('detail', $package->slug) }}" class="btn btn-package-details px-4">See Details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </section>
            </div> 
    
            <section class="section-testimonial" id="testimonial">
                <div class="container">
                    <div class="row">
                        <div class="col text-center section-testimonial-heading">
                            <h2>What Our Customer Say</h2>
                            <p>Moment were given them <br>the best experience</p>
                        </div>
                    </div>
                </div>  
            </section>
    
            <div class="container">
                <div id="carouselcontrols" class="carousel slide" data-ride="carousel">
                    <section class="testimonial-details" id="testidetails">
                        <div class="carousel-inner">
    
                            <div class="carousel-item active">
                                <div class="row justify-content-center">
                                    <div class="col col-sm-6 col-md-7 col-lg-8">
                                        <div class="card card-body d-flex rounded">
                                            <div class="picture align-self-center">
                                                <img src="{{ url('frontend/images/avatar-1.png') }}" alt="">
                                            </div>
                                            <div>
                                                <p class="testi text-center">
                                                    "Terima kasih atas pelayanannya, kami sangat senang. <br>Semua susunan acara berjalan dengan lancar."
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="carousel-item">
                                <div class="row justify-content-center">
                                    <div class="col col-sm-6 col-md-7 col-lg-8">
                                        <div class="card card-body d-flex">
                                            <div class="picture align-self-center">
                                             <img src="{{ url('frontend/images/avatar-1.png') }}" alt="">
                                            </div>
                                            <div>
                                                <p class="testi text-center">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita ipsum dolores culpa quaerat dolore placeat, harum nostrum libero.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <a class="carousel-control-prev" href="#carouselcontrols" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselcontrols" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </section>
                </div>
            </div>
                
    
            <div class="row btn-bottom">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                        I Need Help
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-book-now px-4 mt-4 mx-1">
                        Register
                    </a>
                </div>
            </div>
        </main>
    
@endsection