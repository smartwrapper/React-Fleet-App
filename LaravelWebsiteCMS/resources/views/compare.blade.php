@extends('layouts.master')
@section('content')
    <div class="container-fuild">
        <nav aria-label="breadcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans('lables.bread-crumb-home') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans('lables.bread-compare') }}</li>
                </ol>
            </div>
        </nav>
    </div>

    <!-- Compare Content -->
    <section class="compare-content pro-content">
        <div class="container">
            <div class="page-heading-title">
                <h2> {{ trans('lables.bread-compare') }}
                </h2>

            </div>
        </div>
        <div class="container">
            @include("includes.compare-template")
            <div class="compare row">

            </div>

        </div>
    </section>

@endsection
@section('script')

    <script>
        loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
        if (loggedIn != '1') {
            window.location.href = "{{ url('/') }}";
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

            var url = "{{ url('') }}" +
                '/api/client/compare?limit=100&getCategory=1&getDetail=1&language_id=1&sortBy=id&sortType=DESC&topSelling=1&currency=1';
            fetchProduct(url);
        })



        function fetchProduct(url, appendTo) {
            $.ajax({
                type: 'get',
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
                        $(".compare").html('');
                        const templ = document.getElementById("product-card-template");

                        for (i = 0; i < data.data.length; i++) {
                            const clone = templ.content.cloneNode(true);
                            // clone.querySelector(".single-text-chat-li").classList.add("bg-blue-100");


                            if (data.data[i].products.product_gallary != null && data.data[i].products
                                .product_gallary !=
                                'null' && data.data[i].products.product_gallary != '') {

                                if (data.data[i].products.product_gallary.detail != null && data.data[i]
                                    .products.product_gallary
                                    .detail != 'null' && data.data[i].products.product_gallary.detail != '') {

                                    clone.querySelector(".product-card-image").setAttribute('src', data.data[i]
                                        .products
                                        .product_gallary.detail[1].gallary_path);
                                }
                            }
                            if (data.data[i].products.detail != null && data.data[i].products.detail !=
                                'null' && data.data[i].products
                                .detail != '') {
                                clone.querySelector(".product-card-image").setAttribute('alt', data.data[i]
                                    .products
                                    .detail[0].title);
                            }
                            if (data.data[i].products.detail != null && data.data[i].products.detail !=
                                'null' && data.data[i].products
                                .detail != '') {
                                clone.querySelector(".product-card-name").innerHTML = data.data[i].products
                                    .detail[0]
                                    .title;
                                clone.querySelector(".product-card-name").setAttribute('href', '/product/' +
                                    data
                                    .data[i].product_id + '/' + data
                                    .data[i].product_slug);
                            }

                            if (data.data[i].products.product_type == 'simple') {
                                if (data.data[i].products.product_discount_price == '' || data.data[i].products
                                    .product_discount_price == null || data.data[i].products
                                    .product_discount_price ==
                                    'null') {
                                    clone.querySelector(".product-card-price").innerHTML = data.data[i].products
                                        .product_price_symbol;
                                } else {
                                    clone.querySelector(".product-card-price").innerHTML =
                                        data.data[i].products
                                        .product_discount_price_symbol + '<span> ' + data.data[i].products
                                        .product_price_symbol + '</span>';
                                }
                            } else {
                                if (data.data[i].products.product_combination != null && data.data[i].products
                                    .product_combination != 'null' && data.data[i].products
                                    .product_combination != '') {

                                    clone.querySelector(".product-card-price").innerHTML = data.data[i].products
                                        .product_price_symbol;
                                    if (data.data[i].products.attribute != null) {
                                        var combination = '';
                                        var attribute = data.data[i].products.attribute
                                        for (var a = 0; a < attribute.length; a++) {

                                            if (attribute[a].attributes != null) {

                                                if (attribute[a].attributes.detail != null) {

                                                    combination += '<b>' + attribute[a].attributes.detail[0]
                                                        .name +
                                                        '</b> : ';
                                                }
                                                if (attribute[a].variations != null) {
                                                    for (var v = 0; v < attribute[a].variations
                                                        .length; v++) {
                                                        combination +=
                                                            attribute[a]
                                                            .variations[v]
                                                            .product_variation.detail[0].name+'    ';
                                                    }
                                                }
                                            }
                                            combination +="<br />"
                                            clone.querySelector(".attribute").innerHTML = combination;
                                        }
                                    }
                                }
                            }


                            
                            clone.querySelector(".remove-compare").setAttribute('onclick',
                                    "removeCompare(this)");
                                clone.querySelector(".remove-compare").setAttribute('data-id', data.data[i]
                                    .compare);
                            if (data.data[i].products.product_type == 'simple') {
                                clone.querySelector(".product-card-link").setAttribute('onclick',
                                    "addToCart(this)");
                                clone.querySelector(".product-card-link").setAttribute('data-id', data.data[i]
                                    .products
                                    .product_id);
                                clone.querySelector(".product-card-link").setAttribute('data-type', data.data[i]
                                    .products
                                    .product_type);
                                clone.querySelector(".product-card-link").innerHTML = 'Add To Cart';
                            } else {
                                clone.querySelector(".product-card-link").setAttribute('href', '/product/' +
                                    data
                                    .data[i].products.product_id + '/' + data
                                    .data[i].products.product_slug);
                            }

                            $(".compare").append(clone);

                        }
                    }
                },
                error: function(data) {},
            });
        }



        function removeCompare(input){
            id = $(input).attr('data-id');
            var url = "{{ url('') }}" +
                    '/api/client/compare/'+id;
            $.ajax({
                type: 'delete',
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
                        toastr.success('{{ trans("response.compare-remove-success") }}');
                        var url = "{{ url('') }}" +'/api/client/compare?limit=100&getCategory=1&getDetail=1&language_id=1&sortBy=id&sortType=DESC&topSelling=1&currency=1';
                        fetchProduct(url);
                    }
                },
                error: function(data) {},
            });

        }
    </script>

@endsection
