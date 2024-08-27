@extends('layouts.app')

@section('title')

@section('contents')
    <h1 class="mb-0">Edit Penyewa</h1>
    <hr />
    <form action="{{ route('renters.update', $renter->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $renter->name }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $renter->email }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Number phone</label>
                <input type="text" name="phone" class="form-control" placeholder="Number phone" value="{{ $renter->phone }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Address</label>
                <textarea class="form-control" name="address" placeholder="Address" >{{ $renter->address }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
