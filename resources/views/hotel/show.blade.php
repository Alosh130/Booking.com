<x-layout>
    <x-hotel-card :$hotel/>
    <x-card class="p-2 mb-4 text-slate-700 bg-white">
        <h3 class="font-semibold">Description:</h3><br>
        {!! nl2br(e($hotel->description))!!}
    </x-card>
</x-layout>