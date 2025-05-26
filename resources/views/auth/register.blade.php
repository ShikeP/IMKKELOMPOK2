<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body, html { height: 100%; margin: 0; padding: 0; }
        .container {
            width: 100vw; height: 100vh; display: flex; align-items: center; justify-content: center; background: #f7f7f7;
        }
        .card {
            background: #fff; border-radius: 16px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); width: 350px; padding: 0 0 32px 0; position: relative;
        }
        .img-top {
            width: 120px; height: 120px; border-radius: 0 0 60px 60px; overflow: hidden; position: absolute; top: -60px; left: 50%; transform: translateX(-50%);
            border: 6px solid #fff; background: #fff;
        }
        .img-top img { width: 100%; height: 100%; object-fit: cover; }
        .tabs { display: flex; justify-content: center; margin-top: 80px; }
        .tab { font-family: 'Montserrat', sans-serif; font-size: 1.1rem; font-weight: 700; color: #ff7300; padding: 0 24px 8px 24px; cursor: pointer; border-bottom: 2px solid transparent; }
        .tab.active { color: #ff7300; border-bottom: 2.5px solid #ff7300; }
        .tab.inactive { color: #bbb; }
        form { display: flex; flex-direction: column; gap: 16px; margin: 24px 32px 0 32px; }
        input[type="text"], input[type="email"], input[type="password"] {
            padding: 12px; border-radius: 8px; border: 1px solid #ddd; font-size: 1rem; font-family: 'Open Sans', sans-serif;
        }
        .btn {
            background: linear-gradient(90deg, #ff7300 0%, #ff9100 100%); color: #fff; border: none; border-radius: 25px; padding: 0.8rem 2.5rem; font-size: 1rem; font-family: 'Open Sans', sans-serif; font-weight: 600; cursor: pointer; transition: background 0.3s; box-shadow: 0 4px 16px rgba(255, 115, 0, 0.2);
        }
        .btn:hover { background: linear-gradient(90deg, #ff9100 0%, #ff7300 100%); }
        .or { display: flex; align-items: center; margin: 24px 32px 0 32px; }
        .or-line { flex: 1; height: 1px; background: #eee; }
        .or-text { margin: 0 12px; color: #aaa; font-size: 0.95rem; }
        .socials { display: flex; justify-content: center; gap: 18px; margin-top: 18px; }
        .socials img { width: 38px; height: 38px; border-radius: 50%; cursor: pointer; border: 1.5px solid #eee; background: #fff; }
        .showpass { position: absolute; right: 16px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #aaa; }
        .input-group { position: relative; }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="img-top">
            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80" alt="food">
        </div>
        <div class="tabs">
            <a href="{{ route('login') }}" class="tab inactive" style="text-decoration:none;">Sign In</a>
            <div class="tab active">Sign Up</div>
        </div>
        <form method="POST" action="{{ url('/register') }}">
            @csrf
            <input type="text" name="name" placeholder="Full Name" required autofocus>
            <input type="email" name="email" placeholder="E-mail address" required>
            <div class="input-group">
                <input type="password" name="password" placeholder="Create password" id="password" required>
                <span class="showpass" onclick="togglePassword()">👁️</span>
            </div>
            <button class="btn" type="submit">Create Account</button>
        </form>
        <div class="or"><div class="or-line"></div><div class="or-text">OR</div><div class="or-line"></div></div>
        <div class="socials">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" alt="Google">
            <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/Facebook_Logo_%282019%29.png" alt="Facebook">
            <img src="https://upload.wikimedia.org/wikipedia/commons/4/4f/Twitter-logo.svg" alt="Twitter">
        </div>
    </div>
</div>
<script>
function togglePassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
@if ($errors->any())
    <div style="color: red; text-align:center; margin-top:10px;">
        {{ $errors->first() }}
    </div>
@endif
</body>
</html> 