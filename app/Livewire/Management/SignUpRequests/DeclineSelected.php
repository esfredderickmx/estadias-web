<?php

namespace App\Livewire\Management\SignUpRequests;

use App\Models\User;
use Livewire\Attributes\Modelable;
use Livewire\Component;

class DeclineSelected extends Component {

  #[Modelable]
  public $selection;

  public function render() {
    return view('livewire.management.sign-up-requests.decline-selected');
  }

  public function declinSelectedRequests() {
    foreach ($this->selection as $request) {
      User::onlyTrashed()->find($request)->forceDelete();
    }

    $this->dispatch('show-message', message: 'Solicitudes seleccionadas eliminadas permanentemente.', type: 'warning', modal: 'decline-selected');
  }
}
