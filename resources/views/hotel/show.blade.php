<x-layout>
    <x-breadcrumbs class="mb-4"
    :links="['Hotels' => route('hotels.index') , $hotel->name => '#']" />
    <x-hotel-card :$hotel/>
    <x-card class="p-2 mb-4">
        <h3 class="font-semibold">Description:</h3><br>
        {!! nl2br(e($hotel->description))!!}
    </x-card>
</x-layout>