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
        $orders = Order::all();
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
}
