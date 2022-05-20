<div class="container-fuild">
    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans('lables.bread-crumb-home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('lables.bread-shopping-cart') }}</li>
            </ol>
        </div>
    </nav>
</div>
<section class="pro-content">
    <div class="container">
        <div class="page-heading-title">
            <h2>{{ trans('lables.cart-page-shopping-cart') }}</h2>

        </div>
    </div>


    <!-- cart Content -->
    <section class=" cart-content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 cart-area cart-page-one">
                    <div class="row">
                        <div class="col-12 col-lg-9">
                            <table class="table top-table" id="cartItem-product-show">

                            </table>

                            <div class="col-12 col-lg-12 mb-4">

                                <div class="row justify-content-between click-btn">
                                    <div class="col-12 col-lg-4">
                                        <div class="row">
                                            <div class="input-group">
                                                <input type="text" id="coupon_code" class="form-control" placeholder="Coupon Code" aria-label="Coupon Code" aria-describedby="coupon-code">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary swipe-to-top" type="button" onclick="couponCartItem()" id="coupon-code">{{ trans('lables.cart-page-apply') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-7 align-right">
                                        <div class="row">
                                            <a href="{{ url("/shop") }}" class="btn btn-secondary swipe-to-top">
                                                {{ trans('lables.cart-page-continue-shopping') }}</a>
                                            <button type="button" class="btn btn-light swipe-to-top" onclick="updateCartItem()">{{ 
                                            trans('lables.cart-page-update-cart') }}</button>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <table class="table right-table" id="cartItem-grandtotal-product-show">

                            </table>
                            <a href="{{url('/checkout')}}">
                                <button class="btn btn-secondary swipe-to-top m-btn col-12">{{ trans('lables.cart-page-proceed-to-checkout') }}</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <template id="cartItem-Template">
        <tbody>
            <tr class="d-flex cartItem-row">
                <td class="col-12 col-md-2">
                    <img class="img-fluid cartItem-image" src="" />
                </td>
                <td class="col-12 col-md-4 item-detail-left">
                    <div class="item-detail">
                        <span class="cartItem-category-name"></span>
                        <h4 class="cartItem-name">
                        </h4>
                        <div class="item-attributes"></div>
                        <div class="item-controls">
                            {{-- <button type="button" class="btn">
                                <span class="fas fa-pencil-alt"></span>
                            </button> --}}
                            <button type="button" class="btn cartItem-remove">
                                <span class="fas fa-times"></span>
                            </button>
                        </div>
                    </div>
                </td>
                <td class="item-price col-12 col-md-2 cartItem-price"></td>
                <td class="col-12 col-md-2">
                    <div class="input-group item-quantity">

                        <input type="text" id="quantity2" name="quantity" class="form-control cartItem-qty">

                        <span class="input-group-btn">
                            <button type="button" value="quantity" class="quantity-right-plus btn cartItem-qty-1" data-type="plus" data-field="">

                                <span class="fas fa-plus"></span>
                            </button>

                            <button type="button" value="quantity" class="quantity-left-minus btn cartItem-qty-2" data-type="minus" data-field="">
                                <span class="fas fa-minus"></span>
                            </button>


                        </span>


                    </div>
                </td>
                <td class="align-middle item-total col-12 col-md-2 cartItem-total" align="center"></td>
            </tr>
        </tbody>
    </template>


    <template id="cartItem-grandtotal-template">

        <thead>
            <tr>
                <th scope="col" colspan="2" align="center">{{ trans('lables.cart-page-order-summary') }}</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ trans('lables.cart-page-subtotal') }}</th>
                <td align="right" class="caritem-subtotal"></td>

            </tr>
            <tr>
                <th scope="row">{{ trans('lables.cart-page-discount') }}</th>
                <td align="right" class="caritem-discount-coupon"></td>

            </tr>
            
            <tr class="item-price">
                <th scope="row">{{ trans('lables.cart-page-total') }}</th>
                <td align="right" class="caritem-grandtotal"></td>

            </tr>


        </tbody>


    </template>

</section>


