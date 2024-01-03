<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('cms.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::where('parent_id', null)->get();
        return view('cms.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'parent_id' => 'nullable|exists:categories,id',
            'images' => 'nullable',
        ]);
        $request['slug'] = Str::slug($request->name);
        $category = Category::create($request->except(['images']));
        if ($request->hasFile('images')) {
            $fileAdders = $category->addMultipleMediaFromRequest(['images'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('images');
                });
        }
        return redirect()->route('category.index')->with('success', 'Category created successfully!');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function showBySlug(Request $request)
    {
        $cat = Category::where('slug', $request->slug)->first();

        return view('frontend.category', [
            'category' => $cat,
            'products' => $cat->products,
            'categories' => Category::all()
        ]);
    }

    public function edit(Category $category)
    {
        $categories = Category::where('parent_id', null)->get();
        return view('cms.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'parent_id' => 'nullable|exists:categories,id',
            'images' => 'nullable',
        ]);

        $category->update($request->except(['images']));
        if ($request->has('images') && $request->images !== null) {
            // Check if there is an existing image
            $existingImage = $category->getFirstMedia('images');

            if ($existingImage !== null) {
                // Delete the existing image
                $existingImage->delete();
            }

            // Add the new images
            $fileAdders = $category->addMultipleMediaFromRequest(['images'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('images');
                });
        }
        return redirect()->route('category.index')->with('info', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('warning', 'Successfully deleted your category.');
    }
}
