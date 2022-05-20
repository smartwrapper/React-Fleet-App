<!-- //Sticky Header -->
<header id="stickyHeader" class="header-area header-sticky d-none">
    <div class="header-sticky-inner  bg-sticky-bar">
      <div class="container">
  
        <div class="row align-items-center">
          
          <div class="col-12 col-lg-2">
            <div class="logo">
              <a href="index.html">
                <a href="{{url('/')}}" class="logo" data-toggle="tooltip" data-placement="bottom" title="{{isset(getSetting()['site_name']) ? getSetting()['site_name'] : 'Logo' }}">
                  <img class="img-fluid" src="{{isset(getSetting()['site_logo']) ? getSetting()['site_logo'] : asset('01-logo.png') }}" alt="{{isset(getSetting()['site_name']) ? getSetting()['site_name'] : 'Logo' }}">
                </a>
              </a>
            </div>
          </div>
          <div class="col-12 col-lg-7" style="position: static;">
            <nav id="navbar_header_9" class="navbar navbar-expand-lg  bg-nav-bar">
              <div class="navbar-collapse">
                <ul class="navbar-nav">
                  @php $temp = '0' @endphp
                  @if(isset($header_menu->menu))
                  @php $header_menu = json_decode(($header_menu->menu), true); $menuloop = 0; @endphp
                  @foreach($header_menu as $menu[$menuloop])
                  @if(count($menu[$menuloop]['children']) == 0)
      
      
                  @php $link = '#' @endphp
                  @if($menu[$menuloop]['type'] == 'exlink')
                      @php $link = $menu[$menuloop]['exlink'] @endphp
                  @elseif($menu[$menuloop]['type'] == 'product')
                      @php $link = url('/product').$menu[$menuloop]['product'] @endphp
                  @elseif($menu[$menuloop]['type'] == 'category')
                      @php $link = url('/shop').'?category='.$menu[$menuloop]['category'] @endphp
                  @elseif($menu[$menuloop]['type'] == 'link')
                      @php $link = url('/').$menu[$menuloop]['link'] @endphp
                  
                  @elseif($menu[$menuloop]['type'] == 'page')
                      @php $link = url('/').$menu[$menuloop]['page'] @endphp
                  @endif
                  
                  <li class="nav-item">
                    <a class="nav-link " href="{{$link}}">
                      <?php $index = 0; ?>
                      @if(isset($menu[$menuloop]['language_id']))
                      @php $index = array_search($data['selectedLenguage'],$menu[$menuloop]['language_id']) @endphp
                      @endif
                      {{$menu[$menuloop]['name'][$index]}}
                    </a>
                  </li>
                  @else
      
                  @php $link = '#' @endphp
                  @if($menu[$menuloop]['type'] == 'exlink')
                      @php $link = $menu[$menuloop]['exlink'] @endphp
                  @elseif($menu[$menuloop]['type'] == 'product')
                      @php $link = url('/product').$menu[$menuloop]['product'] @endphp
                  @elseif($menu[$menuloop]['type'] == 'category')
                      @php $link = url('/shop').'?category='.$menu[$menuloop]['category'] @endphp
                  @elseif($menu[$menuloop]['type'] == 'link')
                      @php $link = url('/').$menu[$menuloop]['link'] @endphp
                  @elseif($menu[$menuloop]['type'] == 'page')
                      @php $link = url('/').$menu[$menuloop]['page'] @endphp
                  @endif
                  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{$link}}">
                      <?php $index = 0; ?>
                      @if(isset($menu[$menuloop]['language_id']))
                      @php $index = array_search($data['selectedLenguage'],$menu[$menuloop]['language_id']) @endphp
                      @endif
                      {{$menu[$menuloop]['name'][$index]}}
                    </a>
                    @if(count($menu[$menuloop]['children']) > 0)
                      @include('includes.headers.menu')
                    @endif
                  </li>
                  @endif
                  @endforeach
                  @endif
                </ul>
              </div>
            </nav>
          </div>
          <div class="col-6 col-sm-6 col-md-4 col-lg-3">
          <ul class="pro-header-right-options">
                          
                          <li class="dropdown search-field">
                              <button class="btn btn-light dropdown-toggle" type="button" id="dropdownAccountButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-search"></i>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownAccountButton">
                                <form class="form-inline" action="https://laravel1.themes-coder.net/shop" method="get">
                                      <div class="search-field-module">
                                          <input type="text" class="form-control" id="inlineFormInputGroup0" name="search" placeholder="Search Products...">
                                          <button class="btn" type="submit">
                                              <i class="fas fa-search"></i>
                                          </button>
                                      </div>
                                    </form>
                                
                              </div>
                            </li>
                     
                        <li>
                          <a href="{{ url('/wishlist') }}" class="btn btn-light"  data-toggle="tooltip" data-placement="bottom" title="{{ trans('lables.header-wishlist') }}">
                              <i class="far fa-heart"></i>
                              <span class="badge badge-secondary wishlist-count">0</span>
                          </a>

                          
                        </li>
      
                        <li class="dropdown head-cart-content-fixed">
                          <button class="btn btn-light dropdown-toggle" type="button" id="dropdownCartButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <i class="fas fa-shopping-bag"></i>
                            <span class="badge badge-secondary total-menu-cart-product-count">0</span>
                          </button> 

                          
                          <template id="top-cart-product-template">
                            <li class="top-cart-product-id">
                              <div class="item-thumb">

                                <div class="image">
                                  <img class="img-fluid top-cart-product-image" src="" alt="Product Image">
                                </div>
                              </div>
                              <div class="item-detail">
                                <h3 class="top-cart-product-name"></h3>
                                <div class="item-s top-cart-product-qty-amount"></div>
                              </div>
                            </li>
                          </template>
                          <template id="top-cart-product-total-template">
                            <li>
                              <span class="item-summary ">{{  trans("lables.header-total") }}&nbsp;:&nbsp;<span class="top-cart-product-total"></span>
                              </span>
                            </li>
                            <li>
                              <a class="btn btn-link btn-block " href="{{url('/cart')}}">{{  trans("lables.header-view-cart") }}</a>
                              <a class="btn btn-secondary btn-block  swipe-to-top" href="{{url('/checkout')}}">{{  trans("lables.header-checkout") }}</a>
                            </li>
                          </template>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="headerOneCartButton">
                            <ul class="shopping-cart-items top-cart-product-show">
                              <li>{{  trans("lables.header-emptycart") }}</li>
                            </ul>


                          </div>
                              
                        </li>
                    </ul>
  
  
          </div>
          
        </div>
      </div>
    </div>
  </header>