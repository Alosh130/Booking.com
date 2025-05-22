<x-layout>
    
    <h1 class="mb-10 text-2xl">Add Room for <span class="text-slate-500"><u>{{$hotel->name}}</u></span></h1>
    <form action="{{ route('hotels.rooms.store', ['hotel'=>$hotel]) }}" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-10">
            <!-- Left Column - Room Basics -->
            <div class="mb-4">
                <x-label for="room_name" :required="true">Room Name:</x-label>
                <x-text-input type="text" name="room_name" id="room_name" required />

                <x-label for="price_per_night" :required="true">Price Per Night ($):</x-label>
                <x-text-input type="number" name="price_per_night" min="0" step="0.01" required />

                <x-label for="city_tax" :required="true">City tax ($):</x-label>
                <x-text-input type="number" name="city_tax" min="0" step="0.01" required/>
            </div>

            <!-- Right Column - Hotel Info -->
            <div class="mb-4">
                <x-label for="cancellation_policy" :required="true">Cancellation Policy:</x-label>
                <select name="cancellation_policy" id="cancellation_policy" class="input" required>
                    <option value="">Select Policy</option>
                    <option value="Free cancellation">Free cancellation</option>
                    <option value="Non-refundable">Non-refundable</option>
                    <option value="Partial refund">Partial refund</option>
                </select>

                <x-label for="breakfast" :required="true">Breakfast Price:</x-label>
                <select name="breakfast" id="breakfast" class="input" required>
                    <option value="">Select Option</option>
                    <option value="1">Free Breakfast</option>
                    <option value="0">Paid Breakfast</option>
                </select>

                <x-label for="service_charge" :required="true">Service Charge ($):</x-label>
                <x-text-input type="number" name="service_charge" min="0" step="0.01" required/>
            </div>
        </div>

        <!-- Bed Configuration Section -->
        <div class="border-t pt-6 mt-6">
            <h3 class="text-lg font-medium mb-4">Bed Configuration</h3>

            <div id="bed-configurations">
                <!-- First bed configuration -->
                <div class="bed-configuration grid grid-cols-3 gap-4 mb-4">
                    <div>
                        <x-label for="bed_type_1" :required="true">Bed Type:</x-label>
                        <select name="bed_configurations[0][bed_type]" id="bed_type_1" class="input" onchange="toggleCustomBedInput(this, 1)" required>
                            <option value="">Select Bed Type</option>
                            <option value="twin">Twin</option>
                            <option value="full">Full</option>
                            <option value="queen">Queen</option>
                            <option value="king">King</option>
                            <option value="california_king">California King</option>
                            <option value="custom">Custom Type</option>
                        </select>
                        <div id="custom-bed-container-1" class="mt-2 hidden">
                            <x-label for="custom_bed_type_1">Custom Bed Type:</x-label>
                            <x-text-input type="text" name="bed_configurations[0][custom_bed_type]" id="custom_bed_type_1" />
                        </div>
                    </div>
                    <div>
                        <x-label for="quantity_1" :required="true">Quantity:</x-label>
                        <x-text-input type="number" name="bed_configurations[0][quantity]" id="quantity_1" min="1" required />
                    </div>
                </div>
            </div>

            <button type="button" id="add-bed-btn" class="btn btn-secondary mt-4">
                + Add Another Bed
            </button>
        </div>

        <div class="mt-8">
            <button type="submit" class="btn btn-primary">Create Room</button>
        </div>
    </form>

    <script>
        // Function to toggle custom bed input
        function toggleCustomBedInput(selectElement, index) {
            const customContainer = document.getElementById(`custom-bed-container-${index}`);
            if (selectElement.value === 'custom') {
                customContainer.classList.remove('hidden');
                document.getElementById(`custom_bed_type_${index}`).required = true;
            } else {
                customContainer.classList.add('hidden');
                document.getElementById(`custom_bed_type_${index}`).required = false;
            }
        }

        // Add new bed configuration
        document.getElementById('add-bed-btn').addEventListener('click', function() {
            const container = document.getElementById('bed-configurations');
            const count = container.children.length + 1;
            
            const newBedDiv = document.createElement('div');
            newBedDiv.className = 'bed-configuration grid grid-cols-3 gap-4 mb-4 mt-4';
            newBedDiv.innerHTML = `
                <div>
                    <x-label for="bed_type_${count}" :required="true">Bed Type:</x-label>
                    <select name="bed_configurations[${count-1}][bed_type]" id="bed_type_${count}" class="input" onchange="toggleCustomBedInput(this, ${count})" required>
                        <option value="">Select Bed Type</option>
                        <option value="twin">Twin</option>
                        <option value="full">Full</option>
                        <option value="queen">Queen</option>
                        <option value="king">King</option>
                        <option value="california_king">California King</option>
                        <option value="custom">Custom Type</option>
                    </select>
                    <div id="custom-bed-container-${count}" class="mt-2 hidden">
                        <x-label for="custom_bed_type_${count}">Custom Bed Type:</x-label>
                        <x-text-input type="text" name="bed_configurations[${count-1}][custom_bed_type]" id="custom_bed_type_${count}" />
                    </div>
                </div>
                <div>
                    <x-label for="quantity_${count}" :required="true">Quantity:</x-label>
                    <x-text-input type="number" name="bed_configurations[${count-1}][quantity]" id="quantity_${count}" min="1" required />
                </div>
                <div class="col-span-3">
                    <button type="button" class="text-sm text-red-500 hover:text-red-700 remove-bed-btn">
                        Remove This Bed
                    </button>
                </div>
            `;
            
            container.appendChild(newBedDiv);
            
            // Add event listener to the new remove button
            newBedDiv.querySelector('.remove-bed-btn').addEventListener('click', function() {
                container.removeChild(newBedDiv);
            });
        });
    </script>
</x-layout>