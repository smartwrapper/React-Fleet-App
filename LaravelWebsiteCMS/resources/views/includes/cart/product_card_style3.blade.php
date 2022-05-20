<template id="product-card-template">
    <div class="div-class">
        <div class="product product4 ">
            <article>
                <div class="thumb">
                    {{-- <div class="badges">
                        <span class="badge badge-success">featured</span>
                        <span class="badge badge-info">New</span>
                        <span class="badge badge-danger">50%</span>

                    </div> --}}
                    <div class="product-action-vertical">

                        <a href="javascript:void(0)" class="icon active swipe-to-top wishlist-icon" data-toggle="tooltip"
                            data-placement="bottom" title="" data-original-title="Wishlist">
                            <i class="fas fa-heart"></i>
                        </a>

                    </div>

                    <img class="img-fluid product-card-image" src="" alt="Modern Single Sofa">
                    <div class="product-action">
                        <div class="btn btn-block btn-secondary icon swipe-to-top quick-view-icon" data-toggle="modal"
                            data-target="#quickViewModal" data-tooltip="tooltip" data-placement="bottom" title=""
                            data-original-title="Quick View">
                            Quick View </div>
                    </div>
                    <span class="compare-icon"></span>
                </div>

                <div class="content">
                    <span class="tag product-card-category">
                    </span>
                    <h5 class="title text-center"><a href="javascript:void(0)" class="product-card-name"></a></h5>
                    <p class="para product-card-desc"></p>
                    <div class="price product-card-price">
                    </div>
                    {{-- <a class="btn  btn-secondary display-none listing-none swipe-to-top product-card-link" href="javascript:void(0)">Add
                        to Cart</a> --}}
                </div>

                <div class="product-action ">
                    <a class="btn  btn-secondary listing-none display3-none swipe-to-top product-card-link" href="javascript:void(0)">Add
                        to Cart</a>
                </div>

            </article>
            <div class="d-none display-rating" ></div>
            <div class="d-none display-rating1" ></div>
            <div class="d-none add-to-card-bag" ></div>
            <div class="d-none wishlist-icon-2" ></div>
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
        </div>
    </div>
</template>
