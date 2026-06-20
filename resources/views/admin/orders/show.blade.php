@extends('layouts.app')

@section('content')

<div class="container py-4">

    <!-- HEADER -->
    <div class="mb-4">
        <h3 class="fw-bold">📦 Detail Order</h3>
        <p class="text-muted">Invoice: {{ $order->invoice }}</p>
    </div>

    <div class="row g-4">

        <!-- LEFT: ORDER INFO -->
        <div class="col-md-5">

            <div class="card border-0 shadow-sm rounded-3 mb-3">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">Informasi Order</h5>

                    <p class="mb-1"><b>Invoice:</b> {{ $order->invoice }}</p>

                    <p class="mb-1">
                        <b>Total:</b>
                        <span class="text-success fw-bold">
                            Rp {{ number_format($order->total) }}
                        </span>
                    </p>

                    <p class="mb-1">
                        <b>Status Order:</b> {{ $order->status }}
                    </p>

                    <p class="mb-1">
                        <b>Pembayaran:</b>
                        {{ strtoupper($order->payment_status ?? 'pending') }}
                    </p>

                    <p class="mb-0">
                        <b>Pengiriman:</b>
                        {{ strtoupper($order->shipping_status ?? 'processing') }}
                    </p>

                </div>

            </div>

            <!-- PAYMENT -->
            <div class="card border-0 shadow-sm rounded-3">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">💳 Pembayaran</h5>

                    @if($order->payment_proof)

                        <img src="{{ asset('storage/'.$order->payment_proof) }}"
                             class="img-fluid rounded mb-3">

                    @else

                        <div class="alert alert-warning">
                            Belum ada bukti pembayaran
                        </div>

                    @endif

                    <form method="POST"
                          action="{{ route('admin.orders.paymentStatus', $order->id) }}">

                        @csrf

                        <label class="form-label">Status Pembayaran</label>

                        <select name="payment_status" class="form-select mb-3">

                            <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>
                                Paid
                            </option>

                            <option value="rejected" {{ $order->payment_status == 'rejected' ? 'selected' : '' }}>
                                Rejected
                            </option>

                        </select>

                        <button class="btn btn-success w-100">
                            ✔ Update Pembayaran
                        </button>

                    </form>

                </div>

            </div>

        </div>

        <!-- RIGHT: SHIPPING -->
        <div class="col-md-7">

            <div class="card border-0 shadow-sm rounded-3">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">🚚 Pengiriman</h5>

                    <form method="POST"
                          action="{{ route('admin.orders.shipping', $order->id) }}">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">Status Pengiriman</label>

                            <select name="shipping_status" class="form-select">

                                <option value="processing" {{ $order->shipping_status == 'processing' ? 'selected' : '' }}>
                                    Processing
                                </option>

                                <option value="packed" {{ $order->shipping_status == 'packed' ? 'selected' : '' }}>
                                    Packed
                                </option>

                                <option value="shipped" {{ $order->shipping_status == 'shipped' ? 'selected' : '' }}>
                                    Shipped
                                </option>

                                <option value="delivered" {{ $order->shipping_status == 'delivered' ? 'selected' : '' }}>
                                    Delivered
                                </option>

                            </select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Kurir</label>

                            <input type="text"
                                   name="courier"
                                   class="form-control"
                                   value="{{ $order->courier }}"
                                   placeholder="JNE / J&T / SiCepat">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">No Resi</label>

                            <input type="text"
                                   name="tracking_number"
                                   class="form-control"
                                   value="{{ $order->tracking_number }}"
                                   placeholder="Masukkan nomor resi">

                        </div>

                        <button class="btn btn-primary w-100">
                            💾 Update Pengiriman
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection