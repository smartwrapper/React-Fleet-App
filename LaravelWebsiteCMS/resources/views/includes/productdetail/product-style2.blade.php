<div class="container-fuild">
    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0)">{{ trans('lables.bread-crumb-home') }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ trans('lables.bread-product-page') }}</li>
            </ol>
        </div>
      </nav>
  </div>
    <section class="pro-content">
        <div class="container">
            <div class="page-heading-title">
                <h2> {{ trans('lables.product-detail-product') }}
                </h2>
            </div>
        </div>

        <section class="product-page">

        </section>

        @include('includes.productdetail.related-product-section');
        </section>
