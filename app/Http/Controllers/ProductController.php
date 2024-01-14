<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Variant;

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Coupon;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        $search = $request->input('search');
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%')->get();
        }

        $products = $query->paginate(10);

        return view('cms.product.index', [
            'products' => $products
        ]);
    }

    // Transform the paginated products into ProductResource



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        if (!$request->refundable) {
            $request->refundable = 0;
        }
        if (!$request->featured) {
            $request->featured = 0;
        }
        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'refundable' => $request->refundable,
            'featured' => $request->featured,
            'meta_word' => $request->meta_word,
            'meta_description' => $request->meta_description,
            'weight' => $request->weight,
            'dimension' => $request->dimension,
            'purchase_price' => $request->purchase_price,
            'discount_p' => $request->discount_p,
            'sell_margin_p' => $request->sell_margin_p,

        ]);

        $product->category()->sync(explode(',', $request->selected_categories));
        $product->coupons()->sync(explode(',', $request->selected_coupons));
        for ($i = 0; $i < count(array_filter($request->variants)); $i++) {
            Variant::create([
                'name' => $request->variants[$i],
                'status' => $request->status[$i],
                'quantity' => $request->quantities[$i],
                'price' => $request->prices[$i],
                'product_id' => $product->id
            ]);
        }

        if ($request->hasFile('images')) {
            $fileAdders = $product->addMultipleMediaFromRequest(['images'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('images');
                });
        }
        return redirect()->route('product.index')->with('success', 'Succesfully created your Product.');
    }

    /**
     * Display the specified resource.
     */

    public function create()
    {

        return view('cms.product.create', [
            'categories' => Category::all(),
            'coupons' => Coupon::where('is_active', true)->get(),
            'selected_coupons' => Coupon::where('is_active', true)->where('all_products', true)->pluck('id'),
        ]);
    }

    public function show(Product $product)
    {
        return view(
            'cms.product.show',
            [
                'product' => $product,
                'reviews' => $product->review
            ]
        );
    }

    public function edit(Product $product)
    {
        return view(
            'cms.product.edit',
            [
                'product' => $product,
                'selected_categories' => $product->category()->pluck('id'),
                'categories' => Category::all(),
                'coupons' => Coupon::where('is_active', true)->get(),
                'selected_coupons' => $product->coupons()->pluck('coupons.id'),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {

            $variants = $product->variants;
            $product->update($request->safe()->only('name', 'description', 'refundable', 'featured', 'meta_word', 'meta_description', 'weight', 'dimension', 'purchase_price', 'discount_p', 'sell_margin_p'));
            $product->save();
            $product->category()->sync(explode(',', $request->selected_categories));
            $product->coupons()->sync(explode(',', $request->selected_coupons));
            if (count(array_filter($request->variants)) > count($variants)) {
                $product->variants()->delete();

                for ($i = 0; $i < count(array_filter($request->variants)); $i++) { //if new variants is added
                    Variant::create([
                        'name' => $request->variants[$i],
                        'status' => $request->status[$i],
                        'quantity' => $request->quantities[$i],
                        'price' => $request->prices[$i],
                        'product_id' => $product->id
                    ]);
                }
            }

            if ($request->has('images') && $request->images !== null) {
                // Check if there is an existing image
                $existingImage = $product->getFirstMedia('images');

                if ($existingImage !== null) {
                    // Delete the existing image
                    $existingImage->delete();
                }

                // Add the new images
                $fileAdders = $product->addMultipleMediaFromRequest(['images'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('images');
                    });
            }
        } catch (\Exception $error) {
            dd($error);
        }


        return redirect()->route('product.index')->with('info', 'Succesfully updated your Product.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('warning', 'Succesfully deleted your Product.');
    }
}
