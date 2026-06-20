@extends('layouts.app')

@section('content')

<div class="page">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="address-card">

                    <!-- HEADER -->
                    <div class="header">

                        <div class="icon">📍</div>

                        <div>
                            <h2>Alamat Pengiriman</h2>
                            <p>Kelola alamat untuk pengiriman pesanan Anda</p>
                        </div>

                    </div>

                    <div class="divider"></div>

                    <!-- FORM -->
                    <form method="POST" action="{{ route('profile.address.store') }}">
    @csrf

                        <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <textarea rows="4" placeholder="Contoh: Jl. Mawar No. 10, RT 01/RW 02, ..."></textarea>
                        </div>

                        <div class="grid">

                            <div class="form-group">
                                <label>Kota</label>
                                <input type="text" placeholder="Masukkan kota">
                            </div>

                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input type="text" placeholder="12345">
                            </div>

                        </div>

                        <button class="btn-save">
                            Simpan Alamat
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

/* BACKGROUND */
.page{
    min-height:100vh;
    background:
        radial-gradient(circle at top right, #dcfce7, transparent 40%),
        radial-gradient(circle at bottom left, #dbeafe, transparent 40%),
        #f8fafc;
}

/* CARD */
.address-card{
    background:#fff;
    border-radius:22px;
    padding:30px;
    box-shadow:0 20px 50px rgba(0,0,0,.08);
    border:1px solid #eef2f7;
}

/* HEADER */
.header{
    display:flex;
    gap:14px;
    align-items:center;
}

.header .icon{
    width:52px;
    height:52px;
    border-radius:14px;
    background:linear-gradient(135deg,#22c55e,#16a34a);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:22px;
    color:#fff;
}

.header h2{
    margin:0;
    font-size:22px;
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

/* FORM */
.form-group{
    margin-bottom:16px;
}

.form-group label{
    display:block;
    font-size:13px;
    font-weight:600;
    margin-bottom:6px;
    color:#0f172a;
}

.form-group input,
.form-group textarea{
    width:100%;
    padding:13px 14px;
    border-radius:14px;
    border:1px solid #e2e8f0;
    outline:none;
    transition:.2s;
    font-size:14px;
    background:#fff;
}

.form-group textarea{
    resize:none;
}

.form-group input:focus,
.form-group textarea:focus{
    border-color:#22c55e;
    box-shadow:0 0 0 4px rgba(34,197,94,.12);
}

/* GRID */
.grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:12px;
}

/* BUTTON */
.btn-save{
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

.btn-save:hover{
    transform:translateY(-2px);
    box-shadow:0 15px 30px rgba(34,197,94,.25);
}

/* RESPONSIVE */
@media(max-width:768px){
    .address-card{
        padding:22px;
    }

    .grid{
        grid-template-columns:1fr;
    }
}

</style>

@endsection