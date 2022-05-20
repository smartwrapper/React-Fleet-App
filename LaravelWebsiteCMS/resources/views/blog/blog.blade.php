@extends('layouts.master')
@section('content')
    @include(isset(getSetting()['blog']) ? 'blog.blog-'.getSetting()['blog'] : 'blog.blog-style1')
    @include(isset(getSetting()['blog']) ? 'blog.blog-'.getSetting()['blog'].'-template' : 'blog.blog-style1-template')
@endsection
@section('script')
    <script>
        var language_id = localStorage.getItem('languageId');
        $(document).ready(function() {

            fetchBlogs(1);
            fetchBlogCategories();
            fetchFeaturedBlogs();
        });

        function fetchBlogs(page) {
            var category = "{{ isset($_GET['category']) ? $_GET['category'] : '' }}";
            var url = "{{ url('') }}" + '/api/client/blog_news?limit=10&page=' + page +
                '&getGallaryDetail=1&getBlogCategory=1&language_id='+language_id;
            if (category != "")
                url += '&category_slug=' + category;

            var appendTo = 'blogs_div';
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
                        if (data.meta.last_page < page) {
                            $('.load-more-products').attr('disabled', true);
                            $('.load-more-products').html('No More Items');
                            return
                        }
                        var pagination =
                            '<label for="staticEmail" class="col-form-label">Showing From <span class="showing_record">' +
                            data.meta.to + '</span>&nbsp;of&nbsp;<span class="showing_total_record">' + data
                            .meta.total + '</span>&nbsp;results.</label>';
                        var nextPage = parseInt(data.meta.current_page) + 1;
                        pagination += '<div class="col-12 col-sm-6">';
                        pagination += '<ol class="loader-page mt-0">';
                        pagination += '<li class="loader-page-item">';
                        pagination += '<button class="load-more-products btn btn-secondary" data-page="' +
                            nextPage + '">Load More</button>';
                        pagination += '</li>';
                        pagination += '</ol>';
                        pagination += '</div>';

                        $('.pagination').html(pagination);
                        const templ = document.getElementById("blog-template");
                        console.log(data.data);
                        for (i = 0; i < data.data.length; i++) {
                            const clone = templ.content.cloneNode(true);
                            clone.querySelector(".blog-template-date").innerHTML = data.data[i].date;
                            clone.querySelector(".blog-template-image-link").setAttribute('href',
                                '/blog-detail/' + data.data[i].slug);
                            clone.querySelector(".blog-template-readmore-link").setAttribute('href',
                                '/blog-detail/' + data.data[i].slug);

                            if (data.data[i].gallary != null) {
                                clone.querySelector(".blog-template-image").setAttribute('src', '/gallary/' +
                                    data.data[i].gallary.gallary_name);
                            }
                            if (data.data[i].category != null) {
                                if (data.data[i].category.blog_detail != null) {
                                    clone.querySelector(".blog-template-category").innerHTML = data.data[i]
                                        .category.blog_detail[0].name;
                                }
                            }
                            if (data.data[i].detail != null) {
                                clone.querySelector(".blog-template-title").innerHTML = data.data[i].detail[0]
                                    .name;
                                clone.querySelector(".blog-template-title").setAttribute('href',
                                    '/blog-detail/' + data.data[i].slug);
                                clone.querySelector(".blog-template-description").innerHTML = data.data[i]
                                    .detail[0].description;
                            }
                            $("." + appendTo).append(clone);
                        }
                    }
                },
                error: function(data) {},
            });
        }

        $(document).on('click', '.load-more-products', function() {
            var pageToLoad = $(this).attr('data-page');
            fetchBlogs(pageToLoad);
        })

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
                            for (var i = 0; i < data.data.length; i++) {
                                blogCategory +=
                                    '<a class=" main-manu" href="/blog?category=' + data
                                    .data[i].blog_category_slug + '">';
                                blogCategory += '<img class="img-fuild" src="/gallary/' +
                                    data.data[i].blog_category_gallary_id.gallary_name + '">';
                                blogCategory += '<span> ' + data.data[i].blog_detail[0].name + '</span </a>';
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
                            featuredBlogs += '<img src="/gallary/thumbnail'+data.data[i].gallary.gallary_name+'">';
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
