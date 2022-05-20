<section class="pro-content header-section">
<!-- //footer style Seven -->
 <footer id="footerSeven"  class="footer-area footer-seven  d-lg-block d-xl-block">
  <div class="container">
    <div class="row">
        <div class="col-12 col-lg-3">
          <h5>{{ trans('lables.footer-about-store') }}</h5>

            <p style="margin-bottom:0">
              {{isset(getSetting()['about_us']) ? getSetting()['about_us'] : '#' }}  
            </p>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="single-footer single-footer-left">
            <h5>{{ trans('lables.footer-our-services') }}</h5>
           
              <ul class="links-list pl-0">
                <li> <a href="{{ url('/') }}" data-toggle="tooltip" data-placement="left" title="{{ trans('lables.footer-home') }}">{{ trans('lables.footer-home') }}</a> </li>
                  <li> <a href="{{ url('/shop') }}" data-toggle="tooltip" data-placement="left" title="{{ trans('lables.footer-shop') }}">{{ trans('lables.footer-shop') }}</a> </li>
                  <li> <a href="{{ url('/cart') }}" data-toggle="tooltip" data-placement="left" title="{{ trans('lables.footer-shopping-cart') }}">{{ trans('lables.footer-shopping-cart') }}</a> </li>           
                  <li> <a href="{{ url('/wishlist') }}" data-toggle="tooltip" data-placement="left" title="{{  trans("lables.header-wishlist") }}">{{  trans("lables.header-wishlist") }}</a> </li>
                  <li> <a href="{{ url('/compare') }}" data-toggle="tooltip" data-placement="left" title="{{  trans("lables.header-compare") }}">{{  trans("lables.header-compare") }}</a> </li>          
              </ul>
          </div>
    </div>
        <div class="col-12 col-md-6 col-lg-3">
          <h5>{{ trans('lables.footer-information') }}</h5>
            <ul class="links-list pl-0 mb-0">
              @foreach($data['pages'] as $page)
              @if(isset($page->page_detail))
              <li> <a href="{{ url("/page")."/".$page->slug }}"><i class="fa fa-angle-right" ></i>{{ $page->page_detail[0]->title }}</a> </li>
              @endif
              @endforeach 
            </ul>
        </div>
        
        <div class="col-12 col-lg-3">
          <h5>{{ trans('lables.footer-contact-us') }}</h5>
            
            <ul class="contact-list  pl-0 mb-0">
              <li> <i class="fas fa-map-marker"></i><span>{{isset(getSetting()['address']) ? getSetting()['address'] : '#' }}</span> </li>
              <li> <i class="fas fa-phone"></i><span>({{isset(getSetting()['phone_number']) ? getSetting()['phone_number'] : '#' }})</span> </li>
              <li> <i class="fas fa-envelope"></i><span> <a href="mailto:{{isset(getSetting()['email']) ? getSetting()['email'] : '#' }}">{{isset(getSetting()['email']) ? getSetting()['email'] : '#' }}</a> </span> </li>
        
            </ul>
        </div>
        
  </div>
  <div class="container-fluid p-0">
      <div class="copyright-content">
          <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-4">
                  <h5>{{ trans('lables.footer-download-our-app') }}</h5>
                    <div class="apps-download">
                        <a href="javascript:void(0)"><img class="img-fluid" src="{{ asset('assets/front/images/miscellaneous/google-play-btn.png') }}"></a>
                        <a href="javascript:void(0)"><img class="img-fluid" src="{{ asset('assets/front/images/miscellaneous/app-store-btn.png') }}"></a>
                    </div>
                      
                  </div>
                  <div class="col-12 col-lg-4 socials">
                    <h5>{{ trans('lables.footer-follow-us') }}</h5>
                      <div class="social">
                        <ul class="list">
                          @if (isset(getSetting()['facebook_url']))
                          <li><a href="{{isset(getSetting()['facebook_url']) ? getSetting()['facebook_url'] : '#' }}" class="fab fa-facebook-f" data-toggle="tooltip" data-placement="bottom" title="{{ trans('lables.footer-facebook') }}"></a></li>
                          @endif
                          @if (isset(getSetting()['twitter_url']))
                          <li><a href="{{isset(getSetting()['twitter_url']) ? getSetting()['twitter_url'] : '#' }}" class="fab fa-twitter" data-toggle="tooltip" data-placement="bottom" title="{{ trans('lables.footer-twitter') }}"></a></li>
                          @endif
                          @if (isset(getSetting()['google_url']))
                          <li><a href="{{isset(getSetting()['google_url']) ? getSetting()['google_url'] : '#' }}" class="fab fa-google" data-toggle="tooltip" data-placement="bottom" title="{{ trans('lables.footer-google') }}"></a></li>
                          @endif
                          @if (isset(getSetting()['linkedin_url']))
                          <li><a href="{{isset(getSetting()['google_url']) ? getSetting()['linkedin_url'] : '#' }}" class="fab fa-linkedin-in" data-toggle="tooltip" data-placement="bottom" title="{{ trans('lables.footer-linkedin') }}"></a></li>
                          @endif
                          @if (isset(getSetting()['instagram_url']))
                          <li><a href="{{isset(getSetting()['instagram_url']) ? getSetting()['instagram_url'] : '#' }}" class="fab fa-instagram" data-toggle="tooltip" data-placement="bottom" title="{{ trans('lables.footer-instagram') }}"></a></li>
                          @endif
                        </ul>
                      </div>
                        
                    </div>
                <div class="col-12 col-lg-4">
                  <div class="footer-info">
                    &copy;&nbsp;{{ trans('lables.footer-company') }}
                  </div>
                    
                </div>
            </div>
          </div>
        </div>
  </div>
</footer>

  </section> 