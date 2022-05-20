 <!-- TOP SELLING OF THE WEEK -->
 <section class="new-products-content pro-content" >
    <div class="container">
      <div class="products-area">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-6">
            <div class="pro-heading-title">
              <h2> {{ trans('lables.home-tab-top-title') }} </h2>
              <p>{{ trans('lables.home-tab-top-description') }}</p>
            </div>
          </div>
        </div>
        <div class="row ">                          
            <div class="col-12  col-xl-6">
                <div class="product product-ad">
                    <article>
                      <div class="badges">                  
                        <span class="badge badge-success"></span>
                      </div>
                      <div class="detail">
                        <span class="tag">
                      </span>
                      <h5 class="title"><a href="javascript:void(0)"></a></h5>
                      <p class="discription"></p>
                      <div class="price">                     
                        $25      <span>$40</span>                  
                      </div>  
                     
                    <div class="pro-sub-buttons">
                        <div class="buttons">
                            <button type="button" class="btn  btn-link" style="padding-left: 0;" onclick="notificationWishlist();"><i class="fas fa-heart"></i>Add to Wishlist</button>
                            <button type="button" class="btn btn-link" onclick="notificationCompare();"><i class="fas fa-align-right"></i>Add to Compare</button>
                        </div>
                        </div>          
                   
                       </div>
                      <picture>
                          <div class="product-hover">
                          
                              <a class="btn btn-block btn-secondary swipe-to-top" href="product-page1.html" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="View Detail" tabindex="0">View Detail</a>
                           
                          </div>
                        <img class="img-fluid" src="{{ asset('assets/front/images/product_images/product_image_11.png') }}" alt="Modern Single Sofa"></picture>
                    
          
                       
                    </article>
                  </div>
            </div>   
         
            <div class="col-12 col-md-6 col-lg-3 ">
              @include('includes.cart.product_card_style1')

          </div>   
          <div class="col-12 col-md-6 col-lg-3 ">
            @include('includes.cart.product_card_style1')

        </div>      
                                                     
          <div class="col-12 col-md-6 col-lg-3 ">
            @include('includes.cart.product_card_style1')
         </div>   
          <div class="col-12 col-md-6 col-lg-3 ">
            @include('includes.cart.product_card_style1')

         </div>   
        <div class="col-12 col-md-6 col-lg-3 ">
          @include('includes.cart.product_card_style1')

         </div>   
       <div class="col-12 col-md-6 col-lg-3 ">
        @include('includes.cart.product_card_style1')
      </div>   
  </div>   
      </div>
    </div>  
</section> 