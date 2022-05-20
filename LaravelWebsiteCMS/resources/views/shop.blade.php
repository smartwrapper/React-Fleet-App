@extends('layouts.master')
@section('content')

    @include(isset(getSetting()['shop']) ? 'includes.shop.shop-'.getSetting()['shop'] : 'includes.shop.shop-style1')
    <style>
        .variation_active {
            border: 1px solid;
        }

        .price-active {
            border: 1px solid;
        }

    </style>
@endsection
@section('script')
    <script>
        var language_id = localStorage.getItem('languageId');
        var attribute_id = [];
        var attribute = [];
        var variation_id = [];
        var variation = [];
        var sortBy = "";
        var sortType = "";
        var priceFromSidebar = "{{ isset($_GET['price']) ? $_GET['price'] : '' }}";
        var shopStyle = "{{ getSetting()['shop'] }}";
        $(document).ready(function() {
            fetchProduct(1);
            $(".variaion-filter").each(function() {
                if ($(this).val() != "") {
                    attribute_id.push($(this).attr('data-attribute-id'));
                    variation_id.push($(this).val());
                    attribute.push($(this).attr('data-attribute-name'));
                    variation.push($('option:selected', this).attr('data-variation-name'));
                }

            });
        });

        $('.sortBy').change(function() {
            sortBy = $('option:selected', this).attr('data-sort-by')
            sortType = $('option:selected', this).attr('data-sort-type')
            $(".shop_page_product_card").html('');
            fetchProduct(1);
        })

        function fetchProduct(page) {
            var limit = "{{ isset($_GET['limit']) ? $_GET['limit'] : '12' }}";
            var category = "{{ isset($_GET['category']) ? $_GET['category'] : '' }}";
            var varations = "{{ isset($_GET['variation_id']) ? $_GET['variation_id'] : '' }}";
            var price_range = "{{ isset($_GET['price']) ? $_GET['price'] : '' }}";

            var url = "{{ url('') }}" + '/api/client/products?page=' + page + '&limit=' + limit +
                '&getDetail=1&language_id=' + language_id + '&currency=' + localStorage.getItem("currency");

            if (category != "")
                url += "&productCategories=" + category;
            if (varations != "")
                url += "&variations=" + varations;
            if (price_range != "") {
                price_range = price_range.split("-");
                url += "&price_from=" + price_range[0];
                url += "&price_to=" + price_range[1];
            }

            if (sortBy != "" && sortType != "")
                url += "&sortBy=" + sortBy + "&sortType=" + sortType;
            var searchinput = "{{ isset($_GET['search']) ? $_GET['search'] : '' }}";
            if (searchinput != "")
                url += "&searchParameter=" + searchinput;
            var appendTo = 'shop_page_product_card';
            $.ajax({
                type: 'get',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        if (data.meta.last_page < page) {
                            $('.load-more-products').attr('disabled', true);
                            $('.load-more-products').html('No More Items');
                            return
                        }
                        var pagination =
                            '<label for="staticEmail" class="col-form-label">Showing From <span class="showing_record">' +
                            data.meta.to + '</span>&nbsp;of&nbsp;<span class="showing_total_record">' + data
                            .meta.total + '</span>&nbsp;results.</label>';
                        var nextPage = parseInt(data.meta.current_page) + 1;
                        pagination += '<div class="col-12 col-sm-6">';
                        pagination += '<ol class="loader-page mt-0">';
                        pagination += '<li class="loader-page-item">';
                        pagination += '<button class="load-more-products btn btn-secondary" data-page="' +
                            nextPage + '">Load More</button>';
                        pagination += '</li>';
                        pagination += '</ol>';
                        pagination += '</div>';

                        $('.pagination').html(pagination);
                        const templ = document.getElementById("product-card-template");
                        for (i = 0; i < data.data.length; i++) {
                            const clone = templ.content.cloneNode(true);
                            // clone.querySelector(".single-text-chat-li").classList.add("bg-blue-100");
                            clone.querySelector(".div-class").classList.add('col-12');
                            if (shopStyle.split('style')[1] == 1)
                                clone.querySelector(".div-class").classList.add('col-lg-3');
                            else
                                clone.querySelector(".div-class").classList.add('col-lg-4');
                            clone.querySelector(".div-class").classList.add('col-md-6');
                            clone.querySelector(".div-class").classList.add('griding');
                            clone.querySelector(".wishlist-icon").setAttribute('data-id', data.data[i]
                                .product_id);
                            clone.querySelector(".wishlist-icon").setAttribute('data-type', data.data[i]
                                .product_type);
                            clone.querySelector(".wishlist-icon").setAttribute('onclick', 'addWishlist(this)');

                            clone.querySelector(".wishlist-icon-2").setAttribute('data-id', data.data[i]
                                .product_id);
                            clone.querySelector(".wishlist-icon-2").setAttribute('data-type', data.data[i]
                                .product_type);
                            clone.querySelector(".wishlist-icon-2").setAttribute('onclick',
                            'addWishlist(this)');

                            clone.querySelector(".compare-icon").setAttribute('data-id', data.data[i]
                                .product_id);
                            clone.querySelector(".compare-icon").setAttribute('data-type', data.data[i]
                                .product_type);
                            clone.querySelector(".quick-view-icon").setAttribute('data-id', data.data[i]
                                .product_id);
                            clone.querySelector(".compare-icon").setAttribute('onclick', 'addCompare(this)');
                            clone.querySelector(".quick-view-icon").setAttribute('onclick',
                                'quiclViewData(this)');

                            clone.querySelector(".quantity-right-plus").setAttribute('data-field', i);
                            clone.querySelector(".quantity-left-minus").setAttribute('data-field', i);
                            clone.querySelector(".qty-input").setAttribute('id', 'quantity'+i);
                            clone.querySelector(".item-quantity").classList.add('itemqty'+i);

                            if (data.data[i].product_gallary != null) {
                                if (data.data[i].product_gallary.detail != null) {
                                    clone.querySelector(".product-card-image").setAttribute('src', data.data[i]
                                        .product_gallary.detail[0].gallary_path);
                                }
                            }
                            if (data.data[i].detail != null) {
                                clone.querySelector(".product-card-image").setAttribute('alt', data.data[i]
                                    .detail[0].title);
                            }
                            if (data.data[i].category != null) {
                                if (data.data[i].category[0].category_detail.detail != null) {
                                    clone.querySelector(".product-card-category").innerHTML = data.data[i]
                                        .category[0].category_detail.detail[0].name;
                                }
                            }
                            if (data.data[i].detail != null) {
                                clone.querySelector(".product-card-name").innerHTML = data.data[i].detail[0]
                                    .title;
                                clone.querySelector(".product-card-name").setAttribute('href', '/product/' +
                                    data
                                    .data[i].product_id + '/' + data
                                    .data[i].product_slug);
                                var desc = data.data[i].detail[0].desc;
                                clone.querySelector(".product-card-desc").innerHTML = desc.substring(0, 50);
                            }

                            if (data.data[i].product_type == 'simple') {
                                if (data.data[i].product_discount_price == '' || data.data[i]
                                    .product_discount_price == null || data.data[i].product_discount_price ==
                                    'null') {
                                    clone.querySelector(".product-card-price").innerHTML = data.data[i]
                                        .product_price_symbol;
                                } else {

                                    clone.querySelector(".product-card-price").innerHTML = data.data[i]
                                        .product_discount_price_symbol + '<span>' + data.data[i]
                                        .product_price_symbol + '</span>';
                                }
                            } else {
                                if (data.data[i].product_combination != null && data.data[i]
                                    .product_combination != 'null' && data.data[i].product_combination != '') {
                                    clone.querySelector(".product-card-price").innerHTML = data.data[i]
                                        .product_combination[0].product_price_symbol;
                                }
                            }

                            if (data.data[i].product_type == 'simple') {
                                clone.querySelector(".product-card-link").setAttribute('onclick',
                                    "addToCart(this)");
                                clone.querySelector(".product-card-link").setAttribute('data-id', data.data[i]
                                    .product_id);
                                clone.querySelector(".product-card-link").setAttribute('data-type', data.data[i]
                                    .product_type);
                                clone.querySelector(".product-card-link").innerHTML = 'Add To Cart';
                                clone.querySelector(".product-card-link").setAttribute('data-field', i);

                                clone.querySelector(".add-to-card-bag").setAttribute('onclick',
                                    "addToCart(this)");
                                clone.querySelector(".add-to-card-bag").setAttribute('data-id', data.data[i]
                                    .product_id);
                                clone.querySelector(".add-to-card-bag").setAttribute('data-type', data.data[i]
                                    .product_type);
                                clone.querySelector(".add-to-card-bag").setAttribute('data-field', i);


                            } else {
                                clone.querySelector('.itemqty'+i).classList.add('d-none');
                                clone.querySelector(".add-to-card-bag").classList.add('d-none');
                                clone.querySelector(".product-card-link").classList.remove('d-g-none');
                                clone.querySelector(".product-card-link").classList.remove('listing-none');
                                clone.querySelector(".product-card-link").innerHTML = 'View Detail';
                                clone.querySelector(".product-card-link").setAttribute('href', '/product/' +
                                    data.data[i].product_id + '/' + data.data[i].product_slug);
                            }

                            $("." + appendTo).append(clone);
                        }
                    }
                },
                error: function(data) {},
            });
        }


        var limit = "{{ isset($_GET['limit']) ? $_GET['limit'] : '12' }}";
        var shopRedirecturl = "{{ url('/shop') }}" + '?limit=' + limit;
        $('.category-filter').change(function() {
            $(this).attr('selected', true);
        })
        $('.price-filter').change(function() {
            $(this).attr('selected', true);
        })

        $('.variaion-filter').on('change', function() {

            if (attribute_id.indexOf($(this).attr('data-attribute-id')) === -1) {
                attribute_id.push($(this).attr('data-attribute-id'));
                variation_id.push($(this).val());
                attribute.push($(this).attr('data-attribute-name'));
                variation.push($('option:selected', this).attr('data-variation-name'));
            } else {

                var index = attribute_id.indexOf($(this).attr('data-attribute-id'));
                if ($(this).val() == "") {
                    attribute_id.splice(index, 1);
                    variation_id.splice(index, 1);
                    attribute.splice(index, 1);
                    variation.splice(index, 1);
                } else {
                    attribute_id[index] = $(this).attr('data-attribute-id');
                    variation_id[index] = $(this).val();
                    attribute[index] = $(this).attr('data-attribute-name');
                    variation[index] = $('option:selected', this).attr('data-variation-name');
                }

            }


        })

        $('.price-range-list').on('click', function() {
            var price_range = $(this).attr('data-price-range');
            $('.price-range-list').each(function() {
                $('.price-range-list').removeClass("price-active");
            })
            $('.price-range-list' + '-' + price_range).addClass("price-active");
            priceFromSidebar = price_range;
        });

        $('.variation_list_item').on('click', function() {
            var variation_name = $(this).attr('data-variation-name');
            var attribute_name = $(this).attr('data-attribute-name').split(' ').join('_');

            $('.attribute_' + attribute_name + '_div').each(function() {
                $('.attribute_' + attribute_name + '_div').removeClass("variation_active");
            })

            $('.' + variation_name + '-' + attribute_name).addClass("variation_active");

            if (attribute_id.indexOf($(this).attr('data-attribute-id')) === -1) {
                attribute_id.push($(this).attr('data-attribute-id'));
                attribute.push($(this).attr('data-attribute-name'));
                variation_id.push($(this).attr('data-variation-id'));
                variation.push($(this).attr('data-variation-name'));

            } else {

                var index = attribute_id.indexOf($(this).attr('data-attribute-id'));
                if ($(this).attr('data-variation-id') == "") {
                    attribute_id.splice(index, 1);
                    variation_id.splice(index, 1);
                    attribute.splice(index, 1);
                    variation.splice(index, 1);
                } else {
                    attribute_id[index] = $(this).attr('data-attribute-id');
                    variation_id[index] = $(this).attr('data-variation-id');
                    attribute[index] = $(this).attr('data-attribute-name');
                    variation[index] = $(this).attr('data-variation-name');
                }

            }

            console.log(attribute_id, variation_id, attribute, variation)
        })

        $('#filter').click(function(e) {
            e.preventDefault();

            filter();
        })

        $('.filter-from-sidebar').click(function() {
            filter();
        })

        function filter() {
            var limit = "{{ isset($_GET['limit']) ? $_GET['limit'] : '12' }}";
            var searchinput = "{{ isset($_GET['search']) ? $_GET['search'] : '' }}";

            if ($('.category-filter').val() != "" && $('.category-filter').val() != undefined) {
                shopRedirecturl += "&category=" + $('.category-filter').val();
            }
            if ($('.price-filter').val() != "" && $('.price-filter').val() != undefined) {
                shopRedirecturl += "&price=" + $('.price-filter').val();
            } else if (priceFromSidebar != "") {
                shopRedirecturl += "&price=" + priceFromSidebar;
            }

            if (searchinput != "")
                shopRedirecturl += "&searchParameter=" + searchinput;
            if (variation_id.length > 0)
                shopRedirecturl += "&attribute=" + attribute;
            if (variation_id.length > 0)
                shopRedirecturl += "&variation=" + variation;
            if (variation_id.length > 0)
                shopRedirecturl += "&attribute_id=" + attribute_id;
            if (variation_id.length > 0)
                shopRedirecturl += "&variation_id=" + variation_id;
            window.location.href = shopRedirecturl;
        }

        $(document).on('click', '.load-more-products', function() {
            var pageToLoad = $(this).attr('data-page');
            fetchProduct(pageToLoad);
        })

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
