<x-layout>
    <h1 class="title">Welcome back</h1>


    @if ( session()->has('status') )
        <div x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 4000)" x-show="show">
            <x-flash-message message="{{ session('status') }}" />
        </div>
    @endif

    <div class="mx-auto max-w-screen-sm card">

        <form action="{{ route('login') }}" method="POST">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ old('email') }}" class="input @error('email') ring-red-500 @enderror">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="input @error('password') ring-red-500 @enderror">

                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember me --}}
            <div class="mb-4 flex justify-between items-center">
                <div class="flex space-x-2">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <a class="text-blue-500 hover:underline" href="{{ route('password.request') }}">Forgot your password?</a>
            </div>

            @error('failed')
            <div class="mb-4">
                <p class="error">{{ $message }}</p>
            </div>
            @enderror
            {{-- Submit Button --}}
            <button class="primary-btn">Login</button>
        </form>

    </div>
</x-layout>
