@php
  if (! isset($scrollTo)) {
      $scrollTo = 'body';
  }

  $scrollIntoViewJsSnippet = ($scrollTo !== false)
      ? <<<JS
         (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
      JS
      : '';
@endphp

<div>
  @if ($paginator->hasPages())
    <div class="ui pagination menu">
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
        <div class="disabled icon item" aria-disabled="true" aria-label="@lang('pagination.previous')">
          <i class="angle left icon" aria-hidden="true"></i>
        </div>
      @else
        <a dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="icon item" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.class="disabled" aria-label="@lang('pagination.previous')"><i class="left angle icon"></i></a>
      @endif

      {{-- Pagination Elements --}}
      @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
          <div class="disabled item" aria-disabled="true">{{ $element }}</div>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <div class="active item" wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}" aria-current="page">{{ $page }}</div>
            @else
              <a class="item" wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}">{{ $page }}</a>
            @endif
          @endforeach
        @endif
      @endforeach

      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
        <a dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="icon item" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.class="disabled" aria-label="@lang('pagination.next')"><i class="angle right icon"></i></a>
      @else
        <div class="disabled icon item" aria-disabled="true" aria-label="@lang('pagination.next')">
          <i class="angle right icon" aria-hidden="true"></i>
        </div>
      @endif
    </div>
  @endif
</div>
