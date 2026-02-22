<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product')->where('user_id', auth()->id())->get();

        if ($carts->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang masih kosong!');
        }

        $total = $carts->sum(fn($cart) => $cart->product->price * $cart->quantity);
        return view('customer.checkout.index', compact('carts', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'recipient' => 'required',
            'phone' => 'required',
            'full_address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
        ]);

        $carts = Cart::with('product')->where('user_id', auth()->id())->get();
        $total = $carts->sum(fn($cart) => $cart->product->price * $cart->quantity);

        $address = auth()->user()->addresses()->create([
            'label' => 'Alamat Pengiriman',
            'recipient' => $request->recipient,
            'phone' => $request->phone,
            'full_address' => $request->full_address,
            'city' => $request->city,
            'province' => $request->province,
            'postal_code' => $request->postal_code,
        ]);

        $order = Order::create([
            'user_id' => auth()->id(),
            'address_id' => $address->id,
            'total_price' => $total,
            'status' => 'pending',
            'payment_status' => 'unpaid',
        ]);

        foreach ($carts as $cart) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->price,
            ]);
            $cart->product->decrement('stock', $cart->quantity);
        }

        Cart::where('user_id', auth()->id())->delete();

        return redirect()->route('orders.index')->with('success', 'Order berhasil dibuat!');
    }
}
