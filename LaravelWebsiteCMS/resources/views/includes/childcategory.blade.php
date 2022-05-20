@foreach ($data['category'] as $childCategory)
    @if ($category->id == $childCategory->parent_id)
        <div class="dropdown-submenu submenu{{ $childCategory->id }}">
            <a class="dropdown-item" href="{{ url('/shop') . '?category=' . $childCategory->id }}">
                <img class="img-fuild" src="{{ asset('gallary').'/'.$childCategory->icon->name }}">

                {{ $childCategory->detail[0]->category_name }}
            </a>

            @include('includes.subchildcategory')
        </div>

    @endif
@endforeach
