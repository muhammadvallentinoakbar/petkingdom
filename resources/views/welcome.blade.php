@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<section class="hero-section">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <div class="hero-badge">
                    <i class="fa-solid fa-shield-heart"></i>
                    Pet Shop Terpercaya Indonesia
                </div>

                <h1 class="hero-title">
                    Semua Kebutuhan
                    <span>Hewan Peliharaan</span>
                    Dalam Satu Tempat
                </h1>

                <p class="hero-desc">
                    Temukan makanan premium, vitamin berkualitas, aksesoris modern,
                    dan kebutuhan terbaik untuk anjing, kucing, burung, ikan,
                    serta hewan kesayangan Anda.
                </p>

                <div class="hero-buttons">

                    <a href="{{ route('shop.index') }}" class="btn-primary-custom">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Belanja Sekarang
                    </a>

                    <a href="#kategori" class="btn-outline-custom">
                        Lihat Kategori
                    </a>

                </div>

                <div class="hero-stats">

                    <div class="stat-card">
                        <h3>{{ $totalProducts ?? 0 }}+</h3>
                        <p>Best Seller</p>
                    </div>

                    <div class="stat-card">
                        <h3>1000+</h3>
                        <p>Pelanggan</p>
                    </div>

                    <div class="stat-card">
                        <h3>24/7</h3>
                        <p>Support</p>
                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1548199973-03cce0bbc87b"
                         alt="Pet Kingdom">
                </div>

            </div>

        </div>

    </div>

</section>
<!-- PRODUK TERBARU -->
@if(isset($latestProducts) && $latestProducts->count())

<section class="py-5 bg-light">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold mb-1">
                    🆕 Produk Terbaru
                </h2>

                <p class="text-muted mb-0">
                    Produk terbaru yang baru ditambahkan
                </p>
            </div>

            <a href="{{ route('shop.index') }}"
               class="btn btn-success rounded-pill px-4">

                Lihat Semua

            </a>

        </div>

        <div class="row g-4">

            @foreach($latestProducts as $product)

            <div class="col-md-3">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 latest-card">

                    @if($product->thumbnail)

                        <img src="{{ asset('storage/' . $product->thumbnail) }}"
                             class="card-img-top"
                             style="height:220px;object-fit:cover;">

                    @endif

                    <div class="card-body">

                        <span class="badge bg-success mb-2">
                            Baru
                        </span>

                        <h6 class="fw-bold">
                            {{ $product->name }}
                        </h6>

                        <p class="text-success fw-bold fs-5">
                            Rp {{ number_format($product->price) }}
                        </p>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

@endif
<!-- PRODUK TERLARIS -->
@if(isset($bestSellers) && $bestSellers->count())

<section class="py-5 bg-white">

    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">🔥 Produk Terlaris</h2>
            <p class="text-muted">
                Produk paling banyak dibeli pelanggan
            </p>
        </div>

        <div class="row g-4">

            @foreach($bestSellers as $product)

            <div class="col-md-3">

                <div class="card shadow-sm border-0 h-100">

                    <img src="{{ asset('storage/'.$product->thumbnail) }}"
                         class="card-img-top"
                         style="height:220px;object-fit:cover;">

                    <div class="card-body">

                        <h6 class="fw-bold">
                            {{ $product->name }}
                        </h6>

                        <p class="text-success fw-bold">
                            Rp {{ number_format($product->price) }}
                        </p>

                        <span class="badge bg-danger">
                            🔥 Terjual {{ $product->sold }} kali
                        </span>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>
@auth


    @csrf

</form>
@endauth

@endif
<!-- KATEGORI -->
<section class="category-showcase py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-badge">
                🐾 Kategori Populer
            </span>

            <h2 class="fw-bold mt-3">
                Temukan Produk Sesuai Hewan Kesayangan
            </h2>

        </div>

        <div class="row g-4">

            <div class="col-lg-6">

                <div class="category-banner">
