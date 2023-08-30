@extends('frontend.index')
@section('content')
    <div class="container">
        <div class="row g-0 vh-lg-100">
            <div class="col-lg-7 pt-5">
                <div class="pe-lg-5">
                    <nav class="d-none d-md-block">
                        <ul class="list-unstyled d-flex justify-content-start mt-4 align-items-center fw-bolder small">
                            <li class="me-4"><a class="nav-link-checkout " href="{{ route('fe-home') }}">Home</a></li>
                            <li class="me-4"><a class="nav-link-checkout " href="{{ route('product') }}">Product</a></li>
                            <li class="me-4"><a class="nav-link-checkout nav-link-last active"
                                    href="{{ route('product-add') }}">Form Add Product</a></li>
                        </ul>
                    </nav>
                    <div class="mt-5">
                        <form method="POST" action="{{ route('product-add-data') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-4">
                                <h3 class="fs-5 fw-bolder m-0 lh-1">Form Add Product</h3>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="firstNameBilling" class="form-label">Name Product</label>
                                        <input type="text" class="form-control  @error('name_product') is-invalid @enderror" id="firstNameBilling" placeholder="Name Product"
                                            name="name_product" value="{{old('name_product')}}" placeholder="Name Product">
                                        @error('name_product')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="firstNameBilling" class="form-label">Price</label>
                                        <input type="text" id="rupiah" class="form-control @error('price') is-invalid @enderror" id="firstNameBilling" placeholder="Price Product"
                                            name="price" >
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="firstNameBilling" class="form-label">Qty (Stock)</label>
                                        <input type="number" class="form-control @error('qty') is-invalid @enderror" id="firstNameBilling" placeholder="Stock"
                                            name="qty" >
                                        @error('qty')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
                    <div class="pb-3">
                        <div class="row mx-0 py-4 g-0 border-bottom">
                            <div class="text-center">
                                <div class="col-2 position-relative">
                                    <picture class="d-block border">
                                        <img height="200px" width="200px"
                                            src="{{ url('assets/images/products/default.jpg') }}" alt="Default">
                                    </picture>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-4">
                        <label for="firstNameBilling" class="form-label">Image Product</label>
                        <div class="input-group mb-0">
                            <input type="file" class="form-control @error('image_product') is-invalid @enderror"
                                name="image_product">
                                @error('image_product')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                        </div>

                        <div class="pt-5 mt-5 pb-5 border-top d-flex justify-content-md-end align-items-center">
                            <button class="btn btn-dark w-100 w-md-auto" type="submit">Submit
                                Data</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
