@extends('frontend.master')

@section('title')
    parts
@endsection


@section('body')
    <div class="product">
        <div class="container">
            <div class="ctnt-bar cntnt">
                <div class="content-bar">
                    <div class="single-page">
                        <div class="product-head">
                            <a href="{{ route('home') }}">Home</a> <span>::</span>
                        </div>
                        <!--Include the Etalage files-->
                        <link rel="stylesheet" href="{{ asset('frontend/css/etalage.css') }}">
                        <script src="{{ asset('frontend/js/jquery.etalage.min.js') }}"></script>
                        <script>
                            jQuery(document).ready(function ($) {

                                $('#etalage').etalage({
                                    thumb_image_width: 400,
                                    thumb_image_height: 400,
                                    source_image_width: 800,
                                    source_image_height: 1000,
                                    show_hint: true,
                                    click_callback: function (image_anchor, instance_id) {
                                        alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
                                    }
                                });

                            });
                        </script>
                        <!--//details-product-slider-->
                        <div class="details-left-slider">
                            <div class="grid images_3_of_2">
                                <ul id="etalage">
                                    @foreach($product->images as $image)
                                        <li>
                                            <img class="etalage_thumb_image" src="{{$image->url }}"
                                                 class="img-responsive"/>
                                            <img class="etalage_source_image" src="{{ $image->url }}"
                                                 class="img-responsive" title=""/>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="details-left-info">
                            <h3>{{ $product->product_name }}</h3>
                            <h4>Model No: {{ $product->code }}</h4>
                            <h4></h4>
                            <p><label>TK.</label> {{ $product->price }}</p>
                            <form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="exist_cart" value="{{ @$cart_product ? true : false }}">
                                <input type="hidden" name="rowId"
                                       value="{{ @$cart_product ? @$cart_product->rowId : '' }}">
                                <p class="size">SIZE ::</p>
                                {{--                            <a class="length" href="#">XS</a>--}}
                                {{--                            <a class="length" href="#">M</a>--}}
                                {{--                            <a class="length" href="#">S</a>--}}

                                <input type="radio" name="size" class="length" value="xl" checked> XL
                                <input type="radio" name="size" class="length" value="xs"> XS
                                <input type="radio" name="size" class="length" value="m"> M
                                <input type="radio" name="size" class="length" value="s"> S
                                <div class="btn_form">

                                    <div class="col-sm-2">
                                        <input class="form-control" type="number" name="qty" value="1" min="1">
                                    </div>
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="submit" name="submit" value="Add to cart" class="btn">
                                </div>
                            </form>

                            <div class="bike-type">
                                <p>TYPE ::<a href="#">{{ @$product->category->name }}</a></p>
                                <p>BRAND ::<a href="#">{{ @$product->brand->name }}</a></p>
                            </div>
                            <h5>Description ::</h5>
                            <p class="desc">{{ @$product->details }}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="single-bottom2">
                <h6>Related Products</h6>
                @foreach($related_products as $related_product)
                    <div class="product">
                        <div class="product-desc">
                            <div class="product-img product-img2">
                                <img src="{{ $related_product->images[0]->url }}" class="img-responsive" alt=""/>
                            </div>
                            <div class="prod1-desc">
                                <h5><a class="product_link" href="{{ route('home') }}">{{ $related_product->name }}</a>
                                </h5>
                                <p class="product_descr">
                                    {{ $related_product->details }}
                                </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="product_price">
                            <span class="price-access">TK {{ $related_product->price }}</span>
                            <a class="button1" href="{{ route('cart.index') }}"><span>Add to cart</span></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
