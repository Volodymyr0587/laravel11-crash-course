<x-layout>

    <h1 class="title">{{ $user->username }}'s Posts &#9830; {{ $userPosts->total() }}</h1>

    {{-- Users Posts --}}
    <div class="grid grid-cols-2 gap-6">
        @foreach ($userPosts as $post)
            <x-postCard :post="$post" />
        @endforeach
    </div>

    <div>
        {{ $userPosts->links() }}
    </div>

</x-layout>
