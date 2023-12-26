<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart as Cart;
use Auth;
use Illuminate\Validation\Rules\Unique;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.cart',[
            'items'=>Cart::content()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function removeItem($id){
        Cart::remove($id);
        return redirect()->back();
    }

    public function reduceItemByOne(Request $request){
        Cart::update($request->rowid,1);
        return redirect()->back();
    }
    public function addItemByOne(Request $request){
        Cart::update($request->rowid,1);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Product=Product::findOrFail($request->product_id);
        $userID=Auth::id();
        
        Cart::add($Product->id, $Product->name, 1, $Product->purchase_price*$Product->sell_margin_p,['variant'=>$Product->variants()->first()->name])->associate($Product);
        return redirect()->back()->with('success','successfully added item to cart.');
        
    }

    public function checkout(){
        $shippment=100.00;
        Cart::tax(0);
        $totalCostString = str_replace(',', '', Cart::subtotal());
        $totalCost= (int)$totalCostString + $shippment; 
        return view('frontend.checkout',[
            'cart_items'=>Cart::content(),
            'user_details'=>Auth::user(),
            'totalCost'=>$totalCost
        ]);
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
