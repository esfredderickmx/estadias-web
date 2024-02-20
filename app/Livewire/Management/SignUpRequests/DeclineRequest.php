<?php

namespace App\Livewire\Management\SignUpRequests;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class DeclineRequest extends ModalComponent {

  public User $user;

  public function render() {
    return view('livewire.management.sign-up-requests.decline-request');
  }

  public function declineUserRequest() {
    $this->user->forceDelete();

    $this->dispatch('show-message', message: 'Solicitud eliminada permanentemente.', type: 'warning', modal: 'decline-'.$this->user->id);
  }
}
