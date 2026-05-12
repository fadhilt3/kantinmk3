@extends('admin.layout')

@section('title', 'Daftar Pembayaran')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Daftar Pembayaran</h4>
</div>

<div class="card">
    <div class="card-body">
        @if($payments->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-credit-card" style="font-size: 3rem;"></i>
                <p class="mt-2">Belum ada pembayaran.</p>
            </div>
        @else
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Menu Dipesan</th>
                        <th>Jumlah Bayar</th>
                        <th>Status</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $index => $payment)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $payment->order->user->name ?? '-' }}</td>
                        <td>
                            <ul class="mb-0 ps-3">
                                @foreach($payment->order->items as $item)
                                    <li>{{ $item->menu->nama_menu ?? '-' }} x{{ $item->jumlah }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>Rp {{ number_format($payment->jumlah_bayar, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge bg-success">
                                {{ $payment->status }}
                            </span>
                        </td>
                        <td>{{ $payment->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection