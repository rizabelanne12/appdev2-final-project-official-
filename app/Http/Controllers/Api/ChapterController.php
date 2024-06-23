<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index(Story $story)
    {
        return response()->json($story->chapters);
    }

    public function store(Request $request, Story $story)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $chapter = $story->chapters()->create($request->all());

        return response()->json($chapter, 201);
    }

    public function show(Story $story, Chapter $chapter)
    {
        return response()->json($chapter);
    }

    public function update(Request $request, Story $story, Chapter $chapter)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $chapter->update($request->all());

        return response()->json($story);
    }

    public function destroy(Story $story, Chapter $chapter)
    {
        $chapter->delete();

        return response()->json(null, 204);
    }
}

