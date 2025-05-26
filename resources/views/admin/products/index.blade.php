<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Produk</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f3f3f3; }
        .actions a, .actions form { display: inline-block; margin-right: 6px; }
    </style>
</head>
<body>
    <h2>Daftar Produk</h2>
    <a href="{{ route('admin.products.create') }}">Tambah Produk</a>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>Rp{{ number_format($product->price,0,',','.') }}</td>
                <td>{{ $product->category->name ?? '-' }}</td>
                <td>{{ $product->description }}</td>
                <td>@if($product->image)<img src="/{{ $product->image }}" width="60">@endif</td>
                <td class="actions">
                    <a href="{{ route('admin.products.edit', $product->id) }}">Ubah</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus produk ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 