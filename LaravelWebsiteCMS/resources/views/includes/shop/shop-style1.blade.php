<!-- Shop Page One content -->

<div class="container-fuild">
    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans('lables.bread-crumb-home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('lables.bread-crumb-shop') }}</li>
            </ol>
        </div>
    </nav>
</div>

<section class="pro-content">
    <div class="container">
        <div class="page-heading-title">
            <h2> {{ trans('lables.shop-shop') }}
            </h2>

        </div>
    </div>
    <div class="container">
        <div class="top-bar">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="row align-items-center">
                        <div class="col-12 d-flex justify-content-between">
                            <div class="block">
                                <label>{{ trans('lables.shop-display') }}</label>
                                <div class="buttons">
                                    <a href="javascript:void(0);" id="grid_4column"><i class="fas fa-th-large"></i></a>
                                    <a href="javascript:void(0);" id="list_4column"><i class="fas fa-list"></i></a>
                                </div>
                            </div>
                            <form class="form-inline justify-content-center">
                                <div class="form-group ">
                                    <label>{{ trans('lables.shop-category') }}</label>
                                    <div class="select-control">
                                        <select class="form-control category-filter" name="category">
                                            <option value="">choose</option>
                                            @foreach ($data['category'] as $category)
                                                @if (isset($_GET['category']) && $_GET['category'] == $category->id)
                                                    <option selected value="{{ $category->id }}">
                                                        {{ $category->detail[0]->category_name }}</option>
                                                @else
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->detail[0]->category_name }}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                    </div>

                                </div>


                                <div class="form-group ">
                                    <label>{{ trans('lables.shop-price') }}</label>
                                    <div class="select-control">
                                        <select class="form-control price-filter" name="price">
                                            <option value="">choose</option>
                                            @foreach ($data['price_range'] as $price_range)
                                                @if (isset($_GET['price']) && $_GET['price'] == $price_range)
                                                    <option selected value="{{ $price_range }}">{{ $price_range }}
                                                    </option>
                                                @else
                                                    <option value="{{ $price_range }}">{{ $price_range }}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                

                                @foreach ($data['attribute'] as $key => $attribute)
                                    <div class="form-group ">
                                        <label>{{ $attribute->attribute_detail[0]->name }}</label>
                                        <input type="hidden" name="attribute[]" value="{{ $attribute->id }}" />
                                        <div class="select-control">
                                            <select class="form-control variaion-filter" name="variation[]"
                                                data-attribute-id="{{ $attribute->id }}"
                                                data-attribute-name="{{ $attribute->attribute_detail[0]->name }}">
                                                <option value="">choose</option>
                                                @foreach ($attribute->variation as $variation)
                                                    @if (isset($_GET['variation_id']) && in_array($variation->variation_detail[0]->variation_id, explode(',', $_GET['variation_id'])))
                                                        <option selected
                                                            value="{{ $variation->variation_detail[0]->variation_id }}"
                                                            data-variation-name={{ $variation->variation_detail[0]->name }}>
                                                            {{ $variation->variation_detail[0]->name }}</option>
                                                    @else
                                                        <option
                                                            value="{{ $variation->variation_detail[0]->variation_id }}"
                                                            data-variation-name={{ $variation->variation_detail[0]->name }}>
                                                            {{ $variation->variation_detail[0]->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endforeach


                                <div class="form-group ">
                                    <button class="btn-secondary" type="button" id="filter">filter</button>
                                </div>
                            </form>


                            <form>
                                <div class="form-group">
                                    <label>{{ trans('lables.shop-sort-by') }}</label>
                                    <div class="select-control">
                                        <select class="form-control sortBy" >
                                            <option value="">choose</option>
                                            <option disabled><b>Price</b></option>
                                            <option value="low-high" data-sort-by="price" data-sort-type="asc">Low To High</option>
                                            <option value="high-to" data-sort-by="price" data-sort-type="desc">High To Low</option>
                                            <option disabled><b>Name</b></option>
                                            <option value="A-Z" data-sort-by="title" data-sort-type="asc">A-Z</option>
                                            <option value="Z-A" data-sort-by="title" data-sort-type="desc">Z-A</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <section id="swap" class="shop-content shop-topbar shop-one">
        <div class="container">
            <div class="products-area">
                @include(isset(getSetting()['card_style']) ?
                    'includes.cart.product_card_'.getSetting()['card_style'] : "includes.cart.product_card_style1")
                <div class="row shop_page_product_card">
                    
                </div>
            </div>

        </div>
    </section>


    <div class="container">
        <div class="pagination justify-content-between ">


        </div>
    </div>

</section>
