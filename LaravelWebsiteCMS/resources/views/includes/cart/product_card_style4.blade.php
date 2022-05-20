<template id="product-card-template">
  <div class="div-class">
<div class="product">
  <article>
    <div class="thumb">
      {{-- <div class="badges">
        <span class="badge badge-success">featured</span>
        <span class="badge badge-info">New</span>
        <span class="badge badge-danger">50%</span>  
      </div> --}}
      <div class="product-hover d-none d-lg-block d-xl-block">
        <div class="icons">
         
            <a href="javascript:void(0)" class="wishlist-icon icon active swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Wishlist">
              <i class="fas fa-heart"></i>
            </a>
          <div class="icon swipe-to-top quick-view-icon" data-toggle="modal" data-target="#quickViewModal" data-tooltip="tooltip" data-placement="bottom" title="" data-original-title="Quick View">
            <i class="fas fa-eye"></i></div>
          <a href="javascript:void(0)" class=" compare-icon icon swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Compare"><i class="fas fa-align-right" data-fa-transform="rotate-90"></i></a>
        </div>
          {{-- <a class="btn btn-block btn-secondary swipe-to-top product-card-link" href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="View Detail">View Detail</a> --}}
       
      </div>
      <div class="mobile-icons d-lg-none d-xl-none">
        <div class="icons">
          <div class="icon-liked">  
            <a href="javascript:void(0)" class="wishlist-icon-2 icon active">
              <i class="fas fa-heart"></i>
            </a>
          </div>
          <div class="icon quick-view-icon" data-toggle="modal" data-target="#quickViewModal"><i class="fas fa-eye"></i></div>
          <a href="javascript:void(0)" class=" compare-icon icon"><i class="fas fa-align-right" data-fa-transform="rotate-90"></i></a>
        </div>
      </div>
      <img class="img-fluid product-card-image" src="" alt="Modern Single Sofa">
    </div>
    
    <div class="content">
      <span class="tag product-card-category">                            
      </span>
      <h5 class="title"><a href="javascript:void(0)" class="product-card-name">Crystal High Heels</a></h5>
      <p class="p-center p-left product-card-desc"></p>
      <div class="price product-card-price">            
      </div>  
    </div>                 
 

      <div class="mobile-buttons d-lg-none d-xl-none">
              {{-- <a href="javascript:void(0)" class="btn btn-secondary  product-card-link">Add to Cart</a> --}}
              <a href="javascript:void(0)" class="btn btn-primary  product-card-link">View Detail</a>

        </div>
        <div class="d-none display-rating" ></div>
        <div class="d-none display-rating1" ></div>
        <div class="d-none add-to-card-bag" ></div>

        <div class="input-group item-quantity d-none">

          <input type="text" id="" name="quantity" class="form-control qty-input" value="1">

          <span class="input-group-btn">
              <button type="button" value="quantity21" class="quantity-plus21 btn quantity-right-plus"
                  data-type="plus" data-field="">
                  <i class="fas fa-plus"></i>
              </button>

              <button type="button" value="quantity21" class="quantity-minus21 btn quantity-left-minus"
                  data-type="minus" data-field="">
                  <i class="fas fa-minus"></i>
              </button>
          </span>
      </div>
      
  </article>
</div>
</div>
</template>