<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>
    <style>
        body, html { margin: 0; padding: 0; background: #fafafa; font-family: 'Open Sans', sans-serif; }
        .container { max-width: 420px; margin: 0 auto; background: #fff; min-height: 100vh; box-shadow: 0 0 24px rgba(0,0,0,0.06); }
        .header { padding: 24px 20px 0 20px; display: flex; align-items: center; }
        .header h2 { margin: 0; font-size: 1.5rem; font-family: 'Montserrat', sans-serif; font-weight: 700; flex:1; text-align:center; }
        .cart-list { margin: 24px 0 0 0; }
        .cart-item { display: flex; align-items: center; background: #fafafa; border-radius: 12px; margin: 0 20px 16px 20px; padding: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
        .cart-item img { width: 60px; height: 60px; border-radius: 12px; object-fit: cover; margin-right: 12px; }
        .cart-info { flex: 1; }
        .cart-title { font-weight: 600; font-size: 1.05rem; }
        .cart-price { color: #ff7300; font-weight: 700; font-size: 1.1rem; }
        .cart-qty { display: flex; align-items: center; gap: 6px; }
        .cart-qty input { width: 36px; text-align: center; border-radius: 8px; border: 1px solid #eee; padding: 2px 0; }
        .cart-remove { color: #ff7300; font-size: 1.2rem; background: none; border: none; cursor: pointer; margin-left: 8px; }
        .cart-total { font-size: 1.1rem; font-weight: 600; text-align: right; margin: 18px 20px 0 0; }
        .cart-note { color: #888; font-size: 0.95rem; text-align: right; margin: 0 20px 18px 0; }
        .cart-actions { padding: 0 20px 24px 20px; }
        .cart-btn { background: #ff7300; color: #fff; border: none; border-radius: 18px; padding: 12px 0; font-weight: 700; font-size: 1.1rem; width: 100%; margin-top: 12px; cursor: pointer; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <a href="/menu" style="color:#222;text-decoration:none;font-size:1.3rem;">&#8592;</a>
        <h2>Keranjang Anda</h2>
    </div>
    <div class="cart-list">
        @foreach($cartItems as $item)
        <div class="cart-item">
            <img src="/{{ $item->food->image }}" alt="food">
            <div class="cart-info">
                <div class="cart-title">{{ $item->food->name }}</div>
                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="cart-qty">
                    @csrf
                    @method('PUT')
                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" style="width:36px;">
                    <button type="submit" style="background:none;border:none;color:#ff7300;font-size:1.1rem;">Ubah</button>
                </form>
            </div>
            <div class="cart-price">Rp{{ number_format($item->food->price * $item->quantity,0,',','.') }}</div>
            <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="cart-remove" title="Hapus">&times;</button>
            </form>
        </div>
        @endforeach
    </div>
    <div class="cart-total">Total harga: Rp{{ number_format($total,0,',','.') }}</div>
    <div class="cart-note">(Belum termasuk ongkir)</div>
    <div class="cart-actions">
        <a href="/menu" class="cart-btn" style="display:block;text-align:center;text-decoration:none;">Tambah Menu</a>
        <a href="{{ route('checkout.create') }}" class="cart-btn" style="display:block;text-align:center;text-decoration:none;">Checkout</a>
    </div>
</div>
</body>
</html> 