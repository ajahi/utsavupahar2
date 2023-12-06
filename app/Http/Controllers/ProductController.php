<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Variant;

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::paginate(20);
        return view('cms.product.index',[
            'products'=>$products
        ]);

        // Transform the paginated products into ProductResource
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {   
        $product = Product::create($request->safe()->only('name','description','refundable','featured','meta_word','meta_description','weight','dimension','purchase_price','discount_p','sell_margin_p'));
        $request->slug=Str::slug($request->name);
        $product->category()->sync(explode(',', $request->selected_categories ));
        for($i=0;$i<count(array_filter($request->variants));$i++){
            Variant::create([
                'name'=>$request->variants[$i],
                'status'=>$request->status[$i],
                'quantity'=>$request->quantities[$i],
                'price'=>$request->prices[$i],
                'product_id'=> $product->id
            ]); 
        }
        if($request->has('images')&&$request->images!==null){
            $product->addMediaFromRequest('images')->toMediaCollection('images');
        }
        return redirect()->route('product.index')->with('success','Succesfully created your Product.');
    }

    /**
     * Display the specified resource.
     */

     public function create(){

       return view('cms.product.create',[
        'categories'=>Category::all()
       ]);
     }
     
    public function show(Product $product)
    {
        return view('cms.product.show',['product'=>$product]);
    }

    public function edit(Product $product){
        return view('cms.product.edit',
        [   'product'=>$product,
            'selected_categories'=>$product->category()->pluck('id'),
            'categories'=>Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {   
        $variants=$product->variants;
        $product->update($request->safe()->only('name','description','refundable','featured','meta_word','meta_description','weight','dimension','purchase_price','discount_p','sell_margin_p'));
        $product->save();
        $product->category()->sync(explode(',', $request->selected_categories ));
        if(count(array_filter($request->variants)) > count($variants)){
           $product->variants()->delete();

           for($i=0;$i<count(array_filter($request->variants));$i++){//if new variants is added
                Variant::create([
                    'name'=>$request->variants[$i],
                    'status'=>$request->status[$i],
                    'quantity'=>$request->quantities[$i],
                    'price'=>$request->prices[$i],
                    'product_id'=> $product->id
                ]); 
            }
        }
        if($request->has('images')&&$request->images!==null){
            if($product->getMedia('images')->first()!==null){
                $product->getMedia('images')->first()->delete();
                $product->addMediaFromRequest('images')->toMediaCollection('images');
            }
            $product->addMediaFromRequest('images')->toMediaCollection('images');
        }
        return redirect()->route('product.index')->with('info','Succesfully updated your Product.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('warning','Succesfully deleted your Product.');
    }
}
