@foreach ($products as $product)
    <a href="{{ route('products.details',  $product->slug) }}">
        <div class="part-sec">
            <img src="{{ $product->images[0]->url }}" alt="" />
            <div class="part-info">
                <a href="#">
                    <h5>{{ $product->name }}<span>৳{{ $product->price }}</span>
                    </h5>
                </a>
                <a class="add-cart" href="{{ route('products.details',  $product->slug) }}">Quick View</a>
                <a class="qck" href="{{ route('products.details',  $product->slug) }}">BUY NOW</a>
            </div>
        </div>
    </a>
@endforeach
<div class="clearfix"></div>
