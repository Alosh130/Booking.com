<x-layout>
    <div class="max-w-lg mx-auto bg-slate-800 rounded-2xl shadow-lg p-6">
        <h2 class="text-2xl font-semibold text-white mb-6 text-center">Create Your Manager Account</h2>
        <form action="{{route('manager.store')}}" method="post" class="space-y-6" x-data>
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="company_name" :value="__('Company Name')"/>
                <x-text-input
                    id="company_name"
                    name="company_name"
                    type="text"
                    placeholder="Amazon, Google, Microsoft"
                    :value="old('company_name')"
                    required
                    autofocus
                    autocomplete="company_name"
                    class="mt-1"
                />
            </div>
            <!--Phone Number-->

            <div>
                <x-input-label for="phone" :value="__('Phone Number')"/>
                <x-text-input
                    id="phone"
                    name="phone"
                    type="text"
                    placeholder="+1234567890"
                    :value="old('phone')"
                    required
                    class="mt-1"
                />

            <!-- Submit -->
            <div class="text-center mt-4">
                <x-primary-button class="w-full pointer">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-layout>
