<label class="mb-2 mt-2 block text-sm font-medium text-white"
for="{{$for}}">
    {{$slot}} @if ($required)
    <span class="text-red-500">*</span>
    @endif
</label>