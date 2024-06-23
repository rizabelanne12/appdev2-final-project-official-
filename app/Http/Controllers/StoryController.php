<?php
namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::with('chapters')->get();
        return view('stories.index', compact('stories'));
    }

    public function create()
    {
        return view('stories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $coverImagePath = null;
        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('covers', 'public');
        }

        Story::create([
            'title' => $request->title,
            'description' => $request->description,
            'cover_image' => $coverImagePath,
        ]);

        return redirect()->route('stories.index');
    }

    public function show(Story $story)
    {
        return view('stories.show', compact('story'));
    }

    public function edit(Story $story)
    {
        return view('stories.edit', compact('story'));
    }

    public function update(Request $request, Story $story)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
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

        return redirect()->route('stories.show', $story);
    }

    public function destroy(Story $story)
    {
        if ($story->cover_image) {
            Storage::disk('public')->delete($story->cover_image);
        }
        $story->delete();

        return redirect()->route('stories.index');
    }
}
