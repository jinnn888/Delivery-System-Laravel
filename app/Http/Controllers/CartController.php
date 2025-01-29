<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = auth()->user()->cart()->with('items.product')->get();

        // dd($carts->items);

        return view('home.my-cart', compact('carts'));
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

        $cart = CartItem::create([
            'cart_id' => auth()->user()->cart->id,
            'product_id' => $request->product_id,
            'quantity' => $request->amount,
            'price' => $request->total_price,
        ]);


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
    public function destroy(CartItem $item)
    {
        dd($item);
        // $item->delete();

        return redirect()->back()->with('success', 'Item removed from cart successully.');
    }
}
