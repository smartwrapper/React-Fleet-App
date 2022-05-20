@extends('layouts.master')
@section('content')

    @if (isset($page->page_detail))

        <section class="pro-content">

            <div class="container">
                <div class="page-heading-title">
                    <h2> {{ $page->page_detail[0]->title }} </h2>

                </div>
            </div>
            <!-- contact Content -->
            <section class="contact-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            {!! $page->page_detail[0]->description !!}
                        </div>
                    </div>

                </div>
            </section>

        </section>       
    @else
        <h2>comming soon</h2>
    @endif

@endsection
@section('script')
@endsection
