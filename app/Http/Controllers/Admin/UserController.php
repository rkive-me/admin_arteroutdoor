<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        // Ambil semua pengguna dengan role 'penyewa'
        $penyewas = User::where('role', 'penyewa')->get();

        // Kembalikan tampilan untuk menampilkan daftar penyewa
        return view('penyewas.index', compact('penyewas'));
    }

    public function show($id)
    {
        // Menampilkan detail penyewa
        $penyewa = User::findOrFail($id);

        return view('penyewas.show', compact('penyewa'));
    }

    // public function edit($id)
    // {
    //     // Cari penyewa berdasarkan ID
    //     $penyewa = User::findOrFail($id);

    //     // Kembalikan tampilan untuk menampilkan form edit
    //     return view('penyewas.edit', compact('penyewa'));
    // }
}
