<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Checkout;
use App\Models\Review;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $productCount = Food::count();
        $orderCount = Checkout::count();
        $reviewCount = Review::count();

        // Contoh data chart: jumlah pesanan per hari 7 hari terakhir
        $ordersPerDay = Checkout::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->where('created_at', '>=', now()->subDays(6)->startOfDay())
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Format data untuk chart
        $chartLabels = [];
        $chartData = [];
        $dates = collect(range(0, 6))->map(fn($i) => now()->subDays(6 - $i)->format('Y-m-d'));
        foreach ($dates as $date) {
            $chartLabels[] = $date;
            $found = $ordersPerDay->firstWhere('date', $date);
            $chartData[] = $found ? $found->total : 0;
        }

        return view('admin.dashboard', compact(
            'userCount', 'productCount', 'orderCount', 'reviewCount', 'chartLabels', 'chartData'
        ));
    }
} 