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
          <div class="disabled item" aria-disabled="true">
            @lang('pagination.previous')
          </div>
        @else
          @if(method_exists($paginator,'getCursorName'))
              <a dusk="previousPage" class="item" wire:key="cursor-{{ $paginator->getCursorName() }}-{{ $paginator->previousCursor()->encode() }}" wire:click="setPage('{{$paginator->previousCursor()->encode()}}','{{ $paginator->getCursorName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.class="disabled">@lang('pagination.previous')</a>
          @else
              <a dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="item" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.class="disabled">@lang('pagination.previous')</a>
          @endif
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
          @if(method_exists($paginator,'getCursorName'))
              <a dusk="nextPage" class="item" wire:key="cursor-{{ $paginator->getCursorName() }}-{{ $paginator->nextCursor()->encode() }}" wire:click="setPage('{{$paginator->nextCursor()->encode()}}','{{ $paginator->getCursorName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.class="disabled">@lang('pagination.next')</a>
          @else
              <a dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="item" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.class="disabled">@lang('pagination.next')</a>
          @endif
        @else
          <div class="disabled item" aria-disabled="true">
            @lang('pagination.next')
          </div>
        @endif
      </div>
  @endif
</div>
