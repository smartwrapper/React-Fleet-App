<section class="pro-content header-section">
 <!-- //footer style Four -->
  <footer id="footerFour"  class="footer-area footer-four  d-lg-block d-xl-block">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-12 col-md-6 col-lg-3">
          <a href="{{url('/')}}" class="logo" data-toggle="tooltip" data-placement="bottom" title="{{isset(getSetting()['site_name']) ? getSetting()['site_name'] : 'Logo' }}">
            <img class="img-fluid" src="{{isset(getSetting()['site_logo']) ? getSetting()['site_logo'] : asset('01-logo.png') }}" alt="{{isset(getSetting()['site_name']) ? getSetting()['site_name'] : 'Logo' }}">
          </a>
            <p class="peragraph">
              {{isset(getSetting()['about_us']) ? getSetting()['about_us'] : '#' }}
            </p>
            
            
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="single-footer">
            <h5>
             {{ trans('lables.footer-quick-links') }}
            </h5>
            <div class="row">
              <div class="col-12 col-lg-8">
                <hr>
              </div>
            </div>
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
        <div class="col-12 col-md-6 col-lg-3">
          <h5>{{ trans('lables.footer-information') }}</h5>
          <div class="row">
              <div class="col-12 col-lg-8">
                <hr>
              </div>
            </div>
          <ul class="links-list pl-0 mb-0">
                @foreach($data['pages'] as $page)
                @if(isset($page->page_detail))
                <li> <a href="{{ url("/page")."/".$page->slug }}" data-toggle="tooltip" data-placement="left" title="{{ $page->page_detail[0]->title }}">{{ $page->page_detail[0]->title }}</a> </li>
                @endif
                @endforeach
          </ul>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="newsletter">
            <h5>{{ trans('lables.footer-contact-us') }}</h5>
            <div class="row">
                <div class="col-12 col-lg-8">
                  <hr>
                </div>
              </div>
            <div class="block">
              <ul class="contact-list  pl-0 mb-0">
                <li> <i class="fas fa-map-marker"></i><span>{{isset(getSetting()['address']) ? getSetting()['address'] : '#' }}</span> </li>
                <li> <i class="fas fa-phone"></i><span>({{isset(getSetting()['phone_number']) ? getSetting()['phone_number'] : '#' }})</span> </li>
                <li> <i class="fas fa-envelope"></i><span> <a href="mailto:{{isset(getSetting()['email']) ? getSetting()['email'] : '#' }}">{{isset(getSetting()['email']) ? getSetting()['email'] : '#' }}</a> </span> </li>
              </ul>
            </div>
        </div>
          <div class="socials">
            <h5>{{ trans('lables.footer-follow-us') }}</h5>
            <div class="row">
                <div class="col-12 col-lg-8">
                  <hr>
                </div>
              </div>
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
      </div>
    </div>
    <div class="container-fluid p-0">
        <div class="copyright-content">
            <div class="container">
              <div class="row align-items-center">
                  <div class="col-5">
                    <div class="footer-image">
                        <img class="img-fluid" src="{{ asset("assets/front/images/miscellaneous/payments.png") }}">
                    </div>
                  </div>    
                  <div class="col-7">
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