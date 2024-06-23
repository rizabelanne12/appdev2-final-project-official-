@extends('layout')

@section('content')
<a href="{{ route('stories.index', $story) }}" class="p-3">back</a>
<div class="p-3 d-flex flex-rows gap-5 px-3">
  <div class="">
        <h1 style="color:black">{{ $story->title }}</h1>
        <p style="color:grey;">{{ $story->description }}</p>

        @if ($story->cover_image)
            <div>
                <img src="{{ asset('storage/' . $story->cover_image) }}" alt="Cover Image" width="200">
            </div>
        @endif

        <div class="d-flex flex-rows gap-4 py-4">
            <a href="{{ route('stories.edit', $story) }}">Edit</a>
            <form method="POST" action="{{ route('stories.destroy', $story) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>

    </div>
    <div class="d-flex flex-column gap-2 px-3">
       
        <h2 class="pt-4">Chapters</h2>
        <a href="{{ route('stories.chapters.create', $story) }}" style="color:darkorange;">Add Chapter</a>
        
        
            @foreach($story->chapters as $chapter)
            <div>
                <a href="{{ route('stories.chapters.show', [$story, $chapter]) }}">
                    <div class="border shadow-sm p-3 px-3 bg-white rounded" style="width:450%;">
                        {{ $chapter->title }}
                    </div>
                </a>
            </div>
            @endforeach
        
    </div>
</div>
@endsection
