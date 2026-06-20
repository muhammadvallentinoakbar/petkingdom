@extends('layouts.app')

@section('content')

<div class="container py-4">

    <!-- HEADER -->
    <div class="mb-4">
        <h3 class="fw-bold">🏷️ Edit Brand</h3>
        <p class="text-muted">Perbarui informasi brand produk</p>
    </div>

    <!-- FORM CARD -->
    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card border-0 shadow-sm rounded-3">

                <div class="card-body p-4">

                    <form action="{{ route('brands.update', $brand->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <!-- NAMA BRAND -->
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Nama Brand
                            </label>

                            <input type="text"
                                   name="name"
                                   value="{{ $brand->name }}"
                                   class="form-control"
                                   placeholder="Contoh: Royal Canin"
                                   required>

                        </div>

                        <!-- DESKRIPSI -->
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Deskripsi
                            </label>

                            <textarea name="description"
                                      class="form-control"
                                      rows="4"
                                      placeholder="Deskripsi brand...">{{ $brand->description }}</textarea>

                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-between">

                            <a href="{{ route('brands.index') }}"
                               class="btn btn-light">
                                ← Kembali
                            </a>

                            <button class="btn btn-primary px-4">
                                💾 Update Brand
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection