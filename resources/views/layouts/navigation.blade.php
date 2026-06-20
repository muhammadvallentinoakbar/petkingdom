<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top border-bottom">

    <div class="container">

        <!-- BRAND -->
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="/">
            🐾 <span class="brand-text">Pet Kingdom</span>
        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <!-- LEFT MENU -->
            <ul class="navbar-nav me-auto align-items-lg-center gap-lg-2">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                        🏠 Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('shop.*') ? 'active' : '' }}" href="{{ route('shop.index') }}">
                        🛍 Produk
                    </a>
                </li>

                <!-- KATEGORI -->
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle {{ request()->is('kategori*') ? 'active' : '' }}"
                       href="#" data-bs-toggle="dropdown">
                        📂 Kategori
                    </a>

                    <ul class="dropdown-menu shadow-sm rounded-3 p-2">

    <li>
        <a class="dropdown-item" href="{{ route('kategori.show', 'anjing') }}">
            🐶 Anjing
        </a>
    </li>

    <li>
        <a class="dropdown-item" href="{{ route('kategori.show', 'kucing') }}">
            🐱 Kucing
        </a>
    </li>

    <li>
        <a class="dropdown-item" href="{{ route('kategori.show', 'burung') }}">
            🐦 Burung
        </a>
    </li>

    <li>
        <a class="dropdown-item" href="{{ route('kategori.show', 'ikan') }}">
            🐟 Ikan
        </a>
    </li>

    <li><hr class="dropdown-divider"></li>

    <li>
        <a class="dropdown-item text-success fw-semibold" href="{{ route('shop.index') }}">
            🔎 Semua Produk
        </a>
    </li>

</ul>
                </li>

                @auth

                <li class="nav-item position-relative">
                    <a class="nav-link {{ request()->routeIs('cart.*') ? 'active' : '' }}"
                       href="{{ route('cart.index') }}">
                        🛒 Keranjang

                        @if(session('cart_count'))
                            <span class="badge-cart">{{ session('cart_count') }}</span>
                        @endif
                    </a>
                </li>
              

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('orders.*') ? 'active' : '' }}"
                       href="{{ route('orders.index') }}">
                        📦 Pesanan
                    </a>
                </li>

                @endauth

            </ul>

            <!-- SEARCH -->
            <form class="search-bar me-lg-3 my-2 my-lg-0"
                  action="{{ route('shop.index') }}"
                  method="GET">

                <input type="text" name="search" placeholder="Cari produk..." value="{{ request('search') }}">
                <button type="submit">🔍</button>

            </form>

            <!-- USER -->
            <div class="d-flex align-items-center gap-2">

                @guest

                    <a href="{{ route('login') }}" class="btn btn-outline-success btn-sm rounded-pill px-3">
                        Login
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-success btn-sm rounded-pill px-3">
                        Register
                    </a>

                @else

                    <div class="dropdown">

                        <button class="btn-account dropdown-toggle" data-bs-toggle="dropdown">
                            👋 {{ auth()->user()->name }}
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end shadow-sm rounded-3 p-2">

                            @if(auth()->user()->role === 'admin')
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    🛠 Admin Dashboard
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            @endif

                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">👤 Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('orders.index') }}">📦 Pesanan</a></li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-danger">
                                        🚪 Logout
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </div>

                @endauth

            </div>

        </div>

    </div>
</nav>

<style>
/* BRAND */
.brand-text{
    color:#16a34a;
    font-weight:900;
}

/* NAV LINK */
.nav-link{
    font-weight:600;
    color:#0f172a !important;
    border-radius:10px;
    padding:6px 10px;
    transition:.2s;
}

.nav-link:hover{
    background:#f1f5f9;
    color:#16a34a !important;
}

.nav-link.active{
    background:#ecfdf5;
    color:#16a34a !important;
}

/* CART BADGE */
.badge-cart{
    position:absolute;
    top:-5px;
    right:-8px;
    background:#ef4444;
    color:#fff;
    font-size:11px;
    padding:2px 6px;
    border-radius:999px;
}
.badge-wishlist{
    position:absolute;
    top:-5px;
    right:-8px;
    background:#ec4899;
    color:#fff;
    font-size:11px;
    padding:2px 6px;
    border-radius:999px;
}
/* SEARCH BAR */
.search-bar{
    display:flex;
    align-items:center;
    background:#f8fafc;
    border:1px solid #e2e8f0;
    border-radius:999px;
    padding:5px;
    width:260px;
}

.search-bar input{
    border:none;
    outline:none;
    background:transparent;
    width:100%;
    padding:6px 10px;
}

.search-bar button{
    border:none;
    background:#16a34a;
    color:#fff;
    padding:6px 10px;
    border-radius:999px;
}

/* USER BUTTON */
.btn-account{
    background:#f1f5f9;
    border:1px solid #e2e8f0;
    padding:8px 14px;
    border-radius:999px;
    font-weight:600;
}

/* DROPDOWN */
.dropdown-item{
    border-radius:10px;
    padding:10px;
    transition:.2s;
}

.dropdown-item:hover{
    background:#f1f5f9;
    color:#16a34a;
    transform:translateX(3px);
}

/* RESPONSIVE */
@media(max-width:768px){
    .search-bar{
        width:100%;
        margin-top:10px;
    }
}
</style>