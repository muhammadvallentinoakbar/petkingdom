@extends('layouts.app')

@section('content')

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

<div class="container-fluid py-4">

    <!-- Header -->
    <div class="card border-0 shadow-sm rounded-4 mb-4 header-card">
        <div class="card-body p-4">

            <div class="d-flex flex-wrap justify-content-between align-items-center">

                <div class="d-flex align-items-center">

                    <div class="header-icon me-3">
                        <i class="fas fa-box-open"></i>
                    </div>

                    <div>
                        <h2 class="fw-bold mb-1">
                            Produk Pet Kingdom
                        </h2>

                        <p class="text-muted mb-0">
                            Kelola seluruh produk, stok dan harga dengan mudah
                        </p>
                    </div>

                </div>

                <a href="{{ route('products.create') }}"
                   class="btn btn-success btn-add-product">

                    <i class="fas fa-plus-circle me-2"></i>
                    Tambah Produk

                </a>

            </div>

        </div>
    </div>

    <!-- SUCCESS -->
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-4">
            <i class="fas fa-circle-check me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <!-- SEARCH -->
<div class="card border-0 shadow-sm rounded-4 mb-4">
    <div class="card-body">

        <form action="{{ route('products.index') }}" method="GET">

            <div class="input-group search-group">

                <span class="input-group-text bg-white border-0">
                    <i class="fas fa-search text-success"></i>
                </span>

                <input type="text"
                       name="search"
                       class="form-control border-0"
                       placeholder="Cari produk..."
                       value="{{ request('search') }}">

                <button type="submit" class="btn btn-search">
                    <i class="fas fa-search me-2"></i>
                    Cari
                </button>

            </div>

        </form>

    </div>
</div>

                    @if(request('search'))
                        <a href="{{ route('products.index') }}"
                           class="btn btn-outline-secondary">
                            Reset
                        </a>
                    @endif

                </div>

            </form>

        </div>
    </div>

    <!-- STATS -->
    <div class="row g-4 mb-4">

        <div class="col-lg-4">
            <div class="stats-card">

                <div class="stats-icon bg-primary">
                    <i class="fas fa-box"></i>
                </div>

                <div>
                    <small>Total Produk</small>
                    <h3>{{ $products->count() }}</h3>
                </div>

            </div>
        </div>

        <div class="col-lg-4">
            <div class="stats-card">

                <div class="stats-icon bg-success">
                    <i class="fas fa-check"></i>
                </div>

                <div>
                    <small>Produk Aktif</small>
                    <h3>{{ $products->where('stock','>',0)->count() }}</h3>
                </div>

            </div>
        </div>

        <div class="col-lg-4">
            <div class="stats-card">

                <div class="stats-icon bg-danger">
                    <i class="fas fa-triangle-exclamation"></i>
                </div>

                <div>
                    <small>Stok Habis</small>
                    <h3>{{ $products->where('stock','<=',0)->count() }}</h3>
                </div>

            </div>
        </div>

    </div>

    <!-- INFO HASIL PENCARIAN -->
    @if(request('search'))
        <div class="alert alert-info border-0 shadow-sm rounded-4">
            <i class="fas fa-search me-2"></i>
            Hasil pencarian untuk
            <strong>"{{ request('search') }}"</strong>
            ditemukan
            <strong>{{ $products->count() }}</strong>
            produk.
        </div>
    @endif

    <!-- PRODUCTS -->
    <div class="row g-4">

        @forelse($products as $product)

        <div class="col-md-6 col-lg-4 col-xl-3">

            <div class="product-card">

                <div class="product-image">

                    @if($product->thumbnail)
                        <img src="{{ asset('storage/'.$product->thumbnail) }}"
                             alt="{{ $product->name }}">
                    @else
                        <img src="https://via.placeholder.com/600x600/f3f4f6/9ca3af?text=Pet+Kingdom"
                             alt="No Image">
                    @endif

                   <div class="product-overlay">

    <!-- EDIT -->
    <a href="{{ route('products.edit',$product->id) }}"
       class="action-btn edit-btn">
        <i class="fas fa-pen"></i>
    </a>

    <!-- ❤️ WISHLIST (INI YANG HILANG DI KAMU) -->
    <form action="{{ route('wishlist.store', $product->id) }}" method="POST">
        @csrf
        <button type="submit"
                class="action-btn"
                style="background:#ef4444; border:none;">
            <i class="fas fa-heart"></i>
        </button>
    </form>

    <!-- DELETE -->
    <form action="{{ route('products.destroy',$product->id) }}"
          method="POST">
        @csrf
        @method('DELETE')

        <button type="submit"
                class="action-btn delete-btn">
            <i class="fas fa-trash"></i>
        </button>
    </form>

