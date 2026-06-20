@extends('layouts.app')

@section('content')

<div class="product-page">

    <div class="container py-5">

        <!-- BACK BUTTON -->
        <a href="{{ route('shop.index') }}" class="btn-back">
            ← Kembali ke Produk
        </a>

        <div class="row g-5">

            <!-- LEFT: IMAGE -->
            <div class="col-lg-6">

                <div class="image-card">

                    <img src="{{ asset('storage/'.$product->thumbnail) }}"
                         alt="{{ $product->name }}"
                         class="product-img">

                    <div class="stock-badge {{ $product->stock > 0 ? 'in' : 'out' }}">
                        {{ $product->stock > 0 ? 'Tersedia' : 'Habis' }}
                    </div>

                </div>

            </div>

            <!-- RIGHT: DETAIL -->
            <div class="col-lg-6">

                <div class="detail-card">

                    <div class="tag">🐾 Pet Product</div>

                    <h1 class="title">
                        {{ $product->name }}
                    </h1>

                    <div class="price">
                        Rp {{ number_format($product->price,0,',','.') }}
                    </div>

                    <p class="desc">
                        {{ $product->description ?? 'Produk berkualitas tinggi untuk hewan kesayangan Anda.' }}
                    </p>

                    <div class="stock-info">
                        Stok tersedia: <strong>{{ $product->stock }}</strong>
                    </div>

                    <div class="action">

                        @auth

                            @if($product->stock > 0)

                                <form action="{{ route('cart.add', $product->id) }}"
                                      method="POST">
                                    @csrf

                                    <button class="btn-primary">
                                        🛒 Tambahkan ke Keranjang
                                    </button>

                                </form>

                            @else

                                <button class="btn-disabled" disabled>
                                    Stok Habis
                                </button>

                            @endif

                        @else

                            <a href="{{ route('login') }}"
                               class="btn-outline">
                                Login untuk Membeli
                            </a>

                        @endauth

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

/* BACK BUTTON */
.btn-back{
    display:inline-flex;
    align-items:center;
    padding:10px 16px;
    border-radius:999px;
    background:#fff;
    border:1px solid #e2e8f0;
    color:#0f172a;
    font-weight:700;
    text-decoration:none;
    box-shadow:0 8px 20px rgba(0,0,0,0.06);
    transition:0.3s;
    margin-bottom:20px;
}

.btn-back:hover{
    transform:translateY(-2px);
    background:#f8fafc;
}

/* PAGE */
.product-page{
    background: linear-gradient(180deg,#f8fafc,#ffffff);
    min-height:100vh;
}

/* IMAGE CARD */
.image-card{
    position:relative;
    background:#fff;
    border-radius:28px;
    padding:20px;
    box-shadow:0 20px 50px rgba(0,0,0,0.08);
    overflow:hidden;
}

.product-img{
    width:100%;
    border-radius:20px;
    transition:0.5s ease;
}

.image-card:hover .product-img{
    transform:scale(1.06);
}

/* STOCK BADGE */
.stock-badge{
    position:absolute;
    top:20px;
    right:20px;
    padding:10px 16px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
}

.in{
    background:#dcfce7;
    color:#15803d;
}

.out{
    background:#fee2e2;
    color:#dc2626;
}

/* DETAIL CARD */
.detail-card{
    background:#fff;
    border-radius:28px;
    padding:30px;
    box-shadow:0 20px 50px rgba(0,0,0,0.08);
}

/* TAG */
.tag{
    display:inline-block;
    background:#ecfdf5;
    color:#16a34a;
    font-size:12px;
    font-weight:700;
    padding:6px 12px;
    border-radius:999px;
    margin-bottom:12px;
}

/* TITLE */
.title{
    font-size:32px;
    font-weight:900;
    color:#0f172a;
    margin-bottom:10px;
}

/* PRICE */
.price{
    font-size:28px;
    font-weight:900;
    color:#16a34a;
    margin-bottom:15px;
}

/* DESC */
.desc{
    color:#64748b;
    line-height:1.7;
    margin-bottom:20px;
}

/* STOCK */
.stock-info{
    color:#334155;
    margin-bottom:25px;
}

/* BUTTON PRIMARY */
.btn-primary{
    width:100%;
    padding:14px;
    border:none;
    border-radius:16px;
    background:linear-gradient(135deg,#22c55e,#16a34a);
    color:#fff;
    font-weight:800;
    font-size:15px;
    transition:0.3s;
}

.btn-primary:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(22,163,74,0.25);
}

/* OUTLINE LOGIN */
.btn-outline{
    display:block;
    width:100%;
    text-align:center;
    padding:14px;
    border-radius:16px;
    border:2px solid #16a34a;
    color:#16a34a;
    font-weight:800;
    text-decoration:none;
}

/* DISABLED */
.btn-disabled{
    width:100%;
    padding:14px;
    border:none;
    border-radius:16px;
    background:#cbd5e1;
    color:#fff;
    font-weight:800;
}

</style>

@endsection