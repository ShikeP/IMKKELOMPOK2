<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Ulasan</title>
</head>
<body>
    <h2>Ulasan Produk</h2>
    <table border="1" cellpadding="6">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Pengguna</th>
                <th>Rating</th>
                <th>Ulasan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach(App\Models\Review::with('food','user')->latest()->get() as $review)
            <tr>
                <td>{{ $review->food->name ?? '-' }}</td>
                <td>{{ $review->user->name ?? '-' }}</td>
                <td>{{ $review->rating }}</td>
                <td>{{ $review->review }}</td>
                <td>
                    <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus ulasan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.products.index') }}">Kembali ke Produk</a>
</body>
</html> 