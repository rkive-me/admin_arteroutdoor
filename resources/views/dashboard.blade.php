@extends('layouts.app')

@section('title')

@section('contents')
<div class="container">
    <h1 class="mb-4">Admin Dashboard</h1>

    <!-- Statistik Umum -->
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Penyewa</div>
                <div class="card-body">
                    <h5 class="card-title">50</h5>
                    <p class="card-text">Jumlah total penyewa yang terdaftar.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Pesanan</div>
                <div class="card-body">
                    <h5 class="card-title">75</h5>
                    <p class="card-text">Jumlah total pesanan yang telah dilakukan.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Pendapatan</div>
                <div class="card-body">
                    <h5 class="card-title">Rp. 10.000.000</h5>
                    <p class="card-text">Pendapatan dari semua pesanan yang berhasil.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Produk Tersedia</div>
                <div class="card-body">
                    <h5 class="card-title">100</h5>
                    <p class="card-text">Jumlah total produk yang tersedia.</p>
                </div>
            </div>
        </div>
    </div>



    <!-- Tambahkan section lain sesuai kebutuhan -->
</div>
@endsection
