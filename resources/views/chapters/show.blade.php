@extends('layout')

@section('content')
<a href="{{ route('stories.show', $story) }}" class="p-3">back</a>
<div class="p-4">
    <h1>{{ $chapter->title }}</h1>
    <p>{{ $chapter->content }}</p>
<div class="d-flex flex-rows gap-5">
    <a href="{{ route('stories.chapters.edit', [$story, $chapter]) }}">Edit</a>
    <form method="POST" action="{{ route('stories.chapters.destroy', [$story, $chapter]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>
</div>
@endsection
