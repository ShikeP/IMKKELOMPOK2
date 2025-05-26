<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $food->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body, html { margin: 0; padding: 0; background: #fafafa; font-family: 'Open Sans', sans-serif; }
        .container { max-width: 420px; margin: 0 auto; background: #fff; min-height: 100vh; box-shadow: 0 0 24px rgba(0,0,0,0.06); }
        .header { padding: 18px 20px 0 20px; display: flex; align-items: center; justify-content: space-between; }
        .header h2 { margin: 0; font-size: 1.3rem; font-family: 'Montserrat', sans-serif; font-weight: 700; }
        .cart { margin-left: auto; }
        .food-img { width: 100%; max-width: 220px; border-radius: 50%; display: block; margin: 18px auto 10px auto; }
        .food-title { font-size: 1.3rem; font-weight: 700; margin: 0 0 6px 0; text-align: center; }
        .food-price { color: #ff7300; font-weight: 700; font-size: 1.2rem; text-align: center; }
        .desc { color: #444; font-size: 1rem; margin: 12px 0 18px 0; text-align: center; }
        .heart { color: #ff7300; font-size: 1.5rem; float: right; margin-right: 18px; }
        .recommended { margin: 18px 0; }
        .recommended-title { font-weight: 600; margin-bottom: 8px; font-size: 1.05rem; }
        .sides-list { display: flex; gap: 10px; overflow-x: auto; padding-bottom: 8px; }
        .side-card { background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); min-width: 110px; padding: 8px; text-align: center; }
        .side-card img { width: 60px; height: 60px; border-radius: 12px; object-fit: cover; margin-bottom: 4px; }
        .side-name { font-weight: 600; font-size: 0.98rem; }
        .side-price { color: #ff7300; font-weight: 700; font-size: 1rem; }
        .add-cart-btn { background: #ff7300; color: #fff; border: none; border-radius: 18px; padding: 12px 0; font-weight: 700; font-size: 1.1rem; width: 100%; margin-top: 18px; cursor: pointer; }
        .total { font-size: 1.1rem; font-weight: 600; text-align: right; margin: 18px 0 0 0; padding-right: 10px; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <a href="/menu" style="color:#222;text-decoration:none;font-size:1.3rem;">&#8592;</a>
        <h2>{{ $food->name }}</h2>
        <div class="cart">
            <img src="https://img.icons8.com/material-outlined/24/000000/shopping-cart--v2.png" style="width:28px;">
        </div>
    </div>
    <img src="/{{ $food->image }}" alt="food" class="food-img">
    <span class="heart">&#9829;</span>
    <div class="food-title">{{ $food->name }}</div>
    <div class="food-price">Rp{{ number_format($food->price,0,',','.') }}</div>
    <div class="desc">{{ $food->description }}</div>
    <div class="recommended">
        <div class="recommended-title">Lauk rekomendasi</div>
        <div class="sides-list">
            @foreach($recommendedSides as $side)
            <div class="side-card">
                <img src="/{{ $side->image }}" alt="side">
                <div class="side-name">{{ $side->name }}</div>
                <div class="side-price">Rp{{ number_format($side->price,0,',','.') }}</div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="total">Total: <span id="totalPrice">Rp{{ number_format($food->price,0,',','.') }}</span></div>
    <form action="{{ route('cart.add', $food->id) }}" method="POST" style="margin:0 0 18px 0;">
        @csrf
        <input type="number" name="quantity" value="1" min="1" style="width:48px;text-align:center;border-radius:8px;border:1px solid #eee;padding:6px 0;"> 
        <button type="submit" class="add-cart-btn" style="width:auto;padding:12px 24px;">Tambah ke Keranjang</button>
    </form>

    <div style="margin:32px 0 0 0;">
        <div class="section-title" style="font-size:1.1rem;">Rating & Ulasan</div>
        @auth
        <form action="{{ route('menu.review', $food->id) }}" method="POST" style="margin-bottom:18px;">
            @csrf
            <label for="rating">Rating:</label>
            <select name="rating" id="rating" required>
                <option value="">-</option>
                @for($i=1;$i<=5;$i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            <br>
            <label for="review">Ulasan:</label><br>
            <textarea name="review" id="review" rows="2" style="width:100%;max-width:400px;"></textarea>
            <br>
            <button type="submit" class="add-cart-btn" style="width:auto;padding:8px 18px;margin-top:8px;">Kirim</button>
        </form>
        @endauth
        <div>
            @forelse($reviews as $review)
                <div style="background:#fafafa;border-radius:8px;padding:10px 12px;margin-bottom:10px;">
                    <div style="font-weight:600;">{{ $review->user->name ?? 'Pengguna' }} <span style="color:#ff7300;">@for($i=0;$i<$review->rating;$i++)★@endfor</span></div>
                    <div style="font-size:0.98rem;">{{ $review->review }}</div>
                    <div style="font-size:0.85rem;color:#888;">{{ $review->created_at->diffForHumans() }}</div>
                </div>
            @empty
                <div style="color:#888;">Belum ada ulasan.</div>
            @endforelse
        </div>
    </div>
</div>
</body>
</html> 