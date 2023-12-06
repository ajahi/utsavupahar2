<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();
        return view('cms.review.index', compact('reviews'));
    }

    public function create()
    {
        return view('cms.review.create');
    }

    public function store(ReviewRequest $request)
    {
        $validatedData = $request->validated();
        Review::create($validatedData);
        return redirect()->route('cms.review.index')->with('success', 'Review created successfully');
    }

    public function show(Review $review)
    {
        return view('cms.review.show', compact('review'));
    }

    public function edit(Review $review)
    {
        return view('cms.review.edit', compact('review'));
    }

    public function update(ReviewRequest $request, Review $review)
    {
        $validatedData = $request->validated();
        $review->update($validatedData);
        return redirect()->route('cms.review.index')->with('success', 'Review updated successfully');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('cms.review.index')->with('warning', 'Review deleted successfully');
    }
}
