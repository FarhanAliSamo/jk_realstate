<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required',
            'review_text' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules for image uploads.
        ]);

        $review = new Review();
        $review->client_name = $request->input('client_name');
        $review->review_text = $request->input('review_text');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/uploads');
            $review->image_path = Storage::url($imagePath);
        }

        $review->save();

        return redirect()->route('reviews.index')->with('success', 'Review added successfully');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_name' => 'required',
            'review_text' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules for image uploads.
        ]);

        $review = Review::findOrFail($id);
        $review->client_name = $request->input('client_name');
        $review->review_text = $request->input('review_text');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($review->image_path) {
                Storage::delete($review->image_path);
            }

            $imagePath = $request->file('image')->store('public/uploads');
            $review->image_path = Storage::url($imagePath);
        }

        $review->save();

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        // Delete associated image
        if ($review->image_path) {
            Storage::delete($review->image_path);
        }

        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully');
    }
}
