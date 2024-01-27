<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponEditRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Requests\CouponRequest;
use App\Models\Product;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('cms.coupon.index', compact('coupons'));
    }

    public function create()
    {
        return view('cms.coupon.create');
    }

    public function store(CouponRequest $request)
    {
        $data = $request->validated();
        $coupon = Coupon::create([
            'code' => $data['code'],
            'title' => $data['title'],
            'discount_type' => $data['discount_type'],
            'discount_value' => $data['discount_value'],
            'min_order_amount' => $data['min_order_amount'],
            'max_uses' => $data['max_uses'],
            'start_date' => $data['start_date'],
            'is_active' => array_key_exists('is_active', $data),
            'free_shipping' => array_key_exists('free_shipping', $data),
            'all_products' => array_key_exists('all_products', $data),
        ]);
        if (array_key_exists('all_products', $data)) {
            $coupon->products()->sync(Product::all());
        }
        return redirect()->route('coupon.index')->with('success', 'Coupon created successfully');
    }

    public function show(Coupon $coupon)
    {
        return view('cms.coupon.show', compact('coupon'));
    }

    public function edit(Coupon $coupon)
    {
        return view('cms.coupon.edit', compact('coupon'));
    }

    public function update(CouponEditRequest $request, Coupon $coupon)
    {
        $data = $request->validated();
        // dd($data);
        if (array_key_exists('all_products', $data)) {
            $coupon->products()->sync(Product::all());
        } else if ($coupon->all_products) {
            $coupon->products()->detach(Product::all());
        }
        $coupon->update([
            'code' => $data['code'],
            'title' => $data['title'],
            'discount_type' => $data['discount_type'],
            'discount_value' => $data['discount_value'],
            'min_order_amount' => $data['min_order_amount'],
            'max_uses' => $data['max_uses'],
            'start_date' => $data['start_date'],
            'is_active' => array_key_exists('is_active', $data),
            'free_shipping' => array_key_exists('free_shipping', $data),
            'all_products' => array_key_exists('all_products', $data),
        ]);

        return redirect()->route('coupon.index')->with('info', 'Coupon updated successfully');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('coupon.index')->with('warning', 'Coupon deleted successfully');
    }
}
