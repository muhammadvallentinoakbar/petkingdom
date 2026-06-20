
@extends('layouts.app')

@section('content')

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

<div class="container py-5">

    <div class="row g-4">

        <!-- SIDEBAR -->
        <div class="col-lg-3">

            <div class="sidebar-card">

                <div class="cover"></div>

                <div class="profile-info text-center">

                    <img src="{{ auth()->user()->profile_photo
                        ? asset('storage/'.auth()->user()->profile_photo)
                        : 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&background=22c55e&color=fff' }}"
                         class="avatar">

                    <h5 class="fw-bold mt-3 mb-1">
                        {{ auth()->user()->name }}
                    </h5>

                    <small class="text-muted">
                        {{ auth()->user()->email }}
                    </small>

                </div>

                <div class="px-3 pb-3">

                    <a href="{{ route('profile.edit') }}"
                       class="menu {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                        <i class="fas fa-user"></i>
                        Profil Saya
                    </a>

                    <a href="{{ route('profile.password') }}"
                       class="menu {{ request()->routeIs('profile.password') ? 'active' : '' }}">
                        <i class="fas fa-lock"></i>
                        Ubah Password
                    </a>

                    <a href="{{ route('orders.index') }}"
                       class="menu">
                        <i class="fas fa-box"></i>
                        Pesanan Saya
                    </a>

                    <hr>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="btn-logout">
                            <i class="fas fa-right-from-bracket me-2"></i>
                            Logout
                        </button>
                    </form>

                </div>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="col-lg-9">

            <div class="content-card">

                <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">

                    <div>
                        <h2 class="fw-bold mb-1">
                            Profil Saya
                        </h2>

                        <p class="text-muted mb-0">
                            Kelola informasi akun Anda
                        </p>
                    </div>

                </div>

                <!-- STATS -->
                <div class="row g-3 mb-4">

                    <div class="col-md-4">

                        <div class="stat-card">

                            <i class="fas fa-box"></i>

                            <h4>
                                {{ method_exists(auth()->user(),'orders') ? auth()->user()->orders()->count() : 0 }}
                            </h4>

                            <small>Total Pesanan</small>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="stat-card">

                            <i class="fas fa-location-dot"></i>

                            <h4>
                                {{ auth()->user()->address ? '1' : '0' }}
                            </h4>

                            <small>Alamat Tersimpan</small>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="stat-card">

                            <i class="fas fa-user-check"></i>

                            <h4>Aktif</h4>

                            <small>Status Akun</small>

                        </div>

                    </div>

                </div>

                @if(session('status'))
                    <div class="alert alert-success rounded-4 border-0 shadow-sm">
                        {{ session('status') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger rounded-4 border-0 shadow-sm">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST"
                      action="{{ route('profile.update') }}"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PATCH')

                    <div class="row">

                        <!-- FOTO -->
                        <div class="col-12 mb-4">

                            <label class="form-label fw-semibold">
                                Foto Profil
                            </label>

                            <input type="file"
                                   name="profile_photo"
                                   class="form-control modern-input"
                                   accept="image/*">

                        </div>

                        <!-- NAMA -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Nama Lengkap
                            </label>

                            <input type="text"
                                   name="name"
                                   value="{{ old('name', auth()->user()->name) }}"
                                   class="form-control modern-input"
                                   required>

                        </div>

                        <!-- EMAIL -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Email
                            </label>

                            <input type="email"
                                   name="email"
                                   value="{{ old('email', auth()->user()->email) }}"
                                   class="form-control modern-input"
                                   required>

                        </div>

                        <!-- ALAMAT -->
                        <div class="col-12 mb-3">

                            <label class="form-label fw-semibold">
                                Alamat
                            </label>

                            <input type="text"
                                   name="address"
                                   value="{{ old('address', auth()->user()->address) }}"
                                   class="form-control modern-input">

                        </div>

                        <!-- KOTA -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Kota
                            </label>

                            <input type="text"
                                   name="city"
                                   value="{{ old('city', auth()->user()->city) }}"
                                   class="form-control modern-input">

                        </div>

                        <!-- KODE POS -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">
                                Kode Pos
                            </label>

                            <input type="text"
                                   name="postal_code"
                                   value="{{ old('postal_code', auth()->user()->postal_code) }}"
                                   class="form-control modern-input">

                        </div>

                    </div>

                    <button type="submit" class="btn-save">

                        <i class="fas fa-floppy-disk me-2"></i>
                        Simpan Perubahan

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<style>

body{
    background:#f8fafc;
}

.sidebar-card{
    background:#fff;
    border-radius:28px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
    position:sticky;
    top:90px;
}

.cover{
    height:120px;
    background:linear-gradient(135deg,#22c55e,#16a34a);
}

.profile-info{
    margin-top:-55px;
    padding:0 25px 20px;
}

.avatar{
    width:110px;
    height:110px;
    border-radius:50%;
    border:5px solid #fff;
    object-fit:cover;
    box-shadow:0 15px 30px rgba(0,0,0,.15);
}

.menu{
    display:flex;
    align-items:center;
    gap:12px;
    text-decoration:none;
    color:#0f172a;
    padding:14px 18px;
    border-radius:14px;
    font-weight:600;
    margin-bottom:8px;
    transition:.25s;
}

.menu:hover{
    background:#f1f5f9;
    transform:translateX(4px);
}

.menu.active{
    background:#dcfce7;
    color:#166534;
}

.content-card{
    background:white;
    border-radius:28px;
    padding:35px;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
}

.stat-card{
    background:white;
    border-radius:20px;
    padding:20px;
    text-align:center;
    border:1px solid #eef2f7;
    box-shadow:0 10px 25px rgba(0,0,0,.04);
}

.stat-card i{
    font-size:24px;
    color:#16a34a;
    margin-bottom:10px;
}

.stat-card h4{
    font-weight:800;
    margin-bottom:5px;
}

.modern-input{
    height:52px;
    border-radius:14px;
    border:1px solid #e2e8f0;
}

.modern-input:focus{
    border-color:#22c55e;
    box-shadow:none;
}

.btn-save{
    width:100%;
    height:56px;
    border:none;
    border-radius:14px;
    color:white;
    font-weight:700;
    background:linear-gradient(135deg,#22c55e,#16a34a);
    transition:.3s;
}

.btn-save:hover{
    transform:translateY(-2px);
}

.btn-logout{
    width:100%;
    border:none;
    padding:14px;
    border-radius:14px;
    background:#fee2e2;
    color:#dc2626;
    font-weight:700;
}

@media(max-width:992px){

.sidebar-card{
    position:relative;
    top:auto;
}

.content-card{
    padding:25px;
}

}

</style>

@endsection

