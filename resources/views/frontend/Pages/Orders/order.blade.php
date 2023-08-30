@extends('frontend.index')
@section('content')
    <!-- Page Content Goes Here -->
    <div class="container">
        <div class="row g-0 vh-lg-100">
            <div class="col-lg-7 pt-5 pt-lg-10">
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
                            <li class="me-4"><a class="nav-link-checkout "
                                    href="{{ route('cart', Auth::user()->id) }}">Cart</a>
                            </li>
                            <li><a class="nav-link-checkout nav-link-last active"
                                    href="{{ route('order', Auth::user()->id) }}">My
                                    Order</a></li>


                        </ul>
                    </nav>


                    <div class="mt-5">
                        <h6 class="justify-content-between d-flex align-items-start mb-2">Order Pending</h6>
                        <ul class="list-group mb-5 d-none d-lg-block rounded-0">
                            <div style="overflow-x: auto;">
                                <table>
                                    <tr style="background-color: blue">
                                        <th>
                                            <h6>Name Product</h6>
                                        </th>
                                        <th>
                                            <h6>Qty</h6>
                                        </th>
                                        <th>
                                            <h6>Price</h6>
                                        </th>
                                        <th class="text-center">
                                            <h6>Payment Order</h6>
                                        </th>
                                        <th class="text-center">
                                            <h6>Order Delete / Cancel</h6>
                                        </th>

                                    </tr>
                                    @foreach ($dataOrderPending as $data)
                                        <tr>
                                            <td><small>{{ $data->joinProducts['name_product'] }}</small></td>
                                            <td><small>{{ $data->qty }}</small></td>
                                            <td><small>{{ number_format($data->total, 0, ',', '.') }}</small></td>
                                            <td>
                                                <form action="{{ route('order-success', Auth::user()->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id_order" value="{{ $data->id }}">
                                                    <input type="hidden" name="id_product" value="{{ $data->joinProducts['id_product'] }}">
                                                    <input type="hidden" name="order_qty" value="{{ $data->qty }}">
                                                    <input type="number" name="payment" placeholder="100*****" class="@error('payment') is-invalid @enderror">
                                                    @error('payment')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <br/>
                                                    <br/>
                                                    <button id="myBtn" class="btn btn-success btn-sm text-center">Payment Order</button>
                                                </form>

                                            </td>
                                        </td>
                                        <td>
                                                <form action="{{ route('order-cancel', Auth::user()->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id_order" value="{{ $data->id }}">
                                                    <button class="btn btn-danger btn-sm">Cancel Order</button>
                                                </form>
                                                <form action="{{ route('order-delete', Auth::user()->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id_order" value="{{ $data->id }}">
                                                    <button class="btn btn-dark btn-sm">Delete Order</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>
                            </div>
                        </ul><!-- / Checkout Information Summary-->
                    </div>

                    <div class="mt-5">
                        <h6 class="justify-content-between d-flex align-items-start mb-2">Order Cancel</h6>
                        <ul class="list-group mb-5 d-none d-lg-block rounded-0">
                            <div style="overflow-x: auto;">
                                <table>
                                    <tr style="background-color: blue">
                                        <th>
                                            <h6>Name Product</h6>
                                        </th>
                                        <th>
                                            <h6>Qty</h6>
                                        </th>
                                        <th>
                                            <h6>Price</h6>
                                        </th>

                                    </tr>
                                    @foreach ($dataOrderCancel as $data)
                                        <tr>
                                            <td>{{ $data->joinProducts['name_product'] }}</td>
                                            <td>{{ $data->qty }}</td>
                                            <td>Rp. {{ number_format($data->total, 0, ',', '.') }}</td>

                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </ul><!-- / Checkout Information Summary-->
                    </div>


                    <div class="mt-5">
                        <h6 class="justify-content-between d-flex align-items-start mb-2">Order Delete</h6>
                        <ul class="list-group mb-5 d-none d-lg-block rounded-0">
                            <div style="overflow-x: auto;">
                                <table>
                                    <tr style="background-color: blue">
                                        <th>
                                            <h6>Name Product</h6>
                                        </th>
                                        <th>
                                            <h6>Qty</h6>
                                        </th>
                                        <th>
                                            <h6>Price</h6>
                                        </th>

                                    </tr>
                                    @foreach ($dataOrderDelete as $data)
                                        <tr>
                                            <td>{{ $data->joinProducts['name_product'] }}</td>
                                            <td>{{ $data->qty }}</td>
                                            <td>Rp. {{ number_format($data->total, 0, ',', '.') }}</td>

                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </ul><!-- / Checkout Information Summary-->
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
                    <div>

<br/>
<br/>
<br/>

                    </div>
                    <div class="mt-5">
                        <h6 class="justify-content-between d-flex align-items-start mb-2">Order Success</h6>
                        <ul class="list-group mb-5 d-none d-lg-block rounded-0">
                            <div style="overflow-x: auto;">
                                <table>
                                    <tr style="background-color: blue">
                                        <th>
                                            <h6>Name Product</h6>
                                        </th>
                                        <th>
                                            <h6>Qty</h6>
                                        </th>
                                        <th>
                                            <h6>Price</h6>
                                        </th>

                                    </tr>
                                    @foreach ($dataOrderSuccess as $data)
                                        <tr>
                                            <td>{{ $data->joinProducts['name_product'] }}</td>
                                            <td>{{ $data->qty }}</td>
                                            <td>Rp. {{ number_format($data->total, 0, ',', '.') }}</td>

                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </ul><!-- / Checkout Information Summary-->
                    </div>



                    <div class="mt-5">
                        <h6 class="justify-content-between d-flex align-items-start mb-2">Export Product</h6>
                        <ul class="list-group mb-5 d-none d-lg-block rounded-0">
                            <div style="overflow-x: auto;">
                                <table>


                                    <tr>
                                        <td>
                                            <form action="{{ route('export-excel', Auth::user()->id) }}" method="get">
                                                @csrf

                                                <button class="btn btn-dark btn-sm">Export Order XLS</button>
                                            </form>
                                        </td>


                                    </tr>

                                </table>
                            </div>
                        </ul><!-- / Checkout Information Summary-->
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
