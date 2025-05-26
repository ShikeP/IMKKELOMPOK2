<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Payment</title>
    <style>
        body, html { margin: 0; padding: 0; background: #fafafa; font-family: 'Open Sans', sans-serif; }
        .container { max-width: 420px; margin: 0 auto; background: #fff; min-height: 100vh; box-shadow: 0 0 24px rgba(0,0,0,0.06); padding-bottom: 40px; }
        .header { display: flex; align-items: center; padding: 24px 20px 0 20px; }
        .header-title { flex: 1; text-align: center; font-size: 1.3rem; font-family: 'Montserrat', sans-serif; font-weight: 700; }
        .back-btn { background: none; border: none; font-size: 1.7rem; color: #ff7300; cursor: pointer; }
        .step-indicator { display: flex; justify-content: center; align-items: center; margin: 18px 0 18px 0; }
        .step-dot { width: 16px; height: 16px; border-radius: 50%; background: #ff7300; margin: 0 8px; }
        .step-dot.inactive { background: #eee; }
        .pay-methods { display: flex; gap: 18px; justify-content: center; margin: 18px 0 18px 0; }
        .pay-method { display: flex; flex-direction: column; align-items: center; cursor: pointer; }
        .pay-method input[type=radio] { margin-top: 8px; }
        .form-group { margin: 0 20px 16px 20px; }
        label { display: block; margin-bottom: 6px; font-weight: 600; color: #ff7300; }
        input[type=text] { width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #eee; font-size: 1rem; margin-bottom: 4px; }
        .or-divider { text-align: center; margin: 18px 0; color: #aaa; font-weight: 600; }
        .pay-btn { background: #ff7300; color: #fff; border: none; border-radius: 18px; padding: 12px 0; font-weight: 700; font-size: 1.1rem; width: 90%; margin: 18px auto 0 auto; display: block; cursor: pointer; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <a href="{{ route('order.summary') }}" class="back-btn" style="text-decoration:none;">&#8592;</a>
        <div class="header-title">Payment</div>
        <div style="width:32px;"></div>
    </div>
    <div class="step-indicator">
        <div class="step-dot"></div>
        <div class="step-dot"></div>
        <div class="step-dot"></div>
    </div>
    <form action="{{ route('payment.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Pilih metode pembayaran:</label>
            <div class="pay-methods">
                <label class="pay-method">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/Logo_ovo_purple.svg" alt="OVO" style="height:32px;">
                    <input type="radio" name="payment_method" value="ovo" required> OVO
                </label>
                <label class="pay-method">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Logo_dana_blue.svg" alt="DANA" style="height:32px;">
                    <input type="radio" name="payment_method" value="dana" required> DANA
                </label>
            </div>
            <div class="or-divider">ATAU</div>
            <div class="pay-methods">
                <label class="pay-method" style="flex-direction:row;gap:10px;align-items:center;">
                    <input type="radio" name="payment_method" value="cod" required> <span>Cash / Pay on Delivery</span>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>Nomor HP:</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" required>
        </div>
        <button type="submit" class="pay-btn">Complete Order</button>
    </form>
</div>
</body>
</html> 