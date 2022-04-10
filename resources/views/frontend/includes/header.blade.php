<script src="{{ asset('/') }}frontend/js/responsiveslides.min.js"></script>
<script>
    $(function () {
        $("#slider").responsiveSlides({
            auto: true,
            nav: true,
            speed: 500,
            namespace: "callbacks",
            pager: true,
        });
    });
</script>


<div class="banner-bg banner-sec">
    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ asset('/') }}frontend/images/logo.png" alt=""/></a>
            </div>
            <div class="top-nav">
                <label class="mobile_menu" for="mobile_menu">
                    <span>Menu</span>
                </label>
                <input id="mobile_menu" type="checkbox">
                <ul class="nav">
                    @foreach ($categories as $category)
                        <li class="dropdown1">
                            <a href="{{ url('show-product/' . $category->id . '/0') }}">
                                {{ $category->name }}
                            </a>
                            <ul class="dropdown2">
                                @foreach ($category->children as $subCategory)
                                    <li><a
                                            href="{{ url('show-product/' . $subCategory->category_id . '/' . $subCategory->id . '') }}">{{ $subCategory->name }}</a>
                                    </li>
                                @endforeach
                                -->
                            </ul>
                        </li>
                    @endforeach
                    <a class="shop position-relative" href="{{ route('cart.index') }}">
                        <img
                            src="{{ asset('/') }}frontend/images/cart.png" alt=""/>
@if(Cart::instance('cart')->content()->count())
                            <sup class="text-white rounded-circle bg-danger">{{ Cart::instance('cart')->content()->count() }}</sup>

                        @endif
                    </a>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
