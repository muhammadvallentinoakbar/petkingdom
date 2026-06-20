@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="mb-4">
        <h3 class="fw-bold">📦 Riwayat Pesanan</h3>
        <p class="text-muted">Semua transaksi kamu di Pet Kingdom</p>
    </div>

    @forelse($orders as $order)

    <div class="card border-0 shadow-sm rounded-4 mb-3 order-card">

        <div class="card-body">

            <!-- TOP -->
            <div class="d-flex justify-content-between align-items-center mb-2">

                <div>
                    <div class="fw-bold">
                        Order #{{ $order->id }}
                    </div>

                    <small class="text-muted">
                        {{ $order->created_at }}
                    </small>
                </div>

                <div class="text-end">

                    {{-- STATUS ORDER --}}
                    @if($order->status == 'completed')
                        <span class="badge bg-success">Completed</span>
                    @elseif($order->status == 'processing')
                        <span class="badge bg-warning text-dark">Processing</span>
                    @elseif($order->status == 'shipped')
                        <span class="badge bg-primary">Shipped</span>
                    @else
                        <span class="badge bg-secondary">
                            {{ strtoupper($order->status ?? 'pending') }}
                        </span>
                    @endif

                </div>

            </div>

            <hr>

            <!-- INFO -->
            <div class="row align-items-center">

                <div class="col-md-8">

                    <div class="text-muted">
                        Status Pengiriman:
                        <span class="fw-semibold text-dark">

                            {{-- INI FIX UTAMA --}}
                            {{ strtoupper($order->shipping_status ?? 'pending') }}

                        </span>
                    </div>

                    <div class="text-muted mt-1">
                        Status Pembayaran:
                        <span class="fw-semibold text-dark">
                            {{ strtoupper($order->payment_status ?? 'pending') }}
                        </span>
                    </div>

                    <div class="fw-bold text-success fs-5 mt-1">
                        Rp {{ number_format($order->total ?? 0) }}
                    </div>

                </div>

                <div class="col-md-4 text-end">

                    <a href="{{ route('orders.show', $order->id) }}"
                       class="btn btn-outline-primary btn-sm rounded-pill px-3">
                        📄 Detail
                    </a>

                </div>

            </div>

        </div>

    </div>

    @empty

    <div class="text-center py-5 text-muted">
        <h5>Belum ada pesanan 😢</h5>
        <p>Mulai belanja sekarang di Pet Kingdom</p>
    </div>

    @endforelse

</div>

<style>

.order-card{
    transition:.2s;
    border-radius:16px;
}

.order-card:hover{
    transform:translateY(-4px);
    box-shadow:0 12px 30px rgba(0,0,0,.08);
}

</style>

@endsection