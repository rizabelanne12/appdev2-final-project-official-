@extends('layout')

@section('content')
 <div class="d-flex flex-rows p-5 gap-5">
    <h1 class="text-center" style="color:coral;">Create Story</h1>
    <form method="POST" action="{{ route('stories.store') }}" enctype="multipart/form-data" class="parent_create_stories_from p-5 border">
        @csrf
        <div class="create_stories_from m-3">
            <label class="px-4">Title</label>
            <input type="text" name="title" required>
        </div>
        <div class="create_stories_from">        
            <label class="p-3">Description</label>
            <textarea name="description" required></textarea>
        </div>
        <div class="create_stories_from">
            <label class="p-3">Cover Image</label>
            <input type="file" name="cover_image">
        </div>
        <button type="submit">Save</button>
    </form>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function createStory() {
            const form = document.getElementById('create-story-form');
            const formData = new FormData(form);

            axios.post('/api/stories', formData)
                .then(response => {
                    console.log(response.data);
                    // Redirect or update the UI as needed
                    window.location.href = '/stories';
                })
                .catch(error => {
                    console.error(error.response.data);
                });
        }
    </script>
@endpush
