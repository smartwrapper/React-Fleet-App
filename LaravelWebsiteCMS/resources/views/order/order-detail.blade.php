@extends('layouts.master')
@section('content')
    <div class="container-fuild">
        <nav aria-label="breadcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                </ol>
            </div>
        </nav>
    </div>


    <!--My Order Content -->
    <section class="order-two-content pro-content">
        <div class="container">
            <div class="page-heading-title">
                <h2> Order Information
                </h2>

            </div>
        </div>
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-3 ">
                    <div class="heading">
                        <h2>
                            My Account
                        </h2>
                        <hr>
                    </div>

                    <ul class="list-group">
                        <li class="list-group-item">
                            <a class="nav-link" href="profile.html">
                                <i class="fas fa-user"></i>
                                Profile
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a class="nav-link" href="wishlist.html">
                                <i class="fas fa-heart"></i>
                                Wishlist
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a class="nav-link" href="orders.html">
                                <i class="fas fa-shopping-cart"></i>
                                Orders
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a class="nav-link" href="shipping-address.html">
                                <i class="fas fa-map-marker-alt"></i>
                                Shipping Address
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a class="nav-link" href="javascript:void(0)">
                                <i class="fas fa-power-off"></i>
                                Logout
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a class="nav-link" href="change-password.html">
                                <i class="fas fa-unlock-alt"></i>
                                Change Password
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-9 ">


                    <div class="row">
                        <div class="col-12 col-md-5">
                            <div class="heading">
                                <h2>
                                    <small>
                                        Order ID#35468430
                                    </small>
                                </h2>
                                <hr>
                            </div>

                            <table class="table order-id">
                                <tbody>
                                    <tr class="d-flex">
                                        <td class="col-6 col-md-6">Order Status</td>
                                        <td class="pending col-6 col-md-6">
                                            <p>Pending</p>
                                        </td>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="col-6 col-md-6">Order Date</td>
                                        <td class="underline col-6 col-md-6" align="left">28/04/2019</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="col-12 col-md-7">
                            <div class="heading">
                                <h2>
                                    <small>
                                        Shipping Details
                                    </small>
                                </h2>
                                <hr>
                            </div>

                            <table class="table order-id">
                                <tbody>
                                    <tr class="d-flex">
                                        <td class="address col-12 col-md-6">Shipping Address</td>


                                    </tr>
                                    <tr class="d-flex">
                                        <td class="address col-12 col-md-12">Address Details, Near, City Name, Country Name
                                        </td>

                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12 col-md-5">
                            <div class="heading">
                                <h2>
                                    <small>
                                        Billing Details
                                    </small>
                                </h2>
                                <hr>
                            </div>

                            <table class="table order-id">
                                <tbody>
                                    <tr class="d-flex">
                                        <td class="address col-12">Shipping Address</td>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="address col-12">Address Details, Near, City Name, Country Name</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="col-12 col-md-7">
                            <div class="heading">
                                <h2>
                                    <small>
                                        Payment/Shipping Method
                                    </small>
                                </h2>
                                <hr>
                            </div>

                            <table class="table order-id">
                                <tbody>
                                    <tr class="d-flex">
                                        <td class="col-6">Shipping Method</td>
                                        <td class="col-6">Flat Rate</td>
                                    </tr>
                                    <tr class="d-flex">
                                        <td class="col-6">Payment Method</td>
                                        <td class="underline col-6">Cash on Delivery</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <table class="table items">

                        <thead>
                            <tr class="d-flex">
                                <th class="col-2"></th>
                                <th class="col-3">ITEM'S</th>
                                <th class="col-3">PRICE</th>
                                <th class="col-2">QTY</th>
                                <th class="col-2">SUBTOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="d-flex responsive-lay">
                                <td class="col-12 col-md-2">
                                    <img class="img-fluid order-img" src="images/wishlist/wishlist-1.png" alt="John Doe"
                                        class="mr-3">
                                </td>
                                <td class="col-12 col-md-3 item-detail-left">
                                    <div class="text-body">
                                        <h4>MEN'S CASUAL SHOES<br>
                                            <small>Men's Fashion</small>
                                        </h4>

                                    </div>

                </div>
                </td>
                <td class="tag-color col-12 col-md-3">$85</td>
                <td class="col-12 col-md-2">
                    <div class="input-group">
                        <input name="quantity[]" type="text" readonly value="01" class="form-control qty" min="1" max="300">

                    </div>
                </td>
                <td class="tag-s col-12 col-md-2">$85</td>
                </tr>


                </tbody>
                </table>

                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="comments-area">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Comments</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    placeholder="Give Your Comments here"></textarea>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ............the end..... -->
            </div>
        </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
