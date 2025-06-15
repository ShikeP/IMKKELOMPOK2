@include('partials.sidebar')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body, html { margin: 0; padding: 0; background: #fafafa; font-family: 'Open Sans', sans-serif; padding-left: 180px; }
        .container { max-width: 900px; margin: 40px auto; background: #fff; min-height: 100vh; box-shadow: 0 2px 8px rgba(0,0,0,0.05); border-radius: 16px; padding: 32px; }
        .header-top { display: flex; align-items: center; justify-content: space-between; padding: 24px 0 0 0; }
        .header-title { display: flex; align-items: center; }
        .header-title h2 { margin: 0; font-size: 1.5rem; font-family: 'Montserrat', sans-serif; font-weight: 700; }
        .header h2 { margin: 0; font-size: 2rem; font-family: 'Montserrat', sans-serif; font-weight: 700; }
        .back-btn { background: none; border: none; font-size: 1.7rem; color: #ff7300; cursor: pointer; }
        .profile-pic { width: 120px; height: 120px; border-radius: 50%; object-fit: cover; display: block; margin: 30px auto 20px auto; border: 4px solid #f0f0f0; box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
        .info-container { display: grid; grid-template-columns: 1fr 1fr; gap: 10px 0; max-width: 500px; margin: 0 auto; padding: 0 20px; text-align: left; }
        .info-item { display: contents; }
        .info-label { font-weight: 600; color: #333; margin-right: 10px; text-align: right; }
        .info-value { color: #555; text-align: left; }
        .info-box { background: #fff; border-radius: 12px; box-shadow: none; padding: 14px 18px; margin: 0 20px 16px 20px; display: flex; align-items: center; font-size: 1.05rem; display:none; } /* Hide old info-box */
        .info-icon { margin-right: 14px; font-size: 1.2rem; color: #ff7300; }
        .edit-btn { background: #ff7300; color: #fff; border: none; border-radius: 8px; padding: 12px 0; font-weight: 700; font-size: 1.1rem; width: 80%; margin: 30px auto 0 auto; display: block; cursor: pointer; text-decoration: none; text-align: center; }
    </style>
</head>
<body>
<div class="container">
    @if(session('success'))
        <div style="background: #4CAF50; color: white; padding: 12px; margin: 0 20px 20px 20px; border-radius: 8px; text-align: center;">
            {{ session('success') }}
        </div>
    @endif
    <div class="header-top">
        <div class="header-title">
            <img src="https://img.icons8.com/ios-filled/24/000000/user-male-circle.png" style="width:28px; margin-right:8px;">
            <h2>Profil</h2>
        </div>
        <div></div> {{-- Placeholder for right alignment --}}
    </div>
    <h2 style="font-size:1.5rem; text-align:center; margin-top:20px; margin-bottom:30px; font-family: 'Montserrat', sans-serif; font-weight: 700;">Profil Saya</h2>
    <img src="{{ $user->photo ? asset('storage/'.$user->photo) : 'https://via.placeholder.com/120x120?text=Profil' }}" class="profile-pic" alt="profile">

    <div class="info-container">
        <div class="info-item">
            <div class="info-label">Nama</div><div class="info-value">: {{ $user->name }}</div>
        </div>
        <div class="info-item">
            <div class="info-label">No. Telepon</div><div class="info-value">: {{ $user->phone ?? '-' }}</div>
        </div>
        <div class="info-item">
            <div class="info-label">Email</div><div class="info-value">: {{ $user->email }}</div>
        </div>
        <div class="info-item">
            <div class="info-label">Alamat</div><div class="info-value">: {{ $user->address ?? '-' }}</div>
        </div>
    </div>
    <a href="{{ route('profile.edit') }}" class="edit-btn">Ubah Profil</a>
</div>
</body>
</html> 