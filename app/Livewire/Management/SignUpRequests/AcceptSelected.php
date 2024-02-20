<?php

namespace App\Livewire\Management\SignUpRequests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AcceptSelected extends Component {

  #[Modelable]
  public $selection;
  #[Validate]
  public $roles;

  protected function rules() {
    return [
      'roles' => [
        'required',
        Rule::in(['student', 'advisor', 'head', 'admin'])
      ],
    ];
  }

  protected function messages() {
    return [
      'roles.required' => 'Por favor seleccione un tipo de cuentas para poder activarlas.',
    ];
  }

  public function render() {
    return view('livewire.management.sign-up-requests.accept-selected');
  }

  public function acceptSelectedRequests() {
    $this->validate();

    foreach ($this->selection as $request) {
      User::onlyTrashed()->find($request)->restore();
      User::find($request)->update([
        'role' => $this->roles
      ]);
    }

    $this->dispatch('show-message', message: 'Cuenta activada correctamente.', type: 'success', modal: 'accept-selected', dropdown: true);
  }

  public function cancel() {
    $this->reset('roles');
    $this->resetErrorBag();

    $this->dispatch('reset-modal-dropdown', modal: 'accept-selected');
  }
}
