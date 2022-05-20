@extends('layouts.master')
@section('content')

    <div class="container-fuild">
        <nav aria-label="breadcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans('lables.bread-crumb-home') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans('lables.bread-checkout') }}</li>
                </ol>
            </div>
        </nav>
    </div>
    <section class="pro-content">
        <div class="container">
            <div class="page-heading-title">
                <h2> {{ trans('lables.checkout-checkout') }} </h2>

            </div>
        </div>
        <!-- checkout Content -->
        <section class="checkout-area">

            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-9">
                        <div class="row">
                            <div class="checkout-module">
                                <ul class="nav nav-pills checkoutd-nav mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link  active" id="pills-shipping-tab" data-toggle="pill"
                                            href="#pills-shipping" role="tab" aria-controls="pills-shipping"
                                            aria-selected="true"><span class="d-flex d-lg-none">1</span><span
                                                class="d-none d-lg-flex">{{ trans('lables.checkout-shipping-address') }}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " id="pills-billing-tab" data-toggle="pill"
                                            href="#pills-billing" role="tab" aria-controls="pills-billing"
                                            aria-selected="false"><span class="d-flex d-lg-none">2</span><span
                                                class="d-none d-lg-flex">{{ trans('lables.checkout-billing-address') }}</span></a>
                                    </li>
                                    {{-- <li class="nav-item">
                                    <a class="nav-link " id="pills-method-tab" data-toggle="pill" href="#pills-method" role="tab" aria-controls="pills-method" aria-selected="false"><span class="d-flex d-lg-none">3</span><span class="d-none d-lg-flex">{{ trans('lables.checkout-shipping-method') }}</span></a>
                                </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link " id="pills-order-tab" data-toggle="pill"
                                            href="#pills-order" role="tab" aria-controls="pills-order"
                                            aria-selected="false"><span class="d-flex d-lg-none">4</span><span
                                                class="d-none d-lg-flex">{{ trans('lables.checkout-order-detail') }}</span></a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="pills-shipping" role="tabpanel"
                                        aria-labelledby="pills-shipping-tab">
                                        <form>
                                            <div class="form-row">
                                                <div class="from-group col-md-6 mb-3">
                                                    <label for="">{{ trans('lables.checkout-first-name') }}</label>
                                                    <div class="input-group ">

                                                        <input type="text" class="form-control" id="delivery_first_name"
                                                            placeholder="{{ trans('lables.checkout-first-name') }}">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="from-group col-md-6 mb-3">
                                                    <label for="">{{ trans('lables.checkout-last-name') }}</label>
                                                    <div class="input-group ">

                                                        <input type="text" class="form-control" id="delivery_last_name"
                                                            placeholder="{{ trans('lables.checkout-last-name') }}">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                {{-- {{dd(getSetting()['is_deliveryboyapp_purchased'])}} --}}

                                                <div class="from-group col-md-6 mb-3">
                                                    <label for="">{{ trans('lables.checkout-address') }}</label>
                                                    <div class="input-group ">

                                                        <input type="text" class="form-control"
                                                            id="delivery_street_aadress"
                                                            placeholder="{{ trans('lables.checkout-address') }}">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="from-group col-md-6 mb-3">
                                                    <label for="">{{ trans('lables.checkout-city-name') }}</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control" id="delivery_city"
                                                            placeholder="City">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-row">
                                                <div class="from-group col-md-6 mb-3">
                                                    <label for="">{{ trans('lables.checkout-country-name') }}</label>
                                                    <div class="input-group select-control">

                                                        <select class="form-control" id="delivery_country"
                                                            onchange="states1()">
                                                        </select>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="from-group col-md-6 mb-3">
                                                    <label for="">{{ trans('lables.checkout-state-name') }}</label>
                                                    <div class="input-group select-control">

                                                        <select class="form-control" id="delivery_state">

                                                        </select>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="form-row">

                                                <div class="from-group col-md-6 mb-3">
                                                    <label for="">{{ trans('lables.checkout-postal-code') }}</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control" id="delivery_postcode"
                                                            placeholder="{{ trans('lables.checkout-postal-code') }}">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="from-group col-md-6 mb-3">
                                                    <label for="">{{ trans('lables.checkout-phone') }}</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control" id="delivery_phone"
                                                            placeholder="{{ trans('lables.checkout-phone') }}">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-row">

                                                @if (isset(getSetting()['is_deliveryboyapp_purchased']) && getSetting()['is_deliveryboyapp_purchased'] == '1')
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label for=""> @lang('lables.checkout-location')</label>
                                                        <input type="text" required class="form-control field-validate"
                                                            data-toggle="modal" data-target="#mapModal" name="latlong"
                                                            id="latlong" aria-describedby="addressHelp"
                                                            placeholder="@lang('lables.checkout-location-placeholder')">
                                                        <div class="invalid-feedback"></div>

                                                    </div>
                                                @endif

                                            </div>

                                            <div class="col-12 col-sm-12">
                                                <div class="row">

                                                    <a data-toggle="pill" href="#pills-billing"
                                                        class="btn btn-secondary swipe-to-top cta">{{ trans('lables.checkout-continue') }}</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="pills-billing" role="tabpanel"
                                        aria-labelledby="pills-billing-tab">
                                        <form>

                                            <div class="form-row">
                                                <div class="from-group col-md-6 mb-3">
                                                    <label
                                                        for="">{{ trans('lables.checkout-billing-first-name') }}</label>
                                                    <div class="input-group ">

                                                        <input type="text" class="form-control" id="billing_first_name"
                                                            placeholder="{{ trans('lables.checkout-billing-first-name') }}">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="from-group col-md-6 mb-3">
                                                    <label
                                                        for="">{{ trans('lables.checkout-billing-last-name') }}</label>
                                                    <div class="input-group ">

                                                        <input type="text" class="form-control" id="billing_last_name"
                                                            placeholder="{{ trans('lables.checkout-billing-last-name') }}">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">

                                                <div class="from-group col-md-6 mb-3">
                                                    <label for="">{{ trans('lables.checkout-billing-address') }}</label>
                                                    <div class="input-group ">

                                                        <input type="text" class="form-control"
                                                            id="billing_street_aadress"
                                                            placeholder="{{ trans('lables.checkout-billing-address') }}">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="from-group col-md-6 mb-3">
                                                    <label
                                                        for="">{{ trans('lables.checkout-billing-country-name') }}</label>
                                                    <div class="input-group select-control">

                                                        <select class="form-control" id="billing_country"
                                                            onchange="states()"></select>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">

                                                <div class="from-group col-md-6 mb-3">
                                                    <label for="">{{ trans('lables.checkout-state-name') }}</label>
                                                    <div class="input-group select-control">

                                                        <select class="form-control" id="billing_state"></select>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="from-group col-md-6 mb-3">
                                                    <label
                                                        for="">{{ trans('lables.checkout-billing-city-name') }}</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control" id="billing_city"
                                                            placeholder="City">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-row">

                                                <div class="from-group col-md-6 mb-3">
                                                    <label for="">{{ trans('lables.checkout-postal-code') }}</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control" id="billing_postcode"
                                                            placeholder="{{ trans('lables.checkout-postal-code') }}">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="from-group col-md-6 mb-3">
                                                    <label for="">{{ trans('lables.checkout-billing-phone') }}</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control" id="billing_phone"
                                                            placeholder="{{ trans('lables.checkout-billing-phone') }}">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">

                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="defaultCheck">
                                                    <label class="form-check-label" for="defaultCheck">
                                                        {{ trans('lables.checkout-same-ship-bill-address-text') }}
                                                    </label>
                                                    <small id="checkboxHelp" class="form-text text-muted"></small>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-12">
                                                <div class="row">
                                                    <a data-toggle="pill" href="#pills-shipping"
                                                        class="btn btn-light swipe-to-top cta">{{ trans('lables.checkout-back') }}</a>
                                                    <a data-toggle="pill" href="#pills-order"
                                                        class="btn btn-secondary swipe-to-top cta">{{ trans('lables.checkout-continue') }}</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- <div class="tab-pane fade" id="pills-method" role="tabpanel" aria-labelledby="pills-method-tab">


                                    <div class="col-12 col-sm-12">
                                        <div class="row">
                                            <a data-toggle="pill" href="#pills-billing" class="btn btn-light swipe-to-top cta">{{ trans('lables.checkout-back') }}</a>

                                            <a data-toggle="pill" href="#pills-order" class="btn btn-secondary swipe-to-top cta">{{ trans('lables.checkout-continue') }}</a>
                                        </div>
                                    </div>


                                </div> --}}
                                    <input type="hidden" id="delivery_state_hidden" />
                                    <input type="hidden" id="delivery_country_hidden" />
                                    <input type="hidden" id="billing_state_hidden" />
                                    <input type="hidden" id="billing_country_hidden" />
                                    <div class="tab-pane fade" id="pills-order" role="tabpanel"
                                        aria-labelledby="pills-order-tab">
                                        <table class="table top-table" id="cartItem-product-show">
                                        </table>
                                        <div class="col-12 col-sm-12">
                                            <div class="row">
                                                <div class="heading">
                                                    <h4>{{ trans('lables.checkout-order-notes-title') }}</h4>

                                                </div>

                                                <div class="form-group" style="width:100%; padding:0;">
                                                    <label
                                                        for="exampleFormControlTextarea1">{{ trans('lables.checkout-order-notes-description') }}</label>
                                                    <textarea class="form-control" id="order_notes" rows="3"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-12 ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>{{ trans('lables.checkout-payment-method-title') }}</h4>
                                                </div>
                                                <div class="col-md-12">
                                                    <form id="paymentForm" class="d-block">

                                                        {{-- <label for="exampleFormControlTextarea1" style="width:100%; margin-bottom:30px;">{{ trans('lables.checkout-payment-method-description') }}</label> --}}
                                                        @foreach ($payment_method as $payment_methods)
                                                            <div class="form-group">
                                                                <input class="form-check-input payment_method "
                                                                    type="radio"
                                                                    id="inlineCheckbox{{ $payment_methods->id }}"
                                                                    value="{{ $payment_methods->payment_method }}"
                                                                    name="payment_method">
                                                                <label class="form-check-label"
                                                                    for="inlineCheckbox{{ $payment_methods->id }}">{{ $payment_methods->title }}</label>
                                                            </div>

                                                        @endforeach
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 bank_transfer d-none">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-striped">
                                                        @foreach ($payment_method_setting as $payment_method_settings)
                                                            <tr>
                                                                <th>{{ str_replace('BANK_TRANSFER_', '', $payment_method_settings->key) }}
                                                                </th>
                                                                <td>{{ $payment_method_settings->value }}</td>
                                                            </tr>
                                                        @endforeach

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 stripe_payment d-none">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group" style="width:100%; padding:0;">
                                                        <label for="exampleFormControlTextarea1">Account Number</label>
                                                        <input type="text" class="form-control" id="cc_number"
                                                            maxlength="16" />
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="width:100%; padding:0;">
                                                        <label for="exampleFormControlTextarea1">Expiry Month</label>
                                                        <input type="text" class="form-control" id="cc_expiry_month"
                                                            maxlength="2" />
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">

                                                    <div class="form-group" style="width:100%; padding:0;">
                                                        <label for="exampleFormControlTextarea1">Expiry Year</label>
                                                        <input type="text" class="form-control" id="cc_expiry_year"
                                                            maxlength="4" />
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="width:100%; padding:0;">
                                                        <label for="exampleFormControlTextarea1">CVC</label>
                                                        <input type="text" class="form-control" id="cc_cvc"
                                                            maxlength="3" />
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="payment-method-nonce" name="payment-method-nonce" />
                                        <input type="hidden" id="data-descriptor" name="data-descriptor" />
                                        <input type="hidden" id="data-value" name="data-value" />


                                        <div class="col-md-12 braintree_payment d-none">
                                            <!-- Bootstrap inspired Braintree Hosted Fields example -->
                                            <div class="bootstrap-basic">
                                                <form class="needs-validation" id="braintree-form" novalidate="">
                                                    <div class="row">
                                                        <div class="col-sm-6 mb-3">
                                                            <label for="cc-number">Credit card number</label>
                                                            <div class="form-control" id="cc-number"></div>
                                                            <div class="invalid-feedback">
                                                                Credit card number is required
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 mb-3">
                                                            <label for="cc-expiration">Expiration</label>
                                                            <div class="form-control" id="cc-expiration"></div>
                                                            <div class="invalid-feedback">
                                                                Expiration date required
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 mb-3">
                                                            <label for="cc-expiration">CVV</label>
                                                            <div class="form-control" id="cc-cvv"></div>
                                                            <div class="invalid-feedback">
                                                                Security code required
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <button class="btn btn-primary btn-lg" type="submit">Pay with
                                                                <span id="card-brand">Card</span></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div aria-live="polite" aria-atomic="true"
                                                style="position: relative; min-height: 200px;">
                                                <div class="toast" role="alert" aria-live="assertive"
                                                    aria-atomic="true" data-autohide="false">
                                                    <div class="toast-header">
                                                        <strong class="mr-auto">Success!</strong>
                                                        <small>Just now</small>
                                                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="toast-body">
                                                        Next, submit the payment method nonce to your server.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 paytm d-none">
                                            <!-- Bootstrap inspired Braintree Hosted Fields example -->
                                            <div class="bootstrap-basic">
                                                <form class="needs-validation" id="paytm-form"
                                                    action="{{ url('paytm-pay') }}" novalidate="">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-sm-6 mb-3">
                                                            <label for="name">Name</label>
                                                            <input type="text" id="paytm-name" name="name"
                                                                class="form-control" placeholder="Name">

                                                        </div>
                                                        <div class="col-sm-3 mb-3">
                                                            <label for="mobile">Mobile</label>
                                                            <input type="text" id="paytm-mobile" name="mobile"
                                                                class="form-control" placeholder="Mobile">
                                                        </div>
                                                        <div class="col-sm-3 mb-3">
                                                            <label for="address">Email</label>
                                                            <input type="email" id="paytm-email" class="form-control"
                                                                placeholder="Email" name="email" />
                                                        </div>
                                                        <input type="hidden" name="order_id" value=""
                                                            id="order_status_by_paytm" />
                                                        <div class="col-sm-12">
                                                            <button type="submit"
                                                                class="btn btn-success btn-block paytm-button">Pay to
                                                                Paytm</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                            <div aria-live="polite" aria-atomic="true"
                                                style="position: relative; min-height: 200px;">
                                                <div class="toast" role="alert" aria-live="assertive"
                                                    aria-atomic="true" data-autohide="false">
                                                    <div class="toast-header">
                                                        <strong class="mr-auto">Success!</strong>
                                                        <small>Just now</small>
                                                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="toast-body">
                                                        Next, submit the payment method nonce to your server.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12">
                                            <div class="row">
                                                <a data-toggle="pill" href="#pills-method"
                                                    class="btn btn-light swipe-to-top cta">{{ trans('lables.checkout-back') }}</a>
                                                <button type="submit"
                                                    class="btn btn-secondary swipe-to-top createOrder">{{ trans('lables.checkout-continue') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-3">
                        <table class="table right-table" id="cartItem-grandtotal-product-show"></table>
                        <input type="button" class="swipe-to-top btn-block btn btn-danger" id="removeCoupon" value="Remove Coupon" />
                    </div>
                </div>
            </div>
            </div>
        </section>

    </section>
    <template id="cartItem-Template">
        <tbody>
            <tr class="d-flex cartItem-row">
                <td class="col-12 col-md-2">
                    <img class="img-fluid cartItem-image" src="images/product_images/product_image_6.png" />
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

                        <input type="text" id="quantity2" name="quantity" disabled class="form-control cartItem-qty">


                    </div>
                </td>
                <td class="align-middle item-total col-12 col-md-2 cartItem-total" align="center"></td>
            </tr>
        </tbody>
    </template>

    <template id="cartItem-grandtotal-template">

        <thead>
            <tr>
                <th scope="col" colspan="2" align="center">{{ trans('lables.checkout-order-summary') }}</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ trans('lables.checkout-subtotal') }}</th>
                <td align="right" class="caritem-subtotal">$0</td>

            </tr>
            <tr>
                <th scope="row">{{ trans('lables.checkout-discount') }}</th>
                <td align="right" class="caritem-discount-coupon">$0</td>

            </tr>
            <template id="test"></template>
            <tr>
                <th scope="row">{{ trans('lables.checkout-shipping') }}</th>
                <td align="right" class="shipping-tax" data-price="0">$0</td>

            </tr>
            <tr class="item-price">
                <th scope="row">{{ trans('lables.checkout-total') }}</th>
                <td align="right" class="caritem-grandtotal">$0</td>

            </tr>


        </tbody>


    </template>

    <input type="hidden" class="total_by_weight" />


    <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-modal="true">

        <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="container">
                        <div class="row align-items-center">

                            <div class="form-group">
                                <input type="text" id="pac-input" name="address_address" class="form-control map-input">
                            </div>
                            <div id="address-map-container" style="width:100%;height:400px; ">
                                <div style="width: 100%; height: 100%" id="map"></div>
                            </div>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" onclick="setUserLocation()"><i
                            class="fas fa-location-arrow"></i></button>
                    <button type="button" class="btn btn-secondary" onclick="saveAddress()">Save</button>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script type="text/javascript" src="https://jstest.authorize.net/v1/Accept.js" charset="utf-8"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        languageId = $.trim(localStorage.getItem("languageId"));
        cartSession = $.trim(localStorage.getItem("cartSession"));
        if (cartSession == null || cartSession == 'null') {
            cartSession = '';
        }
        loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
        customerToken = $.trim(localStorage.getItem("customerToken"));
        customerId = $.trim(localStorage.getItem("customerId"));

        if (loggedIn != '1') {
            window.location.href = "{{ url('login') }}";
        }

        $(document).ready(function() {
            if (loggedIn == '1') {
                cartItem('');
            } else {
                cartItem(cartSession);
            }
        });


        function cartItem(cartSession) {
            if (loggedIn == '1') {
                url = "{{ url('') }}" + '/api/client/cart?session_id=' + cartSession + '&language_id=' + languageId +
                    '&currency=' + localStorage.getItem("currency");
            } else {
                url = "{{ url('') }}" + '/api/client/cart/guest/get?session_id=' + cartSession + '&language_id=' +
                    languageId + '&currency=' + localStorage.getItem("currency");
            }
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
                        $("#cartItem-product-show").html('');
                        const templ = document.getElementById("cartItem-Template");
                        total_price = 0;
                        total_weight = 0;

                        for (i = 0; i < data.data.length; i++) {
                            const clone = templ.content.cloneNode(true);
                            // clone.querySelector(".single-text-chat-li").classList.add("bg-blue-100");



                            if (data.data[i].product_type == 'variable') {
                                for (k = 0; k < data.data[i].combination.length; k++) {
                                    if (data.data[i].product_combination_id == data.data[i].combination[k]
                                        .product_combination_id) {
                                        total_weight += parseInt(data.data[i].product_weight) * parseInt(data
                                            .data[i].qty);
                                        if (data.data[i].combination[k].gallary != null) {
                                            clone.querySelector(".cartItem-image").setAttribute('src',
                                                '/gallary/' + data.data[i].combination[k].gallary
                                                .gallary_name);
                                            clone.querySelector(".cartItem-image").setAttribute('alt', data
                                                .data[i].combination[k].gallary.gallary_name);
                                            name = data.data[i].product_detail[0].title;
                                            for (loop = 0; loop < data.data[i].product_combination
                                                .length; loop++) {
                                                if (data.data[i].product_combination[loop].length - 1 == loop) {
                                                    name += data.data[i].product_combination[loop].variation
                                                        .detail[0].name;
                                                } else {
                                                    name += data.data[i].product_combination[loop].variation
                                                        .detail[0].name + '-';
                                                }
                                            }
                                            clone.querySelector(".cartItem-name").innerHTML = name;
                                        }
                                        k = data.data[i].combination.length;
                                    } else {}
                                }
                            } else {
                                total_weight += parseInt(data.data[i].product_weight) * parseInt(data.data[i]
                                    .qty);
                                if (data.data[i].product_gallary != null && $.trim(data.data[i]
                                        .product_gallary) != '') {
                                    if (data.data[i].product_gallary.detail != null && $.trim(data.data[i]
                                            .product_gallary.detail) != '') {
                                        clone.querySelector(".cartItem-image").setAttribute('src', data.data[i]
                                            .product_gallary.detail[2].gallary_path);
                                    }
                                }
                                if (data.data[i].product_detail != null && $.trim(data.data[i]
                                        .product_detail) != '') {
                                    clone.querySelector(".cartItem-image").setAttribute('alt', data.data[i]
                                        .product_detail[0].title);
                                    clone.querySelector(".cartItem-name").innerHTML = data.data[i]
                                        .product_detail[0].title;
                                }
                            }

                            if (data.data[i].discount_price > 0) {
                                discount_price = data.data[i].discount_price;
                            } else {
                                discount_price = data.data[i].price;
                            }
                            if (data.data[i].currency != '' && data.data[i].currency != 'null' && data.data[i]
                                .currency != null) {
                                if (data.data[i].currency.symbol_position == 'left') {
                                    sum = +data.data[i].qty * +discount_price;
                                    clone.querySelector(".cartItem-total").innerHTML = data.data[i].currency
                                        .code + ' ' + sum;
                                    clone.querySelector(".cartItem-price").innerHTML = data.data[i].currency
                                        .code + ' ' + discount_price;
                                } else {
                                    sum = +data.data[i].qty * +discount_price;
                                    clone.querySelector(".cartItem-total").innerHTML = sum + ' ' + data.data[i]
                                        .currency.code;
                                    clone.querySelector(".cartItem-price").innerHTML = discount_price + ' ' +
                                        data.data[i]
                                        .currency.code;
                                }
                            } else {
                                clone.querySelector(".cartItem-price").innerHTML = discount_price;
                            }
                            clone.querySelector(".cartItem-qty").value = +data.data[i].qty;
                            clone.querySelector(".cartItem-qty").setAttribute('id', 'quantity' + i);

                            total_price = total_price + (discount_price * data.data[i].qty);


                            if ($.trim(data.data[i].category_detail[0].category_detail) != '' && $.trim(data
                                    .data[i].category_detail[0].category_detail) != 'null' && $.trim(data.data[
                                    i].category_detail[0].category_detail) != null) {
                                clone.querySelector(".cartItem-category-name").innerHTML = data.data[i]
                                    .category_detail[0].category_detail.detail[0].name;
                            }
                            clone.querySelector(".cartItem-remove").setAttribute('data-id', data.data[i]
                                .product_id);
                            clone.querySelector(".cartItem-remove").setAttribute('data-combination-id', data
                                .data[i].product_combination_id);
                            clone.querySelector(".cartItem-remove").setAttribute('onclick',
                                'removeCartItem(this)');

                            clone.querySelector(".cartItem-row").setAttribute('product_combination_id', data
                                .data[i].product_combination_id);
                            clone.querySelector(".cartItem-row").setAttribute('product_id', data.data[i]
                                .product_id);
                            clone.querySelector(".cartItem-row").setAttribute('product_type', data.data[i]
                                .product_type);

                            $("#cartItem-product-show").append(clone);
                            const temp1 = document.getElementById("cartItem-grandtotal-template");
                            const clone1 = temp1.content.cloneNode(true);
                            if (data.data[i].currency != '' && data.data[i].currency != 'null' && data.data[i]
                                .currency != null) {
                                if (data.data[i].currency.symbol_position == 'left') {
                                    clone1.querySelector(".caritem-subtotal").innerHTML = data.data[i].currency
                                        .code + ' ' + total_price;
                                    clone1.querySelector(".caritem-subtotal").setAttribute('price',
                                        total_price);
                                    clone1.querySelector(".caritem-subtotal").setAttribute('currency-position',
                                        data.data[i].currency.symbol_position);
                                    clone1.querySelector(".caritem-subtotal").setAttribute('currency-code', data
                                        .data[i].currency.code);
                                    clone1.querySelector(".caritem-subtotal").setAttribute('price-symbol', data
                                        .data[i].currency.code + ' ' + total_price);
                                    clone1.querySelector(".caritem-grandtotal").innerHTML = data.data[i]
                                        .currency.code + ' ' + total_price.toFixed(2);
                                    clone1.querySelector(".shipping-tax").setAttribute('data-price', '0');
                                } else {
                                    clone1.querySelector(".caritem-subtotal").innerHTML = total_price + ' ' +
                                        data.data[i].currency.code;
                                    clone1.querySelector(".caritem-subtotal").setAttribute('price',
                                        total_price);
                                    clone1.querySelector(".shipping-tax").setAttribute('data-price', '0');
                                    clone1.querySelector(".caritem-subtotal").setAttribute('price-symbol', data
                                        .data[i].currency.code + ' ' + total_price);
                                    clone1.querySelector(".caritem-grandtotal").innerHTML = total_price.toFixed(
                                        2) + ' ' + data.data[i].currency.code;
                                }
                            }
                            $("#cartItem-grandtotal-product-show").html('');
                            $("#cartItem-grandtotal-product-show").append(clone1);
                        }

                        $('.total_by_weight').val(total_weight);
                        couponCart = $.trim(localStorage.getItem("couponCart"));
                        if (couponCart != 'null' && couponCart != '') {
                            $("#coupon_code").val(couponCart);
                            couponCartItem();
                        }

                    } else {
                        toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                    }
                },
                error: function(data) {},
            });
        }



        // function removeCartItem(input) {
        //     product_id = $.trim($(input).attr('data-id'));
        //     product_combination_id = $.trim($(input).attr('data-combination-id'));
        //     if (product_combination_id == null || product_combination_id == 'null') {
        //         product_combination_id = '';
        //     }

        //     if (loggedIn == '1') {
        //         url = "{{ url('') }}" + '/api/client/cart?session_id=' + cartSession + '&product_id=' + product_id +
        //             '&product_combination_id=' + product_combination_id + '&language_id=' + languageId;
        //     } else {
        //         url = "{{ url('') }}" + '/api/client/cart/guest/delete?session_id=' + cartSession + '&product_id=' +
        //             product_id + '&product_combination_id=' + product_combination_id + '&language_id=' + languageId;
        //     }

        //     $.ajax({
        //         type: 'DELETE',
        //         url: url,
        //         headers: {
        //             'Authorization': 'Bearer ' + customerToken,
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        //             clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
        //             clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
        //         },
        //         beforeSend: function() {},
        //         success: function(data) {
        //             if (data.status == 'Success') {
        //                 $(input).closest('tr').remove();
        //                 cartItem(cartSession);
        //                 menuCart(cartSession);
        //             } else {
        //                 toastr.error('{{ trans('response.some_thing_went_wrong') }}');
        //             }
        //         },
        //         error: function(data) {},
        //     });
        // }

        $("#removeCoupon").click(function() {
            localStorage.setItem("couponCart", '');
            price = $(".caritem-subtotal").attr('price-symbol');
            $(".caritem-discount-coupon").attr('price', 0);
            $(".caritem-discount-coupon").html(0);
            $(".caritem-grandtotal").html(price);
            tax();
            toastr.error('{{ trans('response.coupon_removed') }}');
        });


        function couponCartItem() {
            coupon_code = $.trim(localStorage.getItem("couponCart"));
            $.ajax({
                type: 'post',
                url: "{{ url('') }}" + '/api/client/coupon?currency=' + localStorage.getItem("currency"),
                data: {
                    coupon_code: coupon_code,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer ' + customerToken,
                },
                beforeSend: function() {},
                success: function(data) {
                    $("#coupon_code").val(coupon_code);
                    if (data.status == 'Success') {
                        if (data.data.type == 'fixed') {
                            price = $(".caritem-subtotal").attr('price');
                            if (data.data.currency != '' && data.data.currency != 'null' && data.data
                                .currency != null) {
                                price1 = (price - (data.data.amount * data.data.currency.exchange_rate));
                                $(".caritem-discount-coupon").attr('price', data.data.amount);
                                if (data.data.currency.symbol_position == 'left') {
                                    $(".caritem-discount-coupon").html(data.data.currency.code + ' ' + data.data
                                        .amount);
                                    $(".caritem-grandtotal").html(data.data.currency.code + ' ' + price1
                                        .toFixed(2));
                                } else {
                                    $(".caritem-discount-coupon").html(data.data.amount + ' ' + data.data
                                        .currency.code);
                                    $(".caritem-grandtotal").html(price1.toFixed(2) + ' ' + data.data.currency
                                        .code);
                                }
                            }
                        } else {
                            price = $(".caritem-subtotal").attr('price');
                            price1 = (price / 100) * data.data.amount;
                            $(".caritem-discount-coupon").attr('price', price1.toFixed(2));
                            if (data.data.currency != '' && data.data.currency != 'null' && data.data
                                .currency != null) {
                                if (data.data.currency.symbol_position == 'left') {
                                    $(".caritem-discount-coupon").html(data.data.currency.code + ' ' + price1
                                        .toFixed(2));
                                    price = price - price1
                                    $(".caritem-grandtotal").html(data.data.currency.code + ' ' + price.toFixed(
                                        2));
                                } else {
                                    $(".caritem-discount-coupon").html(price1.toFixed(2) + ' ' + data.data
                                        .currency.code);
                                    price = price - price1
                                    $(".caritem-grandtotal").html(price.toFixed(2) + ' ' + data.data.currency
                                        .code);
                                }
                            }
                        }
                        localStorage.setItem("couponCart", coupon_code);
                    } else {
                        price = $(".caritem-subtotal").attr('price-symbol');
                        $(".caritem-discount-coupon").attr('price', 0);
                        $(".caritem-discount-coupon").html('');
                        $(".caritem-grandtotal").html(price);
                        localStorage.setItem("couponCart", '');
                        toastr.error('{{ trans('invalid-coupon') }}');
                    }
                },
                error: function(data) {
                    console.log(data);
                    price = $(".caritem-subtotal").attr('price-symbol');
                    $(".caritem-discount-coupon").attr('price', 0);
                    $(".caritem-discount-coupon").html('');
                    $(".caritem-grandtotal").html(price);
                    localStorage.setItem("couponCart", '');
                    if (data.status == 422) {
                        // toastr.error(data.responseJSON.message);
                        toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                    }
                },
            });
        }
    </script>


    <script>
        country = state = '';
        $(document).ready(function() {
            getCustomerAdress();
            countries();
        });

        function getCustomerAdress() {
            $.ajax({
                type: 'get',
                url: "{{ url('') }}" +
                    '/api/client/customer_address_book?is_default=1&language_id=' + languageId,
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        for (i = 0; i < data.data.length; i++) {
                            $("#delivery_first_name").val(data.data[i].first_name);
                            $("#delivery_last_name").val(data.data[i].last_name);
                            $("#delivery_postcode").val(data.data[i].postcode);

                            if (data.data[i].country_id != 'null' && data.data[i].country_id != null && data
                                .data[i].country_id != '') {
                                country = data.data[i].country_id.country_id;
                            }
                            if (data.data[i].state_id != 'null' && data.data[i].state_id != null && data.data[i]
                                .state_id != '') {
                                state = data.data[i].state_id.id;
                            }
                            countries1();
                            $("#delivery_country_hidden").val(country);
                            $("#delivery_state_hidden").val(state);
                            $("#delivery_city").val(data.data[i].city);
                            $("#delivery_street_aadress").val(data.data[i].street_address);
                            $("#delivery_phone").val(data.data[i].phone);
                        }
                        if (data.data.length == 0) {
                            countries1();
                        }
                        shippingMethodisDefault();
                    }
                },
                error: function(data) {},
            });
        }

        function countries() {
            $.ajax({
                type: 'get',
                url: "{{ url('') }}/api/client/country?getAllData=1",
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        html = '<option value="">Select</option>';
                        for (i = 0; i < data.data.length; i++) {
                            selected = '';
                            if ($.trim($("#billing_country_hidden").val()) != '' && $.trim($(
                                    "#billing_country_hidden").val()) == data.data[i].country_id) {
                                selected = 'selected';
                                $("#billing_country_hidden").val('');
                            }

                            html += '<option value="' + data.data[i].country_id + '" ' + selected + '>' + data
                                .data[i].country_name + '</option>';
                        }
                        $("#billing_country").html(html);
                        if ($.trim($("#billing_state_hidden").val()) != '') {
                            $("#billing_country").trigger('change');
                        }
                    } else if (data.status == 'Error') {
                        toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                    }
                },
                error: function(data) {},
            });
        }

        function states() {
            country_id = $("#billing_country").val();
            if (country_id == '') {
                $("#billing_state").html('');
                return;
            }

            $.ajax({
                type: 'get',
                url: "{{ url('') }}/api/client/state?country_id=" + country_id + '&getAllData=1',
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        html = '<option value="">Select</option>';
                        for (i = 0; i < data.data.length; i++) {
                            selected = '';
                            if ($.trim($("#billing_state_hidden").val()) != '' && $.trim($(
                                    "#billing_state_hidden").val()) == data.data[i].id) {
                                selected = 'selected';
                            }
                            html += '<option value="' + data.data[i].id + '" ' + selected + '>' + data.data[i]
                                .name + '</option>';
                        }
                        $("#billing_state").html(html);
                        $("#billing_state_hidden").val('');
                    } else if (data.status == 'Error') {
                        toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                    }
                },
                error: function(data) {},
            });
        }

        function countries1() {
            $.ajax({
                type: 'get',
                url: "{{ url('') }}/api/client/country?getAllData=1",
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        html = '<option value="">Select</option>';
                        for (i = 0; i < data.data.length; i++) {
                            selected = '';
                            if ($.trim($("#delivery_country_hidden").val()) != '' && $.trim($(
                                    "#delivery_country_hidden").val()) == data.data[i].country_id) {
                                selected = 'selected';
                                $("#delivery_country_hidden").val('');
                            } else if (data.data[i].country_id == country) {
                                selected = 'selected';
                            }
                            html += '<option value="' + data.data[i].country_id + '" ' + selected + '>' + data
                                .data[i].country_name + '</option>';
                        }
                        $("#delivery_country").html(html);
                        if ($.trim($("#delivery_state_hidden").val()) != '' || country != '') {
                            $("#delivery_country").trigger('change');

                        }

                    } else if (data.status == 'Error') {
                        toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                    }
                },
                error: function(data) {},
            });
        }

        function states1() {

            country_id = $("#delivery_country").val() ? $("#delivery_country").val() : country;
            if (country_id == '') {
                $("#delivery_state").html('');
                return;
            }

            $.ajax({
                type: 'get',
                url: "{{ url('') }}/api/client/state?country_id=" + country_id + '&getAllData=1',
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        htmls = '<option value="">Select</option>';
                        for (i = 0; i < data.data.length; i++) {
                            selected = '';
                            if ($.trim($("#delivery_state_hidden").val()) != '' && $.trim($(
                                    "#delivery_state_hidden").val()) == data.data[i].id) {
                                selected = 'selected';
                            } else if (data.data[i].id == state) {
                                selected = 'selected';
                            }
                            htmls += '<option value="' + data.data[i].id + '" ' + selected + '>' + data.data[i]
                                .name + '</option>';
                        }
                        $("#delivery_state").html(htmls);
                        $("#delivery_state_hidden").val('');
                        tax();
                    } else if (data.status == 'Error') {
                        toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                    }
                },
                error: function(data) {},
            });
        }

        $("#delivery_state").change(function() {
            tax();
        })

        function isDefault(input) {
            id = $(input).attr('data-id');
            $.ajax({
                type: 'put',
                url: "{{ url('') }}/api/client/customer_address_book/" + id,
                data: {
                    is_default: '1',
                    is_default_type: 'default_action',
                    type: 'profile'
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
                        // toastr.success(data.message)
                    } else if (data.status == 'Error') {
                        toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                    }
                },
                error: function(data) {},
            });
        }

        function shippingEdit(input) {
            id = $(input).attr('data-id');
            $.ajax({
                type: 'get',
                url: "{{ url('') }}" + '/api/client/customer_address_book/' + id,
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        $("#shippingAddressForm").find("#first_name").val(data.data.first_name);
                        $("#shippingAddressForm").find("#last_name").val(data.data.last_name);
                        $("#shippingAddressForm").find("#postcode").val(data.data.postcode);
                        country = state = '';
                        if (data.data.country_id != 'null' && data.data.country_id != null && data.data
                            .country_id != '') {
                            country = data.data.country_id.country_id;
                        }
                        if (data.data.state_id != 'null' && data.data.state_id != null && data.data.state_id !=
                            '') {
                            state = data.data.state_id.id;
                        }
                        countries();
                        $("#shippingAddressForm").find("#country_id_hidden").val(country);
                        $("#shippingAddressForm").find("#state_id_hidden").val(state);
                        $("#shippingAddressForm").find("#city").val(data.data.city);
                        $("#shippingAddressForm").find("#street_address").val(data.data.street_address);
                        $("#shippingAddressForm").find("#gender").val(data.data.gender);
                        $("#shippingAddressForm").find("#dob").val(data.data.dob);
                        $("#shippingAddressForm").find("#phone").val(data.data.phone);
                        $("#shippingAddressForm").find("#method").val('put');
                        $("#shippingAddressForm").find("#addres_id").val(id);
                    }
                },
                error: function(data) {},
            });
        }

        function shippingDelete(input) {
            id = $(input).attr('data-id');
            $.ajax({
                type: 'delete',
                url: "{{ url('') }}" + '/api/client/customer_address_book/' + id,
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        $(input).closest('tr').remove();
                        // toastr.success(data.message);
                    } else {
                        toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                    }
                },
                error: function(data) {
                    // toastr.error(data.responseJSON.message);
                    toastr.error('{{ trans('response.some_thing_went_wrong') }}');
                },
            });
        }

        $("#defaultCheck").click(function() {
            if ($.trim($(this).prop('checked')) == 'true') {
                $("#billing_first_name").val($("#delivery_first_name").val());
                $("#billing_last_name").val($("#delivery_last_name").val());
                $("#billing_street_aadress").val($("#delivery_street_aadress").val());
                $("#billing_city").val($("#delivery_city").val());
                $("#billing_postcode").val($("#delivery_postcode").val());
                $("#billing_phone").val($("#delivery_phone").val());
                $("#billing_country_hidden").val($("#delivery_country").val());
                countries();
                $("#billing_state_hidden").val($("#delivery_state").val());
            }
        });

        $(".payment_method").click(function() {
            payment_method = $.trim($(".payment_method:checked").val());
            // alert(paytm);
            if (payment_method == 'stripe' ||
                payment_method == 'paypal' ||
                payment_method == 'authorize_net' ||

                payment_method == 'sagepay' ||
                payment_method == 'openpay') {
                $(".stripe_payment").removeClass('d-none');
                $(".bank_transfer").addClass('d-none');
                $(".createOrder").removeClass('d-none')
                $(".braintree_payment").addClass('d-none');

                return;
            }


            if (payment_method == 'paytm') {
                $(".stripe_payment").addClass('d-none');
                $(".bank_transfer").addClass('d-none');
                $(".createOrder").addClass('d-none');
                $('.paytm').removeClass('d-none');
            }

            if (payment_method == 'braintree') {
                $(".braintree_payment").removeClass('d-none');
                $(".stripe_payment").addClass('d-none');
                $(".bank_transfer").addClass('d-none');
                $(".createOrder").addClass('d-none');
                $('.paytm').addClass('d-none');
            }
            if (payment_method == 'banktransfer') {
                $(".bank_transfer").removeClass('d-none');
                $(".stripe_payment").addClass('d-none');
                $(".braintree_payment").addClass('d-none');
                $(".createOrder").removeClass('d-none')
                $('.paytm').addClass('d-none');

            }
            if (payment_method == 'cod') {
                $(".stripe_payment").addClass('d-none');
                $(".braintree_payment").addClass('d-none');
                $(".bank_transfer").addClass('d-none');
                $(".createOrder").removeClass('d-none');
            }
            if (payment_method == 'razorpay') {
                $(".stripe_payment").addClass('d-none');
                $(".braintree_payment").addClass('d-none');
                $(".bank_transfer").addClass('d-none');
                // $(".createOrder").addClass('d-none');
            }
            if (payment_method == 'mollie') {
                $(".stripe_payment").addClass('d-none');
                $(".braintree_payment").addClass('d-none');
                $(".bank_transfer").addClass('d-none');
                $(".createOrder").removeClass('d-none');
            }

        });
        $(".createOrder").click(function(e) {
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

            payment_method = $(".payment_method:checked").val();
            cc_number = $("#cc_number").val();
            cc_expiry_month = $("#cc_expiry_month").val();
            cc_expiry_year = $("#cc_expiry_year").val();
            cc_cvc = $("#cc_cvc").val();
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
                                currency_id: localStorage.getItem("currency"),
                                payment_method: payment_method,
                                cc_number: cc_number,
                                cc_expiry_month: cc_expiry_month,
                                cc_expiry_year: cc_expiry_year,
                                cc_cvc: cc_cvc,
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
                                    toastr.error(
                                        '{{ trans('response.some_thing_went_wrong') }}');
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
                                    toastr.error(
                                        '{{ trans('response.some_thing_went_wrong') }}');
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
                        currency_id: localStorage.getItem("currency"),
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
                                            toastr.error(
                                                '{{ trans('response.some_thing_went_wrong') }}'
                                                );
                                        }
                                    },
                                    error: function(data) {
                                        toastr.error(
                                                '{{ trans('response.some_thing_went_wrong') }}'
                                                );

                                    },
                                });
                            } else
                                window.location.href = "{{ url('/thankyou') }}";

                        } else if (data.status == 'Error') {
                            toastr.error('{{ trans('response.some_thing_went_wrong') }}');
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


        });

        function tax() {
            state_id = $.trim($("#delivery_state").val());
            if (state_id == '') {
                return;
            }

            $.ajax({
                type: 'get',
                url: "{{ url('') }}/api/client/tax_rate?state_id=" + state_id + '&currency=' + localStorage
                    .getItem("currency"),
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        if (data.data != null) {
                            html = '';
                            for (i = 0; i < data.data.length; i++) {
                                total += +data.data[i].tax_amount;
                                tax_Desctiption = 'Tax';
                                if (data.data[i].tax != null && data.data[i].tax != 'null' && data.data[i]
                                    .tax != '') {
                                    tax_Desctiption = data.data[i].tax.tax_description + ' Tax';
                                }
                                html += '<tr><th scope="row">' + tax_Desctiption +
                                    '</th><td align="right" class="caritem-tax" price="' + data.data[i]
                                    .tax_amount + '">' + data.data[i].tax_amount_symbol + '</td></tr>'
                            }
                            $(html).insertBefore("#test");
                            caritemGrandtotal();
                        }
                    } else if (data.status == 'Error') {
                        price = $(".caritem-subtotal").attr('price');
                        couponCart = $(".caritem-discount-coupon").attr('price');
                        if (couponCart == null || couponCart == '') {
                            couponCart = 0;
                        }
                        shipping_price = $(".shipping-tax").attr('data-price');
                        total = +price + +couponCart + +shipping_price;
                        if ($.trim($(".caritem-subtotal").attr('currency-position')) == 'left') {
                            $(".caritem-grandtotal").html($(".caritem-subtotal").attr('currency-code') + ' ' +
                                total.toFixed(2));
                        } else {
                            $(".caritem-grandtotal").html(total.toFixed(2) + ' ' + $(".caritem-subtotal").attr(
                                'currency-code'));
                        }
                        // toastr.error(data.message);
                    }
                },
                error: function(data) {
                    caritemGrandtotal();
                },
            });
        }

        function shippingMethodisDefault() {
            $(".shipping-tax").attr('data-price', 0);
            $.ajax({
                type: 'post',
                url: "{{ url('') }}/api/client/isDefaultShipping",
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        if (data.data != null) {
                            shipping = 0;
                            if (data.data.shipping_method_id == 1) {

                                if ($('.total_by_weight').val() == 0) {
                                    $(".shipping-tax").attr('data-price', 0);
                                    shipping = 0;
                                } else {

                                    $(".shipping-tax").attr('data-price', parseFloat(data.data
                                        .shipping_method_amount) * $('.total_by_weight').val());
                                    shipping = parseFloat(data.data.shipping_method_amount) * $(
                                        '.total_by_weight').val();
                                }
                            } else {
                                alert(data.data.shipping_method_id + '     ' + $('.total_by_weight').val());
                                $(".shipping-tax").attr('data-price', data.data.shipping_method_amount);
                                shipping = data.data.shipping_method_amount;

                            }

                            if ($.trim($(".caritem-subtotal").attr('currency-position')) == 'left') {
                                $(".shipping-tax").html($(".caritem-subtotal").attr('currency-code') + ' ' +
                                    shipping);
                            } else {
                                $(".shipping-tax").html(shipping + ' ' + $(".caritem-subtotal").attr(
                                    'currency-code'));
                            }


                            caritemGrandtotal();
                        }
                    } else if (data.status == 'Error') {
                        caritemGrandtotal();
                        // toastr.error(data.message);
                    }
                },
                error: function(data) {
                    caritemGrandtotal();
                },
            });
        }


        function caritemGrandtotal() {
            couponCart = $(".caritem-discount-coupon").attr('price');
            if (couponCart == null || couponCart == '') {
                couponCart = 0;
            }
            sub_price = $(".caritem-subtotal").attr('price');
            tax_price = $(".caritem-tax").length;
            total_tax_price = 0;
            for (i = 0; i < tax_price; i++) {
                total_tax_price = +total_tax_price + +$(".caritem-tax").eq(i).attr('price');
            }
            shipping_price = $(".shipping-tax").attr('data-price');
            if (shipping_price != 'NaN' && shipping_price != '' && shipping_price != NaN && shipping_price != 'null' &&
                shipping_price != '' && shipping_price != null) {
                total = +sub_price + +total_tax_price + +shipping_price - +couponCart;
            } else {
                if ($.trim($(".caritem-subtotal").attr('currency-position')) == 'left') {
                    $(".shipping-tax").html($(".caritem-subtotal").attr('currency-code') + ' 0');
                } else {
                    $(".shipping-tax").html('0 ' + $(".caritem-subtotal").attr('currency-code'));
                }
                total = +sub_price + +total_tax_price - +couponCart;
            }
            if ($.trim($(".caritem-subtotal").attr('currency-position')) == 'left') {
                $(".caritem-grandtotal").html($(".caritem-subtotal").attr('currency-code') + ' ' + total.toFixed(2));
            } else {
                $(".caritem-grandtotal").html(total.toFixed(2) + ' ' + $(".caritem-subtotal").attr('currency-code'));
            }
        }
    </script>

    <script src="https://js.braintreegateway.com/web/3.83.0/js/hosted-fields.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.83.0/js/client.min.js"></script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkfQ--NrbuRkdYSFBu1AXlWohPV7RhNyI&libraries=places&callback=initialize"
        async defer></script>
    <script>
        var markers;
        var myLatlng;
        var map;
        var geocoder;

        function setUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    myLatlng = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    markers.setPosition(myLatlng);
                    map.setCenter(myLatlng);

                }, function() {});
            }
        }

        function saveAddress() {
            var latlng = markers.getPosition();
            geocoder.geocode({
                'location': latlng
            }, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        var street = "";
                        var state = "";
                        var country = "";
                        var city = "";
                        var postal_code = "";

                        for (var i = 0; i < results[0].address_components.length; i++) {
                            for (var b = 0; b < results[0].address_components[i].types.length; b++) {
                                switch (results[0].address_components[i].types[b]) {
                                    case 'locality':
                                        city = results[0].address_components[i].long_name;
                                        break;
                                    case 'administrative_area_level_1':
                                        state = results[0].address_components[i].long_name;
                                        break;
                                    case 'country':
                                        country = results[0].address_components[i].long_name;
                                        break;
                                    case 'postal_code':
                                        postal_code = results[0].address_components[i].long_name;
                                        break;
                                    case 'route':
                                        if (street == "") {
                                            street = results[0].address_components[i].long_name;
                                        }
                                        break;

                                    case 'street_address':
                                        if (street == "") {
                                            street += ", " + results[0].address_components[i].long_name;
                                        }
                                        break;
                                }
                            }
                        }
                        // $("#postcode").val(postal_code);
                        // $("#street").val(street);
                        // $("#city").val(city);

                        // $("#latitude").val(markers.getPosition().lat());
                        // $("#longitude").val(markers.getPosition().lng());

                        // $("#entry_country_id").val(country);

                        $("#latlong").val(latlng);

                        // $("#entry_country_id option").filter(function() {
                        //   //may want to use $.trim in here
                        //   return $(this).text() == country;
                        // }).prop('selected', true);
                        // if(getZones("no_loader")){
                        //   $("#entry_zone_id option").filter(function() {
                        //     //may want to use $.trim in here
                        //     return $(this).text() == state;
                        //   }).prop('selected', true);
                        // }
                        $('#mapModal').hide();
                        $('.modal-backdrop').hide();
                        setTimeout(function() {
                            // $('#location').focus();
                            $('#latlong').get(0).focus();

                        }, 500);


                    } else {
                        console.log('No results found');
                    }
                } else {
                    console.log('Geocoder failed due to: ' + status);
                }
            });
        }

        function initialize() {
            defaultPOS = {
                lat: '31.4',
                lng: '71.1'
            };
            map = new google.maps.Map(document.getElementById('map'), {
                center: defaultPOS,
                zoom: 13,
                mapTypeId: 'roadmap'
            });
            geocoder = new google.maps.Geocoder;
            markers = new google.maps.Marker({
                map: map,
                draggable: true,
                position: defaultPOS
            });



            var infowindow = new google.maps.InfoWindow;
            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                var bounds = new google.maps.LatLngBounds();

                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };
                    console.log(place.geometry.location);
                    // Create a marker for each place.
                    markers.setPosition(place.geometry.location);
                    markers.setTitle(place.name);


                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }


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


                            hostedFieldsInstance.on('validityChange', function(event) {
                                var field = event.fields[event.emittedBy];

                                // Remove any previously applied error or warning classes
                                $(field.container).removeClass('is-valid');
                                $(field.container).removeClass('is-invalid');

                                if (field.isValid) {
                                    $(field.container).addClass('is-valid');
                                } else if (field.isPotentiallyValid) {
                                    // skip adding classes if the field is
                                    // not valid, but is potentially valid
                                } else {
                                    $(field.container).addClass('is-invalid');
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
                                Object.keys(state.fields).forEach(function(field) {
                                    if (!state.fields[field].isValid) {
                                        $(state.fields[field].container)
                                            .addClass('is-invalid');
                                        formIsInvalid = true;
                                    }
                                });

                                // if (formIsInvalid) {
                                //     // skip tokenization request if any fields are invalid
                                //     return;
                                // }

                                hostedFieldsInstance.tokenize(function(err, payload) {
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
                                    $('#payment-method-nonce').val(payload
                                        .nonce);

                                    $('.createOrder').click();
                                });
                            });
                        });
                    });
                }

            }
        });
        // alert(braintree_token);


        // If Default payment method is braintree

        // $('.paytm-button').click(function(e){
        //     e.preventDefault();
        //     var name = $('#paytm-name').val();
        //     var mobile = $('#paytm-mobile').val();
        //     var address = $('#paytm-address').val();

        //     if(name=="" || mobile =="" || address == ""){
        //         alert("Name , Mobile And Address Fields are Required");
        //     }




        //     var url = "{{ url('') }}" + '/api/client/paytm-payment';
        //     $.ajax({
        //         type: 'post',
        //         url: url,
        //         data:{
        //             name,
        //             mobile,
        //             address
        //         },
        //         headers: {
        //             'Authorization': 'Bearer ' + customerToken,
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        //             clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
        //             clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
        //         },
        //         beforeSend: function() {},
        //         success: function(data) {
        //             if (data.status == 'Success') {

        //             }

        //         }
        //     });

        // })
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
                        currency_id: localStorage.getItem("currency"),
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

@endsection
