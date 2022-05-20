<section class="blog-content pro-content">
    <div class="container"> 
        <div class="products-area ">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-6">
                  <div class="pro-heading-title">
                    <h2> {{ trans('lables.home-news-title') }}
                    </h2>
                    <p>{{ trans('lables.home-news-description') }}
                    </div>
              </div>
        
            </div>
      </div>
    </div>  
    @include('includes.news.news-template')             
    <div class="general-product">
      <div class="container p-0">
          <div class="blog-news-data">
          </div>
      </div>
    </div>    
     
  </section>