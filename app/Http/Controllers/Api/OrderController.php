<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return OrderResource::collection($orders);
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->validated());
        return new OrderResource($order);
    }

    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return new OrderResource($order);
    }

    public function update(UpdateOrderRequest $request, string $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->validated());
        return new OrderResource($order);
    }

    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json(null, 204);
    }
}