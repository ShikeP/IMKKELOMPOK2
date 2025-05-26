<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body, html { margin: 0; padding: 0; background: #fafafa; font-family: 'Open Sans', sans-serif; }
        .container { max-width: 420px; margin: 0 auto; background: #fff; min-height: 100vh; box-shadow: 0 0 24px rgba(0,0,0,0.06); padding-bottom: 40px; }
        .header { display: flex; align-items: center; padding: 24px 20px 0 20px; }
        .header-title { flex: 1; text-align: center; font-size: 1.4rem; font-family: 'Montserrat', sans-serif; font-weight: 700; }
        .back-btn { background: none; border: none; font-size: 1.7rem; color: #ff7300; cursor: pointer; }
        .profile-pic { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; display: block; margin: 24px auto 18px auto; border: 4px solid #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .form-group { margin: 0 20px 16px 20px; }
        label { display: block; margin-bottom: 6px; font-weight: 600; color: #ff7300; }
        input, textarea { width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #eee; font-size: 1rem; margin-bottom: 4px; }
        .save-btn { background: #ff4d4d; color: #fff; border: none; border-radius: 18px; padding: 12px 0; font-weight: 700; font-size: 1.1rem; width: 90%; margin: 18px auto 0 auto; display: block; cursor: pointer; }
        .cancel-link { display: block; text-align: center; margin-top: 12px; color: #ff7300; text-decoration: none; }
    </style>
</head>
<body>
<div class="container">
    @if($errors->any())
        <div style="background: #ff4d4d; color: white; padding: 12px; margin: 0 20px 20px 20px; border-radius: 8px; text-align: center;">
            {{ $errors->first() }}
        </div>
    @endif
    <div class="header">
        <a href="{{ route('profile.show') }}" class="back-btn" style="text-decoration:none;">&#8592;</a>
        <div class="header-title">Edit Profil</div>
        <div style="width:32px;"></div>
    </div>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <img src="{{ $user->photo ? asset('storage/'.$user->photo) : 'https://randomuser.me/api/portraits/men/32.jpg' }}" class="profile-pic" alt="profile" id="previewImg">
        <div class="form-group">
            <label>Foto (Upload)</label>
            <input type="file" name="photo" accept="image/*" onchange="previewFile(this)">
            @error('photo')
                <div style="color: #ff4d4d; font-size: 0.9rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div style="color: #ff4d4d; font-size: 0.9rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div style="color: #ff4d4d; font-size: 0.9rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>No. Telepon</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}">
            @error('phone')
                <div style="color: #ff4d4d; font-size: 0.9rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="address">{{ old('address', $user->address) }}</textarea>
            @error('address')
                <div style="color: #ff4d4d; font-size: 0.9rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="save-btn">Simpan</button>
        <a href="{{ route('profile.show') }}" class="cancel-link">Batal</a>
    </form>
</div>
<script>
function previewFile(input) {
    var file = input.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}
</script>
</body>
</html> 