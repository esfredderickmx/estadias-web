<?php

namespace App\Livewire\Authentication\Password;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Forgot extends Component {

  #[Validate('required|email:rfc,dns')]
  public string $email;

  #[Title('Solicitud de restablecimiento')]
  public function render() {
    return view('livewire.authentication.password.forgot');
  }

  public function requestPasswordReset() {
    $this->validate();

    $status = Password::sendResetLink($this->only('email'));

    $status === Password::RESET_LINK_SENT ? redirect(route('auth.sign-in'))->with(['message' => __($status), 'type' => 'success']) : $this->addError('form', __($status));
  }
}
