@include('partials.sidebar')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout Berhasil</title>
    <style>
        body, html { margin: 0; padding: 0; background: #fafafa; font-family: 'Open Sans', sans-serif; }
        .container { max-width: 1200px; margin: 40px auto; background: #fff; min-height: 100vh; box-shadow: none !important; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 32px; }
        .success-icon { font-size: 3rem; color: #4CAF50; margin-top: 60px; }
        .success-msg { font-size: 1.3rem; font-weight: 700; color: #222; margin: 24px 0 12px 0; text-align: center; }
        .back-btn { background: #ff7300; color: #fff; border: none; border-radius: 18px; padding: 12px 32px; font-weight: 700; font-size: 1.1rem; margin-top: 24px; cursor: pointer; text-decoration: none; display: inline-block; }
    </style>
</head>
<body>
<div class="container">
    <div class="success-icon">✔️</div>
    <div class="success-msg">Checkout Berhasil!<br>Pesanan Anda sedang diproses.</div>
    <a href="/menu" class="back-btn">Kembali ke Menu</a>
</div>
</body>
</html> 