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

        // Check if the product is already in the cart
        $cartItem = CartItem::where('user_id', $user->id)
                            ->where('product_id', $productId)
                            ->first();

        if ($cartItem) {
            // If the product is already in the cart, increment the quantity
            $cartItem->quantity += $request->quantity ?? 1;
        } else {
            // If the product is not in the cart, create a new cart item
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

    // Other cart methods like remove, update quantity, etc.
}

