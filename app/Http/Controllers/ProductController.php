<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data produk
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form create produk
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi dan simpan produk baru
        $data = $request->validate([
            'sku' => 'required|string|max:100|unique:products,sku',
            'name' => 'required|string|max:100',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'nullable|numeric',
            'stock' => 'nullable|integer',
        ]);
        Product::create($data);

        return redirect()->route('product.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Menampilkan detail produk
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Menampilkan form edit produk
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validasi dan update produk
        $data = $request->validate([
            'sku' => 'required|string|max:100|unique:products,sku,' . $product->id,
            'name' => 'required|string|max:100',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'nullable|numeric',
            'stock' => 'nullable|integer',
        ]);
        $product->update($data);

        return redirect()->route('product.index')
            ->with('success', 'Produk berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
