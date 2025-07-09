<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('package')->get();
        return response()->json($orders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|integer|exists:users,id',
            'package_id' => 'required|integer|exists:packages,id',
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'status' => 'nullable|string',
            'payment_status' => 'nullable|string',
            'midtrans_order_id' => 'nullable|string',
            'total_price' => 'required|numeric|min:0',
        ]);
        $order = Order::create($validated);
        return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $validated = $request->validate([
            'user_id' => 'nullable|integer|exists:users,id',
            'package_id' => 'sometimes|required|integer|exists:packages,id',
            'name' => 'sometimes|required|string|max:255',
            'contact' => 'sometimes|required|string|max:255',
            'date' => 'sometimes|required|date',
            'location' => 'sometimes|required|string|max:255',
            'notes' => 'nullable|string',
            'status' => 'nullable|string',
            'payment_status' => 'nullable|string',
            'midtrans_order_id' => 'nullable|string',
            'total_price' => 'sometimes|required|numeric|min:0',
        ]);
        $order->update($validated);
        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json(['message' => 'Order deleted successfully.']);
    }

    // Statistik order per bulan (12 bulan terakhir)
    public function ordersPerMonth()
    {
        $orders = Order::selectRaw('YEAR(date) as year, MONTH(date) as month, COUNT(*) as total')
            ->where('date', '>=', now()->subMonths(11)->startOfMonth())
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Siapkan array 12 bulan terakhir
        $labels = [];
        $data = [];
        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $labels[] = $date->format('M');
            $found = $orders->first(fn($o) => $o->year == $date->year && $o->month == $date->month);
            $data[] = $found ? (int) $found->total : 0;
        }
        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }

    // Statistik dashboard lengkap
    public function dashboardStats()
    {
        $total_users = \App\Models\User::count();
        $total_orders = \App\Models\Order::count();
        $total_packages = \App\Models\Package::count();
        $total_portfolios = \App\Models\Portfolio::count();

        $latest_orders = \App\Models\Order::orderBy('created_at', 'desc')->take(5)->get();
        $latest_users = \App\Models\User::orderBy('created_at', 'desc')->take(5)->get();

        $notifications = [
            [
                'type' => 'order',
                'message' => 'Order baru masuk',
                'time' => '5 menit yang lalu',
            ],
            [
                'type' => 'user',
                'message' => 'User baru mendaftar',
                'time' => '10 menit yang lalu',
            ],
            [
                'type' => 'payment',
                'message' => 'Pembayaran diterima',
                'time' => '30 menit yang lalu',
            ],
        ];

        return response()->json([
            'total_users' => $total_users,
            'total_orders' => $total_orders,
            'total_packages' => $total_packages,
            'total_portfolios' => $total_portfolios,
            'latest_orders' => $latest_orders,
            'latest_users' => $latest_users,
            'notifications' => $notifications,
        ]);
    }
}
