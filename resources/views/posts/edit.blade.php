<x-layout>

    <a href="{{ route('dashboard') }}" class="block mb-2 text-xs text-blue-500">&larr; Go back to your dashboard</a>

    <div class="card">
        <h2 class="font-bold mb-4">Update your post</h2>

        <form action="{{ route('posts.update', $post) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ $post->title }}"
                    class="input @error('title') ring-red-500 @enderror">
                @error('title')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="body">Body</label>

                <textarea name="body" rows="5"
                    class="input @error('body') ring-red-500 @enderror">{{ $post->body }}</textarea>
                @error('body')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="primary-btn">Update</button>
        </form>
    </div>
</x-layout>
