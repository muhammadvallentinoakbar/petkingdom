```blade
@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="hero-section">

    <div class="container">

        <div class="row align-items-center g-5">

            <!-- CONTENT -->
            <div class="col-lg-6">

                <span class="hero-badge">
                    🐾 Pet Shop Premium Indonesia
                </span>

                <h1 class="hero-title">
                    Semua Kebutuhan
                    <span>Hewan Peliharaan</span>
                    Dalam Satu Tempat
                </h1>

                <p class="hero-desc">
                    Temukan makanan premium, vitamin berkualitas,
                    aksesoris modern, dan berbagai kebutuhan terbaik
                    untuk anjing, kucing, burung, serta hewan kesayangan Anda.
                </p>

                <div class="hero-buttons">

                    <a href="{{ route('shop.index') }}"
                       class="btn-shop">

                        Belanja Sekarang

                    </a>

                    <a href="#kategori"
                       class="btn-category">

                        Lihat Kategori

                    </a>

                </div>

                <!-- STATS -->
                <div class="hero-stats">

                    <div class="stat-box">
                        <h3>500+</h3>
                        <span>Produk</span>
                    </div>

                    <div class="stat-box">
                        <h3>1000+</h3>
                        <span>Pelanggan</span>
                    </div>

                    <div class="stat-box">
                        <h3>24/7</h3>
                        <span>Support</span>
                    </div>

                </div>

            </div>

            <!-- IMAGE -->
            <div class="col-lg-6">

                <div class="hero-image">

                    <img
                        src="https://images.unsplash.com/photo-1548199973-03cce0bbc87b"
                        alt="Pet Kingdom">

                </div>

            </div>

        </div>

    </div>

</section>

<!-- FEATURE -->
<section class="feature-section">

    <div class="container">

        <div class="section-title">

            <h2>Mengapa Memilih Pet Kingdom?</h2>

            <p>
                Kami menyediakan produk berkualitas dan pelayanan terbaik
                untuk hewan kesayangan Anda.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        🚚
                    </div>

                    <h4>Pengiriman Cepat</h4>

                    <p>
                        Pengiriman aman dan cepat ke seluruh Indonesia.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        💎
                    </div>

                    <h4>Produk Original</h4>

                    <p>
                        Semua produk dijamin asli dan berkualitas.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        🎧
                    </div>

                    <h4>Support 24/7</h4>

                    <p>
                        Tim kami siap membantu kapan saja.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<style>

.hero-section{
    padding:100px 0;
    background:
    linear-gradient(
        135deg,
        #f8fafc 0%,
        #ffffff 50%,
        #ecfdf5 100%
    );
}

.hero-badge{
    display:inline-block;
    background:#dcfce7;
    color:#15803d;
    padding:10px 18px;
    border-radius:50px;
    font-weight:600;
    margin-bottom:20px;
}

.hero-title{
    font-size:58px;
    font-weight:800;
    line-height:1.1;
    color:#0f172a;
}

.hero-title span{
    color:#16a34a;
}

.hero-desc{
    font-size:18px;
    color:#64748b;
    margin-top:20px;
    margin-bottom:30px;
    line-height:1.8;
}

.hero-buttons{
    display:flex;
    gap:15px;
    flex-wrap:wrap;
}

.btn-shop{
    background:linear-gradient(
        135deg,
        #22c55e,
        #16a34a
    );
    color:white;
    padding:14px 30px;
    border-radius:50px;
    text-decoration:none;
    font-weight:600;
}

.btn-category{
    border:2px solid #16a34a;
    color:#16a34a;
    padding:14px 30px;
    border-radius:50px;
    text-decoration:none;
    font-weight:600;
}

.hero-stats{
    display:flex;
    gap:20px;
    margin-top:50px;
}

.stat-box{
    background:white;
    padding:20px;
    border-radius:20px;
    min-width:120px;
    text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,.05);
}

.stat-box h3{
    color:#16a34a;
    font-weight:800;
    margin-bottom:5px;
}

.stat-box span{
    color:#64748b;
}

.hero-image img{
    width:100%;
    border-radius:30px;
    box-shadow:0 30px 60px rgba(0,0,0,.12);
    object-fit:cover;
}

.feature-section{
    padding:90px 0;
}

.section-title{
    text-align:center;
    margin-bottom:60px;
}

.section-title h2{
    font-weight:800;
    color:#0f172a;
}

.section-title p{
    color:#64748b;
}

.feature-card{
    background:white;
    border-radius:24px;
    padding:40px;
    text-align:center;
    height:100%;
    box-shadow:0 10px 30px rgba(0,0,0,.05);
    transition:.3s;
}

.feature-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(0,0,0,.10);
}

.feature-icon{
    font-size:50px;
    margin-bottom:20px;
}

.feature-card h4{
    font-weight:700;
    color:#0f172a;
}

.feature-card p{
    color:#64748b;
}

@media(max-width:768px){

    .hero-title{
        font-size:38px;
    }

    .hero-stats{
        flex-wrap:wrap;
    }

}

</style>

@endsection
```
