<x-layout>
    <h1 class="title">Welcome {{ auth()->user()->username }}, you have {{ $posts->total() }} {{ Str::plural('post', $posts->total()) }}</h1>

    {{-- Create Post Form  --}}
    <div class="card mb-4">
        <h2 class="font-bold mb-4">Create a new post</h2>

        {{-- Session Messages --}}
        @if ( session()->has('success') )
        <div x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 4000)" x-show="show">
            <x-flash-message message="{{ session('success') }}" />
        </div>
        @elseif ( session()->has('delete'))
        <div x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 4000)" x-show="show">
            <x-flash-message message="{{ session('delete') }}" background="bg-red-500" />
        </div>
        @endif

        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="input @error('title') ring-red-500 @enderror">
                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="body">Body</label>

                <textarea name="body" rows="5" class="input @error('body') ring-red-500 @enderror">{{ old('body') }}</textarea>
                @error('body')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image">Cover photo</label>
                <input type="file" name="image" id="image">

                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="primary-btn">Create</button>
        </form>
    </div>

    {{-- User Posts --}}
    <h2 class="font-bold mb-4">Your Latest Posts</h2>

    <div class="grid grid-cols-2 gap-6">
        @foreach ($posts as $post)
            <x-postCard :post="$post">
                {{-- Update post  --}}
                <a href="{{ route('posts.edit', $post) }}" class="bg-green-500 text-white px-2 py-1 text-xs rounded-md">Edit</a>
                {{-- Delete post --}}
               <form action="{{ route('posts.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  onclick="return confirm('Are you sure you want to delete this item?');"
                        class="bg-red-500 text-white px-2 py-1 text-xs rounded-md">
                        Delete
                    </button>
               </form>
            </x-postCard>
        @endforeach
    </div>

    <div>
        {{ $posts->links() }}
    </div>

</x-layout>
