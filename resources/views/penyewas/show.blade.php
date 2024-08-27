@extends('layouts.app')

@section('title')

@section('contents')
    <h1 class="mb-0">Detail Penyewa</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $penyewa->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $penyewa->email }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Number phone</label>
            <input type="text" name="phone" class="form-control" placeholder="Number phone" value="{{ $penyewa->phone }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Address</label>
            <textarea class="form-control" name="address" placeholder="Address" readonly>{{ $penyewa->address }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $penyewa->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $penyewa->updated_at }}" readonly>
        </div>
    </div>
@endsection
