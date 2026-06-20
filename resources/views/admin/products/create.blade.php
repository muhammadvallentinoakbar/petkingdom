@extends('layouts.app')

@section('content')

<div class="container py-4">

    <!-- HEADER -->
    <div class="mb-4">
        <h2 class="fw-bold">➕ Tambah Produk</h2>
        <p class="text-muted">Tambahkan produk baru ke toko Pet Kingdom</p>
    </div>

    <form action="{{ route('products.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="row g-4">

            <!-- KIRI -->
            <div class="col-md-8">

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">

                        <!-- NAMA -->
<div class="mb-3">
    <label class="form-label fw-semibold">Nama Produk</label>
    <input type="text"
           name="name"
           class="form-control form-control-lg"
           placeholder="Contoh: Makanan Kucing Premium"
           required>
</div>

<!-- SKU -->
<div class="mb-3">
    <label class="form-label fw-semibold">SKU Produk</label>
    <input type="text"
           name="sku"
           class="form-control"
           placeholder="Contoh: SKU-WHS-001"
           required>
</div>

<!-- DESKRIPSI -->
<div class="mb-3">
    <label class="form-label fw-semibold">Deskripsi</label>
    <textarea name="description"
              rows="5"
              class="form-control"
              placeholder="Deskripsi produk..."></textarea>
</div>

                    </div>
                </div>

                <!-- HARGA & STOK -->
                <div class="card border-0 shadow-sm rounded-4 mt-4">
                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Harga</label>
                                <input type="number" name="price" class="form-control" placeholder="0" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Stok</label>
                                <input type="number" name="stock" class="form-control" placeholder="0" required>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <!-- KANAN -->
            <div class="col-md-4">

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">

                        <!-- KATEGORI -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kategori</label>
                            <select name="category_id" class="form-select" required>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- BRAND -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Brand</label>
                            <select name="brand_id" class="form-select">
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- SUPPLIER -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Supplier</label>
                            <select name="supplier_id" class="form-select">
                                @foreach($suppliers as $sup)
                                    <option value="{{ $sup->id }}">{{ $sup->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- GAMBAR -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Gambar Produk</label>
                            <input type="file" name="thumbnail" class="form-control">
                        </div>

                        <!-- BUTTON -->
                        <button class="btn btn-success w-100 py-2 fw-bold">
                            💾 Simpan Produk
                        </button>

                    </div>
                </div>

            </div>

        </div>

    </form>

</div>

<!-- STYLE -->
<style>
.form-control, .form-select{
    border-radius:12px;
}

.card{
    border-radius:16px;
}
</style>

@endsection