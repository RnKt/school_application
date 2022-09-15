<div class="pagination">
  @if($page - 4 > 0 && $page == $lastPage)
    <div class="pagination__link"
         data-href="{{ route($currentUrl, array_merge(request()->input(), ['page' => $page -  2])) }}">
      {{ $page - 4 }}
    </div>
  @endif
  @if($page - 3 > 0 && $page >= $lastPage - 1)
    <div class="pagination__link"
         data-href="{{ route($currentUrl, array_merge(request()->input(), ['page' => $page -  3])) }}">
      {{ $page - 3 }}
    </div>
  @endif
  @if($page - 2 > 0)
    <div class="pagination__link"
         data-href="{{ route($currentUrl, array_merge(request()->input(), ['page' => $page -  2])) }}">
      {{ $page - 2 }}
    </div>
  @endif
  @if($page - 1 > 0)
    <div class="pagination__link"
         data-href="{{ route($currentUrl, array_merge(request()->input(), ['page' => $page - 1])) }}">
      {{ $page - 1 }}
    </div>
  @endif
  @if($page > 0)
    <div class="pagination__link pagination__link--active">
      {{ $page }}
    </div>
  @endif
  @if($page + 1 <= $lastPage)
    <div class="pagination__link"
         data-href="{{ route($currentUrl, array_merge(request()->input(), ['page' => $page +  1])) }}">
      {{ $page + 1 }}
    </div>
  @endif
  @if($page + 2 <= $lastPage)
    <div class="pagination__link"
         data-href="{{ route($currentUrl, array_merge(request()->input(), ['page' => $page +  2])) }}">
      {{ $page + 2 }}
    </div>
  @endif
  @if($page + 3 <= $lastPage && $page <= 2)
    <div class="pagination__link"
         data-href="{{ route($currentUrl, array_merge(request()->input(), ['page' => $page +  3])) }}">
      {{ $page + 3 }}
    </div>
  @endif
  @if($page + 4 <= $lastPage && $page <= 1)
    <div class="pagination__link"
         data-href="{{ route($currentUrl, array_merge(request()->input(), ['page' => $page +  4])) }}">
      {{ $page + 4 }}
    </div>
  @endif
</div>
