@extends('layouts.admin')
@section('content')
<div class="container" style="margin: 40px auto; background: #fff; min-height: 100vh; box-shadow: 0 2px 8px rgba(0,0,0,0.05); border-radius: 16px; padding: 32px;">
    <div class="header-top" style="display: flex; align-items: center; justify-content: space-between; padding: 0 0 24px 0;">
        <div class="header-title" style="display: flex; align-items: center;">
            <img src="https://img.icons8.com/ios-filled/24/000000/restaurant-menu.png" style="width:28px; margin-right:8px;">
            <h2 style="margin: 0; font-size: 1.5rem; font-family: 'Montserrat', sans-serif; font-weight: 700;">Manajemen Menu</h2>
        </div>
        <div></div> {{-- Placeholder for right alignment --}}
    </div>
    <div style="font-size:1.5rem; text-align:left; margin-top:20px; margin-bottom:30px; font-family: 'Montserrat', sans-serif; font-weight: 700;"></div>
    <div class="mb-6">
        <div class="stat-card" style="flex: 1; border-radius: 12px; padding: 20px 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); display: flex; flex-direction: column; align-items: flex-start; color: #fff; background: linear-gradient(90deg, #f7971e 60%, #ffd200 100%);">
            <div class="stat-title" style="font-size: 1rem; color: #fff; margin-bottom: 6px;">Total Produk</div>
            <div class="stat-value" style="font-size: 2rem; font-weight: bold; margin-bottom: 0;">{{ $products->count() }}</div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow p-6" style="box-shadow: none; padding: 0;">
        <div class="flex justify-between items-center mb-4" style="margin-top: 20px; margin-bottom: 20px;">
            <div class="search-bar" style="display: flex; gap: 8px; flex: 1;">
                <input type="text" placeholder="Cari nama makanan" style="flex: 1; padding: 12px; border-radius: 8px; border: 1px solid #eee; font-size: 1rem;">
                <button style="background: #ff7300; color: #fff; border: none; border-radius: 8px; padding: 0 12px; font-size: 1.2rem; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                    <img src="https://img.icons8.com/ios-filled/24/ffffff/search--v1.png" style="width:20px; height:20px;">
                </button>
            </div>
            <a href="{{ route('admin.products.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded font-semibold text-sm" style="background: #ff7300; color: #fff; border-radius: 8px; padding: 12px 20px; font-weight: 600; font-size: 1rem; text-decoration: none; margin-left: 10px;">Tambah</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($products as $product)
                    <tr>
                        <td class="px-4 py-2">{{ $product->name }}</td>
                        <td class="px-4 py-2">Rp{{ number_format($product->price,0,',','.') }}</td>
                        <td class="px-4 py-2">{{ $product->category->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $product->description }}</td>
                        <td class="px-4 py-2">@if($product->image)<img src="{{ asset('storage/' . $product->image) }}" class="w-16 h-16 object-cover rounded" />@endif</td>
                        <td class="px-4 py-2 space-x-2" style="display: flex; gap: 8px;">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs font-semibold" style="background: #f7971e; color: #fff; border-radius: 8px; padding: 8px 12px; font-weight: 600; font-size: 0.9rem; text-decoration: none;">Ubah</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs font-semibold" style="background: #e53935; color: #fff; border-radius: 8px; padding: 8px 12px; font-weight: 600; font-size: 0.9rem;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 