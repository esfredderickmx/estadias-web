<?php

namespace App\Livewire\Management\SignUpRequests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AcceptRequest extends Component {

  public User $user;
  #[Validate]
  public $role;

  protected function rules() {
    return [
      'role' => [
        'required',
        Rule::in(['student', 'advisor', 'head', 'admin'])
      ],
    ];
  }

  protected function messages() {
    return [
      'role.required' => 'Por favor seleccione un tipo de usuario para activar esta cuenta.',
    ];
  }

  public function render() {
    return view('livewire.management.sign-up-requests.accept-request');
  }

  public function acceptUserRequest() {
    $this->validate();

    $this->user->restore();
    $this->user->update([
      'role' => $this->role
    ]);

    $this->dispatch('show-message', message: 'Cuenta activada correctamente.', type: 'success', modal: 'accept-' . $this->user->id);
  }

  public function cancel() {
    $this->reset('role');
    $this->resetErrorBag();

    $this->dispatch('reset-modal-dropdown', modal: 'accept-' . $this->user->id);
  }
}
