<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->take(8)->get();
        $categories = Category::all();
        return view('customer.home', compact('products', 'categories'));
    }
}
