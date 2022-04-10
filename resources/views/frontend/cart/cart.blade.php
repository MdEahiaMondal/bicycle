@extends('frontend.master')

@section('title')
    cart
@endsection


@section('body')
    <div class="cart">
        <div class="container">
            <div class="cart-top">
                <a href="{{ route('home') }}"><< home</a>
            </div>

            <div class="col-md-9 cart-items">
                <h2>My Shopping Bag ({{ count($cart_products) }})</h2>
                @forelse($cart_products as $product)
                    <div class="cart-header">
                        <a href="{{ route('cart.remove', @$product->rowId) }}" type="button"
                           class="btn btn-sm btn-danger close1">
                            x
                        </a>
                        <div class="cart-sec">
                            <div class="cart-item cyc">
                                <img src="{{ $product->options->image }}"/>
                            </div>
                            <div class="cart-item-info">
                                <h3>{{ $product->name }}
                                    <span>Model No: {{ $product->code }}</span>
                                    <span>Size: {{ $product->options->size }}</span>
                                </h3>
                                <h4><span>Tk. </span>
                                    @if( $product->discount_price)
                                        <del>{{ $product->price }}</del>
                                        <span>{{ $product->discount_price }}</span>
                                    @else
                                        {{ $product->price }}
                                    @endif
                                </h4>
                                <p class="qty">Qty ::</p>


                                <form action="{{ route('cart.update.qty', @$product->rowId) }}"
                                      method="post"
                                      class="form-inline d-block">
                                    @csrf
                                    <input min="1" type="number" id="qty" name="qty" value="{{ $product->qty }}"
                                           class="form-control input-small">
                                    <button type="submit" class="btn btn-sm btn-success">Update</button>
                                </form>
                            </div>
                            <div class="clearfix"></div>
                            <div class="delivery">
                                <p>SubTotal:: Tk. {{ number_format(@$product->subtotal, 2) }}</p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3 class="text-center text-danger">There are no card products</h3>
                @endforelse
            </div>

            <div class="col-md-3 cart-total">
                <a class="continue" href="{{ route('home') }}">Continue to shopping</a>
                <div class="price-details">
                    <h3>Price Details</h3>
                    <span>Total</span>
                    <span class="total">Tk.{{ number_format(Cart::instance('cart')->subtotalFloat(), 2)  }}</span>

                    <span>Delivery Charges</span>
                    <span class="total">Tk. 100</span>
                    <div class="clearfix"></div>
                </div>
                <h4 class="last-price">TOTAL</h4>
                <span class="total final">Tk. {{ number_format(Cart::instance('cart')->totalFloat(), 2) }}</span>
                <div class="clearfix"></div>
                <a class="order" href="#">Place Order</a>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush

