<x-layout>
    <h1 class="title">Request a password reset email</h1>

    @if ( session()->has('status') )
        <div x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 4000)" x-show="show">
            <x-flash-message message="{{ session('status') }}" />
        </div>
    @endif

    <div class="mx-auto max-w-screen-sm card">

        <form action="{{ route('password.request') }}" method="POST" x-data="formSubmit" @submit.prevent="submit">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ old('email') }}" class="input @error('email') ring-red-500 @enderror">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button x-ref="btn" class="primary-btn">Submit</button>
        </form>

    </div>
</x-layout>