<img
        src="https://i.ibb.co.com/jk9gbsR7/Golden-Retrievers-dans-pet-care.webp"
        alt="Anjing"><img src="{{ asset('images/dog.jpg') }}">

                    <div class="overlay">

                        <span>120+ Produk</span>

                        <h2>Anjing</h2>

                        <a href="{{ route('shop.index') }}"
                        class="btn btn-success rounded-pill px-4">
                            Belanja Sekarang →
                        </a>

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="category-banner">

                   <img
        src="https://i.ibb.co.com/chcY4yWq/cute-domestic-cat-tilting-head-600nw-2704737165.webp"
        alt="Anjing">

                    <div class="overlay">

                        <span>150+ Produk</span>

                        <h2>Kucing</h2>

                    <a href="{{ route('shop.index') }}"
                    class="btn btn-success rounded-pill px-4">
                        Belanja Sekarang →
                    </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<style>
   /* CATEGORY PREMIUM */

.category-banner{
    position:relative;
    border-radius:30px;
    overflow:hidden;
    height:320px;
}

.category-banner img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:.5s;
}

.category-banner:hover img{
    transform:scale(1.08);
}

.overlay{
    position:absolute;
    inset:0;

    background:
    linear-gradient(
    to top,
    rgba(0,0,0,.75),
    rgba(0,0,0,.1)
    );

    display:flex;
    flex-direction:column;
    justify-content:flex-end;

    padding:35px;
}

.overlay h2{
    color:white;
    font-size:42px;
    font-weight:900;
}

.overlay span{
    color:#fff;
}

.overlay a{
    color:#4ade80;
    text-decoration:none;
    font-weight:700;
}
</style>

<!-- KEUNGGULAN -->
<section class="section-padding py-5" style="background:#f4f7fa;">

    <div class="container">

        <!-- TITLE -->
        <div class="text-center mb-5">
            <h2 class="fw-bold">Mengapa Memilih Pet Kingdom?</h2>
            <p class="text-secondary">
                Kami memberikan layanan terbaik untuk hewan kesayangan Anda
            </p>
        </div>
<!-- PREMIUM PROMO BAR -->
<section class="promo-running">
    <div class="promo-content">

        <span>🔥 Diskon Hingga 30%</span>
        <span>🚚 Gratis Ongkir Min Rp100.000</span>
        <span>⭐ Produk Original 100%</span>
        <span>🐾 Trusted Pet Store Indonesia</span>

        <!-- Duplikat untuk efek looping -->
        <span>🔥 Diskon Hingga 30%</span>
        <span>🚚 Gratis Ongkir Min Rp100.000</span>
        <span>⭐ Produk Original 100%</span>
        <span>🐾 Trusted Pet Store Indonesia</span>

    </div>
</section>
        <div class="row g-4">

    <div class="col-lg-4">
        <div class="feature-modern">

            <div class="feature-icon-modern shipping">
                <i class="fa-solid fa-truck-fast"></i>
            </div>

            <h4>Pengiriman Cepat</h4>

            <p>
                Pesanan diproses dengan cepat dan dikirim
                ke seluruh Indonesia dengan aman.
            </p>

            <span class="feature-tag">
                🚚 Fast Delivery
            </span>

        </div>
    </div>

    <div class="col-lg-4">
        <div class="feature-modern">

            <div class="feature-icon-modern original">
                <i class="fa-solid fa-award"></i>
            </div>

            <h4>Produk Original</h4>

            <p>
                Semua produk dijamin original dan berasal
                dari distributor resmi terpercaya.
            </p>

            <span class="feature-tag">
                ⭐ 100% Original
            </span>

        </div>
    </div>

    <div class="col-lg-4">
        <div class="feature-modern">

            <div class="feature-icon-modern support">
                <i class="fa-solid fa-headset"></i>
            </div>

            <h4>Support 24/7</h4>

            <p>
                Tim customer service siap membantu Anda
                kapan saja dengan respon cepat.
            </p>

            <span class="feature-tag">
                💬 Always Online
            </span>

        </div>
    </div>

</div>

<style>
    .feature-modern{
    background:#fff;
    border-radius:28px;
    padding:40px 30px;
    text-align:center;
    height:100%;

    border:1px solid #eef2f7;

    transition:.35s;

    position:relative;
    overflow:hidden;
}

.feature-modern:hover{
    transform:translateY(-12px);

    box-shadow:
    0 25px 50px rgba(0,0,0,.08);
}

.feature-modern::before{
    content:'';
    position:absolute;
    top:0;
    left:0;

    width:100%;
    height:5px;

    background:linear-gradient(
        90deg,
        #16a34a,

    );
}

