@extends('layouts.app')

@section('title', '404 Not Found')

@section('content')
<div class="container py-5">
    <div class="text-center">

        <h1 class="display-1 fw-bold text-danger">
            404
        </h1>

        <h2 class="fw-bold mb-3">
            Halaman Tidak Ditemukan
        </h2>

        <p class="text-muted mb-4">
            Maaf, halaman yang Anda cari tidak tersedia atau Anda tidak memiliki akses.
        </p>

        <a href="{{ route('dashboard') }}" class="btn btn-primary">
            Kembali ke Dashboard
        </a>

    </div>
</div>
@endsection