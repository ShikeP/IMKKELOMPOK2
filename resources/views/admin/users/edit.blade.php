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
        <h2 class="text-xl font-bold mb-4">Edit User</h2>
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" value="{{ $user->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Role</label>
                <select name="role" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                    <option value="admin" @if($user->role=='admin') selected @endif>Admin</option>
                    <option value="user" @if($user->role=='user') selected @endif>User</option>
                </select>
            </div>
            <div class="pt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded font-semibold">Simpan</button>
                <a href="{{ route('admin.users.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection 