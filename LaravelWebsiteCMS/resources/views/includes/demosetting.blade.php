<div class="demo-panel left-panel">
    <div class="demo-panel-trigger">
        <span class="dpt-icon">
            <i class="fas fa-tools"></i>
        </span>
        <span class="dpt-close">
            <i class="fas fa-times"></i>
        </span>
    </div>
    <div class="demo-panel-inner">
        <div class="demo-panel-header">Theme Settings</div>
        <div class="demo-panel-content">
            <!-- <a href="#" type="button" class="btn btn-block btn-primary">Home Page Builder</a> -->
            <?php
            $colors = ["style","brown","brickred","green","purple","darkbrown","bilobaflower","lightblue","pink","red","panetone","lightbrown","lightpink","smokegray","parrot","ferozi","moss","lightferozi","seapink","darkblue","darkgray","orange","voiltsky","yellow"]
            
            ?>
            <form method="get" action="{{ url('update-settings-by-user') }}">
                {{-- {{ csrf_field() }} --}}
                <h3><span>Colors</span></h3>
                <div class="custom-radios">
                    @foreach ($colors as $color)
                        <div>
                            @if (getSetting()['color'] == $color)
                            <input type="radio" id="{{ $color }}" name="color" value="{{ $color }}" checked>
                            @else
                            <input type="radio" id="{{ $color }}" name="color" value="{{ $color }}">
                            @endif
                            <label for="{{ $color }}">
                                <span>
                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg"
                                        alt="Checked Icon" />
                                </span>
                            </label>
                        </div>
                    @endforeach
                </div>
                <h3><span>Quick Selection</span></h3>
                <div class="form-group">
                    <div class="select-group">
                        <select class="form-control" style="border: 1px solid grey;" onchange="showHeaderImage();"
                            id="header_id" name="header_style">
                            @for ($i=1;$i<11;$i++ )
                                @if (getSetting()['header_style'] == 'style'.$i)
                                <option selected="" value="style{{$i}}">Header {{ $i }}</option>

                                @else
                                <option value="style{{$i}}">Header {{ $i }}</option>

                                @endif
                            @endfor
                            
                            {{-- <option value="style2">Header Two</option>
                            <option value="style3">Header Three</option>
                            <option value="style4">Header Four</option>
                            <option value="style5">Header Five</option>
                            <option value="style6">Header Six</option>
                            <option value="style7">Header Seven</option>
                            <option value="style8">Header Eight</option>
                            <option value="style9">Header Nine</option>
                            <option  value="style10">Header Ten</option> --}}
                        </select>
                        <div class="view">
                            <a href="#" class="quick-view">
                                <i class="fas fa-eye"></i>
                            </a>
                            <div class="quick-view-hover">
                            @for ($i=1;$i<11;$i++ )
                                @if (getSetting()['header_style'] == 'style'.$i)
                                <img 
                                id="header_image{{$i}}"
                                style="border:2px solid #ccc;" 
                                src="{{ asset('assets/images/prototypes/header-styles/header'.$i.'.jpg') }} "
                                >

                                @else
                                <img 
                                id="header_image{{$i}}" 
                                style="display:none; border:2px solid #ccc;" 
                                src="{{ asset('assets/images/prototypes/header-styles/header'.$i.'.jpg') }} "
                                >

                                @endif
                            @endfor

                            

                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="select-group">
                        <select class="form-control" style="border: 1px solid grey;" onchange="showFooterImage();"
                            id="footer_id" name="footer_style">
                            @for ($i=1;$i<11;$i++ )
                                @if (getSetting()['Footer_style'] == 'style'.$i)
                                <option selected="" value="style{{$i}}">Footer {{ $i }}</option>

                                @else
                                <option value="style{{$i}}">Footer {{ $i }}</option>

                                @endif
                            @endfor
                            
                        </select>
                        <div class="view">
                            <a href="#" class="quick-view">
                                <i class="fas fa-eye"></i>
                            </a>
                            <div class="quick-view-hover">
                            @for ($i=1;$i<11;$i++ )
                                @if (getSetting()['Footer_style'] == 'style'.$i)
                                <img 
                                id="footer_image{{$i}}"
                                style="border:2px solid #ccc;"
                                src="{{ asset('assets/images/prototypes/footer-styles/footer'.$i.'.png') }} "
                                >

                                @else
                                <img id="footer_image{{$i}}" style="display:none; border:2px solid #ccc;" src="{{ asset('assets/images/prototypes/footer-styles/footer'.$i.'.png') }} ">

                                @endif
                            @endfor


                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="select-group">
                        <select class="form-control" style="border: 1px solid grey;" onchange="showSliderImage();"
                            id="slider_id" name="slider_style">
                            <option {{ getSetting()['slider_style'] == 'style1' ? "selected":"" }}   value="style1">Bootstrap Carousel Content Full Screen</option>
                            <option {{ getSetting()['slider_style'] == 'style2' ? "selected":"" }} value="style2">Bootstrap Carousel Content Full Width</option>
                            <option {{ getSetting()['slider_style'] == 'style5' ? "selected":"" }} value="style3">Bootstrap Carousel Content with Left Banner</option>
                            <option {{ getSetting()['slider_style'] == 'style4' ? "selected":"" }} value="style4">Bootstrap Carousel Content with Navigation</option>
                            <option {{ getSetting()['slider_style'] == 'style3' ? "selected":"" }} value="style5">Bootstrap Carousel Content with Right Banner</option>
                        </select>
                        <div class="view">
                            <a href="#" class="quick-view">
                                <i class="fas fa-eye"></i>
                            </a>
                            <div class="quick-view-hover">
                                @if ( getSetting()['slider_style'] == 'style1')
                                <img 
                                id="slider_image1"
                                style="border:2px solid #ccc;"
                                src="{{ asset('assets/images/prototypes/carousal-styles/carousal1.jpg') }} "
                                >
                                @endif

                                @if ( getSetting()['slider_style'] == 'style2')
                                <img 
                                id="slider_image2"
                                style="border:2px solid #ccc;"
                                src="{{ asset('assets/images/prototypes/carousal-styles/carousal2.jpg') }} "
                                >
                                @endif

                                @if ( getSetting()['slider_style'] == 'style3')
                                <img 
                                id="slider_image5"
                                style="border:2px solid #ccc;"
                                src="{{ asset('assets/images/prototypes/carousal-styles/carousal5.jpg') }} "
                                >
                                @endif

                                @if ( getSetting()['slider_style'] == 'style4')
                                <img 
                                id="slider_image4"
                                style="border:2px solid #ccc;"
                                src="{{ asset('assets/images/prototypes/carousal-styles/carousal4.jpg') }} "
                                >
                                @endif

                                @if ( getSetting()['slider_style'] == 'style5')
                                <img 
                                id="slider_image3"
                                style="border:2px solid #ccc;"
                                src="{{ asset('assets/images/prototypes/carousal-styles/carousal3.jpg') }} "
                                >
                                @endif

                                @for($i=1;$i < 6; $i++)
                                @if("style".$i != getSetting()['slider_style'])
                                    <img 
                                        id="slider_image{{$i}}"
                                        style="display:none;border:2px solid #ccc;"
                                        src="{{ asset('assets/images/prototypes/carousal-styles/carousal'.$i.'.jpg') }} "
                                    >
                                @endif
                                @endfor
                                
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="select-group">
                        <select class="form-control" style="border: 1px solid grey;" onchange="showBannerImage();"
                            id="banner_id" name="banner_style">
                            @for ($i=1;$i<20;$i++ )
                                @if (getSetting()['banner_style'] == 'style'.$i)
                                <option selected="" value="style{{$i}}">Banner {{ $i }}</option>

                                @else
                                <option value="style{{$i}}">Banner {{ $i }}</option>

                                @endif
                            @endfor
                            
                        </select>
                        <div class="view">
                            <a href="#" class="quick-view">
                                <i class="fas fa-eye"></i>
                            </a>
                            <div class="quick-view-hover">
                            @for ($i=1;$i<20;$i++ )
                                @if (getSetting()['banner_style'] == 'style'.$i)
                                <img 
                                    id="banner_image{{$i}}"
                                    style="border:2px solid #ccc;"
                                    src="{{ asset('assets/images/prototypes/banner-styles/banner'.$i.'.jpg') }} "
                                >

                                @else
                                <img 
                                    id="banner_image{{$i}}" 
                                    style="display:none; border:2px solid #ccc;" 
                                    src="{{ asset('assets/images/prototypes/banner-styles/banner'.$i.'.jpg') }} "
                                >
                                @endif
                            @endfor
                                

                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="select-group">
                        <select class="form-control" style="border: 1px solid grey;" onchange="showCardImage();"
                            id="cart_id" name="cart_style">
                            @for ($i=1;$i<20;$i++ )
                                @if (getSetting()['card_style'] == 'style'.$i)
                                <option selected="" value="style{{$i}}">Card {{ $i }}</option>

                                @else
                                <option value="style{{$i}}">Card {{ $i }}</option>

                                @endif
                            @endfor
                         
                            
                           
                        </select>
                        <div class="view">
                            <a href="#" class="quick-view">
                                <i class="fas fa-eye"></i>
                            </a>
                            <div class="quick-view-hover">
                            @for ($i=1;$i<20;$i++ )
                                @if (getSetting()['card_style'] == 'style'.$i)
                                <img 
                                    id="card_image{{$i}}"
                                    style="border:2px solid #ccc;"
                                    src="{{ asset('assets/images/prototypes/card-styles/card'.$i.'.jpg') }} "
                                >

                                @else
                                <img 
                                    id="card_image{{$i}}" 
                                    style="display:none; border:2px solid #ccc;" 
                                    src="{{ asset('assets/images/prototypes/card-styles/card'.$i.'.jpg') }} "
                                >
                                @endif
                            @endfor
                            </div>
                        </div>

                    </div>
                </div>
                {{-- <div class="form-group">
                    <div class="select-group">
                        <select class="form-control" style="border: 1px solid grey;" onchange="showNewsImage();"
                            id="news_id" name="news_id">
                            <option selected=""  value="style1">News One</option>
                            <option value="style2">News Two</option>
                        </select>
                        <div class="view">
                            <a href="#" class="quick-view">
                                <i class="fas fa-eye"></i>
                            </a>
                            <div class="quick-view-hover">

                            </div>
                        </div>

                    </div>
                </div> --}}
                <div class="form-group">
                    <div class="select-group">
                        <select class="form-control" style="border: 1px solid grey;" onchange="showProductImage();"
                            id="product_page_style" name="product_page_style">
                            @for ($i=1;$i<5;$i++ )
                                @if (getSetting()['product_page'] == 'style'.$i)
                                <option selected="" value="style{{$i}}">Product Page {{ $i }}</option>

                                @else
                                <option value="style{{$i}}">Product Page {{ $i }}</option>

                                @endif
                            @endfor

                        
                            
                        </select>
                        <div class="view">
                            <a href="#" class="quick-view">
                                <i class="fas fa-eye"></i>
                            </a>
                            <div class="quick-view-hover">
                            @for ($i=1;$i<5;$i++ )
                                @if (getSetting()['product_page'] == 'style'.$i)
                                <img 
                                    id="product_image{{$i}}"
                                    style="border:2px solid #ccc;"
                                    src="{{ asset('assets/images/prototypes/product-styles/product'.$i.'.jpg') }} "
                                >

                                @else
                                <img 
                                    id="product_image{{$i}}" 
                                    style="display:none; border:2px solid #ccc;" 
                                    src="{{ asset('assets/images/prototypes/product-styles/product'.$i.'.jpg') }} "
                                >
                                @endif
                            @endfor
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="select-group">
                        <select class="form-control" style="border: 1px solid grey;" onchange="showShopImage();"
                            id="shop_style" name="shop_style">
                            @for ($i=1; $i < 5 ;$i++ )
                                @if (getSetting()['shop_page'] == 'style'.$i)
                                <option selected="" value="style{{$i}}">Shop Page {{ $i }}</option>

                                @else
                                <option value="style{{$i}}">Shop Page {{ $i }}</option>

                                @endif
                            @endfor
                            
                        </select>
                        <div class="view">
                            <a href="#" class="quick-view">
                                <i class="fas fa-eye"></i>
                            </a>
                            <div class="quick-view-hover">
                            @for ($i=1;$i<5;$i++ )
                                @if (getSetting()['shop_page'] == 'style'.$i)
                                <img 
                                    id="shop_image{{$i}}"
                                    style="border:2px solid #ccc;"
                                    src="{{ asset('assets/images/prototypes/shop-styles/shop'.$i.'.jpg') }} "
                                >

                                @else
                                <img 
                                    id="shop_image{{$i}}" 
                                    style="display:none; border:2px solid #ccc;" 
                                    src="{{ asset('assets/images/prototypes/shop-styles/shop'.$i.'.jpg') }} "
                                >
                                @endif
                            @endfor
                            </div>
                        </div>

                    </div>
                </div>
                {{-- <div class="form-group">
                    <div class="select-group">
                        <select class="form-control" style="border: 1px solid grey;" onchange="showContactImage();"
                            id="contact_id" name="contact_id">
                            <option selected=""  value="style1">Contact Page One</option>
                            <option value="style2">Contact Page Two</option>
                        </select>
                        <div class="view">
                            <a href="#" class="quick-view">
                                <i class="fas fa-eye"></i>
                            </a>
                            <div class="quick-view-hover">

                            </div>
                        </div>

                    </div>
                </div> --}}
                <button type="submit" class="btn btn-block btn-success">Activate</button>
                <h3><span>Reset Demo</span></h3>
                <a href="{{ url('reset-demo-settings') }}" style="background:#ffc800;" class="btn btn-block ">Reset</a>
            </form>
        </div>
    </div>
</div>
