<!DOCTYPE html>
<html>
<head>
    <title>Detail Order</title>

    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .invoice {
            font-size: 18px;
            font-weight: bold;
            color: #2563EB;
        }

        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            color: white;
            font-size: 12px;
            text-transform: uppercase;
        }

        .pending { background: orange; }
        .processing { background: blue; }
        .completed { background: green; }
        .cancelled { background: red; }
        .shipped { background: purple; }

        .product {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .product:last-child {
            border-bottom: none;
        }

        .right {
            text-align: right;
        }

        .btn {
            padding: 10px 15px;
            background: #2563EB;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-success {
            background: #16a34a;
        }

    </style>
</head>
<body>

<div class="container">

    <!-- HEADER -->
    <div class="card">

        <div class="header">

            <div class="invoice">
                Invoice: {{ $order->invoice ?? 'INV-'.$order->id }}
            </div>

            <div class="badge {{ strtolower($order->status ?? 'pending') }}">
                {{ strtoupper($order->status ?? 'pending') }}
            </div>

        </div>

        <hr>

        <p><b>Total Order:</b> Rp {{ number_format($order->total ?? 0) }}</p>

        <p><b>Pembayaran:</b> {{ strtoupper($order->payment_status ?? 'pending') }}</p>

        <p><b>Pengiriman:</b> {{ strtoupper($order->shipping_status ?? 'processing') }}</p>

        <p><b>Kurir:</b> {{ $order->courier ?? '-' }}</p>

        <p><b>No Resi:</b> {{ $order->tracking_number ?? 'Belum tersedia' }}</p>

    </div>

    <!-- PRODUCT LIST -->
    <div class="card">

        <h3>📦 Produk yang Dibeli</h3>

        @forelse($order->items as $item)
        <div class="product">

            <div>
                <b>{{ $item->product->name ?? 'Produk tidak tersedia' }}</b>
                <p>Qty: {{ $item->quantity ?? 0 }}</p>
            </div>

            <div class="right">
                <p>Rp {{ number_format($item->price ?? 0) }}</p>
                <p>
                    Subtotal:
                    Rp {{ number_format(($item->price ?? 0) * ($item->quantity ?? 0)) }}
                </p>
            </div>

        </div>
        @empty
            <p style="color:red;">Tidak ada produk dalam order ini</p>
        @endforelse

    </div>

    <!-- ACTION -->
    <div class="card" style="text-align:right;">

        <!-- 🚚 TRACKING BUTTON -->
        <a href="{{ route('orders.tracking', $order->id) }}"
           class="btn btn-success">

            🚚 Lihat Tracking

        </a>

        <!-- 💬 BUTTON -->
        <button class="btn">
            💬 Hubungi Admin
        </button>

    </div>

</div>

</body>
</html>