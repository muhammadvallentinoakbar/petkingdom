@extends('layouts.app')

@section('content')

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

<div class="container py-5">

    <!-- HEADER -->
    <div class="tracking-header">

        <div>
            <h2>
                <i class="fas fa-truck-fast me-2"></i>
                Tracking Pesanan
            </h2>

            <p>
                Pantau status dan perjalanan pesanan Anda secara real-time
            </p>
        </div>

        <div class="invoice-badge">
            {{ $order->invoice }}
        </div>

    </div>

    <!-- MAIN CARD -->
    <div class="tracking-card">

        <!-- STATUS -->
        <div class="status-box">

            @php
                $shippingStatus = strtoupper($order->shipping_status ?? 'PROCESSING');
            @endphp

            <span class="status-badge">
                {{ $shippingStatus }}
            </span>

        </div>

        <!-- TIMELINE -->
        <div class="timeline-wrapper">

            <!-- ORDER -->
            <div class="timeline-item done">

                <div class="timeline-icon">
                    <i class="fas fa-cart-shopping"></i>
                </div>

                <div class="timeline-title">
                    Order Dibuat
                </div>

                <small>
                    Pesanan berhasil dibuat
                </small>

            </div>

            <div class="timeline-line"></div>

            <!-- PAYMENT -->
            <div class="timeline-item {{ $order->payment_status == 'paid' ? 'done' : '' }}">

                <div class="timeline-icon">
                    <i class="fas fa-credit-card"></i>
                </div>

                <div class="timeline-title">
                    Pembayaran
                </div>

                <small>
                    {{ strtoupper($order->payment_status ?? 'PENDING') }}
                </small>

            </div>

            <div class="timeline-line"></div>

            <!-- PROCESS -->
            <div class="timeline-item {{ in_array($order->status,['processing','completed']) ? 'done' : '' }}">

                <div class="timeline-icon">
                    <i class="fas fa-box-open"></i>
                </div>

                <div class="timeline-title">
                    Diproses
                </div>

                <small>
                    {{ strtoupper($order->status ?? 'PROCESSING') }}
                </small>

            </div>

            <div class="timeline-line"></div>

            <!-- SHIPPING -->
            <div class="timeline-item {{ in_array($order->shipping_status,['shipped','delivered']) ? 'done' : '' }}">

                <div class="timeline-icon">
                    <i class="fas fa-truck"></i>
                </div>

                <div class="timeline-title">
                    Dikirim
                </div>

                <small>
                    {{ strtoupper($order->shipping_status ?? 'PROCESSING') }}
                </small>

            </div>

            <div class="timeline-line"></div>

            <!-- DELIVERED -->
            <div class="timeline-item {{ $order->shipping_status == 'delivered' ? 'done' : '' }}">

                <div class="timeline-icon">
                    <i class="fas fa-circle-check"></i>
                </div>

                <div class="timeline-title">
                    Selesai
                </div>

                <small>
                    Pesanan diterima
                </small>

            </div>

        </div>

    </div>

    <!-- DETAIL -->
    <div class="row g-4 mt-3">

        <div class="col-md-6">

            <div class="info-card">

                <div class="info-icon">
                    <i class="fas fa-truck"></i>
                </div>

                <div>
                    <small>Kurir Pengiriman</small>
                    <h5>{{ $order->courier ?? '-' }}</h5>
                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="info-card">

                <div class="info-icon">
                    <i class="fas fa-location-dot"></i>
                </div>

                <div>
                    <small>Nomor Resi</small>
                    <h5>{{ $order->tracking_number ?? 'Belum tersedia' }}</h5>
                </div>

            </div>

        </div>

    </div>

</div>

<style>

body{
    background:#f8fafc;
}

/* HEADER */

.tracking-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
    flex-wrap:wrap;
    gap:20px;
}

.tracking-header h2{
    font-weight:800;
    color:#0f172a;
    margin-bottom:5px;
}

.tracking-header p{
    margin:0;
    color:#64748b;
}

.invoice-badge{
    background:linear-gradient(135deg,#22c55e,#16a34a);
    color:white;
    padding:14px 24px;
    border-radius:50px;
    font-weight:700;
    box-shadow:0 10px 25px rgba(34,197,94,.25);
}

/* MAIN CARD */

.tracking-card{
    background:white;
    border-radius:32px;
    padding:40px;
    box-shadow:0 15px 50px rgba(0,0,0,.08);
    border:1px solid #eef2f7;
}

/* STATUS */

.status-box{
    text-align:center;
    margin-bottom:40px;
}

.status-badge{
    background:linear-gradient(135deg,#22c55e,#16a34a);
    color:white;
    padding:14px 30px;
    border-radius:50px;
    font-weight:700;
    letter-spacing:.5px;
}

/* TIMELINE */

.timeline-wrapper{
    display:flex;
    align-items:center;
    justify-content:space-between;
}

.timeline-item{
    text-align:center;
    opacity:.35;
    transition:.4s;
    max-width:150px;
}

.timeline-item.done{
    opacity:1;
}

.timeline-icon{
    width:70px;
    height:70px;
    border-radius:50%;
    background:#e5e7eb;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto;
    margin-bottom:12px;
    font-size:24px;
    transition:.4s;
}

.timeline-item.done .timeline-icon{
    background:linear-gradient(135deg,#22c55e,#16a34a);
    color:white;
    box-shadow:0 10px 25px rgba(34,197,94,.35);
}

.timeline-title{
    font-weight:700;
    margin-bottom:5px;
    color:#0f172a;
}

.timeline-item small{
    color:#64748b;
}

.timeline-line{
    flex:1;
    height:4px;
    background:#e5e7eb;
    border-radius:50px;
    margin:0 15px;
}

/* INFO CARD */

.info-card{
    background:white;
    border-radius:24px;
    padding:25px;
    display:flex;
    align-items:center;
    gap:18px;
    box-shadow:0 10px 25px rgba(0,0,0,.05);
    border:1px solid #eef2f7;
    height:100%;
}

.info-card h5{
    margin:0;
    font-weight:700;
}

.info-card small{
    color:#64748b;
}

.info-icon{
    width:65px;
    height:65px;
    border-radius:20px;
    background:#dcfce7;
    color:#16a34a;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
}

/* RESPONSIVE */

@media(max-width:992px){

.timeline-wrapper{
    flex-direction:column;
    gap:25px;
}

.timeline-line{
    width:4px;
    height:45px;
    margin:0;
}

.timeline-item{
    max-width:none;
}

}

</style>

@endsection