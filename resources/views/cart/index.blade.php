@extends('layouts.app')

@section('content')

<style>
.cart-item{
    background:white;
    border-radius:14px;
    padding:15px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    margin-bottom:12px;
    box-shadow:0 4px 12px rgba(0,0,0,.05);
}

.cart-left{
    display:flex;
    align-items:center;
    gap:15px;
}

.cart-img{
    width:70px;
    height:70px;
    object-fit:cover;
    border-radius:10px;
}

.qty-box input{
    width:60px;
    text-align:center;
    border-radius:8px;
}

.summary{
    background:white;
    padding:18px;
    border-radius:14px;
    box-shadow:0 4px 12px rgba(0,0,0,.05);
    position:sticky;
    top:20px;
}

.summary-row{
    display:flex;
    justify-content:space-between;
    margin-bottom:10px;
    font-size:14px;
}

.summary-total{
    font-size:18px;
    font-weight:800;
    color:#16a34a;
}

.btn-checkout{
    width:100%;
    background:#16a34a;
    color:white;
    border:none;
    padding:12px;
    border-radius:10px;
    font-weight:700;
}
</style>

<div class="container mt-4">

    <h3 class="mb-3">Keranjang Saya</h3>

    <div class="row">

        <!-- LIST ITEM -->
        <div class="col-md-8">

            @forelse($carts as $cart)

                @php
                    $price = $cart->product->price ?? 0;
                    $qty = $cart->quantity;
                    $totalItem = $price * $qty;
                @endphp

                <div class="cart-item">

                    <div class="cart-left">

                        <img src="{{ asset('storage/'.$cart->product->thumbnail) }}"
                             class="cart-img">

                        <div>
                            <h6 class="mb-1">{{ $cart->product->name ?? '-' }}</h6>
                            <small class="text-muted">
                                Rp {{ number_format($price) }} x {{ $qty }}
                            </small>
                        </div>

                    </div>

                    <div class="qty-box">

                        <form action="{{ route('cart.update', $cart->id) }}" method="POST">
                            @csrf

                            <input type="number"
                                   name="quantity"
                                   value="{{ $qty }}"
                                   min="1">

                            <button class="btn btn-sm btn-dark">
                                Update
                            </button>
                        </form>

                    </div>

                    <div>
                        <b>Rp {{ number_format($totalItem) }}</b>
                    </div>

                    <form action="{{ route('cart.delete', $cart->id) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>

                </div>

            @empty
                <p class="text-muted">Keranjang masih kosong</p>
            @endforelse

        </div>

        <!-- SUMMARY -->
        <div class="col-md-4">

            <div class="summary">

                <h5 class="mb-3">Rincian Belanja</h5>

                <!-- SUBTOTAL -->
                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>Rp {{ number_format($subtotal) }}</span>
                </div>

                <!-- ONGKIR -->
                <div class="summary-row">
                    <span>Ongkir</span>
                    <span>Rp {{ number_format($shipping) }}</span>
                </div>

                <hr>

                <!-- TOTAL -->
                <div class="summary-row summary-total">
                    <span>Total</span>
                    <span>Rp {{ number_format($total) }}</span>
                </div>

                <form action="{{ route('checkout') }}" method="POST">
                    @csrf

                    <button class="btn-checkout mt-3">
                        Checkout
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection