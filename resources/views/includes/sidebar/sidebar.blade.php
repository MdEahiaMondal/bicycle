
<div class="cat_br_bg">
    <h3 class="cat-title text-truncate" >Categories</h3>
    <hr class="hr-mb">
    <div class="collapse show"  id="sidebar">
        <ul class="nav select-cat">
            @foreach($main_categories as $main_category)
                @include('includes.sidebar.trees-sidebar')
            @endforeach
        </ul>
    </div>
</div>




<div class="cat_br_bg mt-3 mb-3">
    <h3 class="cat-title text-truncate">Brands</h3>
    <hr class="hr-mb">
    <nav class="sidebar">
        <ul class="brand-area">
            @foreach($brands as $brand)
                <li>
                    <a class="cat_br_hovLink brand-items" href="{{ route('brands.products', $brand->slug) }}">
                        {{ $brand->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</div>

@push('script')
    <script>
        $(".catLink").click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            let slug = $(this).data('category-slug')

            location.href = '{{ route('categories.products', '') }}/' + slug
        });
    </script>
@endpush
