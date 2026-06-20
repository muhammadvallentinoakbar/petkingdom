@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="mb-4">
        <h3 class="fw-bold">💳 Pembayaran Order</h3>
        <p class="text-muted">Selesaikan pembayaran pesanan Anda</p>
    </div>

    <div class="row g-4">

        <!-- LEFT -->
        <div class="col-md-5">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">

                    <h5 class="fw-bold mb-3">Detail Pesanan</h5>

                    <div class="mb-2">
                        <small class="text-muted">Invoice</small><br>
                        <b>{{ $order->invoice }}</b>
                    </div>

                    <div class="mb-2">
                        <small class="text-muted">Total</small><br>
                        <b class="text-success fs-4">
                            Rp {{ number_format($order->total) }}
                        </b>
                    </div>

                    <span class="badge bg-warning text-dark">
                        Pending Payment
                    </span>

                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-7">

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">

                    <h5 class="fw-bold mb-3">Metode Pembayaran</h5>

                    <form method="POST"
                          action="{{ route('payment.upload', $order->id) }}"
                          enctype="multipart/form-data">

                        @csrf

                        <!-- SELECT METHOD -->
                        <select name="payment_method"
                                class="form-select mb-3"
                                onchange="togglePayment(this.value)"
                                required>

                            <option value="transfer">🏦 Transfer Bank</option>
                            <option value="qris">📱 QRIS</option>
                            <option value="cod">🚚 COD</option>

                        </select>

                        <!-- QRIS -->
                        @php
                            $qrData = $order->invoice.'|'.$order->total;
                            $qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=".urlencode($qrData);
                        @endphp

                        <div id="qrisBox" class="text-center mb-3" style="display:none;">
                            <h5>Scan QRIS</h5>
                            <img src="{{ $qrUrl }}" style="width:220px;border-radius:12px;">
                            <p class="text-muted">{{ $order->invoice }}</p>
                        </div>

                        <!-- BANK -->
                        <div id="bankBox" class="alert alert-info">
                            <b>Transfer Bank:</b><br>
                            BCA - 1234567890<br>
                            Mandiri - 12345678
                        </div>

                        <!-- COD INFO -->
                        <div id="codBox" class="alert alert-success" style="display:none;">
                            🚚 COD dipilih<br>
                            <b>Bayar saat barang diterima di alamat Anda</b>
                        </div>

                        <!-- UPLOAD -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Bukti Pembayaran
                            </label>

                            <input type="file"
                                   name="payment_proof"
                                   id="proofInput"
                                   class="form-control">

                            <small class="text-muted">
                                Tidak wajib untuk COD
                            </small>
                        </div>

                        <button class="btn btn-success w-100 py-2">
                            💾 Konfirmasi Pembayaran
                        </button>

                    </form>

                </div>
            </div>

        </div>

    </div>
</div>

<!-- SCRIPT -->
<script>
function togglePayment(method){

    const qrisBox = document.getElementById('qrisBox');
    const bankBox = document.getElementById('bankBox');
    const codBox = document.getElementById('codBox');
    const proof = document.getElementById('proofInput');

    if(method === 'qris'){
        qrisBox.style.display = 'block';
        bankBox.style.display = 'none';
        codBox.style.display = 'none';
        proof.required = true;
    }

    else if(method === 'transfer'){
        qrisBox.style.display = 'none';
        bankBox.style.display = 'block';
        codBox.style.display = 'none';
        proof.required = true;
    }

    else if(method === 'cod'){
        qrisBox.style.display = 'none';
        bankBox.style.display = 'none';
        codBox.style.display = 'block';
        proof.required = false;
    }
}
</script>

@endsection