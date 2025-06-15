@include('partials.sidebar')
@include('partials.cart_panel')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $food->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body, html { margin: 0; padding: 0; background: #fafafa; font-family: 'Open Sans', sans-serif; }
        .container { max-width: 1200px; margin: 40px auto; background: #fff; min-height: 100vh; box-shadow: none !important; padding: 32px; padding-left: 200px; }
        .header { padding: 18px 20px 0 20px; display: flex; align-items: center; justify-content: space-between; }
        .header h2 { margin: 0; font-size: 1.3rem; font-family: 'Montserrat', sans-serif; font-weight: 700; }
        .cart { display:flex; align-items:center; justify-content:center; width:28px; height:28px; }
        .food-img-wrapper { width: 200px; height: 200px; border-radius: 50%; display: block; margin: 30px auto 10px auto; overflow: hidden; }
        .food-img { width: 100%; height: 100%; object-fit: cover; }
        .food-title { font-size: 1.3rem; font-weight: 700; margin: 0 0 6px 0; text-align: center; }
        .food-price { color: #ff7300; font-weight: 700; font-size: 1.2rem; text-align: center; }
        .desc { color: #444; font-size: 1rem; margin: 12px 0 18px 0; text-align: center; }
        .recommended { margin: 18px 0; }
        .recommended-title { font-weight: 600; margin-bottom: 8px; font-size: 1.05rem; }
        .sides-list { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; padding-bottom: 8px; }
        .side-card { background: #fff; border-radius: 12px; box-shadow: none !important; min-width: 110px; padding: 8px; text-align: center; }
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
        <div style="display:flex;align-items:center;gap:15px;">
            <span class="heart" id="favoriteButton" data-food-id="{{ $food->id }}" style="cursor:pointer; display:flex; align-items:center; justify-content:center; width:30px; height:30px;">
                <!-- Ikon akan dimuat di sini oleh JavaScript -->
            </span>
            <div class="cart">
                <a href="#" onclick="openCartPanel();return false;">
                <img src="https://img.icons8.com/material-outlined/24/000000/shopping-cart--v2.png" style="width:28px;">
                </a>
            </div>
        </div>
    </div>
    <div class="product-main-info" style="text-align: center; margin-bottom: 24px;">
        <div class="food-img-wrapper">
            <img src="{{ asset('storage/' . $food->image) }}" alt="food" class="food-img">
        </div>
        <div class="food-title">{{ $food->name }}</div>
        <div class="food-price">Rp{{ number_format($food->price,0,',','.') }}</div>
    </div>
    <div class="desc">{{ $food->description }}</div>

    @if(count($recommendedLauk) > 0)
    <div class="recommended" style="margin-top: 30px;">
        <div class="section-title" style="font-size:1.1rem;margin-bottom:15px;">🍛 Lauk Rekomendasi untuk Kamu</div>
        <div class="food-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 18px;">
            @foreach($recommendedLauk as $lauk)
                <a href="{{ route('menu.show', $lauk->id) }}" style="text-decoration:none;color:inherit;">
                    <div class="food-card" style="background: #fff; border-radius: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); width: 150px; padding: 12px; text-align: center; display: flex; flex-direction: column; align-items: center; border: 1px solid #e0e0e0; padding-bottom: 12px;">
                        <img src="{{ asset('storage/' . $lauk->image) ?? 'https://via.placeholder.com/90' }}" alt="{{ $lauk->name }}" style="width:100px;height:100px;border-radius:12px;object-fit:cover;margin-bottom:12px;"/>
                        <div class="food-name">{{ $lauk->name }}</div>
                        <div class="food-price">Rp{{ number_format($lauk->price,0,',','.') }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    @endif

    <div class="total">Total: <span id="totalPrice">Rp{{ number_format($food->price,0,',','.') }}</span></div>
    <form action="{{ route('cart.add', $food->id) }}" method="POST" style="margin:0 0 18px 0; display: flex; justify-content: center; align-items: center; gap: 10px;">
        @csrf
        <input type="number" name="quantity" value="1" min="1" style="width:60px;text-align:center;border-radius:8px;border:1px solid #eee;padding:6px 0;">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const favoriteButton = document.getElementById('favoriteButton');
        const foodId = favoriteButton.dataset.foodId;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        function updateHeartIcon(isFavorited) {
            if (isFavorited) {
                favoriteButton.innerHTML = '<img src="https://img.icons8.com/ios-filled/24/ff0000/like.png" alt="Favorited" style="width:24px;height:24px;display:block;"/>';
            } else {
                favoriteButton.innerHTML = '<img src="https://img.icons8.com/ios-filled/24/cccccc/like.png" alt="Not Favorited" style="width:24px;height:24px;display:block;"/>';
            }
        }

        // Check initial favorite status
        fetch(`/favorites/${foodId}/check-status`, {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            updateHeartIcon(data.is_favorited);
        })
        .catch(error => console.error('Error checking favorite status:', error));

        // Handle click event
        favoriteButton.addEventListener('click', function() {
            let isFavorited = favoriteButton.querySelector('img').src.includes('ff0000');
            const url = isFavorited ? `/favorites/${foodId}/remove` : `/favorites/${foodId}/add`;
            const method = 'POST';

            fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ food_id: foodId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    updateHeartIcon(!isFavorited);
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error updating favorite status:', error);
                alert('Terjadi kesalahan saat memperbarui status favorit.');
            });
        });
    });
</script>
</body>
</html> 