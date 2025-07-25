@if ($paginator->hasPages())
    <ul class="pagination-square">

        @if ($paginator->onFirstPage())
            <li class="disabled"><span>‹</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}">‹</a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}">›</a></li>
        @else
            <li class="disabled"><span>›</span></li>
        @endif
    </ul>
@endif