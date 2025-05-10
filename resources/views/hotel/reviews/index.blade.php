@vite(['resources/css/app.css','resources/js/index.js'])

<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<div class="mx-auto mt-10 mb-10 max-w-3xl">
    <x-breadcrumbs :links="['Hotels' => route('hotels.index'),'Reviews' => route('hotels.reviews.index',['hotel'=>$hotel]), $hotel->name => '#' ]"/>
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
        </div>
      </li>
    @endforelse
</div>
