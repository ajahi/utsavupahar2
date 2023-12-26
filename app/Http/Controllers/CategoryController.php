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
        $categories = Category::where('parent_id',null)->get();
        return view('cms.categories.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'parent_id'=>'nullable|exists:categories,id'
        ]);
        $request['slug']=Str::slug($request->name);
        Category::create($request->all());
        return redirect()->route('category.index')->with('success','Category created successfully!');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function showBySlug(Request $request){
        $cat=Category::where('slug',$request->slug)->first();
        
        return view('frontend.category',[
            'category'=>$cat,
            'products'=>$cat->products,
            'categories'=>Category::all()
        ]);
    }

    public function edit(Category $category)
    {
        $categories = Category::where('parent_id',null)->get();
        return view('cms.categories.edit', compact('category','categories'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'parent_id'=> 'nullable|exists:categories,id'
        ]);

        $category->update($request->all());

        return redirect()->route('category.index')->with('info', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
       
        return redirect()->route('category.index')->with('warning','Successfully deleted your category.');
    }
}
