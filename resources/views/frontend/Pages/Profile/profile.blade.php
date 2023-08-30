@extends('frontend.index')
@section('content')
    <div class="container">
        <div class="row g-0 vh-lg-100">
            <div class="col-lg-7 pt-5">
                <div class="pe-lg-5">

                    <nav class="d-none d-md-block">
                        <ul class="list-unstyled d-flex justify-content-start mt-4 align-items-center fw-bolder small">
                            <li class="me-4"><a class="nav-link-checkout " href="{{ route('fe-home') }}">Home</a></li>
                            <li class="me-4"><a class="nav-link-checkout nav-link-last active"
                                    href="{{ route('profile', Auth::user()->id) }}">Profile</a></li>
                        </ul>
                    </nav>
                    <div class="mt-5">
                        <form method="POST" action="{{ route('profile-update-personal', $dataUser->id) }}">
                            @csrf
                            <!-- Checkout Panel Information-->
                            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-4">
                                <h3 class="fs-5 fw-bolder m-0 lh-1">Personal Information</h3>

                            </div>
                            <div class="row">
                                <!-- First Name-->
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="firstNameBilling" class="form-label">Fullname</label>
                                        <input type="text" class="form-control" id="firstNameBilling" placeholder=""
                                            name="name" value="{{ $dataUser->name }}" required="">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Email-->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email (
                                            @if (Auth::user()->is_email_verified == '1')
                                                <small style="color:blue">Verified</small>
                                            @else
                                                <small style="color:red">Unverified</small>
                                            @endif

                                            )
                                        </label>


                                        <input type="email" class="form-control" id="email"
                                            placeholder="you@example.com" value="{{ $dataUser->email }}" readonly>
                                    </div>


                                </div>

                            </div>

                            <h3 class="fs-5 mt-5 fw-bolder mb-4 border-bottom pb-4">Change To Password</h3>
                            <div class="row">
                                <!-- First Name-->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstName" class="form-label">New Password</label>

                                        <input type="password" name="password"
                                            class="form-control  @error('password') is-invalid @enderror"
                                            id="login-password" placeholder="Enter your new password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                    </div>
                                </div>

                                <!-- Last Name-->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastName" class="form-label">Confirmation New Password</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="login-password" placeholder="Retype confirmation password">

                                    </div>
                                </div>
                            </div>
                            <!-- / Billing Address-->

                            <div class="pt-5 mt-5 pb-5 border-top d-flex justify-content-md-end align-items-center">
                                <button class="btn btn-dark w-100 w-md-auto" type="submit">Update
                                    Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
                    <div class="pb-3">

                        <!-- Cart Item-->
                        <div class="row mx-0 py-4 g-0 border-bottom">
                            <div class="col-2 position-relative">

                                <picture class="d-block border">
                                    <img height="400px" width="400px"
                                        src="{{ url('assets/images/profile', $dataUser->images_profile) }}"
                                        alt="HTML Bootstrap Template by Pixel Rocket">
                                </picture>
                            </div>

                        </div> <!-- / Cart Item-->
                    </div>

                    <div class="py-4">
                        <form method="POST" action="{{ route('profile-update-image', $dataUser->id) }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="input-group mb-0">

                                <input type="file" class="form-control @error('images_profile') is-invalid @enderror"
                                    name="images_profile">

                                <button class="btn btn-dark btn-sm px-4">Apply</button>
                                @error('images_profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
