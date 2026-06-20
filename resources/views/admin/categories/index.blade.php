@extends('layouts.app')

@section('content')

<div class="container py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-0">Kategori Produk</h3>
            <small class="text-muted">Kelola kategori produk Pet Kingdom</small>
        </div>

        <a href="{{ route('categories.create') }}" class="btn btn-success">
            + Tambah Kategori
        </a>

    </div>

    <!-- TABLE CARD -->
    <div class="card border-0 shadow-sm rounded-3">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th width="80">ID</th>
                            <th>Nama Kategori</th>
                            <th>Slug</th>
                            <th width="180" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($categories as $category)

                        <tr>

                            <td>{{ $category->id }}</td>

                            <td class="fw-semibold">
                                {{ $category->name }}
                            </td>

                            <td class="text-muted">
                                {{ $category->slug }}
                            </td>

                            <td class="text-center">

                                <a href="{{ route('categories.edit', $category) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('categories.destroy', $category) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus kategori ini?')">
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Belum ada kategori
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection