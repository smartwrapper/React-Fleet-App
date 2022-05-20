@extends('layouts.master')
@section('content')
<!-- wishlist Content -->
<section class="wishlist-content pro-content">

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="heading">
                    <h2>
                        My Account
                    </h2>
                    <hr>
                </div>

                @include('includes.side-menu')

            </div>
            <div class="col-12 col-lg-9 ">
                <div class="heading">
                    <h2>
                        Wishlist Products
                    </h2>
                    <hr>
                </div>

                <div class="col-12 px-0 media-main" id="wishlist-show">

                </div>

                <!-- ............the end..... -->
            </div>
        </div>
    </div>
</section>

<template id="wishlist-product-template">
    <div class="media">
        <img class="img-fluid wishlist-product-img" src="images/wishlist/wishlist-1.png" alt="John Doe">
        <div class="media-body">
            <div class="row">
                <div class="col-12 col-md-8  texting">
                    <h3><a href="" class="wishlist-product-name"></a></h3>
                    <p class="wishlist-product-desc"></p>
                     <div class="item-price price wishlist-product-price"></div>

                    <div class="buttons">
                        <div class="input-group item-quantity">

                            <input type="text" value="1" id="quantity2" name="quantity" class="form-control cartItem-qty">
    
                            <span class="input-group-btn">
                                <button type="button" value="quantity" class="quantity-right-plus btn cartItem-qty-1" data-type="plus" data-field="">
    
                                    <span class="fas fa-plus"></span>
                                </button>
    
                                <button type="button" value="quantity" class="quantity-left-minus btn cartItem-qty-2" data-type="minus" data-field="">
                                    <span class="fas fa-minus"></span>
                                </button>
    
    
                            </span>
    
    
                        </div>
                        <a href="javascript:void(0)" class="btn btn-secondary swipe-to-top wishlist-product-btn">
                            ADD TO CART
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-4 detail">

                    {{-- <div class="share"><a href="javascript:void(0)">Share &nbsp;<i class="fas fa-share"></i></a> </div> --}}
                    <div class="share"><a href="javascript:void(0)" class="wishlist-remove">Remove &nbsp;<i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    wishListShow();
    function wishListShow() {
        var url = "{{ url('') }}" +
                '/api/client/wishlist?limit=100&getCategory=1&getDetail=1&language_id=' + languageId +
                '&sortBy=id&sortType=DESC&topSelling=1&currency='+localStorage.getItem("currency");
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
                    $("#wishlist-show").html('');
                    const templ = document.getElementById("wishlist-product-template");
                    for (i = 0; i < data.data.length; i++) {
                        const clone = templ.content.cloneNode(true);
                        // clone.querySelector(".single-text-chat-li").classList.add("bg-blue-100");
                        if (data.data[i].products.product_gallary != null && data.data[i].products.product_gallary !=
                            'null' && data.data[i].products.product_gallary != '') {
                            if (data.data[i].products.product_gallary.detail != null && data.data[i].products.product_gallary
                                .detail != 'null' && data.data[i].products.product_gallary.detail != '') {
                                    if(data.data[i].products.product_gallary.detail[2].gallary_path){
                                        clone.querySelector(".wishlist-product-img").setAttribute('src', data.data[i].products.product_gallary.detail[2].gallary_path);
                                    }
                            }
                        }
                        if (data.data[i].products.detail != null && data.data[i].products.detail != 'null' && data.data[i].products
                            .detail != '') {
                            clone.querySelector(".wishlist-product-img").setAttribute('alt', data.data[i].products
                                .detail[0].title);
                        }
                        if (data.data[i].products.category != null && data.data[i].products.category != 'null' && data.data[i].products
                            .category != '') {
                            if (data.data[i].products.category[0].category_detail != null && data.data[i].products.category[0]
                                .category_detail != 'null' && data.data[i].products.category[0].category_detail != ''
                            ) {
                                if (data.data[i].products.category[0].category_detail.detail != null && data.data[i].products
                                    .category[0].category_detail.detail != 'null' && data.data[i].products.category[
                                        0].category_detail.detail != '') {
                                    // clone.querySelector(".product-card-category").innerHTML = data.data[i].products
                                        // .category[0].category_detail.detail[0].name;
                                }
                            }
                        }
                        if (data.data[i].products.detail != null && data.data[i].products.detail != 'null' && data.data[i].products
                            .detail != '') {
                            clone.querySelector(".wishlist-product-name").innerHTML = data.data[i].products.detail[0]
                                .title;
                            clone.querySelector(".wishlist-product-name").setAttribute('href', '/product/' +
                                    data
                                    .data[i].product_id + '/' + data
                                    .data[i].products.product_slug)
                            clone.querySelector(".wishlist-product-desc").innerHTML = data.data[i].products.detail[0]
                                .desc;
                        }

                        if (data.data[i].products.product_type == 'simple') {
                            if (data.data[i].products.product_discount_price == '' || data.data[i].products
                                .product_discount_price == null || data.data[i].products.product_discount_price ==
                                'null') {
                                clone.querySelector(".wishlist-product-price").innerHTML = 'Total Price: <span>'+ data.data[i].products
                                    .product_price_symbol+'</span>';
                            } else {
                                clone.querySelector(".wishlist-product-price").innerHTML = data.data[i].products
                                    .product_price_symbol + ' <span>' + data.data[i].products.product_discount_price_symbol + '</span>';
                            }
                        } else {
                            if (data.data[i].products.product_combination != null && data.data[i].products
                                .product_combination != 'null' && data.data[i].products.product_combination != '') {
                                clone.querySelector(".wishlist-product-price").innerHTML = 'Total Price: <span>'+ data.data[i].products
                                    .product_combination[0].product_price_symbol+'</span>';
                            }
                        }
                        
                        if (data.data[i].products.product_type == 'simple') {
                            clone.querySelector(".wishlist-product-btn").setAttribute('onclick', "addToCart(this)");
                            clone.querySelector(".wishlist-product-btn").setAttribute('data-id', data.data[i].products.product_id);
                            clone.querySelector(".wishlist-product-btn").setAttribute('data-type', data.data[i].products.product_type);
                            clone.querySelector(".wishlist-product-btn").innerHTML = 'Add To Cart';
                            clone.querySelector(".wishlist-product-btn").setAttribute('data-field', i);

                        } else {
                            clone.querySelector(".wishlist-product-btn").setAttribute('href', '/product/' + data
                            .data[i].products.product_id + '/' + data
                            .data[i].products.product_slug);
                            clone.querySelector(".wishlist-product-btn").innerHTML = 'View Detail';
                        }

                        clone.querySelector(".cartItem-qty").setAttribute('id', 'quantity' + i);
                        clone.querySelector(".cartItem-qty-1").setAttribute('value', 'quantity' + i);
                        clone.querySelector(".cartItem-qty-2").setAttribute('value', 'quantity' + i);
                        clone.querySelector(".cartItem-qty-1").setAttribute('data-field', i);
                        clone.querySelector(".cartItem-qty-2").setAttribute('data-field', i);
                        clone.querySelector(".wishlist-remove").setAttribute('onclick', "removeWishlist(this)");
                        clone.querySelector(".wishlist-remove").setAttribute('data-id', data.data[i].wishlist);
                        $("#wishlist-show").append(clone);
                    }
                }
            },
            error: function(data) {},
        });
    }

    function removeWishlist(input){
        id = $(input).attr('data-id');
        var url = "{{ url('') }}" +
                '/api/client/wishlist/'+id;
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
                    toastr.success('{{ trans("lables.wishlist-remove") }}');
                    wishListShow();
                    getWishlist();
                }
            },
            error: function(data) {},
        });

    }
    
    $(document).on('click', '.quantity-right-plus', function() {
        var row_id = $(this).attr('data-field');

        var quantity = $('#quantity' + row_id).val();
        $('#quantity' + row_id).val(parseInt(quantity) + 1);
    })

    $(document).on('click', '.quantity-left-minus', function() {
        var row_id = $(this).attr('data-field');
        var quantity = $('#quantity' + row_id).val();
        if (quantity > 1)
            $('#quantity' + row_id).val(parseInt(quantity) - 1);
    })
</script>
@endsection