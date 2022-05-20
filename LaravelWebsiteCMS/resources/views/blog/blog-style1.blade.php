<div class="container-fuild">
    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans('lables.bread-crumb-home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('lables.bread-blog') }}</li>
            </ol>
        </div>
    </nav>
</div>

    <section class="pro-content">
        <div class="container">
            <div class="page-heading-title">
                <h2> {{ trans('lables.bread-blog') }}
                </h2>

            </div>
        </div>

        <section class="blog-content">
            <div class="container">

                <div class="blog-area">

                    <div class="row">
                        <div class="col-12 col-lg-4  d-lg-block d-xl-block blog-menu">
                            <div class="right-menu-categories category-div category-list">
                        
                            </div>
                            <div class="category-div featured-blog">
                                
                            </div>
                            <div class="category-div">

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


                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="row blogs_div">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="pagination justify-content-between "></div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>
    </section>