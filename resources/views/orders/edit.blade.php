@extends('layouts.app')

@section('title', 'Edit Order')

@section('contents')
<div class="container">
    <h1 class="mb-3">Edit Pesanan</h1>
    <hr />
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id" class="form-label">Penyewa</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Multi-Select Produk menggunakan Select2 -->
        <div class="mb-3">
            <label for="product_id" class="form-label">Produk</label>
            <select name="product_id[]" id="product_select" class="form-control" multiple required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}"
                        {{ in_array($product->id, $order->orderItems->pluck('product_id')->toArray()) ? 'selected' : '' }}>
                        {{ $product->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Tanggal Mulai</label>
            <input type="date" name="start_date" class="form-control" value="{{ $order->orderItems->first()->start_date }}" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Tanggal Berakhir</label>
            <input type="date" name="end_date" class="form-control" value="{{ $order->orderItems->first()->end_date }}" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah</label>
            <input type="number" name="quantity" class="form-control" min="1" value="{{ $order->orderItems->sum('quantity') }}" required>
        </div>

        <div class="mb-3">
            <label for="payment_method_id" class="form-label">Metode Pembayaran</label>
            <select name="payment_method_id" class="form-control" required>
                @foreach($paymentMethods as $method)
                    <option value="{{ $method->id }}" {{ $order->payment_method_id == $method->id ? 'selected' : '' }}>
                        {{ $method->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="payment_status_id" class="form-label">Status Pembayaran</label>
            <select name="payment_status_id" class="form-control" required>
                @foreach($paymentStatuses as $status)
                    <option value="{{ $status->id }}" {{ $order->payment_status_id == $status->id ? 'selected' : '' }}>
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Pesanan</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Inisialisasi Select2 pada dropdown produk
        $('#product_select').select2({
            placeholder: "Pilih Produk",
            allowClear: true
        });
    });
</script>
@endpush
