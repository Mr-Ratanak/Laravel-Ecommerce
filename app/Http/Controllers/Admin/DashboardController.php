<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {   
        $countTotalCompleted = 0;
        $countTotalPending = 0;
        
        $todayOrder = Carbon::now()->format('Y-m-d');
        $totalMonth = Carbon::now()->format('m');
        $totalyear = Carbon::now()->format('Y');

        $totalProduct = Products::count();
        $totalCategory = Category::count();
        $totalBrand = Brand::count();
        $allUser = User::count();
        $totalUser = User::where('role_as', '0')->count();
        $totalAdmin = User::where('role_as', '1')->count();
        $totalOrder = Order::sum('total_price');

        $totalTodayOrder = Order::whereDate('created_at', $todayOrder)->count();
        $totalMonthOrder = Order::whereMonth('created_at', $totalMonth)->count();
        $totalYearOrder = Order::whereYear('created_at', $totalyear)->count();

        $completedTotalSum = Order::where('status_message', 'completed')->sum('total_price');
        $totalCompleted = Order::where('status_message','completed')->count();
        $countTotalCompleted += $totalCompleted;

        $pendingTotalSum = Order::where('status_message','pending')->sum('total_price');
        $totalPending = Order::where('status_message','pending')->count();
        $countTotalPending += $totalPending;
        
        return view('admin.dashboard', compact(
            'totalProduct',
            'totalCategory',
            'totalBrand',
            'allUser',
            'totalUser',
            'totalAdmin',
            'totalOrder',
            'totalTodayOrder',
            'totalMonthOrder',
            'totalYearOrder',
            'countTotalCompleted',
            'completedTotalSum',
            'countTotalPending',
            'pendingTotalSum',
        ));
    }
}
