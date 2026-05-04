<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\Purchase;

class DashboardController extends Controller
{
    public function index()
{
    $totalExpenses = Purchase::sum('total');
    $totalStock = Product::sum('stock');
    $totalSales = Sale::count();
    $totalRevenue = Sale::sum('total');

    $lowStock = Product::where('stock', '<', 6)->get();
    $recentPurchases = Purchase::latest()->take(5)->get();

   $purchasesChart = Purchase::select(
    \DB::raw('DATE(purchase_date) as date'),
    \DB::raw('SUM(total) as total')
)
    ->groupBy('date')
    ->orderBy('date', 'ASC')
    ->get();

$purchasesChartData = $purchasesChart->map(function ($item) {
    return [
        'date' => $item->date,
        'total' => $item->total,
    ];
});

    return view('dashboard', compact(
        'totalExpenses',
        'totalStock',
        'totalSales',
        'totalRevenue',
        'lowStock',
        'recentPurchases',
        'purchasesChartData'
    ));
}
}
