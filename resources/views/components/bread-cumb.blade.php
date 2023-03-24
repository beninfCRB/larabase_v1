<div aria-label="breadcrumb">
    <ol class="breadcrumb">
        {{-- {{ $breadcumb }} --}}
        @foreach ($breadcumb as $x => $v)
            @if ($x < is_countable($breadcumb))
                <li class="breadcrumb-item"><a class="badge badge-pill badge-primary"
                        href="{{ url(strtolower($v)) }}">{{ $v }}</a>
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page"><span
                        class="badge badge-pill bg-primary">{{ $v }}</span></li>
            @endif
        @endforeach
    </ol>
</div>
