@extends('layout')

@section('content')
 <div class="p-4">
 <a href="{{ route('stories.chapters.show', [$story, $chapter]) }}" class="text-warning-emphasis text-md-end pb-2 p-3">back</a>
    <h1 class="text-center" style="color:coral;">Edit Chapter</h1>
<div class="border edit_chapter p-5">
    <form method="POST" action="{{ route('chapters.update', [$story, $chapter]) }}" class="d-flex flex-column justify-content-center gap-5">
        @csrf
        @method('PUT')
        <div>
            <label class="px-3">Title</label>
            <input type="text" name="title" value="{{ $chapter->title }}" required>
        </div>
        <div>
            <label class="text-center px-3">Content</label>
            <textarea name="content" required style="height:100%">{{ $chapter->content }}</textarea>
        </div>
        <button type="submit">Save</button>
    </form>
</div>
</div>
@endsection
