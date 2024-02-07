<?php

namespace App\Livewire;

use Livewire\Component;

class VerifyAdvice extends Component {

  public bool $has_advice;
  public ?string $message, $type;

  public function mount() {
    $this->message = session('message');
    $this->type = session('type');

    $this->has_advice = $this->message && $this->type;
  }

  public function render(): string {
    return <<<'blade'
            <div wire:init="verifyAdvice">
                {{-- Some cool stuff here --}}
            </div>
blade;
  }

  public function verifyAdvice() {
    !$this->has_advice ?: $this->dispatch('show-message', message: $this->message, type: $this->type);
  }
}
