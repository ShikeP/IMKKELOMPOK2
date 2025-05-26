<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body, html { margin: 0; padding: 0; background: #fafafa; font-family: 'Open Sans', sans-serif; }
        .container { max-width: 420px; margin: 0 auto; background: #fff; min-height: 100vh; box-shadow: 0 0 24px rgba(0,0,0,0.06); }
        .header { padding: 24px 20px 0 20px; display: flex; align-items: center; justify-content: space-between; }
        .header h2 { margin: 0; font-size: 1.5rem; font-family: 'Montserrat', sans-serif; font-weight: 700; }
        .header .cart { margin-left: auto; }
        .categories { display: flex; gap: 10px; margin: 18px 0; justify-content: center; }
        .cat-btn { background: #fff3e0; color: #ff7300; border: none; border-radius: 18px; padding: 8px 18px; font-weight: 600; font-size: 1rem; cursor: pointer; }
        .cat-btn.active { background: #ff7300; color: #fff; }
        .food-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; padding: 0 20px 80px 20px; }
        .food-card { background: #fff; border-radius: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); padding: 12px; text-align: center; position: relative; }
        .food-card img {
            width: 90px;
            height: 90px;
            border-radius: 12px;
            object-fit: cover;
            display: block;
            margin: 0 auto 10px auto;
            background: #f5f5f5;
        }
        .food-name { font-weight: 600; margin: 8px 0 4px 0; font-size: 1.05rem; }
        .food-price { color: #ff7300; font-weight: 700; font-size: 1.1rem; }
        .fav { position: absolute; top: 12px; right: 12px; color: #ff7300; font-size: 1.2rem; cursor: pointer; }
        .bottom-nav { position: fixed; bottom: 0; left: 0; width: 100vw; max-width: 420px; background: #fff; border-top: 1px solid #eee; display: flex; justify-content: space-around; align-items: center; height: 60px; z-index: 10; }
        .bottom-nav a { color: #aaa; text-decoration: none; font-size: 0.95rem; display: flex; flex-direction: column; align-items: center; }
        .bottom-nav a.active { color: #ff7300; }
        .bottom-nav img { width: 22px; height: 22px; margin-bottom: 2px; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <a href="/home" style="color:#222;text-decoration:none;font-size:1.3rem;">&#8592;</a>
        <h2 style="flex:1;text-align:center;">Menu Kami</h2>
        <div class="cart">
            <a href="{{ route('cart.index') }}">
                <img src="https://img.icons8.com/material-outlined/24/000000/shopping-cart--v2.png" style="width:28px;">
            </a>
        </div>
    </div>
    <div class="categories">
        @foreach(['Makanan','Lauk','Camilan','Minuman'] as $cat)
            <a href="{{ route('menu', ['category' => $cat]) }}" class="cat-btn{{ $activeCategory == $cat ? ' active' : '' }}">{{ $cat }}</a>
        @endforeach
    </div>
    <div class="food-grid">
        @foreach($foods as $food)
        <a href="{{ route('menu.show', $food->id) }}" style="text-decoration:none;color:inherit;">
        <div class="food-card">
            <span class="fav">&#9829;</span>
            <img src="{{ $food->image ?? 'https://via.placeholder.com/90' }}" alt="food">
            <div class="food-name">{{ $food->name }}</div>
            <div class="food-price">Rp{{ number_format($food->price,0,',','.') }}</div>
        </div>
        </a>
        @endforeach
    </div>
</div>
@include('partials.bottom_nav')
</body>
</html> 