<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $products = Product::with('category')
        ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        })
        ->latest()
        ->get();

    return view('admin.products.index', compact('products', 'search'));
}

    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'suppliers' => Supplier::all(),
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
    'name' => 'required',
    'sku' => 'required',
    'price' => 'required',
    'stock' => 'required',
]);

    $data = $request->all();

    $data['slug'] = Str::slug($request->name);

    if ($request->hasFile('thumbnail')) {

        $path = $request->file('thumbnail')
                        ->store('products', 'public');

        $data['thumbnail'] = $path;
    }

    Product::create($data);

    return redirect()->route('products.index')
        ->with('success', 'Produk berhasil ditambahkan');
}

    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'suppliers' => Supplier::all(),
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diupdate');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'Produk dihapus');
    }
}