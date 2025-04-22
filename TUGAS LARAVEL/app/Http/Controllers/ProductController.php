<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products', compact('products'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        // Menyimpan produk ke database
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        // Setelah produk berhasil disimpan, redirect ke halaman produk
        return redirect('/products')->with('success', 'Produk berhasil ditambahkan!');
    }
}

