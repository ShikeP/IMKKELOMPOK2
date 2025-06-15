@include('partials.sidebar')
@include('partials.checkout_panel')
@include('partials.cart_panel')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Menu</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body, html { margin: 0; padding: 0; background: #fafafa; font-family: 'Open Sans', sans-serif; padding-left: 180px; }
        .container { max-width: 900px; margin: 40px auto; background: #fff; min-height: 100vh; box-shadow: 0 2px 8px rgba(0,0,0,0.05); border-radius: 16px; padding: 32px; }
        .header-top { display:flex; justify-content:space-between; align-items:center; padding: 24px 20px 0 20px; }
        .header-title { display:flex; align-items:center; }
        .header-title h2 { margin: 0; font-size: 1.5rem; font-family: 'Montserrat', sans-serif; font-weight: 700; }
        .header h2 { margin: 0; font-size: 2rem; font-family: 'Montserrat', sans-serif; font-weight: 700; }
        .header span { color: #ff7300; }
        .categories { display: flex; gap: 10px; margin: 18px 0; justify-content: center; }
        .cat-btn { background: #f0f0f0; color: #333; border: none; border-radius: 18px; padding: 8px 18px; font-weight: 600; font-size: 1rem; cursor: pointer; }
        .cat-btn.active { background: #ff7300; color: #fff; }
        .section-title { font-family: 'Montserrat', sans-serif; font-size: 1.1rem; font-weight: 700; margin: 24px 0 10px 0; color: #222; }
        .food-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 18px; padding: 0 20px 80px 20px; }
        .food-card { background: #fff; border-radius: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); width: 150px; padding: 12px; text-align: center; display: flex; flex-direction: column; align-items: center; border: 1px solid #e0e0e0; padding-bottom: 12px;}
        .food-card img { width: 100px; height: 100px; border-radius: 12px; object-fit: cover; margin-bottom: 12px; }
        .food-name { font-weight: 600; margin: 8px 0 4px 0; font-size: 1rem; }
        .food-price { color: #ff7300; font-weight: 700; font-size: 1rem; }
        .fav { position: absolute; top: 12px; right: 12px; color: #ff7300; font-size: 1.2rem; cursor: pointer; }
        .bottom-nav { position: fixed; bottom: 0; left: 0; width: 100vw; max-width: 420px; background: #fff; border-top: 1px solid #eee; display: flex; justify-content: space-around; align-items: center; height: 60px; z-index: 10; }
        .bottom-nav a { color: #aaa; text-decoration: none; font-size: 0.95rem; display: flex; flex-direction: column; align-items: center; }
        .bottom-nav a.active { color: #ff7300; }
        .bottom-nav img { width: 22px; height: 22px; margin-bottom: 2px; }
    </style>
</head>
<body>
<div class="container">
    <div class="header-top">
        <div class="header-title">
            <img src="https://img.icons8.com/ios-filled/24/000000/restaurant-menu.png" style="width:28px; margin-right:8px;">
            <h2>Menu</h2>
        </div>
        <div>
            <a href="#" onclick="openCartPanel();return false;">
                <img src="https://img.icons8.com/material-outlined/24/000000/shopping-cart--v2.png" style="width:28px;">
            </a>
        </div>
    </div>

    <h2 style="font-size:2rem; text-align:center; margin-top:20px; margin-bottom:20px; font-family: 'Montserrat', sans-serif; font-weight: 700;">Menu Kami</h2>

    <div class="categories">
        @foreach($categories as $cat)
            <a href="{{ route('menu.category', ['categoryName' => $cat->name]) }}" class="cat-btn{{ $activeCategory == $cat->name ? ' active' : '' }}">{{ $cat->name }}</a>
        @endforeach
    </div>

    <div class="section-title" style="padding:0 20px;">Menu {{ $activeCategory }}</div>

    <div class="food-grid">
        @foreach($foods as $food)
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
</body>
</html> 