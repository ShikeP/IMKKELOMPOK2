<div id="cartPanel" style="position:fixed;top:0;right:-480px;width:400px;max-width:100vw;height:100vh;background:#fff;z-index:2000;transition:right 0.3s;box-shadow: -2px 0 16px rgba(0,0,0,0.07);border-radius:8px 0 0 8px;display:flex;flex-direction:column;">
    <div style="display:flex;align-items:center;justify-content:space-between;padding:24px 28px 12px 28px;border-bottom:1px solid #f2f2f2;">
        <div style="font-size:1.25rem;font-weight:700;color:#222;">Keranjang</div>
        <button onclick="closeCartPanel()" style="background:none;border:none;font-size:1.7rem;color:#ff7300;cursor:pointer;">&times;</button>
    </div>
    <div style="flex:1;overflow-y:auto;padding:18px 28px 0 28px;">
        @if(count($cartItems) > 0)
            @foreach($cartItems as $item)
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:18px;padding-bottom:18px;border-bottom:1px solid #f2f2f2;">
                <img src="{{ asset('storage/' . $item->food->image) }}" alt="food" style="width:60px;height:60px;border-radius:8px;object-fit:cover;">
                <div style="flex:1;">
                    <div style="font-weight:600;margin-bottom:4px;">{{ $item->food->name }}</div>
                    <div style="display:flex;align-items:center;gap:8px;">
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display:flex;align-items:center;gap:4px;">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" style="width:40px;text-align:center;border-radius:4px;border:1px solid #eee;padding:2px 0;">
                            <button type="submit" style="background:none;border:none;color:#ff7300;font-size:0.9rem;cursor:pointer;">Ubah</button>
                        </form>
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST" style="margin-left:auto;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none;border:none;color:#ff7300;font-size:1.1rem;cursor:pointer;">&times;</button>
                        </form>
                    </div>
                </div>
                <div style="font-weight:700;color:#ff7300;">Rp{{ number_format($item->food->price * $item->quantity,0,',','.') }}</div>
            </div>
            @endforeach
        @else
            <div style="text-align:center;padding:40px 0;color:#888;">
                <img src="https://img.icons8.com/ios-filled/50/cccccc/shopping-cart--v1.png" style="width:48px;margin-bottom:12px;">
                <div style="font-size:1.1rem;">Keranjang kosong</div>
            </div>
        @endif
    </div>
    @if(count($cartItems) > 0)
    <div style="padding:18px 28px;border-top:1px solid #f2f2f2;">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;">
            <div style="font-weight:600;">Total</div>
            <div style="font-weight:700;color:#ff7300;font-size:1.1rem;">Rp{{ number_format($total,0,',','.') }}</div>
        </div>
        <button onclick="openCheckoutPanel()" style="width:100%;background:#ff7300;color:#fff;font-weight:700;font-size:1.1rem;border:none;border-radius:8px;padding:14px 0;cursor:pointer;">Checkout</button>
    </div>
    @endif
</div>

<script>
function openCartPanel() {
    document.getElementById('cartPanel').style.right = '0';
    // Tutup panel checkout jika terbuka
    if (document.getElementById('checkoutPanel').style.right === '0px') {
        closeCheckoutPanel();
    }
}
function closeCartPanel() {
    document.getElementById('cartPanel').style.right = '-480px';
}
</script> 