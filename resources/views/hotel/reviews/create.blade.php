<x-layout class="container mx-auto mt-10 mb-10 max-w-3xl">
    <h1 class="mb-10 text-2xl">Add a review for <u>{{$hotel->name}}</u></h1>
    <form method="POST"  action="{{route('hotels.reviews.store',['hotel'=>$hotel])}}">
        @csrf
        
        <label for="review">Review</label>
        <textarea name="review" id="review" required class="input mb-4 bg-slate-800"></textarea>
        
        <label for="rating">Rating</label>
        <select name="rating" id="rating" class="mb-4 input bg-slate-800 " required>
            <option value="">Select a Rating:</option>
            @for ($i=1;$i<=5;$i++)
            <option value="{{$i}}">{{$i}}</option>
        @endfor
        </select>
        
        <x-primary-button type="submit" class="pointer">Add Review</x-primary-button>
        
        </form>
</x-layout>