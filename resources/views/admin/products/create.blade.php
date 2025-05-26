<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Tambah Produk</h2>
    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf
        <label>Nama:</label><br>
        <input type="text" name="name" required><br>
        <label>Harga (Rp):</label><br>
        <input type="number" name="price" required><br>
        <label>Kategori:</label><br>
        <select name="category_id" required>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select><br>
        <label>Gambar (path):</label><br>
        <input type="text" name="image"><br>
        <label>Deskripsi:</label><br>
        <textarea name="description"></textarea><br>
        <button type="submit">Tambah</button>
    </form>
    <a href="{{ route('admin.products.index') }}">Kembali</a>
</body>
</html> 