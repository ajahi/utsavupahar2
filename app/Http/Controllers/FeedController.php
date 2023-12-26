<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.index',[
            'products'=>Product::all(),
            'categories'=>Category::all()
        ]);
    }

    public function about_us(){
        return view('frontend.aboutus');
    }

    public function contact_us(){
        return view('frontend.contact');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request )
    {
        $product=Product::where('slug',$request->slug)->get()->first();
        $product->increment('view_count');
        return view('frontend.product',[
            'product'=>$product,
            'similarProduct'=>$product->similarCategoryProduct,
            'reviews'=>$product->review

        ]);
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
