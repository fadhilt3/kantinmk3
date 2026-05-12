@extends('admin.layout')

@section('title', 'Manajemen Menu')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Daftar Menu Kantin</h4>
    <a href="{{ route('admin.menu.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Menu
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover mb-0">
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
                    <td>
                        <span class="badge bg-{{ $menu->stok > 0 ? 'success' : 'danger' }}">
                            {{ $menu->stok }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus menu ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection