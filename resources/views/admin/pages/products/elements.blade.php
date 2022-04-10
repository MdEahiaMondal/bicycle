<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Create a new products for you company</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Category<span
                                    class="required-star"> *</span></label>
                            <select class="form-control productCategorySelect2 chosen-select"
                                    name="category">
                                <option>Select Category</option>
                                @php(@$check_selected_id = isset($product) ? @$product->category_id : old('category'))
                                @foreach(@$categories as $category)
                                    <option {{ @$check_selected_id == @$category->id ? 'selected' : '' }}
                                            value="{{ @$category->id }}">{{ @$category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <span class="help-block m-b-none text-danger">{{ @$message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Brand<span
                                    class="required-star"> *</span></label>
                            <select class="form-control productBrandSelect2" name="brand">
                                <option>Select Brand</option>
                                @php(@$check_selected_id = isset($product) ? @$product->brand_id : old('brand'))
                                @foreach(@$brands as $brand)
                                    <option {{ @$check_selected_id == @$brand->id ? 'selected' : '' }}
                                            value="{{ @$brand->id }}">{{ @$brand->name }}</option>
                                @endforeach
                            </select>
                            @error('brand')
                            <span class="help-block m-b-none text-danger">{{ @$message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label id="product_name" class="control-label">Product Name<span
                                    class="required-star"> *</span></label>
                            <input id="product_name" type="text"
                                   value="{{ isset($product->name) ? @$product->name : old('product_name')}}"
                                   name="product_name" class="form-control">
                            @error('product_name')
                            <span class="help-block m-b-none text-danger">
                                                {{ @$message }}
                                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label id="product_price" class="control-label">Product Price</label>
                            <input id="product_price" type="text"
                                   value="{{ isset($product->price) ? @$product->price : old('product_price')}}"
                                   name="product_price" class="form-control productPriceInput">
                            <span class="help-block m-b-none text-muted">
                                If you want to size with price no need to fill price filed
                            </span>

                            @error('product_price')
                            <span class="help-block m-b-none text-danger">
                                 {{ @$message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label id="product_discount_price" class="control-label">Product Dicount Price</label>
                            <input id="product_discount_price" type="number"
                                   value="{{ isset($product->product_discount_price) ? @$product->product_discount_price : old('product_discount_price')}}"
                                   name="product_discount_price" class="form-control">
                            @error('product_discount_price')
                            <span class="help-block m-b-none text-danger">
                                 {{ @$message }}
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label id="product_quantity" class="control-label">Product Quantity <sup></sup></label>
                            <input id="product_quantity"
                                   type="text"
                                   value="{{ isset($product->stock) ? @$product->stock : old('stock')}}"
                                   name="product_quantity"
                                   class="form-control">
                            <span class="help-block m-b-none text-muted">
                                Quantity must be fill up when you provide product price
                            </span>

                            @error('product_quantity')
                            <span class="help-block m-b-none text-danger">
                                {{ @$message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label id="product_code" class="control-label">Product Code</label>
                            <input id="product_code" type="text"
                                   value="{{ isset($product->code) ? @$product->code : old('product_code')}}"
                                   name="product_code" class="form-control">
                            @error('product_code')
                            <span class="help-block m-b-none text-danger">
                                {{ @$message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Product Image <span class="required-star"> *</span></label>
                            <input multiple type="file" name="product_img[]" class="form-control">
                            @error('product_img') <span
                                class="help-block m-b-none text-danger">{{ @$message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label id="product_details" class="control-label">Product Details</label>
                            <textarea class="form-control productsTextEditor" name="product_details"
                                      id="product_details">
                                            {!! isset($product->details) ? @$product->details : old('product_details') !!}
                                        </textarea>
                            @error('product_details')
                            <span class="help-block m-b-none text-danger">
                                    {{ @$message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Product <strong>Size</strong>  And <strong>Colo</strong>r
                </h5>
            </div>
            <div class="ibox-content">
                <!--Start=> predefine product price with size section-->
                <div class="row">
                    <div class="col-md-8" id="appendRowHereForProductPrice">
                        @if (@$errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach (@$errors->all() as $error)
                                        <li>{{ @$error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if( isset($product) && @$product->productPricesWithSize->count() > 0)
                            @foreach(@$product->productPricesWithSize as $key => $productSize)
                                <div class="row" id="removeExistingProductSize">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            @if(@$key === 0)
                                                <label id="product_size_arr" class="control-label">Size <span
                                                        class="required-star"> *</span></label>
                                            @endif
                                            <input id="product_size_arr" type="text"
                                                   value="{{ isset($productSize->size) ? @$productSize->size : '' }}"
                                                   name="product_size_arr[]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            @if(@$key === 0)
                                                <label id="product_price_arr" class="control-label">Price <span
                                                        class="required-star"> *</span></label>
                                            @endif
                                            <input id="product_price_arr" type="text"
                                                   value="{{ isset($productSize->price) ? @$productSize->price : '' }}"
                                                   name="product_price_arr[]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            @if(@$key === 0)
                                                <label id="discount_price_arr" class="control-label">Discount
                                                    Price</label>
                                            @endif
                                            <input id="discount_price_arr" type="text"
                                                   value="{{ isset($productSize->discount_price) ? @$productSize->discount_price : old('discount_price')}}"
                                                   name="discount_price_arr[]" class="form-control">
                                            @error('discount_price_arr[]')
                                            <span class="help-block m-b-none text-danger">
                                                    {{ @$message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            @if(@$key === 0)
                                                <label id="product_stock_arr" class="control-label">Quantity <span
                                                        class="required-star"> *</span></label>
                                            @endif
                                            <input id="product_stock_arr" type="number"
                                                   value="{{ isset($productSize->stock) ? @$productSize->stock : '' }}"
                                                   name="product_stock_arr[]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            @if(@$key === 0)
                                                <label id="product_price_arr"
                                                       class="control-label">Action</label>
                                                <button class="btn btn-info btn-block"
                                                        onclick="addNewProductSizeWithPrice(event)"><i
                                                        class="fa fa-plus-circle"></i></button>
                                            @else
                                                <button class="btn btn-danger btn-block"
                                                        onclick="removeProductPriceItemFromDataBase(event, this, '{{ @$productSize->id }}')">
                                                    <i
                                                        class="fa fa-minus-circle"></i></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        <!-- this is for create form-->
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label id="product_size_arr" class="control-label"> Size <span
                                                class="required-star"> *</span></label>
                                        <input id="product_size_arr" type="text"
                                               value="{{ isset($product->total_marks) ? @$product->total_marks : old('total_marks')}}"
                                               name="product_size_arr[]" class="form-control">
                                        @error('product_size_arr[]')
                                        <span class="help-block m-b-none text-danger">
                                        {{ @$message }}
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label id="product_price_arr" class="control-label">Action</label>
                                        <button class="btn btn-info btn-block"
                                                onclick="addNewProductSizeWithPrice(event)"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <!--End=> predefine product price with size section-->
            </div>
        </div>
    </div>
</div>

<!--// only edit-->
@if( isset($product) && @$product->images->count() > 0)
    <!-- Start => file upload section -->
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Product <strong>File </strong> Upload</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @foreach(@$product->images as $image)
                                    <div class="col-2" id="removeProductImageSection">
                                        <div class="input-group">
                                            <img class="d-block" width="100%"
                                                 src="{{ @$image->url }}"
                                                 alt="{{ @$image->type }}">
                                            <button onclick="removeProductImage(event, this, '{{ @$image->id }}')"
                                                    class="btn btn-danger btn-block">Remove
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif


<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Product <strong>Activity</strong></h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-8" id="appendRowHereForProductPrice">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="status"> <input type="checkbox"
                                                                {{ isset($product) && @$product->status ? 'checked' : old('status') }}
                                                                id="status"
                                                                name="status"
                                                                class="i-checks"> Active</label>
                                    @error('status')
                                    <span class="help-block m-b-none text-danger">
                                        {{ @$message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
