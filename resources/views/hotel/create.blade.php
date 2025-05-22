<x-layout>
    <div class="max-w-4xl mx-auto  bg-white  shadow-md rounded-lg p-8">
        <h1 class="text-2xl font-semibold text-slate-800  mb-6">Create a New Hotel</h1>
        <form action="{{ route('hotels.store', $hotel) }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-black">
                <!-- Left Column -->
                <div class="space-y-4">
                    <x-label for="name" :required="true">Name:</x-label>
                    <x-text-input name="name" type="text" id="name" required />

                    <x-label for="description" :required="true">Description:</x-label>
                    <x-text-input name="description" type="textarea" required />

                    <x-label for="city">City:</x-label>
                    <x-text-input name="city" type="text" id="city" />

                    <x-label for="distance_from_downtown" :required="true">Distance From Downtown (Kilometers):</x-label>
                    <x-text-input name="distance_from_downtown" type="number" min="0" step="0.1" required />
                </div>

                <!-- Right Column -->
                <div class="space-y-4">
                    <x-label for="rating" :required="true">Rating:</x-label>
                    <x-text-input name="rating" type="number" min="0" max="10" step="0.1" required />

                    <x-label for="rating_score" :required="true">Rating Score:</x-label>
                    <select name="rating_score" id="rating_score" class="w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 focus:ring-2 focus:ring-blue-500 bg-white " required>
                        <option value="">Select A Rating Score</option>
                        <option value="Exceptional">Exceptional: 10+</option>
                        <option value="Wonderful">Wonderful: 9+</option>
                        <option value="Very Good">Very Good: 8+</option>
                        <option value="Good">Good: 7+</option>
                        <option value="Pleasent">Pleasent: 6+</option>
                    </select>

                    <x-label for="Governorate" :required="true">State/Governorate:</x-label>
                    <x-text-input name="Governorate" type="text" required />

                    <x-label for="url">Hotel Image (URL):</x-label>
                    <x-text-input name="url" type="url" />

                    <x-label for="stars" :required="true">Number of Stars:</x-label>
                    <x-text-input name="stars" type="number" min="1" max="5" required />
                </div>
            </div>

            <div class="mt-8 text-right">
                <button type="submit" class="btn bg-blue-600 text-white hover:bg-blue-700 px-6 py-2 rounded-md shadow">Create Hotel</button>
            </div>
        </form>
    </div>
</x-layout>
