<!-- header mobile -->

<header id="headerMobile" class="header-area header-mobile d-lg-none d-xl-none">
    
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
        <div class="row align-items-center">
          <div class="col-12">
  
            <nav id="navbar_0" class="navbar navbar-expand-md navbar-dark navbar-0">
              <div class="navbar-lang">
                <div class="select-control">
                  <select class="form-control mobile-language">
                    @foreach($data['language'] as $languages)
                    <option value="{{$languages->id}}" data-link="{{ url('/lang/'.$languages->code) }}">{{$languages->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="select-control currency">
                  <select class="form-control ">
                    @foreach($data['currency'] as $currencies)
                    <option value="{{$currencies->id}}">{{$currencies->title}}</option>
                    @endforeach
                  </select>
                </div>
  
              </div>
              <div class="contact d-none d-md-block">
                <i class="fas fa-phone"></i> {{  trans("lables.header-header2-phone") }} ({{ isset(getSetting()['phone_number']) ? getSetting()['phone_number'] : 'N/A' }})
              </div>
  
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="header-maxi bg-header-bar ">
      <div class="container">
  
        <div class="row align-items-center">
          <div class="col-2 pr-0">
            <div class="navigation-mobile-container">
              <a href="javascript:void(0)" class="navigation-mobile-toggler">
                <span class="fas fa-bars"></span>
              </a>
              <nav id="navigation-mobile">
                <div class="logout-main without-auth-login">
                  <div class="welcome">
                    <span class="welcomeUsername">{{  trans("lables.header-welcome-user") }}</span>
                  </div>
                  <div class="logout">
                    <a href="{{ url('/login') }}">{{  trans("lables.header-login") }}</a>
                  </div>
  
                </div>
                <div class="logout-main auth-login">
                  <div class="welcome">
                    <span>{{  trans("lables.header-welcome-text") }}</span>
                    <span class="welcomeUsername">{{  trans("lables.header-welcome-user") }}</span>
                  </div>
                  <div class="logout">
                    <a class="log_out" href="javascript:void(0)">{{  trans("lables.header-logout") }}</a>
                  </div>
  
                </div>
                @php  $menuloop = 0; @endphp
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
                @elseif($menu[$menuloop]['type'] == 'contentpage')
                    @php $link = url('/page/').$menu[$menuloop]['contentpage'] @endphp
                
                @elseif($menu[$menuloop]['type'] == 'page')
                    @php $link = url('/').$menu[$menuloop]['page'] @endphp
                @endif
                
                <a href="{{ url($link) }}" class="main-manu btn btn-primary">
                  <?php $index = 0; ?>
                  @if(isset($menu[$menuloop]['language_id']))
                    @php $index = array_search($data['selectedLenguage'],$menu[$menuloop]['language_id']) @endphp
                  @endif
                  {{$menu[$menuloop]['name'][$index]}}
                </a>
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
                @elseif($menu[$menuloop]['type'] == 'contentpage')
                    @php $link = url('/page/').$menu[$menuloop]['contentpage'] @endphp
                @elseif($menu[$menuloop]['type'] == 'page')
                    @php $link = url('/').$menu[$menuloop]['page'] @endphp
                @endif
                  @if(count($menu[$menuloop]['children']) > 0)
                    @include('includes.headers.sub-mobile-menu')
                  @endif
                @endif
                @endforeach

                        <a class="main-manu btn btn-primary auth-login" href="{{ url('/profile') }}" title="{{  trans("lables.header-profile") }}">{{  trans("lables.header-profile") }}</a>
                        <a class="main-manu btn btn-primary auth-login" href="{{ url('/wishlist') }}" title="{{  trans("lables.header-wishlist") }}">{{  trans("lables.header-wishlist") }}</a>
                        <a class="main-manu btn btn-primary auth-login" href="{{ url('/compare') }}" title="{{  trans("lables.header-compare") }}">{{  trans("lables.header-compare") }}</a>
                        <a class="main-manu btn btn-primary auth-login" href="{{ url('/orders') }}" title="{{  trans("lables.header-order") }}">{{  trans("lables.header-order") }}</a>
                        <a class="main-manu btn btn-primary auth-login" href="{{ url('/shipping-address') }}" title="{{  trans("lables.header-shipping-address") }}">{{  trans("lables.header-shipping-address") }}</a>
                        <a class="main-manu btn btn-primary auth-login" href="{{ url('/logout') }}" title="{{  trans("lables.header-logout") }}">{{  trans("lables.header-logout") }}</a>

               
              </nav>
            </div>
  
          </div>
  
  
  
          <div class="col-8">
            <a href="{{url('/')}}" class="logo" data-toggle="tooltip" data-placement="bottom" title="{{isset(getSetting()['site_name']) ? getSetting()['site_name'] : 'Logo' }}">
              <img class="img-fluid" src="{{isset(getSetting()['site_logo']) ? getSetting()['site_logo'] : asset('01-logo.png') }}" alt="{{isset(getSetting()['site_name']) ? getSetting()['site_name'] : 'Logo' }}">
            </a>
          </div>
  
          <div class="col-2 pl-0">
            <ul class="pro-header-right-options">
              
              <li class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="headerOneCartButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="cart-left">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="badge badge-secondary total-menu-cart-product-count">0</span>
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
        <form class="form-inline">
          <div class="search">
            <div class="select-control">
              <select class="form-control">
                @foreach($data['category'] as $categories)
                <option value="{{isset($categories->detail[0]->category_id)}}">{{isset($categories->detail[0]->category_name) ? $categories->detail[0]->category_name : ''}}&nbsp;&nbsp;</option>      
                @endforeach
              </select>
            </div>
            <input type="search" placeholder="{{ trans('lables.header-search-products') }}...">
            <button class="btn btn-secondary" type="submit">
              <i class="fa fa-search"></i></button>
          </div>
        </form>
      </div>
    </div>
  </header>