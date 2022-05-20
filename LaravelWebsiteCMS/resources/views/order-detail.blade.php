@extends('layouts.master')
@section('content')

<!-- Shop Page One content -->
<div class="container-fuild">
    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans('lables.bread-crumb-home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('lables.order-detail') }}</li>
            </ol>
        </div>
    </nav>
</div>


<!--My Order Content -->
<section class="order-two-content pro-content">
    <div class="container">
        <div class="page-heading-title">
            <h2> {{ trans('lables.order-detail-heading') }}
            </h2>

        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-3 ">
                <div class="heading">
                    <h2>
                        {{ trans('lables.order-detail-my-account') }}
                    </h2>
                    <hr>
                </div>

                @include('includes.side-menu')
            </div>
            <div class="col-12 col-lg-9 ">


                <div class="row">
                    <div class="col-12 col-md-5">
                        <div class="heading">
                            <h2>
                                <small>
                                    {{ trans('lables.order-detail-order-id') }}#<span class="order-no"></span>
                                </small>
                            </h2>
                            <hr>
                        </div>

                        <table class="table order-id">
                            <tbody>
                                <tr class="d-flex">
                                    <td class="col-6 col-md-6">{{ trans('lables.order-detail-order-status') }}</td>
                                    <td class="col-6 col-md-6">
                                        <p class="order-status"></p>
                                    </td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-6 col-md-6">{{ trans('lables.order-detail-order-date') }}</td>
                                    <td class="underline col-6 col-md-6 order-date" align="left"></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="col-12 col-md-7">
                        <div class="heading">
                            <h2>
                                <small>
                                    {{ trans('lables.order-detail-shipping-detail') }}
                                </small>
                            </h2>
                            <hr>
                        </div>

                        <table class="table order-id">
                            <tbody>
                                <tr class="d-flex">
                                    <td class="address col-12 col-md-6 order-delivery-address"></td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="address col-12 col-md-12 order-delivery-detail"></td>
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
                                    {{ trans('lables.order-detail-billing-detail') }}
                                </small>
                            </h2>
                            <hr>
                        </div>

                        <table class="table order-id">
                            <tbody>
                                <tr class="d-flex">
                                    <td class="address col-12 order-billing-address"></td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="address col-12 order-billing-detail"></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="col-12 col-md-7">
                        <div class="heading">
                            <h2>
                                <small>
                                    {{ trans('lables.order-detail-payment-shipping-method') }}
                                </small>
                            </h2>
                            <hr>
                        </div>

                        <table class="table order-id">
                            <tbody>
                                {{-- <tr class="d-flex">
                                    <td class="col-6">Shipping Method</td>
                                    <td class="col-6 order-shipping-method"></td>
                                </tr> --}}
                                <tr class="d-flex">
                                    <td class="col-6">Payment Method</td>
                                    <td class="underline col-6 order-payment-method"></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

                <table class="table items">

                    <thead>
                        <tr class="d-flex">
                            <th class="col-2"></th>
                            <th class="col-3">{{ trans('lables.order-detail-item') }}</th>
                            <th class="col-3">{{ trans('lables.order-detail-price') }}</th>
                            <th class="col-2">{{ trans('lables.order-detail-qty') }}</th>
                            <th class="col-2">{{ trans('lables.order-detail-subtotal') }}</th>
                        </tr>
                    </thead>
                    <tbody id="order-show-detail">
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="comments-area">
                            <div class="form-group">
                                <label for="comment">{{ trans('lables.order-detail-comments') }}</label>
                                <textarea class="form-control" id="comment" rows="3" placeholder="{{ trans('lables.order-detail-comments') }}"></textarea>
                                <button type="button" class="btn-secondary  swipe-to-top" id="saveComments" onclick="saveComments()">Save Comment</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ............the end..... -->
            </div>
        </div>
    </div>
</section>

<template id="order-show-detail-template">
    <tr class="d-flex responsive-lay">
        <td class="col-12 col-md-2">
            <img class="img-fluid order-image" src="" alt="John Doe" class="mr-3">
        </td>
        <td class="col-12 col-md-3 item-detail-left">
            <div class="text-body">
                <h4 class="order-product-name"><br>
                    <small class="order-product-category"></small>
                </h4>

            </div>

        </td>
        <td class="tag-color col-12 col-md-3 order-price"></td>
        <td class="col-12 col-md-2">
            <div class="input-group">
                <input name="quantity[]" type="text" readonly value="01" class="form-control qty order-qty" min="1" max="300">
            </div>
        </td>
        <td class="tag-s col-12 col-md-2 order-sub-price"></td>
    </tr>
</template>

@endsection
@section('script')
<script>
    loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
    if (loggedIn != '1') {
        window.location.href = "{{url('/')}}";
    }

    languageId = localStorage.getItem("languageId");
    if (languageId == null || languageId == 'null') {
        localStorage.setItem("languageId", '1');
        $(".language-default-name").html('Endlish');
        localStorage.setItem("languageName", 'English');
        languageId = 1;
    }

    cartSession = $.trim(localStorage.getItem("cartSession"));
    if (cartSession == null || cartSession == 'null') {
        cartSession = '';
    }
    loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
    customerToken = $.trim(localStorage.getItem("customerToken"));
    customerId = $.trim(localStorage.getItem("customerId"));

    $(document).ready(function() {
        getCustomerOrder();
    });

    function getCustomerOrder() {
        id = '{{$id}}';
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" +
                '/api/client/customer/order/' + id + '?orderDetail=1&language_id=' + languageId + '&productDetail=1&billing_country=1&billing_state=1&delivery_country=1&delivery_state=1&currency='+localStorage.getItem("currency"),
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    const templ = document.getElementById("order-show-detail-template");
                    $("#order-show-detail").html('');
                    order = data.data.order_date.split('T');
                    $(".order-date").html(order[0]); 
                    $(".order-no").html(data.data.order_id);
                    $(".order-status").html(data.data.order_status);
                    $(".order-billing-address").html(data.data.order_status);
                    $(".order-billing-detail").html(data.data.order_status);

                    $(".order-delivery-address").html(data.data.delivery_street_aadress);
                    country = state = '';
                    if(data.data.delivery_country1 != null && data.data.delivery_country1 != 'null' && data.data.delivery_country1 != ''){
                        country = ', '+data.data.delivery_country1.country_name;
                    }
                    if(data.data.delivery_state1 != null && data.data.delivery_state1 != 'null' && data.data.delivery_state1 != ''){
                        state = ', '+data.data.delivery_state1.name;
                    }
                    detail_address = data.data.delivery_street_aadress +', '+ data.data.delivery_city + state +country;
                    $(".order-delivery-detail").html(detail_address);


                    $(".order-billing-address").html(data.data.billing_street_aadress);
                    country = state = '';
                    if(data.data.billing_country1 != null && data.data.billing_country1 != 'null' && data.data.billing_country1 != ''){
                        country = ', '+data.data.billing_country1.country_name;
                    }
                    if(data.data.billing_state1 != null && data.data.billing_state1 != 'null' && data.data.billing_state1 != ''){
                        state = ', '+data.data.billing_state1.name;
                    }
                    detail_address = data.data.billing_street_aadress +', '+ data.data.billing_city + state +country;
                    $(".order-billing-detail").html(detail_address);
                    $(".order-payment-method").html(data.data.payment_method);
                    // $(".order-shipping-method").html(data.data.shipping_method);

                    
                    // clone.querySelector(".order-product-name").setAttribute('href', '/orders/' + data.data.order_id);

                    if (data.data.order_detail != null && data.data.order_detail != 'null' && data.data.order_detail != '') {
                        for (k = 0; k < data.data.order_detail.length; k++) {
                            const clone = templ.content.cloneNode(true);
                            if (data.data.order_detail[k].product != null && data.data.order_detail[k].product != 'null' && data.data.order_detail[k].product != '') {
                                if (data.data.order_detail[k].product.product_type == 'variable') {
                                    if (data.data.order_detail[k].product_combination.gallary != null && data.data.order_detail[k].product_combination.gallary != 'null' && data.data.order_detail[k].product_combination.gallary != '') {
                                        clone.querySelector(".order-image").setAttribute('src',
                                            '/gallary/' + data.data.order_detail[k].product_combination.gallary.gallary_name);
                                        clone.querySelector(".order-image").setAttribute('alt', data.data.order_detail[k].product_combination.gallary.gallary_name);
                                        name = data.data.order_detail[k].product.detail[0].title +' - ';
                                        for (loop = 0; loop < data.data.order_detail[k].product_combination.combination
                                            .length; loop++) {
                                            if (data.data.order_detail[k].product_combination.combination.length - 1 == loop) {
                                                name += data.data.order_detail[k].product_combination.combination[loop].variation.detail[0].name;
                                            } else {
                                                name += data.data.order_detail[k].product_combination.combination[loop].variation.detail[0].name + '-';
                                            }
                                        }
                                        clone.querySelector(".order-product-name").innerHTML = name;
                                    }
                                } else {
                                    if (data.data.order_detail[k].product.detail != null && data.data.order_detail[k].product.detail != 'null' && data.data.order_detail[k].product.detail != '') {
                                        clone.querySelector(".order-image").setAttribute('src',
                                            '/gallary/' + data.data.order_detail[k].product.product_gallary.gallary_name);
                                        
                                            clone.querySelector(".order-image").setAttribute('alt', data.data.order_detail[k].product.product_gallary.gallary_name);

                                        clone.querySelector(".order-product-name").innerHTML = data.data.order_detail[k].product.detail[0].title;

                                    }
                                }
                            }
                            if (data.data.currency_id != null && data.data.currency_id != 'null' && data.data.currency_id != '') {
                                if (data.data.currency.symbol_position == 'left') {
                                    price = data.data.order_detail[k].product_discount ? +data.data.order_detail[k].product_discount*+data.data.currency.exchange_rate:+data.data.order_detail[k].product_price * +data.data.currency.exchange_rate;
                                    price = data.data.currency_id.code +' '+ price;
                                }
                                else{
                                    price = data.data.order_detail[k].product_discount ? +data.data.order_detail[k].product_discount *+data.data.currency.exchange_rate:+data.data.order_detail[k].product_price * +data.data.currency.exchange_rate;
                                    price = price +' '+ data.data.currency_id.code;
                                }
                            } else {
                                price = data.data.order_detail[k].product_discount ? +data.data.order_detail[k].product_discount *+data.data.currency.exchange_rate:+data.data.order_detail[k].product_price * +data.data.currency.exchange_rate;
                            }

                            if (data.data.currency != null && data.data.currency != 'null' && data.data.currency != '') {
                                if (data.data.currency.symbol_position == 'left') {
                                    price = +price * +data.data.currency.exchange_rate;
                                    clone.querySelector(".order-price").innerHTML = data.data.currency.code +' '+ price;
                                }
                                else{
                                    price = +price * +data.data.currency.exchange_rate;
                                    clone.querySelector(".order-price").innerHTML = price +' '+ data.data.currency.code;
                                }
                            }
                            clone.querySelector(".order-qty").value = data.data.order_detail[k].product_qty;
                            sub_total = data.data.order_detail[k].product_price * data.data.order_detail[k].product_qty;
                            if (data.data.currency != null && data.data.currency != 'null' && data.data.currency != '') {
                                if (data.data.currency.symbol_position == 'left') {
                                    sub_total = sub_total * +data.data.currency.exchange_rate;
                                    sub_total = data.data.currency.code +' '+ sub_total;
                                } else {
                                    sub_total = sub_total * +data.data.currency.exchange_rate;
                                    sub_total = sub_total +' '+ data.data.currency.code;
                                }
                            } else {
                                sub_total = sub_total;
                            }
                            clone.querySelector(".order-sub-price").innerHTML = sub_total;
                            $("#order-show-detail").append(clone);
                        }
                    }
                    // clone.querySelector(".shipping-address-listing-delete-btn").setAttribute('data-id', data.data[i].id);
                    // clone.querySelector(".shipping-address-listing-delete-btn").setAttribute('onclick', 'shippingDelete(this)');
                }
            },
            error: function(data) {},
        });
    }

    function saveComments(){
        id = '{{$id}}';
        comment = $('#comment').val();

        var page_url = "/api/web/add_comments";
        let data = {
            comment:comment,
            id:id
        }

        $.ajax({
                type: 'post',
                url: "{{ url('') }}" + '/api/client/add_comments',
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                data:data,
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        getCustomerOrder();
                        toastr.success('Your Comments are Sent')
                        $('#comment').val('')
                    }
                },
                error: function(data) {
                    toastr.error(data.responseJSON.errors.comment[0])
                    console.log(data.responseJSON.errors.comment[0],'if error')
                },
            });    
    }
</script>
@endsection