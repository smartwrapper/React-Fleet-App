<template id="product-card-template">
    <div class="div-class">
        <div class="product2">
            <article>
                <div class="pro-thumb">

                    <img class="img-fluid product-card-image" src="" alt="Modern Single Sofa">

                    {{-- <div class="badges">
                        <span class="badge badge-success">featured</span>
                        <span class="badge badge-info">New</span>
                        <span class="badge badge-danger">50%</span>
                    </div> --}}

                    <div class="pro-hover-icons">
                        <div class="icons">
                            <button class="btn-secondary  icon d-g-none listing-none swipe-to-top wishlist-icon">
                                <i class="fas fa-heart"></i>
                            </button>
                            <button class="btn-secondary icon displayy-none swipe-to-top add-to-card-bag">
                                <i class="fas fa-shopping-bag"></i>
                            </button>
                            <button class="btn-secondary icon swipe-to-top quick-view-icon" data-toggle="modal"
                                data-target="#quickViewModal">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn-secondary icon swipe-to-top compare-icon">
                                <i class="fas fa-align-right" data-fa-transform="rotate-90"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <span class="tag product-card-category">
                    </span>

                    <h5 class="title "><a href="javascript:void(0)" class="product-card-name"></a></h5>
                    <p class="product-card-desc"></p>
                    <div class="pricetag">

                        <div class="price product-card-price">
                        </div>

                        <button class="btn-secondary  icon display-none  swipe-to-top wishlist-icon-2">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <a class="btn  btn-secondary d-g-none listing-none swipe-to-top product-card-link"
                        href="product-page1.html" data-toggle="tooltip" data-placement="bottom" title=""
                        data-original-title="Add to cart">Add To Cart</a>


                </div>
            </article>
            <div class="d-none display-rating"></div>
            <div class="d-none display-rating1"></div>
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
