<div class="relative">
    @if ('textarea' != $type)
        @if ($formRef)
            <button @click=" $refs.{{ $name }}.value=''; $refs.{{ $formRef }}.submit();" type="button"
                class="absolute top-0 right-0 flex h-full items-center pr-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="text-slate-500 h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        @endif
        <input x-ref = "{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
            name="{{ $name }}" value="{{ old($name, $value) }}" id="{{ $name }}"
            min = "{{$min}}" max= "{{$max}}" step ="{{$step}}"
            @class([
                'w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-white
                    focus:ring-2 text-white',
                'pr-8' => $formRef,
                'ring-slate-300' => !$errors->has($name),
                'ring-red-300' => $errors->has($name),
            ]) />
    @else
            <textarea @class([
                'w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400
                    focus:ring-2',
                'pr-8' => $formRef,
                'ring-slate-300' => !$errors->has($name),
                'ring-red-300' => $errors->has($name),
            ]) id="{{$name}}" name="{{$name}}">{{old($name, $value)}}</textarea>
    @endif

    @error($name)
        <div class="mt-1 text-xs text-red-500">
            {{ $message }}
        </div>
    @enderror
</div>
