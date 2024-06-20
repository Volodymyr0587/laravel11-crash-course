<x-layout>
    <h1 class="title">Hello {{ auth()->user()->username }}</h1>

    {{-- Create Post Form  --}}
    <div class="card mb-4">
        <h2 class="font-bold mb-4">Create a new post</h2>

        {{-- Session Messages --}}
        @if ( session()->has('success') )
        <div>
            <p class="text-green-500">{{ session('success') }}</p>
        </div>
        @endif

        <form action="{{ route('posts.store') }}" method="post">
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

            <button type="submit" class="primary-btn">Create</button>
        </form>
    </div>
</x-layout>
