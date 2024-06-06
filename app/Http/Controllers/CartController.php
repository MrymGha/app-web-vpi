<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request, $productId)
    {
        $user = Auth::user();
        $product = Product::findOrFail($productId);

        
        $cartItem = CartItem::where('user_id', $user->id)
                            ->where('product_id', $productId)
                            ->first();

        if ($cartItem) {
           
            $cartItem->quantity += $request->quantity ?? 1;
        } else {
           
            $cartItem = new CartItem();
            $cartItem->user_id = $user->id;
            $cartItem->product_id = $productId;
            $cartItem->quantity = $request->quantity ?? 1;
        }

        $cartItem->save();

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function index()
    {
        $cartItems = CartItem::where('user_id', Auth::id())->get();
        return view('cart.index', compact('cartItems'));
    }

    public function destroy(CartItem $cartItem)
    {
    
        $cartItem->delete();

        return redirect()->route('cart.index')
                         ->with('success', 'Cart Item deleted successfully.');
    }

    
}

