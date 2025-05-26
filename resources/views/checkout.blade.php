<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <style>
        body, html { margin: 0; padding: 0; background: #fafafa; font-family: 'Open Sans', sans-serif; }
        .container { max-width: 420px; margin: 0 auto; background: #fff; min-height: 100vh; box-shadow: 0 0 24px rgba(0,0,0,0.06); padding-bottom: 40px; }
        .header { display: flex; align-items: center; padding: 24px 20px 0 20px; }
        .header-title { flex: 1; text-align: center; font-size: 1.3rem; font-family: 'Montserrat', sans-serif; font-weight: 700; }
        .back-btn { background: none; border: none; font-size: 1.7rem; color: #ff7300; cursor: pointer; }
        .step-indicator { display: flex; justify-content: center; align-items: center; margin: 18px 0 18px 0; }
        .step-dot { width: 16px; height: 16px; border-radius: 50%; background: #ff7300; margin: 0 8px; }
        .step-dot.inactive { background: #eee; }
        .form-group { margin: 0 20px 16px 20px; }
        label { display: block; margin-bottom: 6px; font-weight: 600; color: #ff7300; }
        input { width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #eee; font-size: 1rem; margin-bottom: 4px; }
        .or-divider { text-align: center; margin: 18px 0; color: #aaa; font-weight: 600; }
        .profile-option { display: flex; align-items: center; background: #fafafa; border-radius: 12px; margin: 0 20px 16px 20px; padding: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
        .profile-radio { margin-left: auto; }
        .checkout-btn { background: #ff7300; color: #fff; border: none; border-radius: 18px; padding: 12px 0; font-weight: 700; font-size: 1.1rem; width: 90%; margin: 18px auto 0 auto; display: block; cursor: pointer; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <a href="/cart" class="back-btn" style="text-decoration:none;">&#8592;</a>
        <div class="header-title">Deliver to</div>
        <div style="width:32px;"></div>
    </div>
    <div class="step-indicator">
        <div class="step-dot"></div>
        <div class="step-dot inactive"></div>
    </div>
    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" name="address" value="{{ old('address', $user->address) }}" required>
        </div>
        <div class="form-group">
            <label>Kota:</label>
            <input type="text" name="city" value="{{ old('city') }}" required>
        </div>
        <div class="form-group">
            <label>No. Telepon:</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" required>
        </div>
        <button type="submit" class="checkout-btn">Proceed</button>
    </form>
</div>
</body>
</html> 