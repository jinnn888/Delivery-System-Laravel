<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'total_price' => 'required',
            'product_id' => 'required'
        ]);

        $cart = Cart::create([
            'amount' => $request->amount,
            'total_price' => $request->total_price,
            'product_id' => $request->product_id
        ]);

        auth()->user()->carts()->attach($cart->id);

        return redirect()->back()->with('success', 'Item added to cart.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
