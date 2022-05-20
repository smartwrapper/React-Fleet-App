@extends('layouts.master')
@section('content')

<!-- -My Order content -->
<div class="container-fuild">
    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans('lables.bread-crumb-home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('lables.bread-order') }}</li>
            </ol>
        </div>
    </nav>
</div>

<!--My Order Content -->
<section class="order-one-content pro-content">

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3  d-none d-lg-block d-xl-block">
                <div class="heading">
                    <h2>
                        {{ trans('lables.orders-my-account') }}
                    </h2>
                    <hr>
                </div>
                @include('includes.side-menu')
            </div>
            <div class="col-12 col-lg-9 ">
                <div class="heading">
                    <h2>
                        {{ trans('lables.orders-my-order') }}
                    </h2>
                    <hr>
                </div>


                <table class="table order-table">

                    <thead>
                        <tr class="d-flex">
                            <th class="col-12 col-md-2">{{ trans('lables.orders-order-id') }}</th>
                            <th class="col-12 col-md-2">{{ trans('lables.orders-date') }}</th>
                            <th class="col-12 col-md-3">{{ trans('lables.orders-status') }}</th>
                            <th class="col-12 col-md-2">{{ trans('lables.orders-detail') }}</th>

                            

                        </tr>
                    </thead>
                    <tbody id="order-show">

                    </tbody>
                </table>


                {{-- <div class="pagination justify-content-between ">

                    <label for="staticEmail" class="col-form-label">Showing 1&ndash;<span class="showing_record">1</span>&nbsp;of&nbsp;<span class="showing_total_record">23</span>&nbsp;results.</label>

                    <div class="col-12 col-sm-6">
                        <ol class="loader-page">
                            <li class="loader-page-item"><a href="javascript:void(0)">
                                    <i class="fa fa-angle-double-left" style="font-size:12px"></i></a>
                            </li>
                           
                        </ol>
                    </div>
                </div> --}}
                <!-- ............the end..... -->
            </div>
        </div>
    </div>
</section>

<template id="order-show-template">
    <tr class="d-flex">
        <td class="col-12 col-md-2 order-no"></td>
        <td class="col-12 col-md-2 order-date"></td>
        <td class="col-12 col-md-3 order-status"></td>
        <td class="col-12 col-md-2 order-detail"></td>

        
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
        $.ajax({
            type: 'get',
            url: "{{ url('') }}" +
                '/api/client/customer/order?orderDetail=1&language_id=' + languageId + '&productDetail=1&sortBy=id&sortType=DESC&currency='+localStorage.getItem("currency"),
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    const templ = document.getElementById("order-show-template");
                    $("#order-show").html('');
                    for (i = 0; i < data.data.length; i++) {
                        const clone = templ.content.cloneNode(true);
                        order = data.data[i].order_date.split('T');
                        clone.querySelector(".order-date").innerHTML = order[0];
                        // clone.querySelector(".order-notes").innerHTML = data.data[i].order_notes;
                        clone.querySelector(".order-no").innerHTML = data.data[i].order_id;
                        if (data.data[i].currency != null && data.data[i].currency != 'null' && data.data[i].currency != '') {
                            if (data.data[i].currency.symbol_position == 'left') {
                                price = (data.data[i].order_price * +data.data[i].currency.exchange_rate);
                                price = data.data[i].currency.code +' '+ price;
                            } else {
                                price = (data.data[i].order_price * +data.data[i].currency.exchange_rate);
                                price = price +' '+ data.data[i].currency.code;
                            }
                        } else {
                            price = data.data[i].order_price;
                        }
                        // clone.querySelector(".order-price").innerHTML = price;
                        
                        // clone.querySelector(".order-product-name").setAttribute('href', '/orders/'+data.data[i].order_id);
                        
                        clone.querySelector(".order-status").innerHTML = data.data[i].order_status === 'Pending' ? data.data[i].order_status + '/ <button href="/orders/'+data.data[i].order_id+'" onClick="cancelStatus('+data.data[i].order_id+')" style="font-size:10px" class="btn p-2  btn-danger">Cancel Order</button>' : data.data[i].order_status;

                        clone.querySelector(".order-detail").innerHTML = '<a href="/orders/'+data.data[i].order_id+'">View Detail</a>';
                        
                        if (data.data[i].order_detail != null && data.data[i].order_detail != 'null' && data.data[i].order_detail != '') {
                            if (data.data[i].order_detail[0].product != null && data.data[i].order_detail[0].product != 'null' && data.data[i].order_detail[0].product != '') {
                                if (data.data[i].order_detail[0].product.product_type == 'variable') {
                                    if (data.data[i].order_detail[0].product_combination.gallary != null) {
                                        // clone.querySelector(".order-image").setAttribute('src',
                                        //     '/gallary/' + data.data[i].order_detail[0].product_combination.gallary.gallary_name);
                                        // clone.querySelector(".order-image").setAttribute('alt', data.data[i].order_detail[0].product.detail[0].title);
                                        // name = data.data[i].order_detail[0].product.detail[0].title+' - ';
                                        for (loop = 0; loop < data.data[i].order_detail[0].product_combination.combination
                                            .length; loop++) {
                                            if (data.data[i].order_detail[0].product_combination.combination.length - 1 == loop) {
                                                name += data.data[i].order_detail[0].product_combination.combination[loop].variation
                                                    .detail[0].name;
                                            } else {
                                                name += data.data[i].order_detail[0].product_combination.combination[loop].variation
                                                    .detail[0].name + '-';
                                            }
                                        }
                                        // clone.querySelector(".order-product-name").innerHTML = name;
                                    }
                                } else {
                                    if (data.data[i].order_detail[0].product.detail != null) {
                                        // clone.querySelector(".order-image").setAttribute('src',
                                        //     '/gallary/' + data.data[i].order_detail[0].product.product_gallary.gallary_name);
                                        // clone.querySelector(".order-product-name").innerHTML = data.data[i].order_detail[0].product.detail[0].title;
                                    }
                                }
                            }
                        }
                        // clone.querySelector(".shipping-address-listing-delete-btn").setAttribute('data-id', data.data[i].id);
                        // clone.querySelector(".shipping-address-listing-delete-btn").setAttribute('onclick', 'shippingDelete(this)');
                        $("#order-show").append(clone);
                    }
                }
            },
            error: function(data) {},
        });
    }


    function cancelStatus(order) {
        // alert(order);

        $.ajax({
            method: 'post',
            url: "{{ url('') }}" +
                '/api/client/order/' + order,
            data: { _method:'PUT',order_status:'Cancel'},
            headers: {
                'Authorization': 'Bearer ' + customerToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
            },
            beforeSend: function() {},
            success: function(data) {
                if (data.status == 'Success') {
                    getCustomerOrder()
                }
            },
            error: function(data) {},
        });
        // 
    }
</script>
@endsection