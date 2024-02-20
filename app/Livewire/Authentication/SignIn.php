<?php

namespace App\Livewire\Authentication;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SignIn extends Component {

  #[Validate('required|email:rfc,dns')]
  public $email;
  #[Validate('required')]
  public $password;
  public $remember = false;

  #[Title('Inicio de sesión')]
  public function render() {
    return view('livewire.authentication.sign-in');
  }

  public function signInTypically() {
    $this->validate();

    if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
      session()->regenerate();

      redirect(route('home'))->with(['message' => 'Sesión iniciada correctamente.', 'type' => 'success']);
    }

    $this->addError('form', 'Correo electrónico y/o contraseña incorrectos.');
  }
}
