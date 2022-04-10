<div class="rsidebar span_1_of_left" style="background-color: #fff;">
    <section class="sky-form">
        <div class="product_right">
            <h3 class="m_2">Categories</h3>
            @foreach ($categories as $category)
                <select class="dropdown sideCategory" data-settings='{"wrapperClass":"metro"}'>
                    <option value="{{ url('show-product/' . $category->id . '/0') }}">
                        {{ $category->name }}</option>
                    @foreach ($category->children as $subCategory)
                        <option
                            value="{{ url('show-product/' . $subCategory->category_id . '/' . $subCategory->id . '') }}">
                            {{ $subCategory->name }}</option>
                    @endforeach
                </select>
            @endforeach
        </div>
    </section>
    <section class="sky-form">
        <h4 class="m_2">Brand</h4>
        <div class="row row1 scroll-pane">
            <div class="col col-4 text-left">
                @foreach ($brands as $brand)
                    <label class="checkbox"><input type="checkbox" class="brand"
                            brand-id="{{ $brand->id }}"><i></i>{{ $brand->name }}</label>
                @endforeach
            </div>
        </div>
    </section>
    <section class="sky-form">
        <h4 class="m_2">Price</h4>
        <div class="row row1 scroll-pane">
            <div class="col col-4">
                <label class="checkbox"><input type="checkbox" class="price" under="1000"><i></i>Under
                    ৳1000</label>
                <label class="checkbox"><input type="checkbox" class="price" under="5000"><i></i>Under
                    ৳5000</label>
                <label class="checkbox"><input type="checkbox" class="price" under="10000"><i></i>Under
                    ৳10000</label>
                <label class="checkbox"><input type="checkbox" class="price" under="20000"><i></i>Under
                    ৳20000</label>
                <label class="checkbox"><input type="checkbox" class="price" under="50000"><i></i>Under
                    ৳50000</label>
            </div>
        </div>
    </section>
</div>
