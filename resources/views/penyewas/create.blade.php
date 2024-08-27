@extends('layouts.app')

@section('title')

@section('contents')
    <h1 class="mb-0">Add Penyewa</h1>
    <hr />
    <form action="{{ route('penyewas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="col">
                <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="phone" class="form-control" placeholder="Number phone">
            </div>
            <div class="col">
                <textarea class="form-control" name="address" placeholder="Address"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
