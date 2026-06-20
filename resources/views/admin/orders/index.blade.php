
@extends('layouts.app')

@section('content')

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

<div class="container py-4">

    <!-- HEADER -->
    <div class="mb-4">

        <h3 class="fw-bold">
            <i class="fas fa-box me-2"></i>
            Semua Pesanan
        </h3>

        <p class="text-muted">
            Kelola seluruh transaksi pelanggan
        </p>

    </div>

    <!-- SUCCESS -->
    @if(session('success'))

        <div class="alert alert-success border-0 shadow-sm rounded-4">

            <i class="fas fa-circle-check me-2"></i>

            {{ session('success') }}

        </div>

    @endif

    <!-- CARD -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle table-hover">

                    <thead class="table-light">

                        <tr>

                            <th>Invoice</th>
                            <th>User</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Update Status</th>
                            <th class="text-center">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($orders as $order)

                        <tr>

                            <!-- INVOICE -->
                            <td class="fw-semibold">
                                {{ $order->invoice ?? '-' }}
                            </td>

                            <!-- USER -->
                            <td>
                                {{ $order->user->name ?? '-' }}
                            </td>

                            <!-- TOTAL -->
                            <td class="fw-bold text-success">
                                Rp {{ number_format($order->total,0,',','.') }}
                            </td>

                            <!-- STATUS -->
                            <td>

                                @if($order->status == 'completed')

                                    <span class="badge bg-success">
                                        Completed
                                    </span>

                                @elseif($order->status == 'processing')

                                    <span class="badge bg-warning text-dark">
                                        Processing
                                    </span>

                                @elseif($order->status == 'shipped')

                                    <span class="badge bg-info">
                                        Shipped
                                    </span>

                                @elseif($order->status == 'pending')

                                    <span class="badge bg-secondary">
                                        Pending
                                    </span>

                                @else

                                    <span class="badge bg-dark">
                                        {{ ucfirst($order->status) }}
                                    </span>

                                @endif

                            </td>

                            <!-- UPDATE STATUS -->
                            <td>

                                <form action="{{ route('admin.orders.updateStatus', $order->id) }}"
                                      method="POST">

                                    @csrf

                                    <div class="d-flex gap-2">

                                        <select name="status"
                                                class="form-select form-select-sm">

                                            <option value="pending"
                                                {{ $order->status == 'pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>

                                            <option value="processing"
                                                {{ $order->status == 'processing' ? 'selected' : '' }}>
                                                Processing
                                            </option>

                                            <option value="shipped"
                                                {{ $order->status == 'shipped' ? 'selected' : '' }}>
                                                Shipped
                                            </option>

                                            <option value="completed"
                                                {{ $order->status == 'completed' ? 'selected' : '' }}>
                                                Completed
                                            </option>

                                        </select>

                                        <button type="submit"
                                                class="btn btn-primary btn-sm">

                                            <i class="fas fa-save"></i>

                                        </button>

                                    </div>

                                </form>

                            </td>

                            <!-- AKSI -->
                            <td class="text-center">

                                <div class="d-flex justify-content-center gap-2">

                                    <!-- DETAIL -->
                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                       class="btn btn-info btn-sm">

                                        <i class="fas fa-eye"></i>

                                    </a>

                                    <!-- HAPUS -->
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6"
                                class="text-center text-muted py-5">

                                <i class="fas fa-box-open fa-3x mb-3 d-block"></i>

                                Belum ada pesanan

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

