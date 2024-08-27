<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\PaymentStatus;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     */
    public function index()
    {
        $orders = Order::with('user', 'orderItems.product')->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new order.
     */
    public function create()
    {
        // Ambil data pengguna dan produk untuk form
        $users = User::where('role', 'penyewa')->get();
        $products = Product::all();
        $paymentMethods = PaymentMethod::all();
        $paymentStatuses = PaymentStatus::all();

        return view('orders.create', compact('users', 'products', 'paymentMethods', 'paymentStatuses'));
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|array',
            'product_id.*' => 'exists:products,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'quantity' => 'required|integer|min:1',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'payment_status_id' => 'required|exists:payment_statuses,id',
        ]);

        // Buat pesanan baru
        $order = Order::create([
            'user_id' => $request->user_id,
            'total_price' => 0, // Placeholder, akan dihitung nanti
            'payment_method_id' => $validatedData['payment_method_id'], 
            'payment_status_id' => $request->payment_status_id,
        ]);

        $totalPrice = 0;

        // Tambahkan item ke pesanan
        foreach ($request->product_id as $productId) {
            $product = Product::find($productId);
            $quantity = $request->quantity;
            $price = $product->price * $quantity;

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $product->price,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

            $totalPrice += $price;
        }

        // Update total harga di pesanan
        $order->update(['total_price' => $totalPrice]);

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat.');
    }

    /**
     * Display the specified order.
     */
    public function show(Order $order)
    {
        $order->load('user', 'orderItems.product');

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit($id)
    {
        $order = Order::with('orderItems.product')->findOrFail($id);
        $users = User::where('role', 'penyewa')->get();
        $products = Product::all();
        $paymentMethods = PaymentMethod::all();
        $paymentStatuses = PaymentStatus::all();

        return view('orders.edit', compact('order', 'users', 'products', 'paymentMethods', 'paymentStatuses'));
    }

    /**
     * Update the specified order in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|array',
            'product_id.*' => 'exists:products,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'quantity' => 'required|integer|min:1',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'payment_status_id' => 'required|exists:payment_statuses,id',
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'user_id' => $request->user_id,
            'payment_method_id' => $request->payment_method_id,
            'payment_status_id' => $request->payment_status_id,
        ]);

        // Hapus semua item pesanan yang ada
        $order->orderItems()->delete();

        $totalPrice = 0;

        // Tambahkan item pesanan baru
        foreach ($request->product_id as $productId) {
            $product = Product::find($productId);
            $quantity = $request->quantity;
            $price = $product->price * $quantity;

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $product->price,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

            $totalPrice += $price;
        }

        // Update total harga di pesanan
        $order->update(['total_price' => $totalPrice]);

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy(Order $order)
    {
        $order->orderItems()->delete();
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}
