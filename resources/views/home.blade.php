<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body, html { margin: 0; padding: 0; background: #fafafa; font-family: 'Open Sans', sans-serif; }
        .container { max-width: 420px; margin: 0 auto; background: #fff; min-height: 100vh; box-shadow: 0 0 24px rgba(0,0,0,0.06); }
        .header { padding: 24px 20px 0 20px; }
        .header h2 { margin: 0; font-size: 2rem; font-family: 'Montserrat', sans-serif; font-weight: 700; }
        .header span { color: #ff7300; }
        .search-bar { display: flex; gap: 8px; margin: 18px 0; }
        .search-bar input { flex: 1; padding: 12px; border-radius: 8px; border: 1px solid #eee; font-size: 1rem; }
        .search-bar button { background: #ff7300; color: #fff; border: none; border-radius: 8px; padding: 0 16px; font-size: 1.2rem; cursor: pointer; }
        .categories { display: flex; gap: 10px; margin: 18px 0; }
        .cat-btn { background: #fff3e0; color: #ff7300; border: none; border-radius: 18px; padding: 8px 18px; font-weight: 600; font-size: 1rem; cursor: pointer; }
        .cat-btn.active { background: #ff7300; color: #fff; }
        .section-title { font-family: 'Montserrat', sans-serif; font-size: 1.1rem; font-weight: 700; margin: 24px 0 10px 0; color: #222; }
        .offer-card { background: #fff3e0; border-radius: 18px; padding: 18px; display: flex; align-items: center; gap: 18px; margin-bottom: 18px; }
        .offer-card img { width: 90px; height: 90px; border-radius: 16px; object-fit: cover; }
        .offer-info { flex: 1; }
        .offer-title { font-size: 1.1rem; font-weight: 700; color: #222; }
        .offer-price { color: #ff7300; font-size: 1.2rem; font-weight: 700; }
        .offer-discount { color: #aaa; font-size: 0.95rem; text-decoration: line-through; margin-left: 8px; }
        .offer-btn { background: #fff; color: #ff7300; border: 2px solid #ff7300; border-radius: 18px; padding: 8px 18px; font-weight: 600; font-size: 1rem; cursor: pointer; margin-top: 8px; }
        .popular-list { display: flex; gap: 12px; overflow-x: auto; padding-bottom: 10px; }
        .food-card { background: #fff; border-radius: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); min-width: 140px; padding: 12px; text-align: center; }
        .food-card img { width: 80px; height: 80px; border-radius: 12px; object-fit: cover; }
        .food-name { font-weight: 600; margin: 8px 0 4px 0; }
        .food-price { color: #ff7300; font-weight: 700; }
        .bottom-nav { position: fixed; bottom: 0; left: 0; width: 100vw; max-width: 420px; background: #fff; border-top: 1px solid #eee; display: flex; justify-content: space-around; align-items: center; height: 60px; z-index: 10; }
        .bottom-nav a { color: #aaa; text-decoration: none; font-size: 0.95rem; display: flex; flex-direction: column; align-items: center; }
        .bottom-nav a.active { color: #ff7300; }
        .bottom-nav img { width: 22px; height: 22px; margin-bottom: 2px; }
    </style>
</head>
<body>
<div id="sidebar" style="position:fixed;top:0;left:-320px;width:320px;max-width:90vw;height:100vh;background:#ff7300;z-index:1000;transition:left 0.3s;box-shadow:2px 0 16px rgba(0,0,0,0.12);color:#fff;">
    <div style="padding:32px 0 16px 0;text-align:center;">
        <img src="https://randomuser.me/api/portraits/women/44.jpg" style="width:80px;height:80px;border-radius:50%;object-fit:cover;border:3px solid #fff;">
        <div style="font-size:1.2rem;font-weight:700;margin-top:8px;">{{ $user->name ?? 'Pengguna' }}</div>
        <div style="font-size:0.98rem;opacity:0.85;">({{ $user->email ?? '-' }})</div>
    </div>
    <a href="{{ route('profile.show') }}" style="display:block;padding:14px 32px;color:#fff;text-decoration:none;font-size:1.05rem;"><span style="margin-right:10px;">��</span> Profil</a>
    <a href="{{ route('cart.index') }}" style="display:block;padding:14px 32px;color:#fff;text-decoration:none;font-size:1.05rem;"><span style="margin-right:10px;">🛒</span> Pesanan Saya</a>
    <a href="#" style="display:block;padding:14px 32px;color:#fff;text-decoration:none;font-size:1.05rem;"><span style="margin-right:10px;">🔒</span> Kebijakan Privasi</a>
    <a href="#" style="display:block;padding:14px 32px;color:#fff;text-decoration:none;font-size:1.05rem;"><span style="margin-right:10px;">⚙️</span> Pengaturan</a>
    <a href="#" style="display:block;padding:14px 32px;color:#fff;text-decoration:none;font-size:1.05rem;"><span style="margin-right:10px;">❓</span> Bantuan</a>
    <form action="{{ route('logout') }}" method="POST" style="display:block;padding:0;margin:0;">
        @csrf
        <button type="submit" style="width:100%;background:none;border:none;padding:14px 32px;color:#fff;text-align:left;font-size:1.05rem;cursor:pointer;"><span style="margin-right:10px;">🚪</span> Keluar</button>
    </form>
    <button onclick="closeSidebar()" style="position:absolute;top:18px;right:18px;background:none;border:none;color:#fff;font-size:2rem;cursor:pointer;">&times;</button>
</div>
<div id="sidebarOverlay" onclick="closeSidebar()" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.25);z-index:999;"></div>
<div class="container">
    <div class="header">
        <div style="display:flex;justify-content:space-between;align-items:center;">
            <div>
                <button onclick="openSidebar()" style="background:none;border:none;font-size:2rem;color:#ff7300;cursor:pointer;margin-right:8px;">&#9776;</button>
                <div style="font-size:1.1rem;">Halo {{ $user->name ?? 'Pengguna' }},</div>
                <h2>Apa yang ingin kamu <span>makan?</span></h2>
            </div>
            <div>
                <a href="{{ route('cart.index') }}">
                    <img src="https://img.icons8.com/material-outlined/24/000000/shopping-cart--v2.png" style="width:28px;">
                </a>
            </div>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Cari nama makanan, misal: Nasi Padang Ayam">
            <button><img src="https://img.icons8.com/ios-filled/24/ffffff/search--v1.png" style="width:20px;"></button>
            <button><img src="https://img.icons8.com/ios-filled/24/ff7300/microphone.png" style="width:20px;"></button>
        </div>
        <div class="categories">
            <button class="cat-btn active">Makanan</button>
            <button class="cat-btn">Lauk</button>
            <button class="cat-btn">Camilan</button>
            <button class="cat-btn">Minuman</button>
        </div>
    </div>
    <div style="padding:0 20px;">
        <div class="section-title">Penawaran Spesial Hari Ini</div>
        @if($specialOffer)
        <div class="offer-card">
            <img src="{{ $specialOffer->image ?? 'https://via.placeholder.com/90' }}" alt="offer">
            <div class="offer-info">
                <div class="offer-title">{{ $specialOffer->title }}</div>
                <div class="offer-price">₦{{ number_format($specialOffer->price,0) }} <span class="offer-discount">@if($specialOffer->discount > 0) ₦{{ number_format($specialOffer->price + $specialOffer->discount,0) }} @endif</span></div>
                <button class="offer-btn">Tambah ke Keranjang</button>
            </div>
        </div>
        @endif
        <div class="section-title" style="display:flex;justify-content:space-between;align-items:center;">Populer Saat Ini <a href="#" style="font-size:0.95rem;color:#ff7300;font-weight:600;">LIHAT SEMUA MENU ></a></div>
        <div class="popular-list">
            @foreach($popularFoods as $food)
            <a href="{{ route('menu.show', $food->id) }}" style="text-decoration:none;color:inherit;">
            <div class="food-card">
                <img src="{{ $food->image ?? 'https://via.placeholder.com/80' }}" alt="food">
                <div class="food-name">{{ $food->name }}</div>
                <div class="food-price">Rp{{ number_format($food->price,0,',','.') }}</div>
            </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@include('partials.bottom_nav')
<script>
function openSidebar() {
    document.getElementById('sidebar').style.left = '0';
    document.getElementById('sidebarOverlay').style.display = 'block';
}
function closeSidebar() {
    document.getElementById('sidebar').style.left = '-320px';
    document.getElementById('sidebarOverlay').style.display = 'none';
}
</script>
</body>
</html> 