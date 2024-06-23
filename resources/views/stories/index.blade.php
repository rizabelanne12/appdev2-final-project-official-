@extends('layout')

@section('content')
<div class="px-5">
    <h1>Stories</h1>
    <a href="{{ route('stories.create') }}">Create New Story</a>
     <div class="px-5 d-flex flex-rows gap-5 py-4">
        @foreach($stories as $story)
            <div>
            <a href="{{ route('stories.show', $story) }}">
                @if ($story->cover_image)
                    <div>
                        <img src="{{ asset('storage/' . $story->cover_image) }}" alt="Cover Image" width="200">
                    </div>
                @endif
                </a>
                <a href="{{ route('stories.show', $story) }}">{{ $story->title }}</a>
            </div>
        @endforeach
     </div>
</div>


   
@endsection
