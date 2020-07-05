@extends('layouts.success')

@section('title')
    Checkout Success
@endsection

@section('content')
    <main>
        <div class="section-success d-flex align-items-center">
            <div class="col text-center">
                <img src="/frontend/images/ic_complete.png" alt="Payment Complete" class="payment-complete">
                <h1>Yeay! Success</h1>
                <p>
                    we've sent you email for transaction details and payment instruction<br>
                    please read it as well
                </p>
                <a href="{{ route('home') }}" class="btn btn-home mt-3 px-5">
                    Home Page
                </a>
            </div>
        </div>  
    </main>
@endsection
