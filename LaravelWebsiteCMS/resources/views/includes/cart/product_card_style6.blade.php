<template id="product-card-template">
    <div class="div-class">
        <div class="product product13 ratingstar">
            <article>
                <div class="thumb">
                    {{-- <div class="badges">

                        <span class="badge badge-success label-circle">featured</span>
                        <span class="badge badge-info label-circle">New</span>
                        <span class="badge badge-danger  label-circle">50%</span>

                    </div> --}}
                    <div class="product-hover d-none d-lg-block d-xl-block">
                        <div class="icons">

                            <a href="javascript:void(0)" class="wishlist-icon icon active swipe-to-top" data-toggle="tooltip"
                                data-placement="bottom" title="" data-original-title="Wishlist">
                                <i class="fas fa-heart"></i>
                            </a>
                            <div class="icon swipe-to-top quick-view-icon" data-toggle="modal" data-target="#quickViewModal"
                                data-tooltip="tooltip" data-placement="bottom" title=""
                                data-original-title="Quick View">
                                <i class="fas fa-eye"></i>
                            </div>
                            <a href="javascript:void(0)" class="icon swipe-to-top compare-icon" data-toggle="tooltip"
                                data-placement="bottom" title="" data-original-title="Compare"><i
                                    class="fas fa-align-right" data-fa-transform="rotate-90"></i></a>
                        </div>
                        <a class="btn btn-block btn-secondary swipe-to-top product-card-link" href="javascript:void(0)"
                            data-toggle="tooltip" data-placement="bottom" title=""
                            data-original-title="View Detail">View Detail</a>

                    </div>

                    <img class="img-fluid product-card-image" src="" alt="Modern Single Sofa">
                </div>
                <span class="d-none product-card-category">

                </span>
                <div class="content">
                    <div class="pro-rating rating-none listing-none">
                        <fieldset class="disabled-ratings display-rating">
                        </fieldset>
                    </div>
                    <h5 class="title"><a href="javascript:void(0)" class="product-card-name"></a></h5>
                    <p class="para product-card-desc"></p>
                    <div class="pro-rating">
                        <fieldset class="disabled-ratings rating-none listing1-show display-rating1">
                        </fieldset>
                    </div>
                    <div class="price product-card-price">
                    </div>


                </div>

            </article>
        </div>
    </div>
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
</template>
