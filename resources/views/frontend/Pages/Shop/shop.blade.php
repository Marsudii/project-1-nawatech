@extends('frontend.index')
@section('content')
    <!-- Main Section-->
    <section class="mt-0 ">
        <!-- Page Content Goes Here -->

        <!-- Category Top Banner -->
        <div class="py-10 bg-img-cover bg-overlay-dark position-relative overflow-hidden bg-pos-center-center rounded-0"
            style="background-image: url(./assets/images/banners/banner-category-top.jpg);">
            <div class="container-fluid position-relative z-index-20" data-aos="fade-right" data-aos-delay="300">
                <h1 class="fw-bold display-6 mb-4 text-white">Product</h1>
                <div class="col-12 col-md-6">
                    <p class="text-white mb-0 fs-5">
                        Product Kami
                    </p>
                </div>
            </div>
        </div>
        <!-- Category Top Banner -->

        <div class="container-fluid" data-aos="fade-in">
            <!-- Category Toolbar-->
            <div class="d-flex justify-content-between items-center pt-5 pb-4 flex-column flex-lg-row">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('fe-home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route('fe-shop') }}">Product</a></li>
                        </ol>
                    </nav>
                    <h1 class="fw-bold fs-3 mb-2">Product (121)</h1>
                </div>
            </div>


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

    <!-- Theme JS -->
@endsection
