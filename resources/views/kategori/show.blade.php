@extends('layouts.app')

@section('content')
@php use Illuminate\Support\Facades\Storage; @endphp
<div class="container py-5">

    <h2 class="fw-bold mb-4">
        🐾 Kategori: {{ $category->name }}
    </h2>

    @if($products->count() > 0)

        <div class="row g-4">

            @foreach($products as $product)
<div class="col-md-3">

    <div class="card shadow-sm border-0 h-100">

        @if($product->thumbnail)
            <img src="{{ asset('storage/' . $product->thumbnail) }}"
                 class="card-img-top"
                 style="height:200px; object-fit:cover;">
        @endif

        <div class="card-body">

            <h6 class="fw-bold">{{ $product->name }}</h6>

            <p class="text-success fw-bold">
                Rp {{ number_format($product->price) }}
            </p>

        </div>

    </div>

</div>
@endforeach

        </div>

    @else

        <div class="alert alert-warning">
            ❌ Tidak ada produk di kategori ini
        </div>

    @endif

</div>

@endsection