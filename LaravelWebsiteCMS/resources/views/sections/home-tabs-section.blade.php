<!-- Tabs section -->
<section class="tabs-content pro-content" >
    <div class="container">
      <div class="products-area">
         <div class="row justify-content-center">
           <div class="col-12 col-lg-6">
             <div class="pro-heading-title">
               <h2>{{ trans('lables.home-tab-title') }} 
               </h2>
               <p>{{ trans('lables.home-tab-description') }}
                </p>
               </div>
             </div>
         </div>

      </div>
    </div>
    <div class="tabs-main">
      <div class="container">
        <div class="row">
           <div class="col-md-12 p-0">
               <div class="nav" role="tablist" id="tabCarousel">
                   <a class="nav-link btn  active show" data-toggle="tab" href="#featured" role="tab" ><span data-toggle="tooltip" data-placement="bottom" title="{{ trans('lables.home-tab-topsales') }}">{{ trans('lables.home-tab-topsales') }}</span></a>

                   <a class="nav-link btn"  data-toggle="tab" href="#special" role="tab" aria-controls="special" aria-selected="true" ><span data-toggle="tooltip" data-placement="bottom" title="{{ trans('lables.home-tab-special') }}">{{ trans('lables.home-tab-special') }}</span></a>


                   <a class="nav-link btn" data-toggle="tab"  href="#liked" role="tab" aria-controls="liked" aria-selected="true" ><span data-toggle="tooltip" data-placement="bottom" title="{{ trans('lables.home-tab-most-liked') }}">{{ trans('lables.home-tab-most-liked') }}</span></a>

                 </div>
             <!-- Tab panes -->
             <div class="tab-content">

              @include(isset(getSetting()['card_style']) ?
              'includes.cart.product_card_'.getSetting()['card_style'] : "includes.cart.product_card_style1")
               <div role="tabpanel" class="tab-pane fade active show" id="featured">
                   <div class="tab_top_sales">
                   </div>
                 <!-- 1st tab -->
               </div>
               <div role="tabpanel" class="tab-pane product-card-templatee fade" id="special">
               <div class="tab_special_products">
                   </div>
                 <!-- 2nd tab -->
               </div>
               <div role="tabpanel" class="tab-pane fade" id="liked">
               <div class="tab_most_liked">
                </div>
                 <!-- 3rd tab -->
               </div>
             </div>
           </div>
        </div>
      </div>

   </div>
  </section>
