<div class="pagination-container">
    @php
        $currentPage = $meta['page'];
        $firstPage = $currentPage - 2;
        $maxPage = $currentPage + 2;
        $displayFirstDots = false;
        $displayLastDots = false;

        if ($firstPage < 1) {
            $firstPage = 1;
        }
        if($firstPage > 1) {
            $displayFirstDots = true;
        }
        if($maxPage > $meta['last']) {
            $maxPage = $meta['last'];
        }
        if($maxPage < $meta['last']) {
            $displayLastDots = true;
        }
    @endphp

        <!-- link for previous page (arrow) if not on first page -->
    @if($currentPage > 1)
        <a href="/questions?page={{ $meta['page'] - 1 }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
                <path d="M6 11L1.40683 6.88384C0.864389 6.39773 0.864389 5.60227 1.40683 5.11616L6 1" stroke="#485785"
                      stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    @else
        <a aria-disabled="true" class="inactive">
            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
                <path d="M6 11L1.40683 6.88384C0.864389 6.39773 0.864389 5.60227 1.40683 5.11616L6 1" stroke="#7B8AB8"
                      stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    @endif

    <!-- display 3 dots if there is more page than what is displayed and add button for first page jump -->
    @if($displayFirstDots)
        <a href="/questions?page=1">1</a>
        <span>...</span>
    @endif

    <!-- display 5 pages max, less if on first or last page -->
    @for($page = $firstPage; $page <= $maxPage; $page++)
        <a @if($meta['page']==$page) class="active" @endif href="/questions?page={{ $page }}">{{ $page }}</a>
    @endfor

    <!-- display 3 dots if there is more page than what is displayed and add button for last page jump -->
    @if($displayLastDots)
        <span>...</span>
        <a href="/questions?page={{ $meta['last'] }}">{{ $meta['last'] }}</a>
    @endif

    <!-- link for next page (arrow) if not on last page -->
    @if($currentPage < $maxPage)
        <a href="/questions?page={{ $meta['page'] + 1 }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
                <path d="M1 1L5.59317 5.11616C6.13561 5.60227 6.13561 6.39773 5.59317 6.88384L1 11" stroke="#485785"
                      stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    @else
        <a aria-disabled="true" class="inactive">
            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
                <path d="M1 1L5.59317 5.11616C6.13561 5.60227 6.13561 6.39773 5.59317 6.88384L1 11" stroke="#7B8AB8"
                      stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    @endif
</div>
