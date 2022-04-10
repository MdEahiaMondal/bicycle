<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\CartHelper;
use App\Http\Controllers\Helpers\ProductHelper;
use App\Http\Controllers\Helpers\ShippingMethodHelper;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productDetails(Product $product)
    {
        $related_products = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(3)->get();
        $product_images = $product->images()->get()->groupBy('type');
        // check exist in cart
        $cart_product = '';
        if (request('cart')) { // cart == rowId
            $cart_product = CartHelper::searchProduct('cart', request('cart'), 'rowId');
        }
        $categories = Category::latest()->with('children')->mainCategory()->get();
        return view('frontend.single.single', compact('product', 'related_products', 'product_images', 'cart_product', 'categories'));
    }

    public function byCategory(Category $category)
    {
        $categories = Category::latest()->with('children')->mainCategory()->get();

        $brands = Brand::active()->get();

        $products = Product::active()->where('category_id', $category->id)
            ->get();
//        if ($sub_category_id == 0) {
//            $products = DB::table('products')
//                ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
//                ->select('products.*', 'sub_categories.subcategory_name')
//                ->where("sub_categories.category_id", $category_id)
//                ->get();
//        }

        return view('frontend.bicycles.bicycles', compact('products', 'categories', 'brands'));
    }

    public function byBrand(Brand $brand)
    {
        $sortBy = request('sortBy', 'name');

        $products = $brand->products()->active();
        $products = ProductHelper::search($products);
        $products = $products->orderBy($sortBy)->paginate(21);

        return view('pages.products.index', compact('products'));
    }

    public function sizeWisePrice(Request $request)
    {
        $product = ProductPrice::where([
            'product_id' => $request->product_id,
            'size' => $request->size,
        ])->first();
        return $product;
    }

    public function brandWishProducts(Request $request)
    {
        $brand_id = $request->brand_id;
        $price = $request->price;
        if (is_array($request->price) && !$brand_id) {
            $min_value = $this->getMinMaxValue($request->price)[0];
            $max_value = $this->getMinMaxValue($request->price)[1];
            $products = Product::query()->whereBetween('price', [$min_value, $max_value])->get();
        } else if ($brand_id && is_array($request->price)) {
            $min_value = $this->getMinMaxValue($request->price)[0];
            $max_value = $this->getMinMaxValue($request->price)[1];
            $products = Product::query()->whereIn("brand_id", $brand_id)
                ->whereBetween('price', [$min_value, $max_value])->get();
        } else if ($brand_id) {
            $products = Product::query()
                ->whereIn("brand_id", $brand_id)
                ->get();
        } else {
            $products = Product::get();
        }
        return view('frontend.bicycles.products', compact('products'));
    }

    public function getMinMaxValue($price_array)
    {
        $min_value = collect($price_array)->min();
        $max_value = collect($price_array)->max();
        if ($min_value === $max_value) {
            $min_value = 1;
        }
        return [$min_value, $max_value];
    }

}
