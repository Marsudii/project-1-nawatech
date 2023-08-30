@extends('frontend.index')
@section('content')
    <!-- Page Content Goes Here -->
    <div class="container">
        <div class="row g-0 vh-lg-100">
            <div class="col-12 col-lg-7 pt-5 pt-lg-10">
                <div class="pe-lg-5">
                    <!-- Logo-->
                    <a class="navbar-brand fw-bold fs-3 flex-shrink-0 mx-0 px-0" href="./index.html">
                        <div class="d-flex align-items-center">
                            <svg class="f-w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 77.53 72.26">
                                <path
                                    d="M10.43,54.2h0L0,36.13,10.43,18.06,20.86,0H41.72L10.43,54.2Zm67.1-7.83L73,54.2,68.49,62,45,48.47,31.29,72.26H20.86l-5.22-9L52.15,0H62.58l5.21,9L54.06,32.82,77.53,46.37Z"
                                    fill="currentColor" fill-rule="evenodd" />
                            </svg>
                        </div>
                    </a>
                    <!-- / Logo-->
                    <nav class="d-none d-md-block">
                        <ul class="list-unstyled d-flex justify-content-start mt-4 align-items-center fw-bolder small">
                            <li class="me-4"><a class="nav-link-checkout " href="{{ route('fe-home') }}">Home</a></li>
                            <li class="me-4"><a class="nav-link-checkout  active" href="{{ route('fe-home') }}">Cart</a>
                            </li>
                            <li><a class="nav-link-checkout nav-link-last" href="{{ route('order', Auth::user()->id) }}">My
                                    Order</a></li>


                        </ul>
                    </nav>
                    <div class="mt-5">
                        <h3 class="fs-5 fw-bolder mb-0 border-bottom pb-4">My Cart</h3>
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <tbody class="border-0">
                                    <!-- Cart Item-->
                                    @if (!$dataCheckoutCart->isEmpty())
                                        @foreach ($dataCheckoutCart as $cart)
                                            <div class="row mx-0 py-4 g-0 border-bottom">
                                                <div class="col-2 position-relative">
                                                    <picture class="d-block border">
                                                        <img class="img-fluid"
                                                            src="{{ url('assets/images/products', $cart->joinProducts['image_product']) }}"
                                                            alt="HTML Bootstrap Template by Pixel Rocket">
                                                    </picture>
                                                </div>
                                                <div class="col-9 offset-1">
                                                    <div>
                                                        <h6 class="justify-content-between d-flex align-items-start mb-2">
                                                            {{ $cart->joinProducts['name_product'] }}
                                                            <i class="ri-close-line ms-3"></i>
                                                        </h6>
                                                        <span class="d-block text-muted fw-bolder text-uppercase fs-9">
                                                            Qty: {{ $cart->qty }}</span>
                                                    </div>
                                                    <p class="fw-bolder text-end text-muted m-0">
                                                        {{ $cart->joinProducts['price'] }}</p>
                                                </div>
                                                <form action="{{route('order-one',$cart->id)}}" method="POST">
                                                    @csrf
                                                <button class="btn btn-primary w-100 text-center" role="button">Order </button>
                                            </form>
                                            </div> <!-- / Cart Item-->
                                        @endforeach
                                        <br />
                                        <div class="d-flex flex-column flex-md-row justify-content-md-between mb-4 mb-md-2">
                                            <div>
                                                <p class="m-0 fw-bold fs-5">Total</p>

                                            </div>
                                            @if (!$dataCheckoutCart->isEmpty())
                                            <p class="m-0 fs-5 fw-bold">Rp. {{ number_format($total, 0, ',', '.') }}</p>
                                            @else
                                            <p class="m-0 fs-5 fw-bold">Rp. 0</p>
                                            @endif
                                        </div>
                                    @else
                                        <!-- Display content for an empty cart -->
                                        <p>Your cart is empty.</p>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">


                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
@endsection
