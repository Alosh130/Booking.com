<x-layout>
    <div class="max-w-lg mx-auto bg-slate-800 text-black rounded-2xl shadow-lg p-6">
        <h2 class="text-2xl font-semibold text-white mb-6 text-center">Welcome Back</h2>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form action="{{ route('auth.store') }}" method="post" class="space-y-6" x-data>
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email Address')" />
                <x-text-input
                    id="email"
                    name="email"
                    type="email"
                    placeholder="you@example.com"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                    class="mt-1"
                />
            </div>

            <!-- Password -->
            <div x-data="{ showPass: false }">
                <x-input-label for="password" :value="__('Password')" />
                <div class="mt-1 flex border border-gray-300 rounded-md overflow-hidden focus-within:ring-2 focus-within:ring-indigo-500">
                    <input
                        id="password"
                        name="password"
                        x-bind:type="showPass ? 'text' : 'password'"
                        placeholder="••••••••"
                        required
                        autocomplete="current-password"
                        class="flex-grow px-3 py-2 text-sm text-white placeholder-gray-400 focus:outline-none"
                    />
                    <button
                        type="button"
                        class="px-3 pointer bg-slate-800 border-l border-gray-300 flex items-center justify-center text-gray-400 hover:text-gray-600 focus:outline-none"
                        @click="showPass = !showPass"
                        tabindex="-1"
                    >
                        <i x-show="!showPass" class="fa-solid fa-eye"></i>
                        <i x-show="showPass" class="fa-solid fa-eye-slash"></i>
                    </button>
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                >
                <label for="remember_me" class="ml-2 text-sm text-gray-400">
                    {{ __('Remember me') }}
                </label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a
                        href="{{ route('password.request') }}"
                        class="text-sm text-indigo-600 hover:underline"
                    >
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button>
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-layout>
