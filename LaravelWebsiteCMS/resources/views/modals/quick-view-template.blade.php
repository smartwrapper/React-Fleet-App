<template id="quick-view-template">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="row ">
                <div id="quickViewCarousel" class="carousel slide" data-ride="carousel">
                    <!-- The slideshow -->
                    <div class="carousel-inner carasol-images">
                        
                    </div>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev btn-secondary swipe-to-top" href="#quickViewCarousel" data-slide="prev">
                        <span class="fas fa-angle-left "></span>
                    </a>
                    <a class="carousel-control-next btn-secondary swipe-to-top" href="#quickViewCarousel" data-slide="next">
                        <span class="fas fa-angle-right "></span>
                    </a>

                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 pro-description">

            {{-- <div class="badges">
                <span class="badge badge-danger">50%</span>
                <span class="badge badge-success">featured</span>
                <span class="badge badge-info">New</span>
            </div> --}}
            <h3 class="pro-title quick-view-product-name"></h3>
            <div class="pro-price quick-view-price">
                <ins>$</ins> <del>$</del>
            </div>
            <div class="pro-infos">
                <div class="pro-single-info"><b>Product ID :</b><span class="quick-view-product-id"></span></div>
                <div class="pro-single-info">
                    <b>Categroy :</b>
                    <ul class="quick-view-categories">
                        <li><a href="javascript:void(0)"></a></li>
                    </ul>
                </div>
                <div class="pro-single-info"><b></b><span class="text-secondary"></span></div>
            </div>
            <p class="quick-view-desc">
            </p>
            <div class="pro-counter">
                <div class="input-group item-quantity quick-view-qty">

                    <input type="text" id="quantity-input" name="quantity" class="form-control" value="1">

                    <span class="input-group-btn">
                        <button type="button" value="quantity2" class="quantity-plus btn" data-type="plus" data-field="">
                            <i class="fas fa-plus"></i>
                        </button>

                        <button type="button" value="quantity2" class="quantity-minus btn" data-type="minus" data-field="">
                            <i class="fas fa-minus"></i>
                        </button>
                    </span>
                </div>
                <a href="javascript:void(0)" class="btn btn-secondary btn-lg swipe-to-top quick-view-add-to-cart">Add to Cart</a>

            </div>

        </div>
    </div>
</template>