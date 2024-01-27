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
use App\Models\User;
use App\Notifications\CartCheckedOut;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Number;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->user()->cannot('viewAny', Order::class)) {
            return back()->with('warning', 'You are not authorized to perform this task');
        }
        $query = Order::query();

        // Check if a search term is provided
        $search = $request->input('search');
        if ($search) {
            // Add search conditions based on your specific criteria
            $query->where('order_number', $search)->get();

            // Add more conditions as needed for other searchable fields
        }

        // Paginate the results with 10 items per page (you can adjust as needed)
        $orders = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('cms.order.index', compact('orders', 'search'));
    }


    public function create()
    {
        if (request()->user()->cannot('create', Order::class)) {
            return back()->with('warning', 'You are not authorized to perform this task');
        }
        return view('cms.order.create');
    }

    public function store(OrderRequest $request)
    {
        if (request()->user()->cannot('create', Order::class)) {
            return back()->with('warning', 'You are not authorized to perform this task');
        }
        $request['user_id'] = Auth::id();
        $request['order_number'] = '#' . substr(User::find(Auth::id())->phone_number, 5 - 9) . Order::count();
        $totalCostString = str_replace(',', '', Cart::total());
        $request['total_amount'] = (int)$totalCostString;
        $request['status'] = 'ordered';
        if ($request->preferred_delivery_date) {
            $request['preferred_delivery_date'];
        }
        //create order
        $order = Order::create($request->all());
        //assign order-.details to created order
        foreach (Cart::content()->toArray() as $product) {
            $orderItem = $order->items()->create([
                'order_id' => '#' . substr(Auth::user()->phone_number, 5 - 9) . '_' . Order::count(),
                'product_id' => $product['id'],
                'quantity' => $product['qty'],
                'unit_price' => $product['price'],
                'total_price' => $product['qty'] * $product['price']
            ]);
            $orderItem->save();
            //empties cart.
            Cart::remove($product['rowId']);
        }
        $admins = User::all();
        Notification::send($admins, new CartCheckedOut($order));
        return redirect()->route('order.success', $order->id)->with('success', 'you have successfully placed an order');
    }

    public function show(Order $order)
    {
        if (request()->user()->cannot('view', $order)) {
            return back()->with('warning', 'You are not authorized to perform this task');
        }
        $orderDetail = $order->items;
        $shipping = 100.00;
        $totalCost = $shipping + $order->total_amount;
        return view('cms.order.show', [
            'orderDetail' => $orderDetail,
            'order' => $order,
            'expected_delivery_date' => $order->created_at->addDays(4),
            'shipping' => $shipping,
            'total' => Number::format($totalCost),
            'subTotal' => Number::format($order->total_amount),
            'user' => $order->user
        ]);
    }

    public function edit(Order $order)
    {
        if (request()->user()->cannot('update', $order)) {
            return back()->with('warning', 'You are not authorized to perform this task');
        }
        return view('cms.order.edit', compact('order'));
    }

    public function update(OrderRequest $request, Order $order)
    {
        if (request()->user()->cannot('update', $order)) {
            return back()->with('warning', 'You are not authorized to perform this task');
        }
        $validatedData = $request->validated();

        // Update the order using the validated data
        $order->update($validatedData);

        // Redirect to the order index page or a success page
        return redirect()->route('cms.order.index');
    }

    public function destroy(Order $order)
    {
        if (request()->user()->cannot('create', $order)) {
            return back()->with('warning', 'You are not authorized to perform this task');
        }
        $order->delete();

        // Redirect to the order index page or a success page
        return redirect()->route('cms.order.index');
    }

    public function orderSuccess($id)
    {
        if (request()->user()->cannot('view', Order::find($id))) {
            return back()->with('warning', 'You are not authorized to perform this task');
        }
        $order = Order::findOrFail($id);
        return view('frontend.order-success', [
            'order' => $order,
            'expected_delivery_date' => $order->created_at->addDays(4)
        ]);
    }

    public function track($id)
    {
        if (request()->user()->cannot('view', Order::find($id))) {
            return back()->with('warning', 'You are not authorized to perform this task');
        }
        $order = Order::findOrFail($id);
        return view('frontend.track-order', ['order' => $order]);
    }
}
