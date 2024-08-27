@extends('layouts.app')

@section('title')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Pesanan</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">Add Pesanan</a>
    </div>

    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table table-hover" id="orderTable">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Renter</th>
                <th>Products</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Total Price</th>
                <th>Status Pesanan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($orders->count() > 0)
                @foreach($orders as $order)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $order->user->name }}</td>
                        <td class="align-middle">
                            <ul>
                                @foreach($order->orderItems as $orderItem)
                                    <li>{{ $orderItem->product->title }} (x{{ $orderItem->quantity }})</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="align-middle">{{ $order->orderItems->first()->start_date }}</td>
                        <td class="align-middle">{{ $order->orderItems->first()->end_date }}</td>
                        <td class="align-middle">{{ $order->total_price }}</td>
                        <td class="align-middle">{{ $order->paymentStatus->name }}</td>

                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('orders.show', $order->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('orders.edit', $order->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="7">Order not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#orderTable').DataTable({
            "pageLength": 5
        });
    });
</script>
@endpush
