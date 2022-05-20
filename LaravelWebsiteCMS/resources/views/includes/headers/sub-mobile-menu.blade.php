<a class="main-manu btn btn-primary" data-toggle="collapse" href="#{{ preg_replace('/\s+/', '_',  $menu[$menuloop]['name'][0]).$menuloop }}" role="button"
    aria-expanded="false" aria-controls="{{ preg_replace('/\s+/', '_',  $menu[$menuloop]['name'][0]).$menuloop }}">
    <?php $index = 0; ?>
                @if(isset($menu[$menuloop]['language_id']))
                  @php $index = array_search($data['selectedLenguage'],$menu[$menuloop]['language_id']) @endphp
                @endif
                {{$menu[$menuloop]['name'][$index]}}<span><i class="fas fa-chevron-down"></i></span>
    <span><i class="fas fa-chevron-up"></i></span>
</a>
<div class="sub-manu collapse multi-collapse" id="{{ preg_replace('/\s+/', '_',  $menu[$menuloop]['name'][0]).$menuloop }}">
    <ul class="unorder-list">
        <li class="">
            @foreach ($menu[$menuloop]['children'] as $menu[++$menuloop])
                @if (count($menu[$menuloop]['children']) == 0)
                    @php $link = '#' @endphp
                    @if ($menu[$menuloop]['type'] == 'exlink')
                        @php $link = $menu[$menuloop]['exlink'] @endphp
                    @elseif($menu[$menuloop]['type'] == 'product')
                        @php $link = url('/product').'/'.$menu[$menuloop]['product'] @endphp
                    @elseif($menu[$menuloop]['type'] == 'category')
                        @php $link = url('/shop').'?category='.$menu[$menuloop]['category'] @endphp
                    @elseif($menu[$menuloop]['type'] == 'link')
                        @php $link = url('/').$menu[$menuloop]['link'] @endphp
                    @elseif($menu[$menuloop]['type'] == 'contentpage')
                        @php $link = url('/page/').$menu[$menuloop]['contentpage'] @endphp
                    @elseif($menu[$menuloop]['type'] == 'page')
                        @php $link = url('/').$menu[$menuloop]['page'] @endphp
                    @endif
                    <a href="{{ $link }}" class="main-manu btn btn-primary">
                        <?php $index = 0; ?>
                @if(isset($menu[$menuloop]['language_id']))
                  @php $index = array_search($data['selectedLenguage'],$menu[$menuloop]['language_id']) @endphp
                @endif
                {{$menu[$menuloop]['name'][$index]}}
                    </a>
                @else

                    @php $link = '#' @endphp
                    @if ($menu[$menuloop]['type'] == 'exlink')
                        @php $link = $menu[$menuloop]['exlink'] @endphp
                    @elseif($menu[$menuloop]['type'] == 'product')
                        @php $link = url('/product').'/'.$menu[$menuloop]['product'] @endphp
                    @elseif($menu[$menuloop]['type'] == 'category')
                        @php $link = url('/shop').'?category='.$menu[$menuloop]['category'] @endphp
                    @elseif($menu[$menuloop]['type'] == 'link')
                        @php $link = url('/').$menu[$menuloop]['link'] @endphp
                    @elseif($menu[$menuloop]['type'] == 'contentpage')
                        @php $link = url('/page/').$menu[$menuloop]['contentpage'] @endphp
                    @elseif($menu[$menuloop]['type'] == 'page')
                        @php $link = url('/').$menu[$menuloop]['page'] @endphp
                    @endif

                    <a href="{{ $link }}" class="main-manu btn btn-primary">
                        <?php $index = 0; ?>
                @if(isset($menu[$menuloop]['language_id']))
                  @php $index = array_search($data['selectedLenguage'],$menu[$menuloop]['language_id']) @endphp
                @endif
                {{$menu[$menuloop]['name'][$index]}}
                    </a>
                    @if (count($menu[$menuloop]['children']) > 0)
                        @include('includes.headers.sub-mobile-menu')
                    @endif
                @endif
            @endforeach
        </li>
    </ul>
</div>
