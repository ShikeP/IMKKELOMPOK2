<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Order Summary</title>
    <style>
        body, html { margin: 0; padding: 0; background: #fafafa; font-family: 'Open Sans', sans-serif; }
        .container { max-width: 420px; margin: 0 auto; background: #fff; min-height: 100vh; box-shadow: 0 0 24px rgba(0,0,0,0.06); padding-bottom: 40px; }
        .header { display: flex; align-items: center; padding: 24px 20px 0 20px; }
        .header-title { flex: 1; text-align: center; font-size: 1.3rem; font-family: 'Montserrat', sans-serif; font-weight: 700; }
        .back-btn { background: none; border: none; font-size: 1.7rem; color: #ff7300; cursor: pointer; }
        .step-indicator { display: flex; justify-content: center; align-items: center; margin: 18px 0 18px 0; }
        .step-dot { width: 16px; height: 16px; border-radius: 50%; background: #ff7300; margin: 0 8px; }
        .step-dot.inactive { background: #eee; }
        .summary-box { background: #fafafa; border-radius: 16px; margin: 0 20px 18px 20px; padding: 18px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
        .order-item { display: flex; align-items: center; margin-bottom: 12px; }
        .order-item img { width: 48px; height: 48px; border-radius: 10px; object-fit: cover; margin-right: 12px; }
        .order-info { flex: 1; }
        .order-title { font-weight: 600; font-size: 1.05rem; }
        .order-qty { color: #888; font-size: 0.98rem; }
        .order-price { font-weight: 700; color: #ff7300; font-size: 1.05rem; }
        .order-total { font-size: 1.1rem; font-weight: 700; text-align: right; margin: 12px 0 0 0; }
        .order-label { color: #888; font-size: 0.98rem; }
        .address-box { background: #fff; border-radius: 16px; margin: 0 20px 18px 20px; padding: 18px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
        .address-label { color: #888; font-size: 0.98rem; margin-bottom: 6px; }
        .address-value { font-size: 1.05rem; margin-bottom: 2px; }
        .order-actions { display: flex; gap: 12px; margin: 0 20px; }
        .edit-btn { flex: 1; background: #fff; color: #ff7300; border: 2px solid #ff7300; border-radius: 18px; padding: 12px 0; font-weight: 700; font-size: 1.1rem; cursor: pointer; text-align: center; text-decoration: none; }
        .pay-btn { flex: 1; background: #ff7300; color: #fff; border: none; border-radius: 18px; padding: 12px 0; font-weight: 700; font-size: 1.1rem; cursor: pointer; text-align: center; text-decoration: none; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <a href="/checkout" class="back-btn" style="text-decoration:none;">&#8592;</a>
        <div class="header-title">Order Summary</div>
        <div style="width:32px;"></div>
    </div>
    <div class="step-indicator">
        <div class="step-dot"></div>
        <div class="step-dot"></div>
        <div class="step-dot inactive"></div>
    </div>
    <div class="summary-box">
        <div class="order-label" style="margin-bottom:10px;">Order details</div>
        @foreach($cartItems as $item)
        <div class="order-item">
            <img src="/{{ $item->food->image }}" alt="food">
            <div class="order-info">
                <div class="order-title">{{ $item->food->name }}</div>
                <div class="order-qty">{{ $item->quantity }} x Rp{{ number_format($item->food->price,0,',','.') }}</div>
            </div>
            <div class="order-price">Rp{{ number_format($item->food->price * $item->quantity,0,',','.') }}</div>
        </div>
        @endforeach
        <div class="order-label" style="margin-top:10px;">Sub total:</div>
        <div class="order-total">Rp{{ number_format($subtotal,0,',','.') }}</div>
        <div class="order-label">Delivery fee:</div>
        <div class="order-total">Rp{{ number_format($deliveryFee,0,',','.') }}</div>
        <div class="order-label" style="font-weight:700;">Amount payable:</div>
        <div class="order-total" style="font-size:1.2rem;color:#ff7300;">Rp{{ number_format($total,0,',','.') }}</div>
    </div>
    <div class="address-box">
        <div class="address-label">Delivery Address</div>
        <div class="address-value">Nama: {{ $checkout->name }}</div>
        <div class="address-value">Alamat: {{ $checkout->address }}</div>
        <div class="address-value">Kota: {{ $checkout->city }}</div>
        <div class="address-value">No. Telepon: {{ $checkout->phone }}</div>
    </div>
    <div class="order-actions">
        <a href="/cart" class="edit-btn">Edit Order</a>
        <a href="{{ route('payment.create') }}" class="pay-btn">Proceed to payment</a>
    </div>
</div>
</body>
</html> 