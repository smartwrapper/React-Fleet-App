<section class="new-products-content pro-content">
    <div class="container">
        <div class="products-area">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="pro-heading-title">
                        <h2> {{ trans('lables.home-weekly-sale-heading') }} </h2>
                        <p>{{ trans('lables.home-weekly-sale-description') }}</p>
                    </div>
                </div>
            </div>
            <div class="row weekly-sale">

                <div class="col-12 col-lg-6">

                    <div class="product product-ad" id="weekly-sale-first-div">
                        
                    </div>
                </div>
                @include(isset(getSetting()['card_style']) ?
              'includes.cart.product_card_'.getSetting()['card_style'] : "includes.cart.product_card_style1")

                

            </div>
        </div>
    </div>
</section>
