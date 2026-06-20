@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="success-card text-center">

                <!-- ICON -->
                <div class="success-icon">
                    🎉
                </div>

                <!-- TITLE -->
                <h2 class="fw-bold mt-3">
                    Pembayaran Berhasil
                </h2>

                <p class="text-muted">
                    Terima kasih! Pesanan kamu sedang diproses.
                </p>

                <hr class="my-4">

                @if($order)

                    <!-- INVOICE -->
                    <div class="info-box">
                        <small class="text-muted">Invoice</small>
                        <h6 class="fw-bold mb-0">
                            {{ $order->invoice }}
                        </h6>
                    </div>

                    <!-- TOTAL -->
                    <div class="info-box mt-3">
                        <small class="text-muted">Total Pembayaran</small>
                        <h4 class="text-success fw-bold mb-0">
                            Rp {{ number_format($order->total) }}
                        </h4>
                    </div>

                    <!-- STATUS -->
                    <div class="mt-3">
                        <span class="badge-status">
                            ✔ {{ strtoupper($order->status ?? 'SUCCESS') }}
                        </span>
                    </div>

                @else

                    <p class="text-danger">
                        Data order tidak ditemukan
                    </p>

                @endif

                <!-- BUTTONS -->
                <div class="mt-4 d-grid gap-2">

                    <a href="{{ route('orders.index') }}"
                       class="btn btn-primary btn-lg">
                        📦 Lihat Pesanan
                    </a>

                    <a href="{{ route('shop.index') }}"
                       class="btn btn-outline-secondary">
                        🛍️ Lanjut Belanja
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

/* CARD */
.success-card{
    background:#fff;
    border-radius:20px;
    padding:35px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    border:1px solid #f1f5f9;
}

/* ICON */
.success-icon{
    width:80px;
    height:80px;
    margin:0 auto;
    background:linear-gradient(135deg,#22c55e,#16a34a);
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:32px;
    color:#fff;
}

/* INFO BOX */
.info-box{
    background:#f8fafc;
    padding:12px;
    border-radius:12px;
    border:1px solid #e2e8f0;
}

/* BADGE */
.badge-status{
    display:inline-block;
    padding:8px 14px;
    border-radius:999px;
    background:#dcfce7;
    color:#166534;
    font-weight:600;
    font-size:13px;
}

/* BUTTON */
.btn-primary{
    background:linear-gradient(135deg,#22c55e,#16a34a);
    border:none;
}

.btn-primary:hover{
    transform:translateY(-1px);
    box-shadow:0 10px 20px rgba(34,197,94,.25);
}

</style>

@endsection