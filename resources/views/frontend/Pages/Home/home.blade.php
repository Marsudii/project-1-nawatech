@extends('frontend.index')
@section('content')
    <!-- Main Section-->
    <section class="mt-0 overflow-hidden ">
        <!-- Page Content Goes Here -->

        <!-- / Top banner -->
        <section class="vh-75 vh-lg-60 container-fluid rounded overflow-hidden" data-aos="fade-in">
            <!-- Swiper Info -->
            <div class="swiper-container overflow-hidden rounded h-100 bg-light" data-swiper
                data-options='{
              "spaceBetween": 0,
              "slidesPerView": 1,
              "effect": "fade",
              "speed": 1000,
              "loop": true,
              "parallax": true,
              "observer": true,
              "observeParents": true,
              "lazy": {
                "loadPrevNext": true
                },
                "autoplay": {
                  "delay": 5000,
                  "disableOnInteraction": false
              },
              "pagination": {
                "el": ".swiper-pagination",
                "clickable": true
                }
              }'>
                <div class="swiper-wrapper">

                    <!-- Slide-->
                    <div class="swiper-slide position-relative h-100 w-100">
                        <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                            <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden"
                                data-swiper-parallax="-100"
                                style=" will-change: transform; background-image: url(./assets/images/banners/banner-1.jpg)">
                            </div>
                        </div>
                        <div
                            class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                            <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100">Everything
                                You Need</p>
                            <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white"
                                data-swiper-parallax="100">
                                <span class="text-outline-light">Summer</span> Essentials
                            </h2>
                            <div data-swiper-parallax-y="-25">
                                <a href="./category.html" class="btn btn-psuedo text-white" role="button">Shop New
                                    Arrivals</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Slide-->

                    <!-- Slide-->
                    <div class="swiper-slide position-relative h-100 w-100">
                        <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                            <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden"
                                data-swiper-parallax="-100"
                                style=" will-change: transform; background-image: url(./assets/images/banners/banner-2.jpg)">
                            </div>
                        </div>
                        <div
                            class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                            <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100">Spring
                                Collection</p>
                            <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white"
                                data-swiper-parallax="100">
                                Adidas <span class="text-outline-light">SS21</span></h2>
                            <div data-swiper-parallax-y="-25">
                                <a href="./category.html" class="btn btn-psuedo text-white" role="button">Shop
                                    Latest Adidas</a>
                            </div>
                        </div>
                    </div>
                    <!--/Slide-->

                    <!-- Slide-->
                    <div class="swiper-slide position-relative h-100 w-100">
                        <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                            <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden"
                                data-swiper-parallax="-100"
                                style=" will-change: transform; background-image: url(./assets/images/banners/banner-4.jpg)">
                            </div>
                        </div>
                        <div
                            class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                            <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100">Just Do it
                            </p>
                            <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white"
                                data-swiper-parallax="100">
                                Nike <span class="text-outline-light">SS21</span></h2>
                            <div data-swiper-parallax-y="-25">
                                <a href="./category.html" class="btn btn-psuedo text-white" role="button">Shop
                                    Latest Nike</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Slide-->

                    <!--Slide-->
                    <div class="swiper-slide position-relative h-100 w-100">
                        <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                            <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden"
                                data-swiper-parallax="-100"
                                style=" will-change: transform; background-image: url(./assets/images/banners/banner-3.jpg)">
                            </div>
                        </div>
                        <div
                            class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                            <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100">Look Good
                                Feel Good</p>
                            <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white"
                                data-swiper-parallax="100">
                                <span class="text-outline-light">Sustainable</span> Fashion
                            </h2>
                            <div data-swiper-parallax-y="-25">
                                <a href="./category.html" class="btn btn-psuedo text-white" role="button">Why We Are
                                    Different</a>
                            </div>
                        </div>
                    </div>
                    <!--/Slide-->

                </div>

                <div class="swiper-pagination swiper-pagination-bullet-light"></div>

            </div>
            <!-- / Swiper Info-->
        </section>
        <!--/ Top Banner-->
        <br />




        <div class="container-fluid" data-aos="fade-in">
            <!-- Category Toolbar-->
            <div class="d-flex justify-content-between items-center pt-5 pb-4 flex-column flex-lg-row">
                <div>
                    <h1 class="fw-bold fs-3 mb-2">Motorcycle</h1>
                    <p class="m-0 text-muted small">New Edition</p>
                </div>

            </div> <!-- /Category Toolbar-->



            <!-- Products-->
            <div class="row g-4">

                @foreach ($dataProduct as $product)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <!-- Card Product-->
                        <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                            <div class="card-img position-relative">

                                <picture class="position-relative overflow-hidden d-block bg-light">
                                    <img class="w-100 img-fluid position-relative z-index-10" title=""
                                        src="{{ url('assets/images/products', $product->image_product) }}" alt="">
                                </picture>
                                <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                    <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick Add</button>
                                </div>
                            </div>
                            <div class="card-body px-0">
                                <a class="text-decoration-none link-cover"
                                    href="{{ route('fe-shop-detail', $product->slug_product) }}">{{ $product->name_product }}</a>
                                <small class="text-muted d-block">{{ $product->qty }} Stock</small>
                                <p class="mt-2 mb-0 small"><span class="text-danger">Rp. {{ $product->price }}</span></p>
                            </div>
                        </div>
                        <!--/ Card Product-->
                    </div>
                @endforeach
                <div class="text-center">
                    <div class="pagination">
                        {{ $dataProduct->links('frontend.Components.paginate') }}
                    </div>
                </div>
            </div>






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
                    <p class="small m-0 text-center text-lg-start">&copy; 2021 OldSkool All Rights Reserved. Template
                        by <a href="https://www.pixelrocket.store">Pixel Rocket</a></p>
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
