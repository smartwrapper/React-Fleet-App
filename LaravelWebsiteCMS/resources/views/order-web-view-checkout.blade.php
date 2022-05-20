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

    <input type="hidden" id="payment-method-nonce" name="payment-method-nonce" />
    <input type="hidden" id="data-descriptor" name="data-descriptor" />
    <input type="hidden" id="data-value" name="data-value" />



    @if (isset($_GET['payment_method']) && $_GET['payment_method'] == 'braintree')
        <div class="h-100">
            <div class="container-fluid h-100 p-0">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="row w-100 justify-content-center">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                            <div class="paymentcard">
                                <img class="img-fluid" src="{{ asset('images/braintree.png') }}" alt="">
                                <h3>Continue Payment</h3>
                                <div class="formpaytree w-100 text-left">

                                    <form class="needs-validation" id="braintree-form" novalidate="">
                                        <label for="cc-number">Credit card number</label>
                                        <div class="form-control" id="cc-number"></div>
                                        <div class="invalid-feedback">
                                            Credit card number is required
                                        </div>
                                        <br />
                                        <label for="cc-expiration">Expiration</label>
                                        <div class="form-control" id="cc-expiration"></div>
                                        <div class="invalid-feedback">
                                            Expiration date required
                                        </div>
                                        <br />
                                        <label for="cc-expiration">CVV</label>
                                        <div class="form-control" id="cc-cvv"></div>
                                        <div class="invalid-feedback">
                                            Security code required
                                        </div>
                                        <br />

                                        <button class="btn btn-secondary swipe-to-top" type="submit">Pay with <span
                                                id="card-brand">Card</span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if (isset($_GET['payment_method']) && $_GET['payment_method'] == 'razorpay')
        <div class="h-100">
            <div class="container-fluid h-100 p-0">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="row w-100 justify-content-center">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                            <div class="paymentcard">
                                <img class="img-fluid" src="{{ asset('images/razorpay.png') }}" alt="">
                                <h3>Continue Payment</h3>
                                <button type="submit"
                                    class="btn btn-secondary swipe-to-top createOrder">{{ trans('lables.checkout-continue') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (isset($_GET['payment_method']) && $_GET['payment_method'] == 'paytm')
        <div class="h-100">
            <div class="container-fluid h-100 p-0">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="row w-100 justify-content-center">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                            <div class="paymentcard">
                                <img class="img-fluid" src="{{ asset('images/paytm.png') }}" alt="">
                                <h3>Continue Payment</h3>
                                <form class="needs-validation" action="{{ url('paytm-pay') }}" id="paytm-form"
                                    novalidate="">
                                    <div class="formpaytree w-100 text-left">
                                        <p>Name</p>
                                        <input type="text" id="paytm-name" name="name" class="form-control"
                                            placeholder="Name">
                                        <p>Mobile</p>
                                        <input type="text" id="paytm-mobile" name="mobile" class="form-control"
                                            placeholder="Mobile">
                                        <p>Email</p>
                                        <input type="email" id="paytm-email" class="form-control" placeholder="Email"
                                            name="email" />
                                        <input type="hidden" name="order_id" value="" id="order_status_by_paytm" />
                                        <br />
                                        <button type="submit" class="btn btn-success btn-block paytm-button">Pay to
                                            Paytm</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (isset($_GET['payment_method']) && $_GET['payment_method'] == 'mollie')
        <div class="h-100">
            <div class="container-fluid h-100 p-0">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="row w-100 justify-content-center">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                            <div class="paymentcard">
                                <img class="img-fluid" src="{{ asset('images/mollie.png') }}" alt="">
                                <h3>Continue Payment</h3>
                                <button type="submit"
                                    class="btn btn-secondary swipe-to-top createOrder">{{ trans('lables.checkout-continue') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if (isset($_GET['payment_method']) && $_GET['payment_method'] == 'paystack')
        <div class="h-100">
            <div class="container-fluid h-100 p-0">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="row w-100 justify-content-center">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                            <div class="paymentcard">
                                <img class="img-fluid" src="{{ asset('images/paystack.png') }}" alt="">
                                <h3>Continue Payment</h3>
                                <button type="submit"
                                    class="btn btn-secondary swipe-to-top createOrder">{{ trans('lables.checkout-continue') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://jstest.authorize.net/v1/Accept.js" charset="utf-8"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        customerToken = "{{ isset($_GET['token']) ? $_GET['token'] : '' }}";
        // customerToken = localStorage.getItem('customerToken');
        payment_method = "{{ isset($_GET['payment_method']) ? $_GET['payment_method'] : '' }}";
        locations ="{{ isset($_GET['location']) ? $_GET['location'] : '' }}";
        billing_first_name = "{{ isset($_GET['billing_first_name']) ? $_GET['billing_first_name'] : '' }}";
        billing_last_name = "{{ isset($_GET['billing_last_name']) ? $_GET['billing_last_name'] : '' }}";
        billing_street_aadress = "{{ isset($_GET['billing_street_aadress']) ? $_GET['billing_street_aadress'] : '' }}";
        billing_country = "{{ isset($_GET['billing_country']) ? $_GET['billing_country'] : '' }}";
        billing_state = "{{ isset($_GET['billing_state']) ? $_GET['billing_state'] : '' }}";
        billing_city = "{{ isset($_GET['billing_city']) ? $_GET['billing_city'] : '' }}";
        billing_postcode = "{{ isset($_GET['billing_postcode']) ? $_GET['billing_postcode'] : '' }}";
        billing_phone = "{{ isset($_GET['billing_phone']) ? $_GET['billing_phone'] : '' }}";

        delivery_first_name = "{{ isset($_GET['delivery_first_name']) ? $_GET['delivery_first_name'] : '' }}";
        delivery_last_name = "{{ isset($_GET['delivery_last_name']) ? $_GET['delivery_last_name'] : '' }}";
        delivery_street_aadress =
            "{{ isset($_GET['delivery_street_aadress']) ? $_GET['delivery_street_aadress'] : '' }}";
        delivery_country = "{{ isset($_GET['delivery_country']) ? $_GET['delivery_country'] : '' }}";
        delivery_state = "{{ isset($_GET['delivery_state']) ? $_GET['delivery_state'] : '' }}";
        delivery_city = "{{ isset($_GET['delivery_city']) ? $_GET['delivery_city'] : '' }}";
        delivery_postcode = "{{ isset($_GET['delivery_postcode']) ? $_GET['delivery_postcode'] : '' }}";
        delivery_phone = "{{ isset($_GET['delivery_phone']) ? $_GET['delivery_phone'] : '' }}";
        order_notes = "{{ isset($_GET['order_notes']) ? $_GET['order_notes'] : '' }}";
        coupon_code = "{{ isset($_GET['couponCart']) ? $_GET['couponCart'] : '' }}";
        currency_id = "{{ isset($_GET['currency_id']) ? $_GET['currency_id'] : '' }}";
        $(document).ready(function() {
            var url = "{{ url('') }}" + '/api/client/get-braintree-auth-token';
            var braintree_token = null;

            var form = $('#braintree-form');
            $.ajax({
                type: 'post',
                url: url,
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        braintree_token = data.data.token;
                        braintree.client.create({
                            authorization: braintree_token
                        }, function(err, clientInstance) {
                            if (err) {
                                console.error(err);
                                return;
                            }

                            braintree.hostedFields.create({
                                client: clientInstance,
                                styles: {
                                    input: {
                                        // change input styles to match
                                        // bootstrap styles
                                        'font-size': '1rem',
                                        color: '#495057'
                                    }
                                },
                                fields: {
                                    // cardholderName: {
                                    //     selector: '#cc-name',
                                    //     placeholder: 'Name as it appears on your card'
                                    // },
                                    number: {
                                        selector: '#cc-number',
                                        placeholder: '4111 1111 1111 1111'
                                    },
                                    cvv: {
                                        selector: '#cc-cvv',
                                        placeholder: '123'
                                    },
                                    expirationDate: {
                                        selector: '#cc-expiration',
                                        placeholder: 'MM / YY'
                                    }
                                }
                            }, function(err, hostedFieldsInstance) {
                                if (err) {
                                    console.error(err);
                                    return;
                                }

                                function createInputChangeEventListener(element) {
                                    return function() {
                                        validateInput(element);
                                    }
                                }

                                function setValidityClasses(element, validity) {
                                    if (validity) {
                                        element.removeClass('is-invalid');
                                        element.addClass('is-valid');
                                    } else {
                                        element.addClass('is-invalid');
                                        element.removeClass('is-valid');
                                    }
                                }

                                function validateInput(element) {
                                    // very basic validation, if the
                                    // fields are empty, mark them
                                    // as invalid, if not, mark them
                                    // as valid

                                    if (!element.val().trim()) {
                                        setValidityClasses(element, false);

                                        return false;
                                    }

                                    setValidityClasses(element, true);

                                    return true;
                                }

                                // function validateEmail() {
                                //     var baseValidity = validateInput(email);

                                //     if (!baseValidity) {
                                //         return false;
                                //     }

                                //     if (email.val().indexOf('@') === -1) {
                                //         setValidityClasses(email, false);
                                //         return false;
                                //     }

                                //     setValidityClasses(email, true);
                                //     return true;
                                // }

                                // var ccName = $('#cc-name');
                                // var email = $('#email');

                                // ccName.on('change', function() {
                                //     validateInput(ccName);
                                // });
                                // email.on('change', validateEmail);


                                hostedFieldsInstance.on('validityChange', function(
                                    event) {
                                    var field = event.fields[event.emittedBy];

                                    // Remove any previously applied error or warning classes
                                    $(field.container).removeClass('is-valid');
                                    $(field.container).removeClass(
                                        'is-invalid');

                                    if (field.isValid) {
                                        $(field.container).addClass('is-valid');
                                    } else if (field.isPotentiallyValid) {
                                        // skip adding classes if the field is
                                        // not valid, but is potentially valid
                                    } else {
                                        $(field.container).addClass(
                                            'is-invalid');
                                    }
                                });

                                // hostedFieldsInstance.on('cardTypeChange', function(event) {
                                //     var cardBrand = $('#card-brand');
                                //     var cvvLabel = $('[for="braintree-cvv"]');

                                //     if (event.cards.length === 1) {
                                //         var card = event.cards[0];

                                //         // change pay button to specify the type of card
                                //         // being used
                                //         cardBrand.text(card.niceType);
                                //         // update the security code label
                                //         cvvLabel.text(card.code.name);
                                //     } else {
                                //         // reset to defaults
                                //         cardBrand.text('Card');
                                //         cvvLabel.text('CVV');
                                //     }
                                // });

                                form.submit(function(event) {
                                    event.preventDefault();

                                    var formIsInvalid = false;
                                    var state = hostedFieldsInstance.getState();

                                    // perform validations on the non-Hosted Fields
                                    // inputs
                                    // if (!validateEmail()) {
                                    //     formIsInvalid = true;
                                    // }

                                    // Loop through the Hosted Fields and check
                                    // for validity, apply the is-invalid class
                                    // to the field container if invalid
                                    Object.keys(state.fields).forEach(function(
                                        field) {
                                        if (!state.fields[field]
                                            .isValid) {
                                            $(state.fields[field]
                                                    .container)
                                                .addClass('is-invalid');
                                            formIsInvalid = true;
                                        }
                                    });

                                    // if (formIsInvalid) {
                                    //     // skip tokenization request if any fields are invalid
                                    //     return;
                                    // }

                                    hostedFieldsInstance.tokenize(function(err,
                                        payload) {
                                        if (err) {
                                            console.error(err);
                                            return;
                                        }

                                        // This is where you would submit payload.nonce to your server
                                        // $('.toast').toast('show');
                                        alert('payment successfully');

                                        // you can either send the form values with the payment
                                        // method nonce via an ajax request to your server,
                                        // or add the payment method nonce to a hidden inpiut
                                        // on your form and submit the form programatically
                                        $('#payment-method-nonce').val(
                                            payload
                                            .nonce);

                                        url = '/api/client/order';
                                        $.ajax({
                                            type: 'post',
                                            url: "{{ url('') }}" +
                                                url,
                                            data: {
                                                billing_first_name: billing_first_name,
                                                billing_last_name: billing_last_name,
                                                billing_street_aadress: billing_street_aadress,
                                                billing_country: billing_country,
                                                billing_state: billing_state,
                                                billing_city: billing_city,
                                                billing_postcode: billing_postcode,
                                                billing_phone: billing_phone,
                                                delivery_first_name: delivery_first_name,
                                                delivery_last_name: delivery_last_name,
                                                delivery_street_aadress: delivery_street_aadress,
                                                delivery_country: delivery_country,
                                                delivery_state: delivery_state,
                                                delivery_city: delivery_city,
                                                delivery_postcode: delivery_postcode,
                                                delivery_phone: delivery_phone,
                                                order_notes: order_notes,
                                                coupon_code: coupon_code,
                                                latlong: locations,
                                                currency_id: currency_id,
                                                payment_method: payment_method,

                                                payment_method_nonce: '',
                                                authorize_net_data_value: '',
                                                authorize_net_data_descriptor: '',
                                            },
                                            headers: {
                                                'Authorization': 'Bearer ' +
                                                    customerToken,
                                                'X-CSRF-TOKEN': $(
                                                    'meta[name="csrf-token"]'
                                                    ).attr(
                                                    'content'
                                                    ),
                                                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                                                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                                            },
                                            beforeSend: function() {},
                                            success: function(
                                                data) {
                                                if (data
                                                    .status ==
                                                    'Success'
                                                    ) {
                                                    if (payment_method ==
                                                        "mollie"
                                                        ) {
                                                        window
                                                            .location
                                                            .href =
                                                            "{{ url('/mollie-payment/') }}" +
                                                            "/" +
                                                            data
                                                            .data
                                                            .order_id;
                                                    }
                                                    if (payment_method ==
                                                        "paystack"
                                                        ) {
                                                        url =
                                                            '/api/client/paystack-authorization';
                                                        $.ajax({
                                                            type: 'post',
                                                            url: "{{ url('') }}" +
                                                                url,
                                                            data: {
                                                                order_id: data
                                                                    .data
                                                                    .order_id,
                                                            },
                                                            headers: {
                                                                'Authorization': 'Bearer ' +
                                                                    customerToken,
                                                                'X-CSRF-TOKEN': $(
                                                                        'meta[name="csrf-token"]'
                                                                        )
                                                                    .attr(
                                                                        'content'
                                                                        ),
                                                                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                                                                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                                                            },
                                                            beforeSend: function() {},
                                                            success: function(
                                                                data
                                                                ) {
                                                                if (data
                                                                    .status ==
                                                                    'Success'
                                                                    ) {
                                                                    window
                                                                        .location
                                                                        .href =
                                                                        data
                                                                        .data;
                                                                } else if (
                                                                    data
                                                                    .status ==
                                                                    'Error'
                                                                    ) {

                                                                }
                                                            },
                                                            error: function(
                                                                data
                                                                ) {


                                                            },
                                                        });
                                                    } else
                                                        window
                                                        .location
                                                        .href =
                                                        "{{ url('/thankyou') }}";

                                                } else if (
                                                    data
                                                    .status ==
                                                    'Error'
                                                    ) {

                                                    $("#pills-shipping-tab")
                                                        .addClass(
                                                            'active'
                                                            );
                                                    $("#pills-shipping")
                                                        .addClass(
                                                            'show active'
                                                            );
                                                }
                                            },
                                            error: function(
                                                data) {
                                                if (data
                                                    .status ==
                                                    422) {
                                                    jQuery
                                                        .each(
                                                            data
                                                            .responseJSON
                                                            .errors,
                                                            function(
                                                                index,
                                                                item
                                                                ) {
                                                                $("#" +
                                                                        index)
                                                                    .parent()
                                                                    .find(
                                                                        '.invalid-feedback'
                                                                        )
                                                                    .css(
                                                                        'display',
                                                                        'block'
                                                                        );
                                                                $("#" +
                                                                        index)
                                                                    .parent()
                                                                    .find(
                                                                        '.invalid-feedback'
                                                                        )
                                                                    .html(
                                                                        item
                                                                        );
                                                            }
                                                            );
                                                } else {

                                                }
                                                $("#pills-shipping-tab")
                                                    .addClass(
                                                        'active'
                                                        );
                                                $("#pills-shipping")
                                                    .addClass(
                                                        'show active'
                                                        );

                                                $("#pills-billing-tab")
                                                    .removeClass(
                                                        'active'
                                                        );
                                                $("#pills-billing")
                                                    .removeClass(
                                                        'show active'
                                                        );

                                                $("#pills-method-tab")
                                                    .removeClass(
                                                        'active'
                                                        );
                                                $("#pills-method")
                                                    .removeClass(
                                                        'show active'
                                                        );

                                                $("#pills-order-tab")
                                                    .removeClass(
                                                        'active'
                                                        );
                                                $("#pills-order")
                                                    .removeClass(
                                                        'show active'
                                                        );

                                            },
                                        });
                                    });
                                });
                            });
                        });
                    }

                }
            });


        });

        $(".createOrder").click(function(e) {
            e.preventDefault();
            $('.invalid-feedback').css('display', 'none');

            payment_method_nonce = $('#payment-method-nonce').val();

            if (payment_method == 'razorpay') {
                var amount = $('.caritem-grandtotal').html();
                // alert(amount);
                // return;
                var total_amount = 10 * 100;
                var options = {
                    "key": "rzp_test_YSTH90m9DEc0FQ", // Enter the Key ID generated from the Dashboard
                    "amount": total_amount, // Amount is in currency subunits. Default currency is INR. Hence, 10 refers to 1000 paise
                    "currency": "USD",
                    "name": "NiceSnippets",
                    "description": "Test Transaction",
                    "image": "https://www.nicesnippets.com/image/imgpsh_fullsize.png",
                    "order_id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                    "handler": function(response) {

                        url = '/api/client/order';
                        $.ajax({
                            type: 'post',
                            url: "{{ url('') }}" + url,
                            data: {
                                billing_first_name: billing_first_name,
                                billing_last_name: billing_last_name,
                                billing_street_aadress: billing_street_aadress,
                                billing_country: billing_country,
                                billing_state: billing_state,
                                billing_city: billing_city,
                                billing_postcode: billing_postcode,
                                billing_phone: billing_phone,
                                delivery_first_name: delivery_first_name,
                                delivery_last_name: delivery_last_name,
                                delivery_street_aadress: delivery_street_aadress,
                                delivery_country: delivery_country,
                                delivery_state: delivery_state,
                                delivery_city: delivery_city,
                                delivery_postcode: delivery_postcode,
                                delivery_phone: delivery_phone,
                                order_notes: order_notes,
                                coupon_code: coupon_code,
                                latlong: locations,
                                currency_id: currency_id,
                                payment_method: payment_method,

                                razor_pay_transaction_id: response.razorpay_payment_id
                            },
                            headers: {
                                'Authorization': 'Bearer ' + customerToken,
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                            },
                            beforeSend: function() {},
                            success: function(data) {
                                if (data.status == 'Success') {
                                    window.location.href = "{{ url('/thankyou') }}";
                                } else if (data.status == 'Error') {

                                    $("#pills-shipping-tab").addClass('active');
                                    $("#pills-shipping").addClass('show active');
                                }
                            },
                            error: function(data) {
                                console.log();
                                if (data.status == 422) {
                                    jQuery.each(data.responseJSON.errors, function(index,
                                        item) {
                                        $("#" + index).parent().find(
                                            '.invalid-feedback').css('display',
                                            'block');
                                        $("#" + index).parent().find(
                                            '.invalid-feedback').html(item);
                                    });
                                } else {

                                }
                                $("#pills-shipping-tab").addClass('active');
                                $("#pills-shipping").addClass('show active');

                                $("#pills-billing-tab").removeClass('active');
                                $("#pills-billing").removeClass('show active');

                                $("#pills-method-tab").removeClass('active');
                                $("#pills-method").removeClass('show active');

                                $("#pills-order-tab").removeClass('active');
                                $("#pills-order").removeClass('show active');

                            },
                        });
                    },
                    "prefill": {
                        "name": "Mehul Bagda",
                        "email": "mehul.bagda@example.com",
                        "contact": "818********6"
                    },
                    "notes": {
                        "address": "test test"
                    },
                    "theme": {
                        "color": "#F37254"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            } else {
                url = '/api/client/order';
                $.ajax({
                    type: 'post',
                    url: "{{ url('') }}" + url,
                    data: {
                        billing_first_name: billing_first_name,
                        billing_last_name: billing_last_name,
                        billing_street_aadress: billing_street_aadress,
                        billing_country: billing_country,
                        billing_state: billing_state,
                        billing_city: billing_city,
                        billing_postcode: billing_postcode,
                        billing_phone: billing_phone,
                        delivery_first_name: delivery_first_name,
                        delivery_last_name: delivery_last_name,
                        delivery_street_aadress: delivery_street_aadress,
                        delivery_country: delivery_country,
                        delivery_state: delivery_state,
                        delivery_city: delivery_city,
                        delivery_postcode: delivery_postcode,
                        delivery_phone: delivery_phone,
                        order_notes: order_notes,
                        coupon_code: coupon_code,
                        latlong: locations,
                        currency_id: currency_id,
                        payment_method: payment_method,

                        payment_method_nonce: payment_method_nonce,
                        authorize_net_data_value: $('data-value').val(),
                        authorize_net_data_descriptor: $('data-descriptor').val(),
                    },
                    headers: {
                        'Authorization': 'Bearer ' + customerToken,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                        clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                    },
                    beforeSend: function() {},
                    success: function(data) {
                        if (data.status == 'Success') {
                            if (payment_method == "mollie") {
                                window.location.href = "{{ url('/mollie-payment/') }}" + "/" + data
                                    .data.order_id;
                            }
                            if (payment_method == "paystack") {
                                url = '/api/client/paystack-authorization';
                                $.ajax({
                                    type: 'post',
                                    url: "{{ url('') }}" + url,
                                    data: {
                                        order_id: data.data.order_id,
                                    },
                                    headers: {
                                        'Authorization': 'Bearer ' + customerToken,
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                            'content'),
                                        clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                                        clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                                    },
                                    beforeSend: function() {},
                                    success: function(data) {
                                        if (data.status == 'Success') {
                                            window.location.href = data.data;
                                        } else if (data.status == 'Error') {

                                        }
                                    },
                                    error: function(data) {


                                    },
                                });
                            } else
                                window.location.href = "{{ url('/thankyou') }}";

                        } else if (data.status == 'Error') {

                            $("#pills-shipping-tab").addClass('active');
                            $("#pills-shipping").addClass('show active');
                        }
                    },
                    error: function(data) {
                        if (data.status == 422) {
                            jQuery.each(data.responseJSON.errors, function(index, item) {
                                $("#" + index).parent().find('.invalid-feedback').css('display',
                                    'block');
                                $("#" + index).parent().find('.invalid-feedback').html(item);
                            });
                        } else {

                        }
                        $("#pills-shipping-tab").addClass('active');
                        $("#pills-shipping").addClass('show active');

                        $("#pills-billing-tab").removeClass('active');
                        $("#pills-billing").removeClass('show active');

                        $("#pills-method-tab").removeClass('active');
                        $("#pills-method").removeClass('show active');

                        $("#pills-order-tab").removeClass('active');
                        $("#pills-order").removeClass('show active');

                    },
                });
            }


        });



        $('#paytm-form').submit(function(e) {
            paytmOrderStatus = $('#order_status_by_paytm').val();
            if (paytmOrderStatus == '') {
                e.preventDefault();
                $('.invalid-feedback').css('display', 'none');
                locations = $("#latlong").val();
                billing_first_name = $("#billing_first_name").val();
                billing_last_name = $("#billing_last_name").val();
                billing_street_aadress = $("#billing_street_aadress").val();
                billing_country = $("#billing_country").val();
                billing_state = $("#billing_state").val();
                billing_city = $("#billing_city").val();
                billing_postcode = $("#billing_postcode").val();
                billing_phone = $("#billing_phone").val();

                delivery_first_name = $("#delivery_first_name").val();
                delivery_last_name = $("#delivery_last_name").val();
                delivery_street_aadress = $("#delivery_street_aadress").val();
                delivery_country = $("#delivery_country").val();
                delivery_state = $("#delivery_state").val();
                delivery_city = $("#delivery_city").val();
                delivery_postcode = $("#delivery_postcode").val();
                delivery_phone = $("#delivery_phone").val();
                order_notes = $("#order_notes").val();
                coupon_code = $.trim(localStorage.getItem("couponCart"));

                payment_method = 'paytm';
                cc_number = $("#cc_number").val();
                cc_expiry_month = $("#cc_expiry_month").val();
                cc_expiry_year = $("#cc_expiry_year").val();
                cc_cvc = $("#cc_cvc").val();
                payment_method_nonce = $('#payment-method-nonce').val();

                url = '/api/client/order';
                $.ajax({
                    type: 'post',
                    url: "{{ url('') }}" + url,
                    data: {
                        billing_first_name: billing_first_name,
                        billing_last_name: billing_last_name,
                        billing_street_aadress: billing_street_aadress,
                        billing_country: billing_country,
                        billing_state: billing_state,
                        billing_city: billing_city,
                        billing_postcode: billing_postcode,
                        billing_phone: billing_phone,
                        delivery_first_name: delivery_first_name,
                        delivery_last_name: delivery_last_name,
                        delivery_street_aadress: delivery_street_aadress,
                        delivery_country: delivery_country,
                        delivery_state: delivery_state,
                        delivery_city: delivery_city,
                        delivery_postcode: delivery_postcode,
                        delivery_phone: delivery_phone,
                        order_notes: order_notes,
                        coupon_code: coupon_code,
                        latlong: locations,
                        currency_id: currency_id,
                        payment_method: payment_method,
                        cc_number: cc_number,
                        cc_expiry_month: cc_expiry_month,
                        cc_expiry_year: cc_expiry_year,
                        cc_cvc: cc_cvc,
                        payment_method_nonce: payment_method_nonce,
                        authorize_net_data_value: $('data-value').val(),
                        authorize_net_data_descriptor: $('data-descriptor').val(),
                    },
                    headers: {
                        'Authorization': 'Bearer ' + customerToken,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                        clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                    },
                    beforeSend: function() {},
                    success: function(data) {
                        if (data.status == 'Success') {
                            var name = $('#paytm-name').val();
                            var mobile = $('#paytm-mobile').val();
                            var email = $('#paytm-email').val();
                            $('#order_status_by_paytm').val(data.data.order_id);
                            $('#paytm-form').submit();

                        } else if (data.status == 'Error') {
                            toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                            $("#pills-shipping-tab").addClass('active');
                            $("#pills-shipping").addClass('show active');
                        }
                    },
                    error: function(data) {
                        console.log();
                        if (data.status == 422) {
                            jQuery.each(data.responseJSON.errors, function(index, item) {
                                $("#" + index).parent().find('.invalid-feedback').css('display',
                                    'block');
                                $("#" + index).parent().find('.invalid-feedback').html(item);
                            });
                        } else {
                            toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                        }
                        $("#pills-shipping-tab").addClass('active');
                        $("#pills-shipping").addClass('show active');

                        $("#pills-billing-tab").removeClass('active');
                        $("#pills-billing").removeClass('show active');

                        $("#pills-method-tab").removeClass('active');
                        $("#pills-method").removeClass('show active');

                        $("#pills-order-tab").removeClass('active');
                        $("#pills-order").removeClass('show active');

                    },
                });
            }



        })
    </script>

    <script src="https://js.braintreegateway.com/web/3.83.0/js/hosted-fields.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.83.0/js/client.min.js"></script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkfQ--NrbuRkdYSFBu1AXlWohPV7RhNyI&libraries=places&callback=initialize"
        async defer></script>
    <script>

    </script>
</body>

</html>
