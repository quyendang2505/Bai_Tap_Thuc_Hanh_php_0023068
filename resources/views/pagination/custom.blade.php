@if ($paginator->hasPages())
    <nav aria-label="Phân trang">
        <ul class="pagination">
            @if ($paginator->onFirstPage())<li><span class="disabled">← Trước</span></li>@else<li><a href="{{ $paginator->previousPageUrl() }}">← Trước</a></li>@endif
            @foreach ($elements as $element)
                @if (is_string($element))<li><span class="disabled">{{ $element }}</span></li>@endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li>@if ($page == $paginator->currentPage())<span class="active">{{ $page }}</span>@else<a href="{{ $url }}">{{ $page }}</a>@endif</li>
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())<li><a href="{{ $paginator->nextPageUrl() }}">Sau →</a></li>@else<li><span class="disabled">Sau →</span></li>@endif
        </ul>
    </nav>
@endif
