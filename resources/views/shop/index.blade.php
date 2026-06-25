@extends('layouts.app')

@section('content')

<div class="container py-5">

    <!-- HEADER -->
    <div class="text-center mb-5">

        <h1 class="display-5 fw-bold text-dark">
            🐾 Pet Kingdom Store
        </h1>

        <p class="text-muted fs-5">
            Temukan makanan, vitamin, aksesoris dan kebutuhan terbaik
            untuk hewan kesayangan Anda
        </p>

    </div>

    <!-- PRODUCT GRID -->
    <div class="row g-4">

        @forelse($products as $product)

        <div class="col-6 col-md-4 col-lg-3">

            <div class="product-card">

                <!-- LINK DETAIL (CLICK CARD) -->
                <a href="{{ route('products.show', $product->id) }}" class="product-link">

                <!-- IMAGE -->
                <div class="product-image">

                    @if($product->thumbnail)
                        <img src="{{ asset('storage/'.$product->thumbnail) }}"
                             alt="{{ $product->name }}">
                    @else
                        <img src="https://via.placeholder.com/600x600/f8fafc/94a3b8?text=Pet+Kingdom">
                    @endif

                    @if($product->stock > 0)
                        <span class="stock-badge available">Tersedia</span>
                    @else
                        <span class="stock-badge out">Habis</span>
                    @endif

                </div>

                <!-- BODY -->
                <div class="product-body">

                    <h5 class="product-title">
                        {{ $product->name }}
                    </h5>

                    <div class="product-price">
                        Rp {{ number_format($product->price,0,',','.') }}
                    </div>

                    <div class="stock-text">
                        Stok: {{ $product->stock }}
                    </div>

                </a>
                <!-- END LINK DETAIL -->

                    @auth

                        @if($product->stock > 0)

                        <form action="{{ route('cart.add',$product->id) }}"
                              method="POST">

                            @csrf

                            <button type="submit"
                                    class="btn-buy"
                                    onclick="event.stopPropagation();">

                                <i class="fas fa-cart-plus"></i>
                                Tambah ke Keranjang

                            </button>

                        </form>

                        @else

                        <button class="btn-disabled" disabled>
                            Stok Habis
                        </button>

                        @endif

                    @else

                    <a href="{{ route('login') }}"
                       class="btn-login"
                       onclick="event.stopPropagation();">

                        Login untuk Membeli

                    </a>

                    @endauth

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="empty-box">

                <h3>Belum Ada Produk</h3>

                <p class="text-muted">
                    Produk akan segera tersedia.
                </p>

            </div>

        </div>

        @endforelse

    </div>

</div>

<style>

body{
    background:#f8fafc;
}

/* LINK */
.product-link{
    text-decoration:none;
    color:inherit;
    display:block;
}

/* CARD */
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
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(0,0,0,.12);
}

/* IMAGE */
.product-image{
    height:260px;
    overflow:hidden;
    position:relative;
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

/* BADGE */
.stock-badge{
    position:absolute;
    top:15px;
    right:15px;
    padding:8px 14px;
    border-radius:50px;
    font-size:12px;
    font-weight:600;
}

.available{
    background:#dcfce7;
    color:#15803d;
}

.out{
    background:#fee2e2;
    color:#dc2626;
}

/* BODY */
.product-body{
    padding:20px;
}

.product-title{
    font-weight:700;
    min-height:50px;
    color:#0f172a;
}

.product-price{
    font-size:28px;
    font-weight:800;
    color:#16a34a;
    margin-bottom:8px;
}

.stock-text{
    color:#64748b;
    margin-bottom:18px;
}

/* BUTTON */
.btn-buy{
    width:100%;
    background:linear-gradient(135deg,#22c55e,#16a34a);
    color:#fff;
    border:none;
    padding:12px;
    border-radius:14px;
    font-weight:600;
}

.btn-buy:hover{
    opacity:.9;
}

.btn-login{
    display:block;
    width:100%;
    text-align:center;
    padding:12px;
    border-radius:14px;
    border:2px solid #16a34a;
    color:#16a34a;
    text-decoration:none;
    font-weight:600;
}

.btn-disabled{
    width:100%;
    border:none;
    padding:12px;
    border-radius:14px;
    background:#cbd5e1;
    color:#fff;
}

.empty-box{
    background:#fff;
    border-radius:24px;
    padding:100px 40px;
    text-align:center;
}

</style>

@endsection