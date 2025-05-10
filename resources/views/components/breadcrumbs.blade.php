<nav {{$attributes}} class="items-center">
    <ul class="flex space-x-4 text-slate-500">
        <li>
            <a href="/">Home</a>
        </li>

        @foreach ($links as $key => $link )
        <li> > </li>
        <li>
            <a href="{{ $link }}">
                {{$key}}
            </a>
        </li>
        @endforeach
    </ul>
</nav>