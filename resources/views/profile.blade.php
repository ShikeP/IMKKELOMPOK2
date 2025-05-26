<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body, html { margin: 0; padding: 0; background: #fafafa; font-family: 'Open Sans', sans-serif; }
        .container { max-width: 420px; margin: 0 auto; background: #fff; min-height: 100vh; box-shadow: 0 0 24px rgba(0,0,0,0.06); padding-bottom: 40px; }
        .header { display: flex; align-items: center; padding: 24px 20px 0 20px; }
        .header-title { flex: 1; text-align: center; font-size: 1.4rem; font-family: 'Montserrat', sans-serif; font-weight: 700; }
        .back-btn { background: none; border: none; font-size: 1.7rem; color: #ff7300; cursor: pointer; }
        .profile-pic { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; display: block; margin: 24px auto 18px auto; border: 4px solid #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .info-box { background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); padding: 14px 18px; margin: 0 20px 16px 20px; display: flex; align-items: center; font-size: 1.05rem; }
        .info-icon { margin-right: 14px; font-size: 1.2rem; color: #ff7300; }
        .edit-btn { background: #ff4d4d; color: #fff; border: none; border-radius: 18px; padding: 12px 0; font-weight: 700; font-size: 1.1rem; width: 90%; margin: 18px auto 0 auto; display: block; cursor: pointer; }
    </style>
</head>
<body>
<div class="container">
    @if(session('success'))
        <div style="background: #4CAF50; color: white; padding: 12px; margin: 0 20px 20px 20px; border-radius: 8px; text-align: center;">
            {{ session('success') }}
        </div>
    @endif
    <div class="header">
        <a href="/home" class="back-btn" style="text-decoration:none;">&#8592;</a>
        <div class="header-title">Profil Saya</div>
        <div style="width:32px;"></div>
    </div>
    <img src="{{ $user->photo ? asset('storage/'.$user->photo) : 'https://randomuser.me/api/portraits/men/32.jpg' }}" class="profile-pic" alt="profile">
    <div class="info-box"><span class="info-icon">👤</span> {{ $user->name }}</div>
    <div class="info-box"><span class="info-icon">📞</span> {{ $user->phone ?? '-' }}</div>
    <div class="info-box"><span class="info-icon">✉️</span> {{ $user->email }}</div>
    <div class="info-box"><span class="info-icon">🏠</span> {{ $user->address ?? '-' }}</div>
    <a href="{{ route('profile.edit') }}" class="edit-btn">Ubah Profil</a>
</div>
</body>
</html> 