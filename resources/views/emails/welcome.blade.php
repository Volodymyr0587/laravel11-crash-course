<h1>Hello {{ $user->username }}</h1>

<div>
    <h2>You created {{ $post->title }}</h2>
    <p>{{ $post->body }}</p>

    {{-- <img width="300" src="{{ $post->image }}" alt=""> --}}
    @if ($post->image)

    <img width="300" src="{{ $message->embed('storage/' . $post->image) }}" alt="">

    @else

    <img width="300" src="{{ $message->embed('storage/posts_images/default.jpg') }}" alt="">

    @endif

</div>
