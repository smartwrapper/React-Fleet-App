
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
        <section class="shop-content shop-two">
                
            <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-9">
                      <div class="products-area">
                        <div class="top-bar">
                            <div class="row">
                                <div class="col-12 col-lg-12">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-lg-6">
                                          <div class="block">
                                              <label>{{ trans('lables.shop-shop') }}</label>
                                              <div class="buttons">
                                                <a href="javascript:void(0);" id="grid_3column"><i class="fas fa-th-large"></i></a>
                                                <a href="javascript:void(0);" id="list_3column"><i class="fas fa-list"></i></a>
                                                </div>
                                          </div>
                                        </div> 
                                        <div class="col-12 col-lg-6">
                                            <form class="form-inline justify-content-end">
                                              
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
                        <section id="swap" class="shop-content" >
                              <div class="products-area">
                                @include(isset(getSetting()['card_style']) ? 'includes.cart.product_card_'.getSetting()['card_style'] : "includes.cart.product_card_style1")
                                <div class="row shop_page_product_card">
                                   
                                </div>
                              </div> 
                        </section>  
                      </div>
                      <div class="pagination justify-content-between ">
                            
                      </div>
                  </div>
                  <div class="col-12 col-lg-3  d-lg-block d-xl-block right-menu">
                    <div class="right-menu-categories">
                        @foreach ($data['category'] as $category)
                            @if ($category->parent == null)
                                <a class=" main-manu" data-toggle="collapse" href="#{{ $category->detail[0]->category_name }}" role="button"
                                    aria-expanded="false" aria-controls="{{ $category->detail[0]->category_name }}">
                                    <img class="img-fuild" src="{{ asset('gallary/'.$category->icon->name) }}">
                                    {{ $category->detail[0]->category_name }}

                                </a>
                            @endif
                            <div class="sub-manu collapse multi-collapse" id="{{ $category->detail[0]->category_name }}">
                                <ul class="unorder-list">
                                    @foreach ($data['category'] as $childCategory)
                                        @if ($childCategory->parent != null)
                                        @if ($childCategory->parent->id === $category->id)

                                            <li class="list-item">
                                                <a class="list-link" href="{{ url('/shop?category='.$childCategory->id) }}">
                                                    <i class="fas fa-angle-right"></i>{{ $childCategory->detail[0]->category_name }}
                                                </a>
                                            </li>

                                        @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach



                        
                    </div>

                    <div class="range-slider-main">
                        <a class=" main-manu" data-toggle="collapse" data-target="#price" role="button"
                            aria-expanded="true" aria-controls="men-cloth">
                            {{ trans('lables.shop-price') }}
                        </a>

                        <div class="sub-manu collapse show multi-collapse" id="price">
                            <ul class="unorder-list">
                                @foreach ($data['price_range'] as $price_range)
                                    <li class="list-item">

                                        @if (isset($_GET['price']) && $_GET['price'] == $price_range)
                                            <a class="list-link price-range-list price-range-list-{{ $price_range }} price-active" style="cursor: pointer;"
                                                data-price-range={{ $price_range }}>{{ $price_range }}
                                            </a>
                                        @else
                                            <a class="list-link price-range-list price-range-list-{{ $price_range }}" style="cursor: pointer;"
                                                data-price-range={{ $price_range }}>{{ $price_range }}
                                            </a>
                                        @endif


                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    @foreach ($data['attribute'] as $key => $attribute)
                        <div class="color-range-main">
                            <h5>{{ $attribute->attribute_detail[0]->name }}</h5>
                            <div class="color-range">
                                <ul>
                                    @foreach ($attribute->variation as $variation)
                                        @if (isset($_GET['variation_id']) && in_array($variation->variation_detail[0]->variation_id, explode(',', $_GET['variation_id'])))
                                            <li><span class="btn size-btn variation_list_item attribute_{{ str_replace(' ', '_', $attribute->attribute_detail[0]->name) }}_div  {{ $variation->variation_detail[0]->name }}-{{ str_replace(' ', '_', $attribute->attribute_detail[0]->name) }}" style="border:1px solid;"
                                                    role="button" data-attribute-id="{{ $attribute->id }}"
                                                    data-attribute-name="{{ $attribute->attribute_detail[0]->name }}" data-variation-id="{{ $variation->variation_detail[0]->variation_id }}"
                                                    data-variation-name={{ $variation->variation_detail[0]->name }}>{{ $variation->variation_detail[0]->name }}</span>
                                            </li>
                                        @else
                                            <li><span class="btn size-btn variation_list_item attribute_{{ str_replace(' ', '_', $attribute->attribute_detail[0]->name) }}_div {{ $variation->variation_detail[0]->name }}-{{str_replace(' ', '_', $attribute->attribute_detail[0]->name) }}"
                                                    role="button" data-attribute-id="{{ $attribute->id }}"
                                                    data-attribute-name="{{ $attribute->attribute_detail[0]->name }}" data-variation-id="{{ $variation->variation_detail[0]->variation_id }}"
                                                    data-variation-name={{ $variation->variation_detail[0]->name }}>{{ $variation->variation_detail[0]->name }}</span>
                                            </li>

                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                    
                    <div class="range-slider-main">
                        <button class="btn btn-primary filter-from-sidebar">{{ trans('lables.shop-apply') }}</button> <a href="{{ url('/shop') }}" class="btn btn-primary">{{ trans('lables.shop-reset') }}</a>
                    </div>
                    <div class="range-slider-main">
                        <a class=" main-manu" data-toggle="collapse" href="#brands" role="button" aria-expanded="true"
                            aria-controls="men-cloth">
                            {{ trans('lables.shop-brands') }}
                        </a>
                        <div class="sub-manu collapse show multi-collapse" id="brands">
                            <ul class="unorder-list">
                                @foreach ($data['brand'] as $brand )
                                <li class="list-item">
                                    <a class="brands-btn list-item" href="{{ url('/shop?brand='.$brand->id) }}" role="button"><i
                                            class="fas fa-angle-right"></i>{{ $brand->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="img-main">
                        <a href="#"><img class="img-fluid" src="{{ asset("assets/front/images/shop/side-image.jpg") }}"></a>

                    </div>

                </div>

                  </div>
                </div>
              
            </div>
        </section> 
      </section>
