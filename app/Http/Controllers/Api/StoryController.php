<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::with('chapters')->get();
        return response()->json($stories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $coverImagePath = null;
        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('covers', 'public');
        }

        $story = Story::create([
            'title' => $request->title,
            'description' => $request->description,
            'cover_image' => $coverImagePath,
        ]);

        return response()->json($story, 201);
    }

    public function show(Story $story)
    {
        return response()->json($story->load('chapters'));
    }

    public function update(Request $request, Story $story)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($story->cover_image) {
                Storage::disk('public')->delete($story->cover_image);
            }
            $coverImagePath = $request->file('cover_image')->store('covers', 'public');
            $story->cover_image = $coverImagePath;
        }

        $story->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json($story);
    }

    public function destroy(Story $story)
    {
        if ($story->cover_image) {
            Storage::disk('public')->delete($story->cover_image);
        }
        $story->delete();

        return response()->json(null, 204);
    }
}
