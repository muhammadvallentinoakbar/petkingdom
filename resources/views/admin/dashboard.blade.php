@extends('layouts.app')

@section('content')

<div class="container py-4">

    <!-- HEADER -->
    <div class="mb-4">
        <h3 class="fw-bold">🐾 Admin Dashboard</h3>
        <p class="text-muted">Ringkasan performa Pet Kingdom</p>
    </div>

    <!-- STAT CARDS -->
    <div class="row g-3">

        <div class="col-md-3">
            <div class="stat-card blue">
                <div class="label">Produk</div>
                <div class="value">{{ $totalProduct }}</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card green">
                <div class="label">Customer</div>
                <div class="value">{{ $totalCustomer ?? 0 }}</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card orange">
                <div class="label">Pesanan</div>
                <div class="value">{{ $totalOrder }}</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card red">
                <div class="label">Pendapatan</div>
                <div class="value">
                    Rp {{ number_format($totalIncome ?? 0) }}
                </div>
            </div>
        </div>

    </div>

    <!-- QUICK MENU -->
    <div class="card mt-4 border-0 shadow-sm rounded-4">

        <div class="card-body">

            <h5 class="fw-bold mb-3">⚡ Menu Cepat</h5>

            <div class="row g-3">

                <div class="col-md-3">
                    <a href="{{ route('products.index') }}" class="quick-card">
                        📦 <span>Produk</span>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('admin.orders.index') }}" class="quick-card">
                        🛒 <span>Pesanan</span>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('categories.index') }}" class="quick-card">
                        📂 <span>Kategori</span>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('brands.index') }}" class="quick-card">
                        🏷️ <span>Brand</span>
                    </a>
                </div>

            </div>

        </div>

    </div>

    <!-- LATEST ORDERS -->
    <div class="card mt-4 border-0 shadow-sm rounded-4">

        <div class="card-body">

            <h5 class="fw-bold mb-3">📋 Pesanan Terbaru</h5>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>Invoice</th>
                            <th>User</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($latestOrders ?? [] as $order)

                        <tr>

                            <td class="fw-semibold">
                                {{ $order->invoice }}
                            </td>

                            <td>
                                {{ $order->user->name ?? '-' }}
                            </td>

                            <td class="text-success fw-bold">
                                Rp {{ number_format($order->total) }}
                            </td>

                            <td>
                                <span class="badge bg-secondary px-3 py-2 rounded-pill">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                Belum ada pesanan
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<!-- STYLE MODERN -->
<style>

.stat-card{
    padding:18px;
    border-radius:16px;
    color:white;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    transition:.2s;
}

.stat-card:hover{
    transform:translateY(-4px);
}

.stat-card .label{
    font-size:13px;
    opacity:.9;
}

.stat-card .value{
    font-size:22px;
    font-weight:700;
    margin-top:5px;
}

/* COLORS SOFT */
    .blue{background:linear-gradient(135deg,#3B82F6,#2563EB);}
    .green{background:linear-gradient(135deg,#22C55E,#16A34A);}
    .orange{background:linear-gradient(135deg,#F59E0B,#D97706);}
    .red{background:linear-gradient(135deg,#EF4444,#DC2626);}

/* QUICK MENU */
.quick-card{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    padding:14px;
    border-radius:14px;
    background:#fff;
    text-decoration:none;
    color:#111;
    font-weight:600;
    box-shadow:0 4px 12px rgba(0,0,0,.06);
    transition:.2s;
}

.quick-card:hover{
    transform:translateY(-4px);
    box-shadow:0 12px 25px rgba(0,0,0,.1);
}

</style>

@endsection