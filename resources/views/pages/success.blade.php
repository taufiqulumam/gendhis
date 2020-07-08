@extends('layouts.success')

@section('title')
    Checkout Success
@endsection

@section('content')
    <main>
        <div class="section-success d-flex align-items-center">
            <div class="col text-center">
                <img src="/frontend/images/ic_complete.png" alt="Payment Complete" class="payment-complete" data-aos="zoom-in-down" data-aos-delay="100">
                <h1 data-aos="zoom-in-down" data-aos-delay="200">Yeay! Success</h1>
                <p data-aos="zoom-in-down" data-aos-delay="200">
                    we've sent you email for transaction details and payment instruction<br>
                    please read it as well
                </p>
                <a href="{{ route('home') }}" class="btn btn-home mt-3 px-5" data-aos="fade-up" data-aos-delay="300">
                    Home Page
                </a>
            </div>
        </div>  
    </main>
@endsection
