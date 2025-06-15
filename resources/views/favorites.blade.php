@include('partials.sidebar')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorit Anda</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body, html { margin: 0; padding: 0; background: #fafafa; font-family: 'Open Sans', sans-serif; padding-left: 180px; }
        .container { max-width: 900px; margin: 40px auto; background: #fff; min-height: 100vh; box-shadow: 0 2px 8px rgba(0,0,0,0.05); border-radius: 16px; padding: 32px; }
        .header-top { display:flex; justify-content:space-between; align-items:center; padding: 24px 20px 0 20px; }
        .header-title { display:flex; align-items:center; }
        .header-title h2 { margin: 0; font-size: 1.5rem; font-family: 'Montserrat', sans-serif; font-weight: 700; }
        .food-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 18px; padding: 0 20px 80px 20px; }
        .food-card { background: #fff; border-radius: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); width: 150px; padding: 12px; text-align: center; display: flex; flex-direction: column; align-items: center; border: 1px solid #e0e0e0; padding-bottom: 12px;}
        .food-card img { width: 100px; height: 100px; border-radius: 12px; object-fit: cover; margin-bottom: 12px; }
        .food-name { font-weight: 600; margin: 8px 0 4px 0; font-size: 1rem; }
        .food-price { color: #ff7300; font-weight: 700; font-size: 1rem; }
        .empty-state { text-align: center; padding: 50px 0; color: #888; font-size: 1.1rem; }
        .empty-state img { width: 60px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-top">
            <div class="header-title">
                <img src="https://img.icons8.com/ios-filled/24/000000/like.png" style="width:28px; margin-right:8px;">
                <h2>Favorit Anda</h2>
            </div>
        </div>

        @if(count($favoriteItems) > 0)
            <div class="food-grid" style="margin-top: 30px;">
                @foreach($favoriteItems as $item)
                    <a href="{{ route('menu.show', $item->food->id) }}" style="text-decoration:none;color:inherit;">
                        <div class="food-card">
                            <img src="{{ asset('storage/' . $item->food->image) ?? 'https://via.placeholder.com/90' }}" alt="food" />
                            <div class="food-name">{{ $item->food->name }}</div>
                            <div class="food-price">Rp{{ number_format($item->food->price,0,',','.') }}</div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <img src="https://img.icons8.com/ios-filled/60/cccccc/like.png" alt="No favorites"/>
                <p>Belum ada makanan favorit.</p>
                <p>Ayo jelajahi menu dan tambahkan yang Anda suka!</p>
            </div>
        @endif
    </div>
</body>
</html> 