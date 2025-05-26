<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Produk</title>
</head>
<body>
    <h2>Ubah Produk</h2>
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama:</label><br>
        <input type="text" name="name" value="{{ $product->name }}" required><br>
        <label>Harga (Rp):</label><br>
        <input type="number" name="price" value="{{ $product->price }}" required><br>
        <label>Kategori:</label><br>
        <select name="category_id" required>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" @if($cat->id == $product->category_id) selected @endif>{{ $cat->name }}</option>
            @endforeach
        </select><br>
        <label>Gambar (path):</label><br>
        <input type="text" name="image" value="{{ $product->image }}"><br>
        <label>Deskripsi:</label><br>
        <textarea name="description">{{ $product->description }}</textarea><br>
        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('admin.products.index') }}">Kembali</a>
</body>
</html> 