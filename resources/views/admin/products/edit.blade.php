@extends('layouts.app')

@section('content')

<div class="container py-4">

    <!-- HEADER -->
    <div class="mb-4">
        <h2 class="fw-bold">✏️ Edit Produk</h2>
        <p class="text-muted">Update informasi produk dengan mudah</p>
    </div>

    <form action="{{ route('products.update', $product->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="row g-4">

            <!-- KIRI -->
            <div class="col-md-8">

                <!-- INFO UTAMA -->
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Produk</label>
                            <input type="text"
                                   name="name"
                                   value="{{ $product->name }}"
                                   class="form-control form-control-lg">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi</label>
                            <textarea name="description"
                                      rows="5"
                                      class="form-control">{{ $product->description }}</textarea>
                        </div>

                    </div>
                </div>

                <!-- HARGA & STOK -->
                <div class="card border-0 shadow-sm rounded-4 mt-4">
                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Harga</label>
                                <input type="number"
                                       name="price"
                                       value="{{ $product->price }}"
                                       class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Stok</label>
                                <input type="number"
                                       name="stock"
                                       value="{{ $product->stock }}"
                                       class="form-control">
                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <!-- KANAN -->
            <div class="col-md-4">

                <!-- KATEGORI -->
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kategori</label>
                            <select name="category_id" class="form-select">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}"
                                        {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Brand</label>
                            <select name="brand_id" class="form-select">
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Supplier</label>
                            <select name="supplier_id" class="form-select">
                                @foreach($suppliers as $sup)
                                    <option value="{{ $sup->id }}"
                                        {{ $product->supplier_id == $sup->id ? 'selected' : '' }}>
                                        {{ $sup->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>

                <!-- GAMBAR -->
                <div class="card border-0 shadow-sm rounded-4 mt-4">
                    <div class="card-body">

                        <label class="form-label fw-semibold">Gambar Saat Ini</label>

                        <div class="mb-3 text-center">
                            @if($product->thumbnail)
                                <img src="{{ asset('storage/'.$product->thumbnail) }}"
                                     class="img-fluid rounded shadow-sm"
                                     style="max-height:150px;">
                            @else
                                <p class="text-muted">Tidak ada gambar</p>
                            @endif
                        </div>

                        <label class="form-label fw-semibold">Ganti Gambar</label>
                        <input type="file" name="thumbnail" class="form-control">

                        <button class="btn btn-primary w-100 mt-3 fw-bold">
                            💾 Update Produk
                        </button>

                    </div>
                </div>

            </div>

        </div>

    </form>

</div>

<style>
.form-control, .form-select{
    border-radius:12px;
}
.card{
    border-radius:16px;
}
</style>

@endsection