@extends('layouts.checkout')

@section('title')
    Checkout
@endsection


@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col pl-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Paket Pernikahan
                                </li>
                                <li class="breadcrumb-item">
                                    Details
                                </li>
                                <li class="breadcrumb-item active">
                                    Checkout
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1>Identitas Diri</h1>
                            <p class="note">Masukkan rencana tanggal pernikahan anda dan periksa kembali identitas diri anda.</p>
                    
                            <div class="date mt-3">
                               <h2 class="mb-3">
                                    Rencana tanggal pernikahan
                                </h2>
                                @if ($date=="show")
                                    <form action="{{ route('checkout-create', $item->id) }}" class="form-inline" method="POST" id="wedding_date">
                                    @csrf
                                        <label for="wedding_date" class="sr-only">YYYY/MM/DD</label>
                                        <div class="input-date mb-2 mr-sm-2">
                                            <input type="text" class="form-control datepicker" id="wedding_date" name="wedding_date" placeholder="YYYY/MM/DD" required>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-submit mb-2 px-4 ml-2">
                                            Submit 
                                        </button>
                                        <br>
                                    </form>
                                @endif
                            </div>
                            <div class="customer mt-4">
                                <table class="table table-responsive-sm table-responsive-md text-center">
                                    <thead>
                                        <tr>
                                            <td>Picture</td>
                                            <td>Name</td>
                                            <td>Email</td>
                                            <td>Phone Number</td>
                                            <td>Wedding Date</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($item->details as $detail)
                                        <tr>
                                            <td>
                                                <img src="https://ui-avatars.com/api/?name={{ $detail->name }}" class="rounded-circle" height="60">
                                            </td>
                                            <td class="align-middle">
                                                {{$detail->name}}
                                            </td>
                                            <td class="align-middle">
                                                {{$detail->email}}
                                            </td>
                                            <td class="align-middle">
                                                {{$detail->phone_number}}
                                            </td>
                                            <td class="align-middle">
                                                {{$detail->wedding_date}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h3 class="disclaimer-header mt-3 mb-2">Note</h3>
                                <p class="disclaimer" style="margin-bottom:0px;">Reservasi dilakukan maksimal 40 hari sebelum acara pernikahan.</p>
                                <p class="disclaimer ">Jika ingin mengubah tanggal pernikahan, harap menghubungi customer service kami.</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Checkout Informations</h2>
                            <table class="package-informations">
                                <tr>
                                    <th width="50%">Paket</th>
                                    <td width="50%" class="text-right">
                                        {{ $item->wedding_package->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Harga</th>
                                    <td width="50%" class="text-right">  
                                        Rp {{number_format($item->wedding_package->price, 0, ",",".") }}
                                    </td>
                                </tr>
                                <tr>
                                    <?php 
                                    // $total = number_format($item->wedding_package->price, 0, ",",".")
                                    // $total1 = $total + $rand;
                                    // $rand = rand(100,999);
                                    ?>
                                    <th width="40%">Total (+Unique Code)</th>
                                    <td witdh="60%" class="text-right text-total">
                                        {{-- <span class="text-blue">Rp <?php echo substr($transactions->transaction_total, 0, -3); ?></span> --}}
                                        <span class="text-blue">Rp {{ number_format($transactions->transaction_total, 0, ",",".")}}</span>

                                        {{-- <span class="text-orange">{{ $rand }}</span> --}}

                                        {{-- <input type="text" id="total" name="total" value="{{ number_format($transactions->transaction_total, 0, ",",".")}}"> --}}
                                    </td>
                                </tr>
                            </table>
                            <p class="payment-instructions">
                                Total harga yang harus dibayar adalah 10% dari harga paket pernikahan.
                            </p>
                            @if ($date=="hide")
                            {{-- <hr>
                            <h2>Payment Instructions</h2>
                            <p class="payment-instructions">
                                Please complete your payment before you confirm payment. You can only pay 10% of the total price
                            </p>
                            <div class="bank">
                                <div class="bank-item pb-3">
                                    <img src="{{ url('frontend/images/ic_bank.png') }}" class="bank-image" alt="">
                                    <div class="description">
                                        <h3>Gendhis Wedding</h3>
                                        <p>
                                            761571132500
                                            <br>
                                            Bank BNI
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="bank-item pb-3">
                                    <img src="{{ url('frontend/images/ic_bank.png') }}" class="bank-image" alt="">
                                    <div class="description">
                                        <h3>Gendhis Wedding</h3>
                                        <p>
                                            0012590132883392
                                            <br>
                                            Bank Mandiri
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div> --}}
                            
                            <div class="book-now-container">
                                <a href="{{ route('checkout-success', $item->id) }}" class="btn btn-book-now btn-block mt-3 py-2">
                                    Confirm Booking
                                </a>
                            </div>
                            @endif
                            <div class="text-center mt-3">
                                <a href="{{ route('detail', $item->wedding_package->slug) }}" class="text-muted">Cancel Booking</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/combined/css/gijgo.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('frontend/libraries/combined/js/gijgo.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            uilibrary:'bootstrap4', 
            icons:{
                rightIcon:'<img src="{{ url('frontend/images/ic_calendar2.png') }}" />'
            }
            });
        });

    </script>
@endpush

