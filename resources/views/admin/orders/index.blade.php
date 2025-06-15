@extends('layouts.admin')
@section('content')
<div class="container" style="max-width: 900px; margin: 40px auto; background: #fff; min-height: 100vh; box-shadow: 0 2px 8px rgba(0,0,0,0.05); border-radius: 16px; padding: 32px;">
    <div class="header-top" style="display: flex; align-items: center; justify-content: space-between; padding: 0 0 24px 0;">
        <div class="header-title" style="display: flex; align-items: center;">
            <img src="https://img.icons8.com/ios-filled/24/000000/shopping-bag.png" style="width:28px; margin-right:8px;">
            <h2 style="margin: 0; font-size: 1.5rem; font-family: 'Montserrat', sans-serif; font-weight: 700;">Manajemen Pesanan</h2>
        </div>
        <div></div> {{-- Placeholder for right alignment --}}
    </div>
    <div style="font-size:1.5rem; text-align:left; margin-top:20px; margin-bottom:30px; font-family: 'Montserrat', sans-serif; font-weight: 700;"></div>
    <div class="mb-6">
        <div class="stat-card stat-orange" style="flex: 1; border-radius: 12px; padding: 20px 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); display: flex; flex-direction: column; align-items: flex-start; color: #fff; background: linear-gradient(90deg, #f85700 60%, #ff5858 100%);">
            <div class="text-lg font-semibold mb-2" style="font-size: 1rem; color: #fff; margin-bottom: 6px;">Total Pesanan</div>
            <div class="text-3xl font-bold" style="font-size: 2rem; font-weight: bold; margin-bottom: 0;">{{ $orders->count() }}</div>
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
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Produk</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($orders as $order)
                    <tr>
                        <td class="px-4 py-2">{{ $order->user->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $order->product->name ?? '-' }}</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded text-xs font-semibold {{ $order->status == 'selesai' ? 'bg-green-100 text-green-700' : ($order->status == 'batal' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2">{{ $order->created_at->format('d M Y H:i') }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="inline">
                                @csrf
                                <select name="status" class="rounded border-gray-300 text-xs">
                                    <option value="proses" @if($order->status=='proses') selected @endif>Proses</option>
                                    <option value="selesai" @if($order->status=='selesai') selected @endif>Selesai</option>
                                    <option value="batal" @if($order->status=='batal') selected @endif>Batal</option>
                                </select>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded text-xs font-semibold ml-1" style="background: #ff7300; color: #fff; border-radius: 8px; padding: 8px 12px; font-weight: 600; font-size: 0.9rem;">Update</button>
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