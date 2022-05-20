<div class="dropdown-menu">
    <div class="dropdown-submenu submenu{{$menuloop}}">
        @foreach($menu[$menuloop]['children'] as $menu[++$menuloop])
        @if(count($menu[$menuloop]['children']) == 0)
        @php $link = '#' @endphp
        @if($menu[$menuloop]['type'] == 'exlink')
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
        <a class="dropdown-item" href="{{$link}}">
            {{$menu[$menuloop]['name'][0]}}
        </a>
        @else
        
        @php $link = '#' @endphp
        @if($menu[$menuloop]['type'] == 'exlink')
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

        <div class="dropdown">
            <a class="dropdown-item" href="{{$link}}">{{$menu[$menuloop]['name'][0]}}
            </a>
            @if(count($menu[$menuloop]['children']) > 0)
            @include('includes.headers.menu')
            @endif
        </div>
        @endif
        @endforeach
    </div>
</div>