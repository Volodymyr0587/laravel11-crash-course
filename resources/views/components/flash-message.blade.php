@props(['message', 'background' => 'bg-green-500'])

<p class="text-sm font-medium text-white mb-2 px-3 py-1 rounded-md {{ $background }}">
   {{ $message }}
</p>
