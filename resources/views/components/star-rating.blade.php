@if ($stars)
    @for ($i = 1; $i <= 5; $i++)
        <i class="{{ $i <= $stars ? 'fa-solid' : 'fa-regular' }} fa-star"></i>
    @endfor
@else
    No stars yet!
@endif