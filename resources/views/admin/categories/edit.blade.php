@extends('layouts.app')

@section('content')

<div class="container py-4">

    <!-- HEADER -->
    <div class="mb-4">
        <h3 class="fw-bold">✏️ Edit Kategori</h3>
        <p class="text-muted">Perbarui data kategori produk</p>
    </div>

    <!-- CARD FORM -->
    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card border-0 shadow-sm rounded-3">

                <div class="card-body p-4">

                    <form action="{{ route('categories.update', $category) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <!-- NAMA -->
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Nama Kategori
                            </label>

                            <input type="text"
                                   name="name"
                                   value="{{ $category->name }}"
                                   class="form-control"
                                   placeholder="Contoh: Makanan Hewan">

                        </div>

                        <!-- DESKRIPSI -->
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Deskripsi
                            </label>

                            <textarea name="description"
                                      class="form-control"
                                      rows="4"
                                      placeholder="Deskripsi kategori...">{{ $category->description }}</textarea>

                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-between">

                            <a href="{{ route('categories.index') }}"
                               class="btn btn-light">
                                ← Kembali
                            </a>

                            <button class="btn btn-success px-4">
                                💾 Update Kategori
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection