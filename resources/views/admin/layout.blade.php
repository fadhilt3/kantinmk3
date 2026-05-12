<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin KantinKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f4f6f9; }
        .sidebar {
            min-height: 100vh;
            background: #2c3e50;
            color: white;
            width: 250px;
            position: fixed;
            top: 0; left: 0;
        }
        .sidebar .brand {
            padding: 20px;
            font-size: 1.3rem;
            font-weight: bold;
            background: #1a252f;
            border-bottom: 1px solid #3d5166;
        }
        .sidebar .nav-link {
            color: #b2bec3;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.2s;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: white;
            background: #3d5166;
            border-left: 4px solid #3498db;
        }
        .main-content {
            margin-left: 250px;
            padding: 30px;
        }
        .topbar {
            background: white;
            padding: 15px 30px;
            margin-left: 250px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .card { border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08); border-radius: 10px; }
        .btn { border-radius: 8px; }
        .table thead { background: #2c3e50; color: white; }
        .badge { border-radius: 6px; padding: 6px 10px; }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="brand">
        🍽️ KantinKu Admin
    </div>
    <nav class="mt-3">
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

<!-- Topbar -->
<div class="topbar d-flex justify-content-between align-items-center">
    <h5 class="mb-0">@yield('title')</h5>
    <span class="text-muted"><i class="bi bi-person-circle"></i> Admin</span>
</div>

<!-- Main Content -->
<div class="main-content">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>