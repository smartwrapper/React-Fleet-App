<section class="pro-content header-section">
  <!-- //footer style One -->
   <footer id="footerOne"  class="footer-area footer-content footer-one d-lg-block d-xl-block">
    <div class="container">
      <div class="row">
          <div class="col-12 col-lg-4">
           
              <figure>
                <a href="{{url('/')}}" class="logo" data-toggle="tooltip" data-placement="bottom" title="{{isset(getSetting()['site_name']) ? getSetting()['site_name'] : 'Logo' }}">
                  <img class="img-fluid" src="{{isset(getSetting()['site_logo']) ? getSetting()['site_logo'] : asset('01-logo.png') }}" alt="{{isset(getSetting()['site_name']) ? getSetting()['site_name'] : 'Logo' }}">
                </a>
              </figure>
              <ul class="mail">
                <li><a href="mailto:{{isset(getSetting()['email']) ? getSetting()['email'] : '#' }}" data-toggle="tooltip" data-placement="bottom" title="{{isset(getSetting()['email']) ? getSetting()['email'] : '#' }}">
                  <i class="fas fa-envelope"></i>{{isset(getSetting()['email']) ? getSetting()['email'] : '#' }}</a>
                </li>
            </ul>
                  <p>{{isset(getSetting()['about_us']) ? getSetting()['about_us'] : 'N/A' }}</p>
              
                    <ul class="socials">
                        
                        @if (isset(getSetting()['facebook_url']) && !empty(getSetting()['facebook_url']))
                        <li><a href="{{isset(getSetting()['facebook_url']) ? getSetting()['facebook_url'] : '#' }}" class="fab fb fa-facebook-square" data-toggle="tooltip" data-placement="bottom" title="{{ trans('lables.footer-facebook') }}"></a></li>
                        @endif
                        @if (isset(getSetting()['twitter_url']) && !empty(getSetting()['facebook_url']) )
                        <li><a href="{{isset(getSetting()['twitter_url']) ? getSetting()['twitter_url'] : '#' }}" class="fab tw fa-twitter-square" data-toggle="tooltip" data-placement="bottom" title="{{ trans('lables.footer-twitter') }}"></a></li>
                        @endif
                        @if (isset(getSetting()['google_url']) && !empty(getSetting()['facebook_url']) )
                        <li><a href="{{isset(getSetting()['google_url']) ? getSetting()['google_url'] : '#' }}" class="fab sk fa-google" data-toggle="tooltip" data-placement="bottom" title="{{ trans('lables.footer-google') }}"></a></li>
                        @endif
                        @if (isset(getSetting()['linkedin_url']) && !empty(getSetting()['facebook_url']))
                        <li><a href="{{isset(getSetting()['google_url']) ? getSetting()['linkedin_url'] : '#' }}" class="fab In fa-linkedin" data-toggle="tooltip" data-placement="bottom" title="{{ trans('lables.footer-linkedin') }}"></a></li>
                        @endif
                        @if (isset(getSetting()['instagram_url']) && !empty(getSetting()['facebook_url']))
                        <li><a href="{{isset(getSetting()['instagram_url']) ? getSetting()['instagram_url'] : '#' }}" class="fab ig fa-instagram" data-toggle="tooltip" data-placement="bottom" title="{{ trans('lables.footer-instagram') }}"></a></li>
                        @endif
                    
                    </ul>
            </div>
            <div class="col-12 col-lg-2">
                <div class="single-footer">
                    <h5>
                     {{ trans('lables.footer-quick-links') }}
                    </h5>
                  </div>
                <div class="single-footer single-footer-left">
             
                  <ul class="links-list pl-0">
                    <li> <a href="{{ url('/') }}" data-toggle="tooltip" data-placement="left" title="{{ trans('lables.footer-home') }}">{{ trans('lables.footer-home') }}</a> </li>
                    <li> <a href="{{ url('/shop') }}" data-toggle="tooltip" data-placement="left" title="{{ trans('lables.footer-shop') }}">{{ trans('lables.footer-shop') }}</a> </li>
                    <li> <a href="{{ url('/cart') }}" data-toggle="tooltip" data-placement="left" title="{{ trans('lables.footer-shopping-cart') }}">{{ trans('lables.footer-shopping-cart') }}</a> </li>           
                    <li> <a href="{{ url('/wishlist') }}" data-toggle="tooltip" data-placement="left" title="{{  trans("lables.header-wishlist") }}">{{  trans("lables.header-wishlist") }}</a> </li>
                    <li> <a href="{{ url('/compare') }}" data-toggle="tooltip" data-placement="left" title="{{  trans("lables.header-compare") }}">{{  trans("lables.header-compare") }}</a> </li>          
                  </ul>
                </div>
          </div>
          <div class="col-12 col-lg-2">
              <div class="single-footer">
                  <h5>
                      {{ trans('lables.footer-personalization') }}
                  </h5>
                </div>
      
            <ul class="links-list pl-0">
              @foreach($data['pages'] as $page)
              @if(isset($page->page_detail))
              <li> <a href="{{ url("/page")."/".$page->slug }}" data-toggle="tooltip" data-placement="left" title="{{ $page->page_detail[0]->title }}">{{ $page->page_detail[0]->title }}</a> </li>
              @endif
              @endforeach                             
            </ul>
          </div>
        <div class="col-12 col-lg-4">
            <div class="single-footer">
                <h5>
                  {{ trans('lables.footer-instagram-feed') }}
                </h5>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="instagram-content">
                  {{isset(getSetting()['instagram_embed']) ? getSetting()['instagram_embed'] : '' }}
                </div>
              </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container-fluid p-0">
      <div class="copyright-content">
          <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                  <div class="footer-info">
                      ©&nbsp;{{ trans('lables.footer-company') }}
                  </div>
                    
                </div>
            </div>
          </div>
        </div>
    </div>
  </footer>
  </section>  