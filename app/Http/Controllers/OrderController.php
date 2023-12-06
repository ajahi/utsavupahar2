<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('cms.order.index', compact('orders'));
    }

    public function create()
    {
        return view('cms.order.create');
    }

    public function store(OrderRequest $request)
    {
        $validatedData = $request->validated();

        // Create a new order using the validated data
        $order=Order::create($validatedData);
        

        // Redirect to the order index page or a success page
        return redirect()->route('cms.order.index');
    }

    public function show(Order $order)
    {
        return view('cms.order.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('cms.order.edit', compact('order'));
    }

    public function update(OrderRequest $request, Order $order)
    {
        $validatedData = $request->validated();

        // Update the order using the validated data
        $order->update($validatedData);

        // Redirect to the order index page or a success page
        return redirect()->route('cms.order.index');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        // Redirect to the order index page or a success page
        return redirect()->route('cms.order.index');
    }
}
