@extends('admin.layout')

@section('title', 'Edit Menu')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="bi bi-pencil"></i> Edit Menu</h5>
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

                <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Menu</label>
                        <input type="text" name="nama_menu" class="form-control" value="{{ $menu->nama_menu }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" value="{{ $menu->harga }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Stok</label>
                        <input type="number" name="stok" class="form-control" value="{{ $menu->stok }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Kategori</label>
                        <select name="kategori" class="form-control">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Nasi" {{ $menu->kategori == 'Nasi' ? 'selected' : '' }}>Nasi</option>
                            <option value="Mie" {{ $menu->kategori == 'Mie' ? 'selected' : '' }}>Mie</option>
                            <option value="Kuah" {{ $menu->kategori == 'Kuah' ? 'selected' : '' }}>Kuah</option>
                            <option value="Lauk" {{ $menu->kategori == 'Lauk' ? 'selected' : '' }}>Lauk</option>
                            <option value="Sayur" {{ $menu->kategori == 'Sayur' ? 'selected' : '' }}>Sayur</option>
                            <option value="Minuman" {{ $menu->kategori == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                            <option value="Snack" {{ $menu->kategori == 'Snack' ? 'selected' : '' }}>Snack</option>
                        </select>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection