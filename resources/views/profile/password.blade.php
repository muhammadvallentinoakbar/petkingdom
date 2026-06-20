@extends('layouts.app')

@section('content')

<div class="page-wrapper">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="glass-card">

                    <!-- HEADER -->
                    <div class="header">

                        <div class="icon">🔐</div>

                        <div>
                            <h2>Keamanan Akun</h2>
                            <p>Perbarui password untuk menjaga keamanan akun Anda</p>
                        </div>

                    </div>

                    <div class="divider"></div>

                    {{-- SUCCESS MESSAGE --}}
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- ERROR MESSAGE --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- FORM -->
                    <form method="POST" action="{{ route('profile.password.update') }}">
                        @csrf

                        <!-- PASSWORD LAMA -->
                        <div class="input-group">
                            <label>Password Lama</label>
                            <input type="password"
                                   name="old_password"
                                   placeholder="Masukkan password lama"
                                   required>
                        </div>

                        <!-- PASSWORD BARU -->
                        <div class="input-group">
                            <label>Password Baru</label>
                            <input type="password"
                                   name="new_password"
                                   placeholder="Masukkan password baru"
                                   required>
                            <small>Minimal 8 karakter</small>
                        </div>

                        <!-- KONFIRMASI -->
                        <div class="input-group">
                            <label>Konfirmasi Password</label>
                            <input type="password"
                                   name="new_password_confirmation"
                                   placeholder="Ulangi password baru"
                                   required>
                        </div>

                        <button type="submit" class="btn-primary">
                            Simpan Perubahan
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

/* BACKGROUND */
.page-wrapper{
    min-height:100vh;
    background:
        radial-gradient(circle at top left, #dcfce7, transparent 40%),
        radial-gradient(circle at bottom right, #dbeafe, transparent 40%),
        #f8fafc;
}

/* GLASS CARD */
.glass-card{
    background:rgba(255,255,255,0.85);
    backdrop-filter: blur(12px);
    border:1px solid rgba(226,232,240,0.6);
    border-radius:22px;
    padding:30px;
    box-shadow:0 20px 60px rgba(0,0,0,0.08);
}

/* HEADER */
.header{
    display:flex;
    gap:15px;
    align-items:center;
}

.header .icon{
    width:50px;
    height:50px;
    border-radius:14px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:22px;
    background:linear-gradient(135deg,#22c55e,#16a34a);
    color:#fff;
}

.header h2{
    margin:0;
    font-size:24px;
    font-weight:900;
    color:#0f172a;
}

.header p{
    margin:0;
    font-size:13px;
    color:#64748b;
}

/* DIVIDER */
.divider{
    margin:20px 0;
    height:1px;
    background:#e2e8f0;
}

/* INPUT */
.input-group{
    margin-bottom:18px;
}

.input-group label{
    display:block;
    font-weight:600;
    font-size:13px;
    margin-bottom:6px;
    color:#0f172a;
}

.input-group input{
    width:100%;
    padding:13px 14px;
    border-radius:14px;
    border:1px solid #e2e8f0;
    outline:none;
    transition:.25s;
}

.input-group input:focus{
    border-color:#22c55e;
    box-shadow:0 0 0 4px rgba(34,197,94,0.12);
}

.input-group small{
    font-size:12px;
    color:#94a3b8;
    margin-top:5px;
    display:block;
}

/* BUTTON */
.btn-primary{
    width:100%;
    margin-top:10px;
    padding:14px;
    border:none;
    border-radius:14px;
    font-weight:800;
    color:#fff;
    background:linear-gradient(135deg,#22c55e,#16a34a);
    transition:.2s;
}

.btn-primary:hover{
    transform:translateY(-2px);
    box-shadow:0 15px 30px rgba(34,197,94,0.25);
}

</style>

@endsection