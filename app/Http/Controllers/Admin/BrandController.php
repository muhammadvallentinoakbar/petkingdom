<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Brand::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => true,
        ]);

        return redirect()->route('brands.index')
            ->with('success','Brand berhasil ditambahkan');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $brand->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('brands.index');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return back();
    }
}