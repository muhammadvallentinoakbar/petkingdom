@extends('layouts.app')

@section('content')

<div class="container py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-0">Data Brand</h3>
            <small class="text-muted">Kelola brand produk Pet Kingdom</small>
        </div>

        <a href="{{ route('brands.create') }}" class="btn btn-success">
            + Tambah Brand
        </a>

    </div>

    <!-- ALERT -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- TABLE CARD -->
    <div class="card border-0 shadow-sm rounded-3">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle table-hover">

                    <thead class="table-light">
                        <tr>
                            <th width="60">No</th>
                            <th>Nama Brand</th>
                            <th>Deskripsi</th>
                            <th width="180" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($brands as $brand)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td class="fw-semibold">
                                {{ $brand->name }}
                            </td>

                            <td class="text-muted">
                                {{ $brand->description ?? '-' }}
                            </td>

                            <td class="text-center">

                                <a href="{{ route('brands.edit', $brand->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('brands.destroy', $brand->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus brand ini?')">
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Belum ada data brand
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