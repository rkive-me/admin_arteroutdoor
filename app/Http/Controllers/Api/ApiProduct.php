<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiProduct extends Controller
{
    /**
     * Menampilkan daftar produk.
     */
    public function index()
    {
        // Ambil semua produk dari database
        $products = Product::all();

        // Kembalikan response dalam format JSON
        return response()->json($products, 200);
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'product_code' => 'required|string|max:255|unique:products',
            'description' => 'required|string',
            'image' => 'nullable|string', // Validasi untuk kolom image (nullable)
        ]);

        // Membuat produk baru
        $product = Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'product_code' => $request->product_code,
            'description' => $request->description,
            'image' => $request->image,
        ]);

        // Kembalikan response produk yang telah dibuat
        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }

    /**
     * Menampilkan detail produk berdasarkan ID.
     */
    public function show($id)
    {
        // Cari produk berdasarkan ID
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Kembalikan response produk
        return response()->json($product, 200);
    }

    /**
     * Memperbarui produk yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        // Cari produk berdasarkan ID
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Validasi data yang diterima
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'product_code' => 'required|string|max:255|unique:products,product_code,'.$product->id,
            'description' => 'required|string',
            'image' => 'nullable|string', // Validasi untuk kolom image (nullable)
        ]);

        // Update data produk
        $product->update([
            'title' => $request->title,
            'price' => $request->price,
            'product_code' => $request->product_code,
            'description' => $request->description,
            'image' => $request->image,
        ]);

        // Kembalikan response produk yang telah diperbarui
        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product
        ], 200);
    }

    /**
     * Menghapus produk dari database.
     */
    public function destroy($id)
    {
        // Cari produk berdasarkan ID
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Hapus produk
        $product->delete();

        // Kembalikan response berhasil menghapus
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
