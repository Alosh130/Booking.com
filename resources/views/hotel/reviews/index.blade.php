@vite(['resources/css/app.css','resources/js/app.js'])

<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<div class="mx-auto mt-10 mb-10 max-w-3xl">
  <div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-bold">Reviews for {{ $hotel->name }}</h2>
    <a href="{{ route('hotels.reviews.create', ['hotel' => $hotel]) }}"
       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">
        <i class="fa fa-plus mr-2"></i> Add Review
    </a>
</div>

    @forelse ($hotel->reviews as $review)
    
    <x-card class="book-item mb-4 mt-8">
        <div>
          <div class="mb-2 flex items-center justify-between">
            <div class="font-semibold">
                <x-star-rating :stars="$review->rating"/>
            </div>
            <div class="book-review-count">
              {{ $review->created_at->format('M j, Y') }}</div>
          </div>
          <p class="text-gray-700">{{ $review->review }}</p>
        </div>
      </x-card>
    @empty
      <li class="mb-4">
        <div class="empty-book-item">
          <p class="empty-text text-lg font-semibold">No reviews yet</p>
          <a href="{{route('hotels.reviews.create',['hotel'=>$hotel])}}" class="empty-text text-md font-semibold">Add a review</a>
        </div>
      </li>
    @endforelse
</div>
