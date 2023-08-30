@extends('frontend.index')
@section('content')
    <!-- Main Section-->
    <section class="mt-0 ">
        <!-- Page Content Goes Here -->

        <!-- Breadcrumbs-->
        <div class="bg-dark py-6">
            <div class="container-fluid">
                <nav class="m-0" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item breadcrumb-light"><a href="#">Home</a></li>
                        <li class="breadcrumb-item breadcrumb-light"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item  breadcrumb-light active" aria-current="page">
                            {{ $productDetail->name_product }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- / Breadcrumbs-->

        <div class="container-fluid mt-5">

            <!-- Product Top Section-->
            <div class="row g-9" data-sticky-container>

                <!-- Product Images-->
                <div class="col-12 col-md-6 col-xl-7">
                    <div class="row g-3" data-aos="fade-right">
                        <div class="col-12">
                            <picture>
                                <img class="img-fluid" data-zoomable
                                    src="{{ url('assets/images/products/', $productDetail->image_product) }}"
                                    alt="HTML Bootstrap Template by Pixel Rocket">
                            </picture>
                        </div>

                    </div>
                </div>
                <!-- /Product Images-->

                <!-- Product Information-->
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="sticky-top top-5">
                        <div class="pb-3" data-aos="fade-in">


                            <h1 class="mb-1 fs-2 fw-bold">{{ $productDetail->name_product }}</h1>
                            <div class="d-flex align-items-center mb-3">

                                <div class="d-flex justify-content-start align-items-center disable-child-pointer cursor-pointer"
                                    data-pixr-scrollto data-target=".reviews">
                                    <!-- Review Stars Small-->
                                    <div class="rating position-relative d-table">
                                        <div class="position-absolute stars" style="width: 80%">
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                        </div>
                                        <div class="stars">
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="fs-4 m-0">Rp. {{ $productDetail->price }}</p>
                            </div>
                            @if (Auth::check())
                                <form action="{{ route('cart-add') }}" method="POST">
                                    @csrf
                                    <div class="border-top mt-4 mb-3 product-option">
                                        <small class="text-uppercase pt-4 d-block fw-bolder">
                                            <span class="text-muted">Available Stock</span> :
                                            <span class=" fw-bold">{{ $productDetail->qty }}</span>
                                        </small>
                                        <input type="hidden" class="form-control" name="user_id"
                                            value="{{ Auth::user()->id }}">
                                        <input type="hidden" class="form-control" name="product_id"
                                            value="{{ $productDetail->id_product }}">
                                        <input type="hidden" class="form-control" name="price"
                                            value="{{ $productDetail->price }}">
                                        <input type="hidden" class="form-control" name="status" value="cart">

                                        <input type="number" class="form-control @error('qty') is-invalid @enderror"
                                            placeholder="Enter Quantity" name="qty" value="{{ old('qty') }}">
                                        @error('qty')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <button type="submit"
                                        class="btn btn-dark w-100 mt-4 mb-0 hover-lift-sm hover-boxshadow">Add To
                                        Cart</button>
                                </form>
                            @else
                                <div class="border-top mt-4 mb-3 product-option">
                                    <small class="text-uppercase pt-4 d-block fw-bolder">
                                        <span class="text-muted">Available Stock</span> :
                                        <span class="selected-option fw-bold"
                                            data-pixr-product-option="size">{{ $productDetail->qty }}</span>
                                    </small>
                                </div>
                                <a href="{{ route('login') }}"
                                    class="btn btn-dark w-100 mt-4 mb-0 hover-lift-sm hover-boxshadow">Add To Cart</a>
                            @endif

                            <!-- Product Highlights-->
                            <div class="my-5">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="text-center px-2">
                                            <i class="ri-24-hours-line ri-2x"></i>
                                            <small class="d-block mt-1">Next-day Delivery</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="text-center px-2">
                                            <i class="ri-secure-payment-line ri-2x"></i>
                                            <small class="d-block mt-1">Secure Checkout</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="text-center px-2">
                                            <i class="ri-service-line ri-2x"></i>
                                            <small class="d-block mt-1">Free Returns</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- / Product Highlights-->


                        </div>
                    </div>
                </div>
                <!-- / Product Information-->
            </div>
            <!-- / Product Top Section-->



        </div>

        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->

    <!-- Footer -->
    <footer class="border-top py-5 mt-4  ">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-column flex-lg-row">
                <div>
                    <ul class="list-unstyled">
                        <li class="d-inline-block me-1"><a class="text-decoration-none text-dark-hover transition-all"
                                href="#"><i class="ri-instagram-fill"></i></a></li>
                        <li class="d-inline-block me-1"><a class="text-decoration-none text-dark-hover transition-all"
                                href="#"><i class="ri-facebook-fill"></i></a></li>
                        <li class="d-inline-block me-1"><a class="text-decoration-none text-dark-hover transition-all"
                                href="#"><i class="ri-twitter-fill"></i></a></li>
                        <li class="d-inline-block me-1"><a class="text-decoration-none text-dark-hover transition-all"
                                href="#"><i class="ri-snapchat-fill"></i></a></li>
                    </ul>
                </div>
                <div class="d-flex align-items-center justify-content-end flex-column flex-lg-row">
                    <p class="small m-0 text-center text-lg-start">&copy; 2021 OldSkool All Rights Reserved. Template by <a
                            href="https://www.pixelrocket.store">Pixel Rocket</a></p>
                    <ul class="list-unstyled mb-0 ms-lg-4 mt-3 mt-lg-0 d-flex justify-content-end align-items-center">
                        <li class="bg-light p-2 d-flex align-items-center justify-content-center me-2">
                            <i class="pi pi-sm pi-paypal"></i>
                        </li>
                        <li class="bg-light p-2 d-flex align-items-center justify-content-center me-2">
                            <i class="pi pi-sm pi-mastercard"></i>
                        </li>
                        <li class="bg-light p-2 d-flex align-items-center justify-content-center me-2">
                            <i class="pi pi-sm pi-american-express"></i>
                        </li>
                        <li class="bg-light p-2 d-flex align-items-center justify-content-center"><i
                                class="pi pi-sm pi-visa"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer> <!-- / Footer-->
@endsection
