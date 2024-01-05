<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cms.blogs.index', [
            'blogs' => Blog::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();

        $blog = Blog::create(array_diff_key($data, array_flip(['images'])));

        if ($request->hasFile('images')) {
            $blog->addMultipleMediaFromRequest(['images'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('images');
                });
        }
        return redirect()->route('blog.index')->with('success', "Blog Created Succesfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $data = [
            'blog' => $blog,
            'latest_posts' => Blog::latest()->limit(5),
            'categories' => Category::all(),
            'trending_products' => Product::all(),
        ];
        return view('frontend.blog.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('cms.blogs.edit', [
            'blog' => $blog,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $data = $request->validated();
        $blog->update($data);

        if ($request->has('images')) {
            // Check if there is an existing image
            $existingImage = $blog->getFirstMedia('images');

            if ($existingImage !== null) {
                // Delete the existing image
                $existingImage->delete();
            }

            // Add the new images
            $blog->addMultipleMediaFromRequest(['images'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('images');
                });
        }
        return redirect()->route('blog.index')->with('success', "Blog updated succesfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back()->with('warning', 'Blog deleted succesfully');
    }

    // frontend
    public function blogs()
    {
        $data = [
            'blogs' => Blog::paginate(10),
            'latest_posts' => Blog::latest()->limit(5),
            'categories' => Category::all(),
            'trending_products' => Product::all(),
        ];
        return view('frontend.blog.index', $data);
    }
}
