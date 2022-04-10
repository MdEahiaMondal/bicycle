<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $categories =  Category::latest()->with('children')->mainCategory()->get();
        $products = Product::active()->paginate(20);
        $brands = Brand::active()->get();
        return view('frontend.home.home', compact('categories', 'products', 'brands'));
    }
}
