<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Daftar Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Daftar Order Masuk</h2>
    <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary mb-3">← Kembali ke Menu</a>

    @if($orders->isEmpty())
        <div class="alert alert-info">Belum ada order masuk.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Menu Dipesan</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $index => $order)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $order->user->name ?? '-' }}</td>
                    <td>
                        <ul class="mb-0">
                            @foreach($order->items as $item)
                                <li>{{ $item->menu->nama_menu ?? '-' }} x{{ $item->jumlah }} = Rp {{ number_format($item->harga, 0, ',', '.') }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                    <td>
                        <span class="badge bg-{{ $order->status == 'paid' ? 'success' : 'warning' }}">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>