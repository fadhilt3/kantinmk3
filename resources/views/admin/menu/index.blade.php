<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Daftar Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Daftar Menu Kantin</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.menu.create') }}" class="btn btn-primary mb-3">+ Tambah Menu</a>
    <a href="{{ route('admin.order.index') }}" class="btn btn-info mb-3">📋 Lihat Order</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $index => $menu)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $menu->nama_menu }}</td>
                <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                <td>{{ $menu->stok }}</td>
                <td>
                    <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus menu ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>