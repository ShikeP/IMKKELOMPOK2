@extends('layouts.admin')
@section('content')
<div class="container" style="max-width: 900px; margin: 40px auto; background: #fff; min-height: 100vh; box-shadow: 0 2px 8px rgba(0,0,0,0.05); border-radius: 16px; padding: 32px;">
    <div class="header-top" style="display: flex; align-items: center; justify-content: space-between; padding: 0 0 24px 0;">
        <div class="header-title" style="display: flex; align-items: center;">
            <img src="https://img.icons8.com/ios-filled/24/000000/user--v1.png" style="width:28px; margin-right:8px;">
            <h2 style="margin: 0; font-size: 1.5rem; font-family: 'Montserrat', sans-serif; font-weight: 700;">Manajemen User</h2>
        </div>
        <div></div> {{-- Placeholder for right alignment --}}
    </div>
    <div style="font-size:1.5rem; text-align:left; margin-top:20px; margin-bottom:30px; font-family: 'Montserrat', sans-serif; font-weight: 700;"></div>
    <div class="mb-6">
        <div class="stat-card stat-blue" style="flex: 1; border-radius: 12px; padding: 20px 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); display: flex; flex-direction: column; align-items: flex-start; color: #fff; background: linear-gradient(90deg, #4e54c8 60%, #8f94fb 100%);">
            <div class="text-lg font-semibold mb-2" style="font-size: 1rem; color: #fff; margin-bottom: 6px;">Total User</div>
            <div class="text-3xl font-bold" style="font-size: 2rem; font-weight: bold; margin-bottom: 0;">{{ $users->count() }}</div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow p-6" style="box-shadow: none; padding: 0;">
        <div class="flex justify-between items-center mb-4" style="margin-top: 20px; margin-bottom: 20px;">
            <h2 class="text-xl font-bold"></h2> {{-- Removed title to prevent duplication --}}
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($users as $user)
                    <tr>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->role ?? '-' }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs font-semibold" style="background: #f7971e; color: #fff; border-radius: 8px; padding: 8px 12px; font-weight: 600; font-size: 0.9rem; text-decoration: none;">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus user ini?')">
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