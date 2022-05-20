@extends('layouts.master')
@section('content')
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
                <h2 class="blog_name">
                </h2>

            </div>
        </div>

        <!-- Site Content -->
        <section class="blog-content">
            <div class="container">

                <div class="blog-area">

                    <div class="row">

                        <div class="col-12 col-lg-8">
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="blog blog-detail">



                                    </div>
                                </div>

                            </div>
                        </div>


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
                    </div>

                </div>

            </div>
            </div>
        </section>
    </section>


@endsection
@section('script')
    <script>
        var slug = "{{ $slug }}";
        var language_id = localStorage.getItem('languageId');
        $(document).ready(function() {
            fetchBlogs();
            fetchBlogCategories();
            fetchFeaturedBlogs();
        });


        function fetchBlogs() {
            $.ajax({
                type: 'get',
                url: "{{ url('') }}" + '/api/client/blog_news?slug=' + slug + '&language_id=' + language_id +
                    '&getGallaryDetail=1&getBlogCategory=1',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {

                    if (data.status == 'Success') {
                        var blogContent = '';
                        if (typeof data.data[0] !== undefined) {
                            $('.blog_name').html(data.data[0].detail[0].name);


                            blogContent +=
                                '<div class="blog-thumbnail"><span class="date-tag badge blog-date">' + data
                                .data[0].date + '</span>';
                            blogContent += '<a href="javascript:void(0)"><img class="img-thumbnail blog-image" src="/gallary/' +
                                data.data[0].gallary.gallary_name + '" width="100%"></a></div>';


                            blogContent += '<h5 class="post-title"><a href="" class="blog-category-link">' +
                                data.data[0].category.blog_detail[0].name + '</a></h5>';
                            blogContent += '<p class="blog-title">' + data.data[0].detail[0].name +
                                '</small></p>';
                            blogContent += '<span class="blog-description">' + data.data[0].detail[0]
                                .description + '</span>';
                        } else {
                            blogContent = 'no content';
                        }
                        $('.blog-detail').html(blogContent);
                    }
                },
                error: function(data) {},
            });
        }



        function fetchBlogCategories() {
            $.ajax({
                type: 'get',
                url: "{{ url('') }}" + '/api/client/blog_category?getGallaryDetail=1&language_id=' +
                    language_id + '&getDetail=1',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {

                    if (data.status == 'Success') {
                        var blogCategory = '';
                        if (data.data.length > 0) {
                            for(var i= 0; i < data.data.length ; i ++){
                                blogCategory +='<a class="main-manu" href="/blog?category='+data.data[i].blog_category_slug+'">';
                                blogCategory += '<img class="img-fuild" src="/gallary/' +
                                data.data[i].blog_category_gallary_id.gallary_name + '">';
                                blogCategory += '<span> '+data.data[i].blog_detail[0].name+'</span </a>';
                            }
                        } else {
                            blogCategory = 'no content';
                        }
                        $('.category-list').html(blogCategory);
                    }
                },
                error: function(data) {},
            });
        }

        function fetchFeaturedBlogs(page) {
            var url = "{{ url('') }}" + '/api/client/blog_news?limit=13&getGallaryDetail=1&getBlogCategory=1&is_featured=1&language_id='+language_id;
            $.ajax({
                type: 'get',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {

                    if (data.status == 'Success') {
                        var featuredBlogs = '';
                        for (i = 0; i < data.data.length; i++) {
                            featuredBlogs += '<div class="media">';
                            featuredBlogs += '<div class="media-img">';
                            featuredBlogs += '<img src="/gallary/'+data.data[i].gallary.gallary_name+'">';
                            featuredBlogs += '</div>';
                            featuredBlogs += '<div class="media-body">';
                            featuredBlogs += '<h5>'+data.data[i].detail[0]
                                    .name+'</h5>';
                            featuredBlogs += '<div class="post-date">';
                            featuredBlogs += '<i class="fa fa-calendar" aria-hidden="true"></i>';
                            featuredBlogs += '<a href="javascript:void(0)">'+data.data[i].date+'</a>';
                            featuredBlogs += '</div>';

                            featuredBlogs += '</div>';
                            featuredBlogs += '</div>';
                        }
                        $('.featured-blog').html(featuredBlogs);
                    }
                },
                error: function(data) {},
            });
        }
    </script>
@endsection
