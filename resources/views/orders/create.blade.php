@extends('layouts.app')

@section('title', 'Create Order')

@section('contents')
<h1>Create Order</h1>
<hr />
<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="user_id" class="form-label">Renter</label>
        <select name="user_id" class="form-control" required>
            <option value="" disabled selected>Select Renter</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Pilihan Produk menggunakan Select2 -->
    <div class="mb-3">
        <label for="product_id" class="form-label">Products</label>
        <select name="product_id[]" id="product_select" class="form-control" multiple required>
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->title }}</option>
            @endforeach
        </select>
    </div>

    <!-- Tanggal Mulai -->
    <div class="mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="date" name="start_date" class="form-control" required>
    </div>

    <!-- Tanggal Berakhir -->
    <div class="mb-3">
        <label for="end_date" class="form-label">End Date</label>
        <input type="date" name="end_date" class="form-control" required>
    </div>

    <!-- Jumlah Produk -->
    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" name="quantity" class="form-control" min="1" required>
    </div>

   <!-- Metode Pembayaran -->
    <div class="mb-3">
        <label for="payment_method_id" class="form-label">Payment Method</label>
        <select name="payment_method_id" class="form-control" required>
            <option value="" disabled selected>Select Payment Method</option>
            @foreach($paymentMethods as $method)
                <option value="{{ $method->id }}">{{ $method->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Status Pembayaran -->
    <div class="mb-3">
        <label for="payment_status_id" class="form-label">Payment Status</label>
        <select name="payment_status_id" class="form-control" required>
            <option value="" disabled selected>Select Payment Status</option>
            @foreach($paymentStatuses as $status)
                <option value="{{ $status->id }}">{{ $status->name }}</option>
            @endforeach
        </select>
    </div>



    <button type="submit" class="btn btn-primary">Create Order</button>
</form>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Inisialisasi Select2 pada dropdown produk
        $('#product_select').select2({
            placeholder: "Select Products", // Placeholder untuk select2
            allowClear: true // Opsi untuk menghapus pilihan
        });
    });
</script>
@endpush
