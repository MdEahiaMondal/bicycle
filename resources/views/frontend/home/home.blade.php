@extends('frontend.homemaster')

@section('title')
    Home
@endsection


@section('body')
    <div id="cate" class="categories">
        <div class="container">
            <h2 class="text-left">BIKE-PARTS ALL</h2>
            <div class="bike-parts-sec">
                <div class="bike-parts">
                    <div class="bike-apparels">
                        <div class="parts1" id="selectedProducts">
                            @foreach ($products as $product)
                                <a href="{{ route('products.details',  $product->slug) }}">
                                    <div class="part-sec">

                                        <img src="{{ asset($product->images[0]->url) }}" alt=""/>
                                        <div class="part-info">
                                            <a href="#">
                                                <h5>{{ $product->name }}<span>৳{{ $product->price }}</span>
                                                </h5>
                                            </a>
                                            <a class="add-cart"
                                               href="{{ route('products.details',  $product->slug) }}">Quick View</a>
                                            <a class="qck"
                                               href="{{route('products.details',  $product->slug) }}">BUY NOW</a>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                        {{ $products->links() }}
                    </div>
                </div>
                @include('frontend.includes.left')
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


    <script>
        //brand change get products
        $(document).on("change", ".brand", function () {
            getProducts();
        });
        //price change get products
        $(document).on("change", ".price", function () {
            getProducts();
        });

        function getProducts() {
            var price = [];
            $('.price').each(function () {
                if ($(this).is(":checked")) {
                    price.push($(this).attr('under'));
                }
            });
            var selectedBrand = [];
            $('.brand').each(function () {
                if ($(this).is(":checked")) {
                    selectedBrand.push($(this).attr('brand-id'));
                }
            });
            $.ajax({
                url: "{{ route('brand.wish.products') }}",
                type: 'GET',
                data: {
                    "price": price,
                    "brand_id": selectedBrand,
                },
                success: function (data) {
                    $("#selectedProducts").html(data);
                }
            });
        }
    </script>
@endsection
