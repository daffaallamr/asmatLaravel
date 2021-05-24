@if ($paginator->hasPages())

    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <div class="left page-item disabled" aria-disabled="true">
        <span aria-hidden="true">&lt;Sebelumnya</span>
    </div>
    @else
    <div class="left">
        <a href="{{ $paginator->previousPageUrl() }}">&lt;Sebelumnya</a>
    </div>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    <div class="center">
        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <a class="underline">{{ $page }}</a>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    </div>
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <div class="right">
            <a href="{{ $paginator->nextPageUrl() }}">Selanjutnya&gt;</a>
        </div>
    @else
        <div class="right page-item disabled" aria-disabled="true">
            <span aria-hidden="true" href="{{ $paginator->nextPageUrl() }}">Selanjutnya&gt;</span>
        </div> 
    @endif
@endif
