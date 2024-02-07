<?php

namespace App\Livewire\Authentication;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class SignOut extends Component {
  public function render(): string {
    return <<<'blade'
					    <a class="item" wire:click="signOut"><i class="door closed alternate icon"></i>Cerrar sesión</a>
blade;
  }

  public function signOut() {
    Auth::logout();

    Session::flush();
    Session::invalidate();
    Session::regenerateToken();

    return redirect()->route('auth.sign-in')->with(['message' => 'Sesión finalizada correctamente.', 'type' => 'success']);
  }
}
