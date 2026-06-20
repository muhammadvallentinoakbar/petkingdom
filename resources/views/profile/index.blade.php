@extends('layouts.app')

@section('content')

<style>
.product-card{
    background:white;
    border-radius:14px;
    overflow:hidden;
    box-shadow:0 4px 12px rgba(0,0,0,.06);
    transition:.2s;
}

.product-card:hover{
    transform:translateY(-3px);
}

.product-img{
    width:100%;
    height:180px;
    object-fit:cover;
}

.product-body{
    padding:12px;
}

.price{
    color:#16a34a;
    font-weight:600;
}

.btn-cart{
    width:100%;
    background:#111827;
    color:white;
    border:none;
    padding:8px;
    border-radius:10px;
    margin-top:10px;
}

.btn-cart:hover{
    background:#16a34a;
}
</style>

<div class="container mt-4">

    <h3 class="mb-3">Produk Pet Shop</h3>

    <div class="row">

        @foreach($products as $product)

        <div class="col-md-3 mb-4">

            <div class="product-card">

                @if($product->thumbnail)
                    <img src="{{ asset('storage/'.$product->thumbnail) }}"
                         class="product-img">
                @else
                    <img src="https://via.placeholder.com/300x200"
                         class="product-img">
                @endif

                <div class="product-body">

                    <h6>{{ $product->name }}</h6>

                    <small class="text-muted">
                        {{ $product->category->name ?? '-' }}
                    </small>

                    <div class="price mt-1">
                        Rp {{ number_format($product->price) }}
                    </div>

                    <small>Stok: {{ $product->stock }}</small>

                    <form method="POST"
                          action="{{ route('cart.add', $product->id) }}">
                        @csrf

                        <button class="btn-cart">
                            + Add to Cart
                        </button>

                    </form>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection