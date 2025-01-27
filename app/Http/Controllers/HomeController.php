<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{

    public function home (Request $request) {
        $products = Product::query();

        if ($category = $request->get('category')) {
            $products->where('category', $category);
        } 

        $products = $products->latest()->limit(10)->get();
        return view('home.index', compact('products'));
    }

    public function showProduct(Product $product) {
        return view('home.show-product', compact('product'));
    }

    public function userCart() {
        // $carts = auth()->user()->carts()->with('product')->get();
        $carts = auth()->user()->cart()->with('items.product')->get();

        // dd($carts);

        return view('home.my-cart', compact('carts'));
    }

}
