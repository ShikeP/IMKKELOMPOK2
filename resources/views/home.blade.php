@include('partials.sidebar')
@include('partials.checkout_panel')
@include('partials.cart_panel')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body, html { margin: 0; padding: 0; background: #fafafa; font-family: 'Open Sans', sans-serif; padding-left: 120px; }
        .container { max-width: 100%; margin: 0 auto; background: #fff; min-height: 100vh; box-shadow: none; padding: 32px; }
        .header { padding: 24px 20px 0 20px; }
        .header h2 { margin: 0; font-size: 2rem; font-family: 'Montserrat', sans-serif; font-weight: 700; }
        .header span { color: #ff7300; }
        .search-bar { display: flex; gap: 8px; margin: 18px 0; }
        .search-bar input { flex: 1; padding: 12px; border-radius: 8px; border: 1px solid #eee; font-size: 1rem; }
        .search-bar button { background: none; color: #fff; border: none; border-radius: 8px; padding: 0; font-size: 1.2rem; cursor: pointer; }
        .categories { display: flex; gap: 10px; margin: 18px 0; }
        .cat-btn { background: #f0f0f0; color: #333; border: none; border-radius: 18px; padding: 8px 18px; font-weight: 600; font-size: 1rem; cursor: pointer; }
        .cat-btn.active { background: #ff7300; color: #fff; }
        .section-title { font-family: 'Montserrat', sans-serif; font-size: 1.1rem; font-weight: 700; margin: 24px 0 10px 0; color: #222; }
        .food-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 18px; padding-bottom: 10px; }
        .food-card { background: #fff; border-radius: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); width: 150px; padding: 12px; text-align: center; display: flex; flex-direction: column; align-items: center; border: 1px solid #e0e0e0; padding-bottom: 12px;}
        .food-card img { width: 100px; height: 100px; border-radius: 12px; object-fit: cover; margin-bottom: 12px; }
        .food-name { font-weight: 600; margin: 8px 0 4px 0; font-size: 1rem; }
        .food-price { color: #ff7300; font-weight: 700; font-size: 1rem; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <div style="display:flex;justify-content:space-between;align-items:center;">
            <h2 style="font-size:1.5rem;display:flex;align-items:center;"><img src="https://img.icons8.com/ios-filled/24/000000/home.png" style="width:24px;margin-right:8px;">Home</h2>
            <div>
                <a href="#" onclick="openCartPanel();return false;">
                    <img src="https://img.icons8.com/material-outlined/24/000000/shopping-cart--v2.png" style="width:28px;">
                </a>
            </div>
        </div>
        <div style="font-size:1.1rem;margin-top:20px;">Halo {{ $user->name ?? 'Pengguna' }},</div>
        <h2 style="font-size:2rem;margin-top:5px;margin-bottom:20px;">Apa yang ingin kamu <span style="color:#ff7300;">makan?</span></h2>
        <div class="search-bar" style="position:relative;">
            <input type="text" placeholder="Cari nama makanan, misal: Nasi Padang Ayam" style="width:100%;">
            <button style="background:none;border:none;padding:0;position:absolute;right:10px;top:50%;transform:translateY(-50%);"><img src="https://img.icons8.com/ios-filled/24/ff7300/search--v1.png" style="width:20px;"></button>
        </div>
    </div>
    <div style="padding:0 20px;">
        <div class="section-title">Semua Produk</div>
        <div class="food-grid">
            @foreach($allFoods as $food)
            <a href="{{ route('menu.show', $food->id) }}" style="text-decoration:none;color:inherit;">
                <div class="food-card">
                    <img src="{{ asset('storage/' . $food->image) ?? 'https://via.placeholder.com/90' }}" alt="food" style="width:80px;height:80px;border-radius:12px;object-fit:cover;margin-bottom:8px;"/>
                    <div class="food-name">{{ $food->name }}</div>
                    <div class="food-price">Rp{{ number_format($food->price,0,',','.') }}</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
</body>
</html> 