@extends('layouts.admin')
@section('content')
<div class="max-w-xl mx-auto py-8">
    <div class="mb-4">
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-orange-600 hover:underline mb-2">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
            Kembali ke Dashboard
        </a>
    </div>
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-xl font-bold mb-4">Edit Produk</h2>
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
                <input type="text" name="name" value="{{ $product->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="price" value="{{ $product->price }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" @if($product->category_id == $cat->id) selected @endif>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">{{ $product->description }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="w-20 h-20 object-cover rounded mt-2" />
                @endif
            </div>
            <div class="pt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded font-semibold">Simpan</button>
                <a href="{{ route('admin.products.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection 