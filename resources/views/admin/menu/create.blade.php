@extends('admin.layout')

@section('title', 'Tambah Menu')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Menu Baru</h5>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.menu.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Menu</label>
                        <input type="text" name="nama_menu" class="form-control" placeholder="contoh: Nasi Goreng" value="{{ old('nama_menu') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" placeholder="contoh: 10000" value="{{ old('harga') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Stok</label>
                        <input type="number" name="stok" class="form-control" placeholder="contoh: 10" value="{{ old('stok') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Kategori</label>
                        <select name="kategori" class="form-control">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Nasi" {{ old('kategori') == 'Nasi' ? 'selected' : '' }}>Nasi</option>
                            <option value="Mie" {{ old('kategori') == 'Mie' ? 'selected' : '' }}>Mie</option>
                            <option value="Kuah" {{ old('kategori') == 'Kuah' ? 'selected' : '' }}>Kuah</option>
                            <option value="Lauk" {{ old('kategori') == 'Lauk' ? 'selected' : '' }}>Lauk</option>
                            <option value="Sayur" {{ old('kategori') == 'Sayur' ? 'selected' : '' }}>Sayur</option>
                            <option value="Minuman" {{ old('kategori') == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                            <option value="Snack" {{ old('kategori') == 'Snack' ? 'selected' : '' }}>Snack</option>
                        </select>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection