@if ($paginator->hasPages())
    <nav aria-label="Pagination">
        <ul style="list-style: none; display: flex; gap: 6px; padding: 0; margin-top: 16px;">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li style="padding: 6px 12px; color: #999; border: 1px solid #ddd; border-radius: 4px;">&laquo; Trước</li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" style="display: inline-block; padding: 6px 12px; border: 1px solid #ddd; border-radius: 4px; text-decoration: none; color: #04AA6D;">&laquo; Trước</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li style="padding: 6px 12px; color: #999;">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li style="padding: 6px 12px; border: 1px solid #04AA6D; border-radius: 4px; background: #04AA6D; color: #fff;">{{ $page }}</li>
                        @else
                            <li><a href="{{ $url }}" style="display: inline-block; padding: 6px 12px; border: 1px solid #ddd; border-radius: 4px; text-decoration: none; color: #333;">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" style="display: inline-block; padding: 6px 12px; border: 1px solid #ddd; border-radius: 4px; text-decoration: none; color: #04AA6D;">Sau &raquo;</a></li>
            @else
                <li style="padding: 6px 12px; color: #999; border: 1px solid #ddd; border-radius: 4px;">Sau &raquo;</li>
            @endif
        </ul>
    </nav>
@endif
