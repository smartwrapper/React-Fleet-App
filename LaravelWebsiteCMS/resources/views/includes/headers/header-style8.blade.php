      <!-- //header style Eight -->
      <header id="headerTwo" class="header-area header-eight header-desktop d-none d-lg-block d-xl-block">

        @if (trans("lables.header-top-offer") != '')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <div class="container">
            <div class="pro-description">
              <div class="pro-info">
                {!!  trans("lables.header-top-offer") !!}
              </div>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
          </div>
        </div>
        @endif
  
          <div class="header-mini bg-top-bar">
            <div class="container">
              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="navbar-lang">
  
                    <div class="dropdown">
                      <button class="btn dropdown-toggle language-default-name" type="button">
                        English
                      </button>
                      <div class="dropdown-menu">
                        @foreach($data['language'] as $languages)
                        <a class="dropdown-item language-default" href=" {{ url('/lang/'.$languages->code) }}" data-id={{$languages->id}} data-name="{{$languages->name}}">{{$languages->name}}</a>
                        @endforeach
                      </div>
                    </div>
        
                    <div class="dropdown">
                      <button class="btn dropdown-toggle" id="selected-currency" type="button">
                        USD
                      </button>
                      <div class="dropdown-menu">
                        @foreach($data['currency'] as $currencies)
                          <a class="dropdown-item selected-currency" data-id="{{$currencies->id}}" data-code="{{$currencies->title}}" href="javascript:void(0)">{{$currencies->title}}</a>
                        @endforeach
                      </div>
                    </div>
                  </div> 
                </div>
                <div class="col-12 col-md-6 without-auth-login">
            
                  <ul class="link-list pro-header-options">
                    <li class="link-item">
                      {{  trans("lables.header-welcome-user") }}
                    </li>
                    <li>
                      <li class="link-item"><a href="{{ url('/login') }}" class="nav-link -before" style="padding-right: 0;
                        "><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;{{  trans("lables.header-login-register") }}</a></li>                      
                    </li>            
                  </ul>
        
                </div>
                <div class="col-12 col-md-6 auth-login">
                  <ul class="link-list pro-header-options">
                    <li>
                      <p> {{  trans("lables.header-welcome-text") }} <span class="welcomeUsername"></span></p>
                    </li>
                    <li class="dropdown">
                      <button class="btn dropdown-toggle" type="button">
                        {{  trans("lables.header-my-account") }}
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('/profile') }}" title="{{  trans("lables.header-profile") }}">{{  trans("lables.header-profile") }}</a>
                        <a class="dropdown-item" href="{{ url('/wishlist') }}" title="{{  trans("lables.header-wishlist") }}">{{  trans("lables.header-wishlist") }}</a>
                        <a class="dropdown-item" href="{{ url('/compare') }}" title="{{  trans("lables.header-compare") }}">{{  trans("lables.header-compare") }}</a>
                        <a class="dropdown-item" href="{{ url('/orders') }}" title="{{  trans("lables.header-order") }}">{{  trans("lables.header-order") }}</a>
                        <a class="dropdown-item" href="{{ url('/shipping-address') }}" title="{{  trans("lables.header-shipping-address") }}">{{  trans("lables.header-shipping-address") }}</a>
                        <a class="dropdown-item log_out" href="javascript:void(0)" title="{{  trans("lables.header-logout") }}">{{  trans("lables.header-logout") }}</a>
                      </div>
                    </li>
                  </ul>
        
                </div>
  
                
              </div>
            </div> 
          </div>
    
          <div class="header-maxi bg-header-bar">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-12 col-sm-12 col-lg-3">
                  <a href="{{url('/')}}" class="logo" data-toggle="tooltip" data-placement="bottom" title="{{isset(getSetting()['site_name']) ? getSetting()['site_name'] : 'Logo' }}">
                    <img class="img-fluid" src="{{isset(getSetting()['site_logo']) ? getSetting()['site_logo'] : asset('01-logo.png') }}" alt="{{isset(getSetting()['site_name']) ? getSetting()['site_name'] : 'Logo' }}">
                  </a>
                </div>
                <div class="col-12 col-sm-7 col-md-8 col-lg-6">      
                  <form class="form-inline">
                    <div class="search-field-module">
                      <button class="btn btn-secondary swipe-to-top dropdown-toggle" type="button" id="headerOneCartButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="bottom" title="{{  trans("lables.header-all-categories") }}">
                        {{  trans("lables.header-all-categories") }}
                      </button>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="headerOneCartButton">
                        @foreach($data['category'] as $categories)
                        <a class="dropdown-item" href="javascript:void(0)">{{isset($categories->detail[0]->category_name) ? $categories->detail[0]->category_name : ''}}</a>
                        @endforeach
        
                      </div>
                      <div class="search-field-wrap">
                        <input type="search" placeholder="{{ trans('lables.header-search-products') }}..." data-toggle="tooltip" data-placement="bottom" title="Search Item">
                        <button class="btn btn-secondary swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="{{ trans('lables.header-search-products') }}">
                          <i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                  <ul class="pro-header-right-options">
                    <li>
                      <a href="{{ url('/wishlist') }}" class="btn" data-toggle="tooltip" data-placement="bottom" title="{{ trans('lables.header-wishlist') }}">
                        <i class="far fa-heart"></i>
                        <span class="badge badge-secondary wishlist-count">0</span>
                      </a>
                    </li>
                    <li class="dropdown">
                      <button class="btn dropdown-toggle" type="button" id="headerOneCartButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="cart-left">
                          <i class="fas fa-shopping-bag"></i>
                          <span class="badge badge-secondary total-menu-cart-product-count">0</span>
                        </div>
        
                        <div class="cart-right d-flex flex-column align-self-end ml-13">
                          <span class="title-cart"> {{  trans("lables.header-cart") }} </span>
                          <span class="cart-item"> {{  trans("lables.header-item") }} </span>
                        </div>
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
                        <div class="item-s top-cart-product-qty-amount"> <i class="fas fa-trash"></i></div>
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
          <div class="header-navbar bg-menu-bar">
            <div class="container">
              <nav id="navbar_header_1" class="navbar navbar-expand-lg  bg-nav-bar">
                <div class="navbar-collapse">
                  @include('includes.headers.main-menu')
                  
                </div>
              </nav>
            </div>
          </div>
        </header>
  
        @include('includes.headers.sticky-header')
  
        @if(isset($header_menu->menu))  
          @php $header_menu = json_decode(($header_menu->menu), true); $menuloop = 0; @endphp
         <!-- header mobile -->
         @include('includes.headers.mobile-menu')
        @endif