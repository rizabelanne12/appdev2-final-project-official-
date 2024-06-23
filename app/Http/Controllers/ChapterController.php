<?php
namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Story;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function create(Story $story)
    {
        return view('chapters.create', compact('story'));
    }

    public function store(Request $request, Story $story)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $story->chapters()->create($request->all());

        return redirect()->route('stories.show', $story);
    }

    public function show(Story $story, Chapter $chapter)
    {
        return view('chapters.show', compact('story', 'chapter'));
    }

    public function edit(Story $story, Chapter $chapter)
    {
        return view('chapters.edit', compact('story', 'chapter'));
    }

    public function update(Request $request, Story $story, Chapter $chapter)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $chapter->update($request->all());

        return redirect()->route('stories.show', $story);
    }

    public function destroy(Story $story, Chapter $chapter)
    {
        $chapter->delete();

        return redirect()->route('stories.show', $story);
    }
}
