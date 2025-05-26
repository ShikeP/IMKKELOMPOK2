<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body, html { margin: 0; padding: 0; background: #fafafa; font-family: 'Open Sans', sans-serif; }
        .container { max-width: 420px; margin: 0 auto; background: #fff; min-height: 100vh; box-shadow: 0 0 24px rgba(0,0,0,0.06); padding-bottom: 40px; }
        .header { padding: 24px 20px 0 20px; text-align: center; }
        .header-title { font-size: 1.5rem; font-family: 'Montserrat', sans-serif; font-weight: 700; }
        .admin-menu { display: flex; flex-direction: column; gap: 18px; margin: 32px 20px; }
        .admin-link { background: #ff7300; color: #fff; border-radius: 14px; padding: 18px; font-size: 1.1rem; font-weight: 700; text-align: center; text-decoration: none; transition: background 0.2s; }
        .admin-link:hover { background: #ff9100; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="header-title">Admin Dashboard</div>
        <div style="font-size:1rem;color:#888;margin-top:8px;">Kelola semua data aplikasi</div>
    </div>
    <div class="admin-menu">
        <a href="{{ route('admin.products.index') }}" class="admin-link">Manajemen Makanan</a>
        <a href="{{ route('admin.reviews.index') }}" class="admin-link">Manajemen Review</a>
        <a href="#" class="admin-link">Manajemen Pesanan</a>
        <a href="#" class="admin-link">Manajemen User</a>
    </div>
</div>
</body>
</html> 