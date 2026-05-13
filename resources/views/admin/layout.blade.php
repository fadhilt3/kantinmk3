<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin KantinKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * { font-family: 'Segoe UI', sans-serif; }
        body { background: #FAFAFA; }
        .sidebar {
            min-height: 100vh;
            background: #fff;
            width: 250px;
            position: fixed;
            top: 0; left: 0;
            border-right: 0.5px solid #e0e0e0;
        }
        .sidebar .brand {
            padding: 20px;
            font-size: 1.1rem;
            font-weight: 600;
            color: #1a7a4a;
            border-bottom: 0.5px solid #e0e0e0;
        }
        .sidebar .nav-link {
            color: #555;
            padding: 11px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.2s;
            text-decoration: none;
            font-size: 13px;
            margin: 2px 8px 2px 0;
            border-radius: 0 20px 20px 0;
        }
        .sidebar .nav-link:hover {
            background: #f1f8f4;
            color: #1a7a4a;
        }
        .sidebar .nav-link.active {
            background: #E8F5E9;
            color: #1a7a4a;
            font-weight: 500;
        }
        .main-content { margin-left: 250px; padding: 24px 30px; }
        .topbar {
            background: #1a7a4a;
            padding: 14px 30px;
            margin-left: 250px;
            position: sticky;
            top: 0;
            z-index: 100;
            border-radius: 0 0 12px 0;
        }
        .card {
            border: 0.5px solid #e0e0e0;
            box-shadow: none;
            border-radius: 12px;
        }
        .stat-icon {
            width: 36px; height: 36px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 8px;
        }
        .table thead { background: #1a7a4a; color: white; }
        .table thead th { border: none; padding: 12px 16px; font-weight: 500; }
        .table tbody td { padding: 11px 16px; vertical-align: middle; border-color: #f5f5f5; }
        .table tbody tr:hover { background: #f1f8f4; }
        .badge { border-radius: 20px; padding: 5px 12px; font-weight: 500; }
        .btn-primary { background: #1a7a4a; border-color: #1a7a4a; border-radius: 20px; }
        .btn-primary:hover { background: #145c38; border-color: #145c38; }
        .btn-warning { background: white; color: #f59e0b; border: 0.5px solid #f59e0b; border-radius: 20px; }
        .btn-warning:hover { background: #FEF3C7; color: #92400E; }
        .btn-danger { background: white; color: #E24B4A; border: 0.5px solid #E24B4A; border-radius: 20px; }
        .btn-danger:hover { background: #FEE2E2; color: #991B1B; }
        .btn-secondary { border-radius: 20px; }
        .modal-content { border-radius: 16px; border: none; box-shadow: 0 8px 32px rgba(0,0,0,0.12); }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="brand">🍽️ KantinKu Admin</div>
    <nav class="mt-2">
        <a href="{{ route('admin.menu.index') }}" class="nav-link {{ request()->routeIs('admin.menu.*') ? 'active' : '' }}">
            <i class="bi bi-grid-fill"></i> Manajemen Menu
        </a>
        <a href="{{ route('admin.order.index') }}" class="nav-link {{ request()->routeIs('admin.order.*') ? 'active' : '' }}">
            <i class="bi bi-bag-check-fill"></i> Daftar Order
        </a>
        <a href="{{ route('admin.payment.index') }}" class="nav-link {{ request()->routeIs('admin.payment.*') ? 'active' : '' }}">
            <i class="bi bi-credit-card-fill"></i> Pembayaran
        </a>
    </nav>
</div>

<div class="topbar d-flex justify-content-between align-items-center">
    <h5 class="mb-0" style="color:white; font-weight:500;">@yield('title')</h5>
    <span style="color:#a8d5bc; font-size:13px;"><i class="bi bi-person-circle"></i> Admin</span>
</div>

<div class="main-content">
    @yield('content')
</div>

<!-- Toast Container -->
<div id="toast-container" style="position:fixed; top:20px; right:20px; z-index:9999; display:flex; flex-direction:column; gap:8px;"></div>

<!-- Modal Hapus -->
<div class="modal fade" id="modalHapus" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-2">
            <div class="modal-body p-4">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div style="width:52px; height:52px; border-radius:50%; background:#FEE2E2; display:flex; align-items:center; justify-content:center;">
                        <i class="bi bi-trash-fill" style="font-size:22px; color:#E24B4A;"></i>
                    </div>
                    <div>
                        <div style="font-size:16px; font-weight:600; color:#1a1a1a;">Hapus menu ini?</div>
                        <div id="modal-nama-menu" style="font-size:13px; color:#888;"></div>
                    </div>
                </div>
                <p style="font-size:13px; color:#888; margin-bottom:20px;">Tindakan ini tidak dapat dibatalkan. Menu akan dihapus permanen dari database.</p>
                <div class="d-flex justify-content-end gap-2">
                    <button class="btn btn-secondary btn-sm px-4" data-bs-dismiss="modal">Batal</button>
                    <form id="form-hapus" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm px-4" style="background:#E24B4A; color:white; border-radius:20px;">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function showToast(message, type = 'success') {
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');
    const bg = type === 'success' ? '#E8F5E9' : '#FEE2E2';
    const border = type === 'success' ? '#1a7a4a' : '#E24B4A';
    const color = type === 'success' ? '#145c38' : '#991B1B';
    const icon = type === 'success' ? 'bi-check-circle-fill' : 'bi-x-circle-fill';

    toast.innerHTML = `
        <div style="background:${bg}; border:1px solid ${border}; border-radius:12px; padding:14px 18px; display:flex; align-items:center; gap:10px; min-width:260px; box-shadow:0 4px 16px rgba(0,0,0,0.1);">
            <i class="bi ${icon}" style="font-size:20px; color:${color};"></i>
            <span style="font-size:13px; font-weight:500; color:${color};">${message}</span>
        </div>`;
    container.appendChild(toast);
    setTimeout(() => toast.remove(), 3000);
}

function konfirmasiHapus(id, nama) {
    document.getElementById('modal-nama-menu').innerText = nama;
    document.getElementById('form-hapus').action = '/admin/menu/' + id;
    new bootstrap.Modal(document.getElementById('modalHapus')).show();
}
</script>
</body>
</html>