
<?php $previousCategory = $childCategory; ?>
<div class="dropdown-menu pull-right">
    @foreach ($data['category'] as $childCategory)
    <div class="dropdown-submenu submenu{{ $childCategory->id }}">
        @if ($previousCategory->id === $childCategory->parent_id)
            <a class="dropdown-item" href="{{ url('/shop') . '?category=' . $childCategory->id }}">
                <img class="img-fuild" src="{{ asset('gallary').'/'.$childCategory->icon->name }}">

                {{ $childCategory->detail[0]->category_name }}
            </a>
            @include('includes.subchildcategory')
        @endif
    </div>
    @endforeach
</div>

