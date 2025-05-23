<x-layout>
    <div class="max-w-lg mx-auto bg-slate-800 rounded-2xl shadow-lg p-6">
        <h2 class="text-2xl font-semibold text-white mb-6 text-center">Create Your Account</h2>
        <form action="{{ route('register.store') }}" method="post" class="space-y-6" x-data>
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Full Name')"/>
                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    placeholder="John Doe"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name"
                    class="mt-1"
                />
            </div>

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email Address')" />
                <x-text-input
                    id="email"
                    name="email"
                    type="email"
                    placeholder="you@example.com"
                    :value="old('email')"
                    required
                    autocomplete="username"
                    class="mt-1"
                />
            </div>

            <!-- Password -->
            <div x-data="{ showPassword: false }">
                <x-input-label for="password" :value="__('Password')" />
                <div class="mt-1 flex border border-gray-300 rounded-md overflow-hidden focus-within:ring-2 focus-within:ring-indigo-500">
                    <input
                        id="password"
                        name="password"
                        x-bind:type="showPassword ? 'text' : 'password'"
                        placeholder="••••••••"
                        required
                        autocomplete="new-password"
                        class="flex-grow px-3 py-2 text-sm text-white placeholder-gray-400 focus:outline-none"
                    />
                    <button
                        type="button"
                        class="px-3 pointer bg-slate-800 border-l border-gray-300 flex items-center justify-center text-gray-400 hover:text-gray-600 focus:outline-none"
                        @click="showPassword = !showPassword"
                        tabindex="-1"
                    >
                        <i x-show="!showPassword" class="fa-solid fa-eye"></i>
                        <i x-show="showPassword" class="fa-solid fa-eye-slash"></i>
                    </button>
                </div>
            </div>

            <!-- Confirm Password -->
            <div x-data="{ showConfirm: false }">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <div class="mt-1 flex border border-gray-300 rounded-md overflow-hidden focus-within:ring-2 focus-within:ring-indigo-500">
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        x-bind:type="showConfirm ? 'text' : 'password'"
                        placeholder="••••••••"
                        required
                        autocomplete="new-password"
                        class="flex-grow px-3 py-2 text-sm text-white placeholder-gray-400 focus:outline-none"
                    />
                    <button
                        type="button"
                        class="px-3 pointer bg-slate-800 border-l border-gray-300 flex items-center justify-center text-gray-400 hover:text-gray-600 focus:outline-none"
                        @click="showConfirm = !showConfirm"
                        tabindex="-1"
                    >
                        <i x-show="!showConfirm" class="fa-solid fa-eye"></i>
                        <i x-show="showConfirm" class="fa-solid fa-eye-slash"></i>
                    </button>
                </div>
            </div>

            <!-- Terms -->
            <div class="flex items-center">
                <input
                    id="terms"
                    type="checkbox"
                    name="terms"
                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                >
                <label for="terms" class="ml-2 block text-sm text-gray-600">
                    I agree to the <a href="#" class="text-indigo-600 hover:underline">Terms of Service</a>
                </label>
            </div>

            <!-- Submit -->
            <div class="text-center">
                <x-primary-button class="w-full pointer">
                    {{ __('Register') }}
                </x-primary-button>
            </div>

            <!-- Already registered -->
            <p class="text-center text-sm text-gray-500">
                {{ __('Already have an account?') }}
                <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">
                    {{ __('Sign in') }}
                </a>
            </p>
        </form>
    </div>
</x-layout>
