<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponEditRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Requests\CouponRequest;

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
        $coupon = Coupon::create($request->all());
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
        $coupon->update($request->all());
        return redirect()->route('coupon.index')->with('info', 'Coupon updated successfully');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('coupon.index')->with('warning', 'Coupon deleted successfully');
    }
}
