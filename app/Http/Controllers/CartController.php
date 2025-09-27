<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class CartController extends Controller
{

public function addToCart($productId)
{
     // Retrieve the current cart from the session, or initialize an empty array if it doesn't exist
    $cart = session()->get('cart', []);

    // Cast to integer to ensure it's not an array
    $cart[$productId] = (int)($cart[$productId] ?? 0) + 1;
    // Store the updated cart back into the session

    session()->put('cart', $cart);
    // Redirect to the cart view with a success message

    return redirect()->route('products.cart.view')->with('success', 'Product added to cart!');
}



// app/Http/Controllers/ProductController.php
public function viewCart()
{
    $cart = session()->get('cart', []);
    $products = Product::whereIn('id', array_keys($cart))->get();
    return view('products.cart', compact('products', 'cart'));
}
public function incrementQuantity($productId)
{
    $cart = session()->get('cart', []);

    $cart[$productId] = ($cart[$productId] ?? 0) + 1;

    session()->put('cart', $cart);

    return redirect()->route('products.cart.view')->with('success', 'Quantity updated!');
}

public function decrementQuantity($productId)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$productId])) {
        $cart[$productId] = max(1, $cart[$productId] - 1);
    }

    session()->put('cart', $cart);

    return redirect()->route('products.cart.view')->with('success', 'Quantity updated!');
}

public function removeFromCart($productId)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$productId])) {
        unset($cart[$productId]);
        session()->put('cart', $cart);
    }

    return redirect()->route('products.cart.view')->with('success', 'Product removed from cart!');
}
public function show(Product $product)
{
    return view('products.show', compact('product'));
}

public function processCheckout(Request $request)
{
    $validatedData = $request->validate([
        'phone_number' => 'required|string',
        'location' => 'required|string',
        'total_price' => 'required|numeric',
    ]);

    $order = Order::create([
        'products' => session('cart', []),
        'phone_number' => $validatedData['phone_number'],
        'location' => $validatedData['location'],
        'total_price' => $validatedData['total_price'],
    ]);

    // Clear the cart after checkout
    session()->forget('cart');

    return redirect()->route('checkout.success')->with('success', 'Your order has been placed successfully!');
}
public function checkoutSuccess()
{
    return view('checkouts.success');
}

}
