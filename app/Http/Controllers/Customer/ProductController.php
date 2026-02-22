<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::with('category')
            ->when($request->category, function($q) use ($request) {
                $q->where('category_id', $request->category);
            })
            ->when($request->search, function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            })
            ->latest()->get();

        return view('customer.products.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        return view('customer.products.show', compact('product'));
    }
}
