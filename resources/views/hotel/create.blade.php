<x-layout>
    <div class="">
        <form action="{{route('hotels.store',$hotel)}}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-10">
                <div>
                    <x-label for="name" :required="true">Name:</x-label>
                    <input type="text" name="name" id="name" class="input" required>
    
                    <x-label for="description" :required="true">Description:</x-label>
                    <x-text-input name="description"></x-text-input>

                    <x-label for="city" :required="false">City:</x-label>
                    <x-text-input type="text" name="city" id="city" class="input"/>

                    <x-label for="distance_from_downtown" :required="true">Distance From Downtown:(Kilometers)</x-label>
                    <x-text-input type="number" name="distance_from_downtown" min="0" step="0.1" required/>
                </div>
                <div>
                    <x-label for="rating" :required="true">Rating:</x-label>
                    <x-text-input type="number" name="rating" min="0" step="0.1" max="10" required/>
    
                    <x-label for="rating_score" :required="true">Rating Score:</x-label>
                    <select name="rating_score" id="rating_score" class="input" required>
                        <option value="">Select A Rating Score</option>
                        <option value="Exceptional">Exceptional: 10+</option>
                        <option value="Wonderful">Wonderful: 9+</option>
                        <option value="Very Good">Very Good: 8+</option>
                        <option value="Good">Good: 7+</option>
                        <option value="Pleasent">Pleasent: 6+</option>
                    </select>

                    <x-label for="Governorate" :required="true">State/Governorate:</x-label>
                    <x-text-input type="text" name="Governorate" required/>

                    <x-label for="url" :required="false">Hotel Image:(URL)</x-label>
                    <x-text-input type="url" name="url"/>

                    <x-label for="stars" :required="true">Number of Stars:</x-label>
                    <x-text-input type="number" name="stars" min="1" max="5" required/>
                </div>
                
            </div>
            <button type="submit" class="btn">Create Hotel</button>
        </form>
    </div>
</x-layout>