</div>

                </div>

                <div class="product-body">

                    <span class="category-badge">
                        {{ $product->category->name ?? 'Kategori' }}
                    </span>

                    <h5 class="product-title">
                        {{ $product->name }}
                    </h5>

                    <div class="price">
                        Rp {{ number_format($product->price,0,',','.') }}
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between align-items-center">

                        <div class="stock-text">
                            Stok: {{ $product->stock }}
                        </div>

                        @if($product->stock > 0)

                            <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                                Tersedia
                            </span>

                        @else

                            <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">
                                Habis
                            </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="empty-state">

                <i class="fas fa-search fa-4x mb-4 text-secondary"></i>

                <h3>Produk Tidak Ditemukan</h3>

                <p class="text-muted">

                    @if(request('search'))
                        Tidak ada produk dengan kata kunci
                        <strong>{{ request('search') }}</strong>
                    @else
                        Tambahkan produk pertama untuk mulai berjualan.
                    @endif

                </p>

                <a href="{{ route('products.index') }}"
                   class="btn btn-success btn-lg rounded-4">

                    Lihat Semua Produk

                </a>

            </div>

        </div>

        @endforelse

    </div>

</div>

<style>

body{
    background:#f8fafc;
}

h2{
    font-weight:700;
}

/* SEARCH */

.input-group-text{
    border-radius:16px 0 0 16px;
}

.form-control{
    box-shadow:none !important;
}

.card{
    border-radius:20px;
}

/* STATS */

.stats-card{
    background:#fff;
    border-radius:24px;
    padding:25px;
    display:flex;
    align-items:center;
    gap:20px;
    box-shadow:0 5px 20px rgba(0,0,0,.05);
    border:1px solid #edf2f7;
    transition:.3s;
}

.stats-card:hover{
    transform:translateY(-5px);
}

.stats-icon{
    width:60px;
    height:60px;
    border-radius:18px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:22px;
}

.stats-card h3{
    margin:0;
    font-size:30px;
    font-weight:700;
}

.stats-card small{
    color:#64748b;
}

/* PRODUCT */

.product-card{
    background:#fff;
    border-radius:24px;
    overflow:hidden;
    border:1px solid #e5e7eb;
    box-shadow:0 5px 20px rgba(0,0,0,.05);
    transition:.35s;
    height:100%;
}

.product-card:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 40px rgba(0,0,0,.1);
}

.product-image{
    position:relative;
    height:260px;
    overflow:hidden;
    background:#fff;
}

.product-image img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:.5s;
}

.product-card:hover img{
    transform:scale(1.08);
}

.product-overlay{
    position:absolute;
    top:10px;
    right:10px;
    display:flex;
    gap:10px;
    z-index:9999;
    opacity:1 !important;
    visibility:visible !important;
}

.product-card:hover .product-overlay{
    opacity:1;
}

.action-btn{
    width:42px;
    height:42px;
    border:none;
    border-radius:14px;
    display:flex;
    justify-content:center;
    align-items:center;
    color:#fff;
    text-decoration:none;
}

.edit-btn{
    background:#0ea5e9;
}

.delete-btn{
    background:#ef4444;
}

.product-body{
    padding:20px;
}

.category-badge{
    background:#dcfce7;
    color:#16a34a;
    padding:6px 14px;
    border-radius:30px;
    font-size:12px;
    font-weight:600;
}

.product-title{
    margin-top:15px;
    font-weight:700;
    color:#0f172a;
    min-height:50px;
}

.price{
    color:#16a34a;
    font-size:28px;
    font-weight:800;
}

.stock-text{
    color:#64748b;
}

.empty-state{
    background:#fff;
    padding:100px 40px;
    text-align:center;
    border-radius:24px;
    box-shadow:0 5px 20px rgba(0,0,0,.05);
}

.btn-success{
    background:linear-gradient(135deg,#22c55e,#16a34a);
    border:none;
}

.btn-success:hover{
    background:linear-gradient(135deg,#16a34a,#15803d);
}
/* Header Card */
.header-card{
    background: #ffffff;
    border-radius: 20px !important;
}

/* Icon */
.header-icon{
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg,#198754,#20c997);
    color: white;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    box-shadow: 0 8px 20px rgba(25,135,84,.25);
}

/* Judul */
.header-card h2{
    color:#212529;
    font-size:1.8rem;
}

/* Tombol */
.btn-add-product{
    padding:12px 24px;
    border-radius:14px;
    font-weight:600;
    background:linear-gradient(135deg,#198754,#20c997);
    border:none;
    box-shadow:0 8px 20px rgba(25,135,84,.20);
    transition:all .3s ease;
}

.btn-add-product:hover{
    transform:translateY(-2px);
    box-shadow:0 12px 25px rgba(25,135,84,.30);
    color:white;
}

/* Responsive */
@media(max-width:768px){

    .header-card .d-flex{
        text-align:center;
    }

    .btn-add-product{
        margin-top:15px;
        width:100%;
    }

}
.search-group{
    border:1px solid #e9ecef;
    border-radius:16px;
    overflow:hidden;
    transition:all .3s ease;
}

.search-group:focus-within{
    border-color:#198754;
    box-shadow:0 0 0 4px rgba(25,135,84,.15);
}

.search-group .form-control{
    box-shadow:none !important;
    padding:14px;
}

.btn-search{
    background:linear-gradient(135deg,#198754,#20c997);
    border:none;
    color:white;
    font-weight:600;
    padding:0 25px;
    transition:.3s;
}

.btn-search:hover{
    color:white;
    transform:translateY(-1px);
    background:linear-gradient(135deg,#157347,#1aa179);
}
.product-overlay{
    position:absolute;
    top:15px;
    right:15px;
    display:flex;
    gap:10px;
    opacity:0;
    transition:.3s;
}
</style>

@endsection