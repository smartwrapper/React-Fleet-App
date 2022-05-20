<!DOCTYPE html>
<html class="no-js h-100" lang="zxx">

<head>
    <meta charset="UTF-8">
    <title>{{ isset(getSetting()['seo_title']) ? getSetting()['seo_title'] : 'Seo Title' }}</title>
    <meta name="description"
        content="{{ isset(getSetting()['seo_description']) ? getSetting()['seo_description'] : 'Seo Description' }}">
    <meta name="keywords"
        content="{{ isset(getSetting()['seo_keywords']) ? getSetting()['seo_keywords'] : 'Seo Keywords' }}">
    <meta name="author" content="">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png"
        href="{{ isset(getSetting()['favicon']) ? getSetting()['favicon'] : '01-fav.png' }}">

    <!-- Fontawesome CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Core CSS Files -->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/style.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body class="h-100">


<div class="h-100">
    <div class="container-fluid h-100 p-0">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="row w-100 justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                    <div class="paymentcard">
                        <img class="img-fluid" src="{{asset('images/razorpay.png')}}" alt="">
                        <h3>Continue Payment</h3>
                        <div class="formpaytree w-100 text-left">
                          <p>Credit Card Number</p>
                          <input type="number" class="form-control" id="first_name" placeholder="First Name">
                          <p>Expiration Date</p>
                          <input type="date" class="form-control" id="first_name" placeholder="First Name">
                          <p>CVV</p>
                          <input type="number" class="form-control" id="first_name" placeholder="First Name">
                        </div>
                        <a href="#" class="btn btn-secondary swipe-to-top">Pay with Braintree</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>