.feature-icon-modern{
    width:90px;
    height:90px;

    margin:0 auto 25px;

    border-radius:24px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:35px;
    color:#fff;
}

.shipping{
    background:linear-gradient(135deg,#3b82f6,#60a5fa);
}

.original{
    background:linear-gradient(135deg,#16a34a,#22c55e);
}

.support{
    background:linear-gradient(135deg,#f97316,#fb923c);
}

.feature-modern h4{
    font-weight:800;
    margin-bottom:15px;
    color:#0f172a;
}

.feature-modern p{
    color:#64748b;
    line-height:1.8;
    margin-bottom:20px;
}

.feature-tag{
    display:inline-block;

    padding:8px 16px;

    background:#f1f5f9;

    border-radius:999px;

    font-size:13px;
    font-weight:600;
}
</style>

<<!-- PREMIUM PROMO -->
<section class="promo-modern">

    <div class="container">

        <div class="promo-box">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <span class="promo-label">
                        🔥 PROMO TERBATAS
                    </span>

                    <h2 class="promo-title">
                        Diskon Hingga
                        <span>30%</span>
                        Untuk Produk Pilihan
                    </h2>

                    <p class="promo-desc">
                        Dapatkan makanan premium, vitamin, aksesoris,
                        dan perlengkapan hewan terbaik dengan harga spesial.
                        Promo berlaku hingga akhir bulan.
                    </p>

                    <div class="promo-feature">

                        <span>✅ Produk Original</span>
                        <span>🚚 Gratis Ongkir</span>
                        <span>⭐ Rating Terbaik</span>

                    </div>

                </div>

                <div class="col-lg-4 text-center">

                    <div class="promo-circle">

                        <h1>30%</h1>
                        <span>OFF</span>

                    </div>

                    <a href="{{ route('shop.index') }}"
                       class="btn-promo-modern">

                        🛒 Belanja Sekarang

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<style>
    /* PREMIUM PROMO */

.promo-modern{
    padding:100px 0;
    background:#f8fafc;
}

.promo-box{
    background:linear-gradient(
        135deg,
        #16a34a,
        #22c55e
    );

    border-radius:30px;
    padding:60px;
    overflow:hidden;
    position:relative;

    box-shadow:
    0 25px 60px rgba(34,197,94,.25);
}

.promo-box::before{
    content:'';
    position:absolute;
    width:350px;
    height:350px;
    background:rgba(255,255,255,.08);
    border-radius:50%;
    top:-120px;
    right:-120px;
}

.promo-label{
    background:rgba(255,255,255,.2);
    color:white;
    padding:8px 18px;
    border-radius:999px;
    font-size:14px;
    font-weight:700;
}

.promo-title{
    color:white;
    font-size:52px;
    font-weight:900;
    margin-top:20px;
}

.promo-title span{
    color:#fef08a;
}

.promo-desc{
    color:rgba(255,255,255,.9);
    font-size:17px;
    line-height:1.8;
    margin-top:20px;
}

.promo-feature{
    display:flex;
    gap:25px;
    flex-wrap:wrap;
    margin-top:25px;
}

.promo-feature span{
    color:white;
    font-weight:600;
}

.promo-circle{
    width:220px;
    height:220px;
    margin:auto;

    border-radius:50%;

    background:white;

    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;

    box-shadow:
    0 20px 40px rgba(0,0,0,.15);
}

.promo-circle h1{
    font-size:70px;
    font-weight:900;
    color:#16a34a;
    margin:0;
}

.promo-circle span{
    font-size:24px;
    font-weight:700;
    color:#64748b;
}

.btn-promo-modern{
    display:inline-block;
    margin-top:25px;

    background:white;
    color:#16a34a;

    padding:14px 30px;

    border-radius:999px;
    text-decoration:none;

    font-weight:700;

    transition:.3s;
}

.btn-promo-modern:hover{
    transform:translateY(-4px);
    color:#16a34a;
}

@media(max-width:768px){

    .promo-box{
        padding:35px;
        text-align:center;
    }

    .promo-title{
        font-size:34px;
    }

    .promo-circle{
        width:170px;
        height:170px;
        margin-top:30px;
    }

    .promo-circle h1{
        font-size:50px;
    }

    .promo-feature{
        justify-content:center;
    }
}
</style>

<!-- TESTIMONI -->
<!-- TESTIMONI MODERN -->
<section class="testimonial-section py-5">

    <div class="container">

        <div class="text-center mb-5">
            <span class="section-badge">
                ⭐ Testimoni Pelanggan
            </span>

            <h2 class="fw-bold mt-3">
                Apa Kata Mereka?
            </h2>

            <p class="text-muted">
                Kepuasan pelanggan adalah prioritas utama kami
            </p>
        </div>

        <div class="row g-4">

            <div class="col-lg-4">
                <div class="testimonial-modern">

                    <div class="testimonial-header">

                        <img src="https://i.pravatar.cc/150?img=12"
                             class="testimonial-avatar">

                        <div>
                            <h6 class="mb-1 fw-bold">
                                Andi Saputra
                            </h6>

                            <small class="text-muted">
                                Pecinta Kucing
                            </small>
                        </div>

                    </div>

                    <div class="rating mt-3">
                        ⭐⭐⭐⭐⭐
                    </div>

                    <p class="testimonial-text">
                        Produk sangat lengkap dan kualitasnya bagus.
                        Pengiriman cepat, packing rapi, dan harga
                        sangat bersaing.
                    </p>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="testimonial-modern">

                    <div class="testimonial-header">

                        <img src="https://i.pravatar.cc/150?img=32"
                             class="testimonial-avatar">

                        <div>
                            <h6 class="mb-1 fw-bold">
                                Siti Nurhaliza
                            </h6>

                            <small class="text-muted">
                                Cat Lover
                            </small>
                        </div>

                    </div>

                    <div class="rating mt-3">
                        ⭐⭐⭐⭐⭐
                    </div>

                    <p class="testimonial-text">
                        Royal Canin yang saya beli selalu original.
                        Kucing saya jadi lebih sehat dan aktif.
                    </p>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="testimonial-modern">

                    <div class="testimonial-header">

                        <img src="https://i.pravatar.cc/150?img=45"
                             class="testimonial-avatar">

                        <div>
                            <h6 class="mb-1 fw-bold">
                                Budi Santoso
                            </h6>

                            <small class="text-muted">
                                Dog Owner
                            </small>
                        </div>

                    </div>

                    <div class="rating mt-3">
                        ⭐⭐⭐⭐⭐
                    </div>

                    <p class="testimonial-text">
                        Pelayanan sangat ramah dan responsif.
                        Produk anjing lengkap dan banyak promo menarik.
                    </p>

                </div>
            </div>

        </div>

    </div>

</section>

<!-- STYLE -->
<style>

:root{
    --primary:#16a34a;
    --dark:#0f172a;
    --gray:#64748b;
}

body{
    background:#f8fafc;
}

/* HERO */
.hero-section{
    padding:110px 0;
    background:linear-gradient(135deg,#ffffff,#f0fdf4);
}

.hero-badge{
    display:inline-flex;
    gap:10px;
    align-items:center;
    background:#dcfce7;
    color:#166534;
    padding:10px 18px;
    border-radius:999px;
    font-weight:600;
    margin-bottom:20px;
}

.hero-title{
    font-size:64px;
    font-weight:900;
    color:var(--dark);
    line-height:1.1;
}

.hero-title span{
    color:var(--primary);
}

.hero-desc{
    margin:25px 0;
    color:var(--gray);
    font-size:18px;
    line-height:1.7;
}

/* BUTTON */
.btn-primary-custom{
    background:linear-gradient(135deg,#22c55e,#16a34a);
    color:white;
    padding:14px 28px;
    border-radius:999px;
    text-decoration:none;
    font-weight:700;
    display:inline-flex;
    gap:10px;
    align-items:center;
}

.btn-outline-custom{
    border:2px solid var(--primary);
    color:var(--primary);
    padding:14px 28px;
    border-radius:999px;
    text-decoration:none;
    font-weight:700;
}

/* STATS */
.hero-stats{
    display:flex;
    gap:15px;
    margin-top:40px;
}

.stat-card{
    background:white;
    padding:20px;
    border-radius:20px;
    text-align:center;
    min-width:120px;
    box-shadow:0 10px 25px rgba(0,0,0,.05);
}

.stat-card h3{
    color:var(--primary);
    font-weight:800;
}

/* IMAGE */
.hero-image img{
    width:100%;
    border-radius:30px;
    box-shadow:0 30px 60px rgba(0,0,0,.15);
}

/* SECTION */
.section-padding{
    padding:100px 0;
}

.section-title{
    text-align:center;
    margin-bottom:60px;
}

.section-title h2{
    font-size:40px;
    font-weight:800;
}

/* CARD */
.category-card,
.feature-card,
.testimonial-card{
    background:white;
    padding:35px;
    border-radius:25px;
    text-align:center;
    border:1px solid #e5e7eb;
    transition:.3s;
    height:100%;
}

.category-card:hover,
.feature-card:hover,
.testimonial-card:hover{
    transform:translateY(-10px);
    box-shadow:0 25px 50px rgba(0,0,0,.12);
}

/* ICON */
.category-icon,
.feature-icon{
    width:80px;
    height:80px;
    margin:auto auto 20px;
    border-radius:20px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:34px;
    color:white;
    background:linear-gradient(135deg,#22c55e,#16a34a);
}

/* PROMO */
.promo-section{
    background:linear-gradient(135deg,#16a34a,#22c55e);
    color:white;
    padding:100px 0;
}

.btn-promo{
    background:white;
    color:#16a34a;
    padding:14px 30px;
    border-radius:999px;
    text-decoration:none;
    font-weight:700;
}

/* TESTIMONI */
.stars{
    color:#fbbf24;
    margin-bottom:10px;
}

.testimonial-card p{
    color:var(--gray);
}

@media(max-width:768px){
    .hero-title{
        font-size:40px;
        text-align:center;
    }

    .hero-stats{
        flex-wrap:wrap;
        justify-content:center;
    }

    .hero-section{
        text-align:center;
    }
}
.latest-card{
    transition:.3s;
}

.latest-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(0,0,0,.15);
}

.latest-card img{
    transition:.3s;
}

.latest-card:hover img{
    transform:scale(1.05);
}
.product-card{
    transition: .3s;
}

.product-card:hover{
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,.15);
}
/* PROMO BERJALAN */
.promo-running{
    background: linear-gradient(135deg,#16a34a,#22c55e);
    overflow: hidden;
    padding: 18px 0;
    position: relative;
}

.promo-content{
    display: flex;
    width: max-content;
    animation: scrollPromo 18s linear infinite;
}

.promo-content span{
    color: #fff;
    font-weight: 700;
    font-size: 15px;
    margin-right: 60px;
    white-space: nowrap;
}

@keyframes scrollPromo{
    from{
        transform: translateX(0);
    }

    to{
        transform: translateX(-50%);
    }
}
/* TESTIMONIAL MODERN */

.testimonial-section{
    background:#f8fafc;
}

.section-badge{
    background:#dcfce7;
    color:#15803d;
    padding:8px 18px;
    border-radius:50px;
    font-size:14px;
    font-weight:600;
}

.testimonial-modern{
    background:#fff;
    border-radius:24px;
    padding:30px;
    height:100%;
    border:1px solid #e5e7eb;
    transition:.35s;
    position:relative;
    overflow:hidden;
}

.testimonial-modern:hover{
    transform:translateY(-10px);
    box-shadow:0 25px 50px rgba(0,0,0,.12);
}

.testimonial-modern::before{
    content:"❝";
    position:absolute;
    top:15px;
    right:20px;
    font-size:70px;
    color:#22c55e20;
    font-weight:bold;
}

.testimonial-header{
    display:flex;
    align-items:center;
    gap:15px;
}

.testimonial-avatar{
    width:65px;
    height:65px;
    border-radius:50%;
    object-fit:cover;
    border:3px solid #22c55e;
}

.rating{
    color:#fbbf24;
    font-size:18px;
}

.testimonial-text{
    margin-top:15px;
    color:#64748b;
    line-height:1.8;
    font-size:15px;
}
.overlay a{
    display:inline-block;
    margin-top:10px;
    padding:12px 24px;
    background:#22c55e;
    color:white;
    text-decoration:none;
    border-radius:50px;
    font-weight:700;
    transition:.3s;
}

.overlay a:hover{
    background:#16a34a;
    transform:translateX(5px);
    color:white;
}
</style>

@endsection