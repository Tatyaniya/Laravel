@if ($paginator->hasPages())


        <ul class="page-nav">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled page-nav__item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                </li>
            @else
                <li class="page-nav__item">
                    <a class="page-nav__item__link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <i class="fa fa-angle-double-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled page-nav__item" aria-disabled="true">
                        <span style="display: block" class="page-nav__item__link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active page-nav__item" aria-current="page">
                                <span style="display: block; color:#5096d9" class="page-nav__item__link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-nav__item"><a class="page-nav__item__link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-nav__item">
                    <a class="page-nav__item__link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <i class="fa fa-angle-double-right"></i>
                    </a>
                </li>
            @else
                <li class="disabled page-nav__item" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                </li>
            @endif
        </ul>


@endif
