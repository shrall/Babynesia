@if ($paginator->hasPages())

    <div class="bg-white rounded-md px-3 py-3 flex justify-center items-center shadow-sm pagination">
        
        @if ($paginator->onFirstPage())
            {{-- <div class="mx-2">&nbsp;</div> --}}
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                <i class="fa fa-chevron-left mx-2" aria-hidden="true"></i>
            </a>
        @endif

        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <div class="text-sm xl:text-base mx-2 sm:mx-3">{{ $element }}</div>
                {{-- <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li> --}}
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="p-2 bg-blue-400 text-sm font-bold font-encode-sans mx-2 rounded-md text-white">{{ $page }}</div>
                    @else
                        <a href="{{ $url }}" class="text-sm sm:text-base hover:text-sky-500 text-slate-900 mx-2 sm:mx-3">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                <i class="fa fa-chevron-right mx-2" aria-hidden="true"></i> 
            </a>
        @else
        @endif
    </div>

    {{-- <nav>
        <ul class="pagination"> --}}
            {{-- Previous Page Link --}}
            {{-- @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif --}}

            {{-- Pagination Elements --}}
            {{-- @foreach ($elements as $element) --}}
                {{-- "Three Dots" Separator --}}
                {{-- @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif --}}

                {{-- Array Of Links --}}
                {{-- @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach --}}

            {{-- Next Page Link --}}
            {{-- @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif --}}
        {{-- </ul>
    </nav> --}}
@endif
