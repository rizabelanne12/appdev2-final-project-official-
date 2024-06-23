@extends('layout')

@section('content')
<div class="d-flex flex-column gap-2 px-5 border shadow-none p-3 mb-5 bg-light rounded" style="background-color: aliceblue;">
<a href="{{ route('stories.show', $story) }}" class="p-3">back</a>
    <h1 class="text-center" style="color:coral;">Edit Story</h1>
 <div class="edit_story px-5 border shadow-none p-3 mb-5 bg-light rounded">
    <form method="POST" action="{{ route('stories.update', $story) }}" enctype="multipart/form-data" class="form_edit_stories">
        @csrf
        @method('PUT')
        <div>
            <label class="px-3">Title:</label>
            <input type="text" name="title" value="{{ $story->title }}" required>
        </div>
        <div>
            <div>
            <label class="px-3">Description:</label>
            </div>
            <textarea name="description" required style="height:200px; width:500px; border:none; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            {{ $story->description }}</textarea>
        </div>
        <div>
            <label class="px-3">Cover Image:</label>
            <input type="file" name="cover_image" style="border: 1px; ">
            @if ($story->cover_image)
                <div class="py-2" style="padding:30%">
                    <img src="{{ asset('storage/' . $story->cover_image) }}" alt="Cover Image" width="200">
                </div>
            @endif
        </div>
        <div style="padding:0 15% 0 40%">
          <button type="submit" style="height:60px; width:100px;">Save</button>
        </div>
    </form>
 </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function updateStory(storyId) {
            const form = document.getElementById('edit-story-form');
            const formData = new FormData(form);

            axios.post(`/api/stories/${storyId}`, formData)
                .then(response => {
                    console.log(response.data);
                    // Redirect or update the UI as needed
                    window.location.href = `/stories/${storyId}`;
                })
                .catch(error => {
                    console.error(error.response.data);
                });
        }
    </script>
@endpush