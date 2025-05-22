<x-layout>
  <h1 class="mb-10 text-2xl font-semibold">
    Add Room for <span class="text-slate-600 underline">{{ $hotel->name }}</span>
  </h1>

  <form action="{{ route('hotels.rooms.store', ['hotel' => $hotel]) }}" method="POST" class="bg-white p-4 rounded-md space-y-8">
    @csrf

    <!-- Room Details Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <div class="space-y-4 text-black">
        <x-label for="room_name" :required="true">Room Name:</x-label>
        <select name="room_name" id=":rfq:" class="input w-full">
            <option value="">Select a name for the room </option>
            <option value="Twin Room" data-key="recommended#1421">Twin Room</option>
            <option value="Twin Room with Private Bathroom" data-key="recommended#6972">Twin Room with Private Bathroom</option>
            <option value="Budget Twin Room" data-key="all#71">Budget Twin Room</option>
            <option value="Deluxe Double Room with Two Double Beds" data-key="all#205910">Deluxe Double Room with Two Double Beds</option>
            <option value="Deluxe Queen Room with Two Queen Beds" data-key="all#204583">Deluxe Queen Room with Two Queen Beds</option>
            <option value="Deluxe Twin Room" data-key="all#374">Deluxe Twin Room</option>
            <option value="Deluxe Twin Room with Sea View" data-key="all#377">Deluxe Twin Room with Sea View</option>
            <option value="Double Room with Two Double Beds" data-key="all#204207">Double Room with Two Double Beds</option>
            <option value="Economy Twin Room" data-key="all#580">Economy Twin Room</option>
            <option value="King Room with Two King Beds" data-key="all#210819">King Room with Two King Beds</option>
            <option value="Large Twin Room" data-key="all#15931">Large Twin Room</option>
            <option value="Queen Room with Two Queen Beds" data-key="all#4905">Queen Room with Two Queen Beds</option>
            <option value="Queen Room with Two Queen Beds - Disability Access" data-key="all#219296">Queen Room with Two Queen Beds - Disability Access</option>
            <option value="Small Twin Room" data-key="all#6325">Small Twin Room</option>
            <option value="Standard Double Room with Two Double Beds" data-key="all#205835">Standard Double Room with Two Double Beds</option>
            <option value="Standard Queen Room with Two Queen Beds" data-key="all#205884">Standard Queen Room with Two Queen Beds</option>
            <option value="Standard Twin Room" data-key="all#1166">Standard Twin Room</option>
            <option value="Standard Twin Room with Garden View" data-key="all#199746">Standard Twin Room with Garden View</option>
            <option value="Standard Twin Room with Mountain View" data-key="all#192463">Standard Twin Room with Mountain View</option>
            <option value="Standard Twin Room with Sea View" data-key="all#1173">Standard Twin Room with Sea View</option>
            <option value="Standard Twin Room with Shared Bathroom" data-key="all#79965">Standard Twin Room with Shared Bathroom</option>
            <option value="Standard Twin Room with Sofa" data-key="all#1586">Standard Twin Room with Sofa</option>
            <option value="Superior Double Room with Two Double Beds" data-key="all#77078">Superior Double Room with Two Double Beds</option>
            <option value="Superior King or Twin Room" data-key="all#213177">Superior King or Twin Room</option>
            <option value="Superior Queen Room with Two Queen Beds" data-key="all#206246">Superior Queen Room with Two Queen Beds</option>
            <option value="Superior Twin Room" data-key="all#1356">Superior Twin Room</option>
            <option value="Superior Twin Room with City View" data-key="all#199810">Superior Twin Room with City View</option>
            <option value="Superior Twin Room with Garden View" data-key="all#155600">Superior Twin Room with Garden View</option>
            <option value="Superior Twin Room with Sauna" data-key="all#155153">Superior Twin Room with Sauna</option>
            <option value="Superior Twin Room with Sea View" data-key="all#1365">Superior Twin Room with Sea View</option>
            <option value="Twin Room - Disability Access" data-key="all#183294">Twin Room - Disability Access</option>
            <option value="Twin Room with Balcony" data-key="all#1431">Twin Room with Balcony</option>
            <option value="Twin Room with Bath" data-key="all#1432">Twin Room with Bath</option>
            <option value="Twin Room with Bathroom" data-key="all#1419">Twin Room with Bathroom</option>
            <option value="Twin Room with City View" data-key="all#18843">Twin Room with City View</option>
            <option value="Twin Room with Extra Bed" data-key="all#1434">Twin Room with Extra Bed</option>
            <option value="Twin Room with Garden View" data-key="all#1436">Twin Room with Garden View</option>
            <option value="Twin Room with Lake View" data-key="all#78356">Twin Room with Lake View</option>
            <option value="Twin Room with Mountain View" data-key="all#47874">Twin Room with Mountain View</option>
            <option value="Twin Room with Pool View" data-key="all#1440">Twin Room with Pool View</option>
            <option value="Twin Room with Private External Bathroom" data-key="all#144822">Twin Room with Private External Bathroom</option>
            <option value="Twin Room with Sea View" data-key="all#1442">Twin Room with Sea View</option>
            <option value="Twin Room with Shared Bathroom" data-key="all#1443">Twin Room with Shared Bathroom</option>
            <option value="Twin Room with Shared Toilet" data-key="all#10277">Twin Room with Shared Toilet</option>
            <option value="Twin Room with Shower" data-key="all#1444">Twin Room with Shower</option>
            <option value="Twin Room with Terrace" data-key="all#1445">Twin Room with Terrace</option>
            <option value="Twin Room with View" data-key="all#8658">Twin Room with View</option>
        </select>

        <x-label for="price_per_night" :required="true">Price Per Night ($):</x-label>
        <x-text-input type="number" name="price_per_night" id="price_per_night" min="0" step="0.01" required />

        <x-label for="city_tax" :required="true">City Tax ($):</x-label>
        <x-text-input type="number" name="city_tax" id="city_tax" min="0" step="0.01" required />
      </div>

      <div class="space-y-4 text-black">
        <x-label for="cancellation_policy" :required="true">Cancellation Policy:</x-label>
        <select name="cancellation_policy" id="cancellation_policy" class="input w-full" required>
          <option value="">Select Policy</option>
          <option value="Free cancellation">Free cancellation</option>
          <option value="Non-refundable">Non-refundable</option>
          <option value="Partial refund">Partial refund</option>
        </select>

        <x-label for="breakfast" :required="true">Breakfast Option:</x-label>
        <select name="breakfast" id="breakfast" class="input w-full" required>
          <option value="">Select Option</option>
          <option value="1">Free Breakfast</option>
          <option value="0">Paid Breakfast</option>
        </select>

        <x-label for="service_charge" :required="true">Service Charge ($):</x-label>
        <x-text-input type="number" name="service_charge" id="service_charge" min="0" step="0.01" required />
      </div>
    </div>

    <!-- Bed Configuration Section -->
    <div class="pt-6 border-t text-black">
      <h3 class="text-lg font-semibold mb-4">Bed Configuration</h3>

      <div id="bed-configurations" class="space-y-6">
        <div class="bed-configuration grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
            <x-label for="bed_type_1" :required="true">Bed Type:</x-label>
            <select name="bed_configurations[0][bed_type]" id="bed_type_1" class="input w-full" onchange="toggleCustomBedInput(this, 1)" required>
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

      <button type="button" id="add-bed-btn" class="mt-4 text-blue-600 hover:underline text-sm font-medium">
        + Add Another Bed
      </button>
    </div>

    <div>
      <button type="submit" class="btn btn-primary">Create Room</button>
    </div>
  </form>

  <script>
    function toggleCustomBedInput(selectElement, index) {
      const customContainer = document.getElementById(`custom-bed-container-${index}`);
      const customInput = document.getElementById(`custom_bed_type_${index}`);
      if (selectElement.value === 'custom') {
        customContainer.classList.remove('hidden');
        customInput.required = true;
      } else {
        customContainer.classList.add('hidden');
        customInput.required = false;
      }
    }

    document.getElementById('add-bed-btn').addEventListener('click', function () {
      const container = document.getElementById('bed-configurations');
      const count = container.children.length + 1;

      const newDiv = document.createElement('div');
      newDiv.className = 'bed-configuration grid grid-cols-1 md:grid-cols-3 gap-4';
      newDiv.innerHTML = `
        <div>
          <x-label for="bed_type_${count}" :required="true">Bed Type:</x-label>
          <select name="bed_configurations[${count - 1}][bed_type]" id="bed_type_${count}" class="input w-full" onchange="toggleCustomBedInput(this, ${count})" required>
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
            <x-text-input type="text" name="bed_configurations[${count - 1}][custom_bed_type]" id="custom_bed_type_${count}" />
          </div>
        </div>

        <div>
          <x-label for="quantity_${count}" :required="true">Quantity:</x-label>
          <x-text-input type="number" name="bed_configurations[${count - 1}][quantity]" id="quantity_${count}" min="1" required />
        </div>

        <div class="md:col-span-3">
          <button type="button" class="text-sm text-red-500 hover:underline remove-bed-btn">
            Remove This Bed
          </button>
        </div>`;

      container.appendChild(newDiv);

      newDiv.querySelector('.remove-bed-btn').addEventListener('click', function () {
        container.removeChild(newDiv);
      });
    });
  </script>
</x-layout>
