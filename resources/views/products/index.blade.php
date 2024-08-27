@extends('layouts.app')

@section('title')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Product</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table table-hover" id="productTable">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Image</th>
                <th>Price</th>
                <th>Product Code</th>
                <th>Description</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($product->count() > 0)
                @php
                $counter = 1; // Initialize counter
                @endphp
                @foreach($product as $product)
                    <tr>
                        <td class="align-middle">{{ $counter++ }}</td> <!-- Increment counter -->
                        <td class="align-middle">{{ $product->title }}</td>
                        <td class="align-middle">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td class="align-middle">{{ $product->price }}</td>
                        <td class="align-middle">{{ $product->product_code }}</td>
                        <td class="align-middle">{{ $product->description }}</td>
                        <td class="align-middle">{{ $product->category->name }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('products.show', $product->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('products.edit', $product->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
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
                    <td class="text-center" colspan="6">Product not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#productTable').DataTable({
            "pageLength": 5
        });
    });
</script>
@endpush
