<!-- Bootstrap Caption Carousel Content with Navigation -->
<section class="carousel-content">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3 padding-r0  d-none d-lg-block d-xl-block">
                <nav id="navbar_2_carouselExampleWithCaptions3"
                    class="navbar navbar-expand-lg navbar-light categories-panel">

                    <div class="navbar-collapse">
                        <ul class="navbar-nav flex-column mt-md-0 mt-4 pt-md-0 pt-4">
                            @foreach ($data['category'] as $category)
                                <li class="nav-item dropdown  dropright">
                                    @if ($category->parent_id == 0)
                                        <a class="nav-link dropdown-item"
                                            href="{{ url('/shop') . '?category=' . $category->id }}">
                                            <img class="img-fuild" src="{{ asset('gallary').'/'.$category->icon->name }}">
                                            {{ $category->detail[0]->category_name }}

                                        </a>
                                        <i class="fas fa-chevron-right"></i>
                                    @endif

                                    <div class="dropdown-menu pull-right">
                                        @include('includes.childcategory')

                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-12 col-lg-9 padding-l0">
                <div id="carouselExampleWithCaptions3" class="carousel slide shimmer-background" data-ride="carousel">
                    <ol class="carousel-indicators" style="direction:ltr;">
                        <li data-target="#carouselExampleWithCaptions3" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleWithCaptions3" data-slide-to="1"></li>
                        <li data-target="#carouselExampleWithCaptions3" data-slide-to="2"></li>
                    </ol>
                    <template id="slider-navigation-template">
                        <div class="carousel-item slider-navigation-active">
                            <img class="d-block w-100 slider-navigation-image" src="" alt="First slide">
                            <div class="carousel-caption d-none d-md-flex  ">
                                <div class="text-deco1">
                                    <h2 class="slider-navigation-title"></h2>
                                    <p class="slider-navigation-desc"></p>
                                    <a href="javascript:void(0)" class="slider-navigation-url btn btn-secondary swipe-to-top">
                                        {{ trans('lables.home-slider-button-title') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </template>
                    <div class="carousel-inner slider-navigation-show">

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleWithCaptions3" role="button"
                        data-slide="prev">

                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleWithCaptions3" role="button"
                        data-slide="next">

                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
