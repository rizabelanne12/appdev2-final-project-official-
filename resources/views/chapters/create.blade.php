@extends('layout')

@section('content')
<a href="{{ route('stories.show', $story) }}" class="text-warning-emphasis text-md-end pb-2 p-3">back</a>
<div class="px-4">
    <h1 style="font-size:30px; text-align: center;">Chapter for "{{ $story->title }}"</h1>
    <form method="POST" action="{{ route('stories.chapters.store', $story) }}" class="create_chapter p-4 d-flex flex-column gap-5">
        @csrf
        <div>
            <label class="px-3">Title</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <div class="pb-2" style="font-size:20px">
            <label class="px-3">Content</label>
            </div>
            <textarea name="content" required style="height:500px; width:500px; "></textarea>
        </div>
        <button type="submit">Save</button>
    </form>
</div>
@endsection
