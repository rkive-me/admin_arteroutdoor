@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('contents')
<div class="container">
    <h1 class="mb-3">Detail Pesanan</h1>
    <hr />
    <div class="card">
        <div class="card-header">
            Pesanan ID: {{ $order->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Informasi Penyewa</h5>
            <p class="card-text"><strong>Nama Penyewa:</strong> {{ $order->user->name }}</p>
            <p class="card-text"><strong>Email Penyewa:</strong> {{ $order->user->email }}</p>
            <p class="card-text"><strong>Nomor Telepon:</strong> {{ $order->user->phone }}</p>
            <p class="card-text"><strong>Alamat:</strong> {{ $order->user->address }}</p>
            <hr />
            <h5 class="card-title">Informasi Produk</h5>
            <ul>
                @foreach($order->orderItems as $orderItem)
                    <li><strong>Produk:</strong> {{ $orderItem->product->title }} - <strong>Jumlah:</strong> {{ $orderItem->quantity }}</li>
                @endforeach
            </ul>
            <hr />
            <h5 class="card-title">Detail Sewa</h5>
            <p class="card-text"><strong>Tanggal Mulai:</strong> {{ $order->orderItems->first()->start_date }}</p>
            <p class="card-text"><strong>Tanggal Berakhir:</strong> {{ $order->orderItems->first()->end_date }}</p>
            <p class="card-text"><strong>Total Harga:</strong> Rp {{ number_format($order->total_price, 2) }}</p>
            <p class="card-text"><strong>Metode Pembayaran:</strong> {{ ucfirst($order->payment_method) }}</p>
            <p class="card-text"><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
        </div>
    </div>
</div>
@endsection
