
      <ul class="navbar-nav">
        @php  $temp = '0' @endphp
        
        @if(isset($header_menu->menu))
        @php $header_menu = json_decode(($header_menu->menu), true); $menuloop = 0; @endphp
        @foreach($header_menu as $menu[$menuloop])
        @if(count($menu[$menuloop]['children']) == 0)


        @php $link = '#' @endphp
        @if($menu[$menuloop]['type'] == 'exlink')
            @php $link = $menu[$menuloop]['exlink'] @endphp
        @elseif($menu[$menuloop]['type'] == 'product')
            @php $link = url('/product').$menu[$menuloop]['product'] @endphp
        @elseif($menu[$menuloop]['type'] == 'category')
            @php $link = url('/shop').'?category='.$menu[$menuloop]['category'] @endphp
        @elseif($menu[$menuloop]['type'] == 'link')
          @php $link = url('/').$menu[$menuloop]['link'] @endphp
        @elseif($menu[$menuloop]['type'] == 'contentpage')
          @php $link = url('/page/').$menu[$menuloop]['contentpage'] @endphp
        @elseif($menu[$menuloop]['type'] == 'page')
            @php $link = url('/').$menu[$menuloop]['page'] @endphp
        @endif
        
        <li class="nav-item">
          <a class="nav-link " href="{{$link}}">
                <?php $index = 0; ?>
                @if(isset($menu[$menuloop]['language_id']))
                  @php $index = array_search($data['selectedLenguage'],$menu[$menuloop]['language_id']) @endphp
                @endif
                {{$menu[$menuloop]['name'][$index]}}
          </a>
        </li>
        @else

        @php $link = '#' @endphp
        @if($menu[$menuloop]['type'] == 'exlink')
            @php $link = $menu[$menuloop]['exlink'] @endphp
        @elseif($menu[$menuloop]['type'] == 'product')
            @php $link = url('/product').$menu[$menuloop]['product'] @endphp
        @elseif($menu[$menuloop]['type'] == 'category')
            @php $link = url('/shop').'?category='.$menu[$menuloop]['category'] @endphp
        @elseif($menu[$menuloop]['type'] == 'link')
            @php $link = url('/').$menu[$menuloop]['link'] @endphp
        @elseif($menu[$menuloop]['type'] == 'contentpage')
            @php $link = url('/page/').$menu[$menuloop]['contentpage'] @endphp
        @elseif($menu[$menuloop]['type'] == 'page')
            @php $link = url('/').$menu[$menuloop]['page'] @endphp
        @endif
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="{{$link}}">
                <?php $index = 0; ?>
                @if(isset($menu[$menuloop]['language_id']))
                @php $index = array_search($data['selectedLenguage'],$menu[$menuloop]['language_id']) @endphp
                @endif
                {{$menu[$menuloop]['name'][$index]}}
          </a>
          @if(count($menu[$menuloop]['children']) > 0)
            @include('includes.headers.menu')
          @endif
        </li>
        @endif
        @endforeach
        @endif
      </ul>
  