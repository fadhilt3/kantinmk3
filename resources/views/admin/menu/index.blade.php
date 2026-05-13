@extends('admin.layout')

@section('title', 'Manajemen Menu')

@section('content')

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        showToast("{{ session('success') }}", 'success');
    });
</script>
@endif

<div class="row mb-4 g-3">
    <div class="col-md-3">
        <div class="card p-3 text-center">
            <div class="stat-icon" style="background:#E8F5E9;">
                <i class="bi bi-people-fill" style="color:#1a7a4a; font-size:18px;"></i>
            </div>
            <div style="font-size:26px; font-weight:500; color:#1a1a1a;">{{ $totalUser }}</div>
            <div style="font-size:12px; color:#888;">Total User</div>
            <div style="font-size:11px; color:#1a7a4a; margin-top:4px;">Terdaftar</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 text-center">
            <div class="stat-icon" style="background:#E8F5E9;">
                <i class="bi bi-grid-fill" style="color:#1a7a4a; font-size:18px;"></i>
            </div>
            <div style="font-size:26px; font-weight:500; color:#1a1a1a;">{{ $totalMenu }}</div>
            <div style="font-size:12px; color:#888;">Total Menu</div>
            <div style="font-size:11px; color:#1a7a4a; margin-top:4px;">Tersedia</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 text-center">
            <div class="stat-icon" style="background:#FEF3C7;">
                <i class="bi bi-bag-fill" style="color:#92400E; font-size:18px;"></i>
            </div>
            <div style="font-size:26px; font-weight:500; color:#1a1a1a;">{{ $totalOrder }}</div>
            <div style="font-size:12px; color:#888;">Total Order</div>
            <div style="font-size:11px; color:#f59e0b; margin-top:4px;">Masuk</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 text-center">
            <div class="stat-icon" style="background:#E8F5E9;">
                <i class="bi bi-cash-stack" style="color:#1a7a4a; font-size:18px;"></i>
            </div>
            <div style="font-size:20px; font-weight:500; color:#1a1a1a;">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</div>
            <div style="font-size:12px; color:#888;">Total Pendapatan</div>
            <div style="font-size:11px; color:#1a7a4a; margin-top:4px;">Terbayar</div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0" style="color:#1a1a1a;">Daftar Menu Kantin</h5>
    <a href="{{ route('admin.menu.create') }}" class="btn btn-primary btn-sm px-4">
        <i class="bi bi-plus-circle"></i> Tambah Menu
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Kategori</th>
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
                        <span style="background:#E8F5E9; color:#1a7a4a; font-size:11px; padding:3px 10px; border-radius:20px;">
                            {{ $menu->kategori ?? '-' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <button class="btn btn-danger btn-sm" data-id="{{ $menu->id }}" data-nama="{{ $menu->nama_menu }}" onclick="konfirmasiHapus(this.dataset.id, this.dataset.nama)">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection