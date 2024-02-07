<?php

namespace App\Livewire\Authentication\Password;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Reset extends Component {

  #[Validate('required')]
  public string $token;
  #[Validate('required|email:rfc,dns')]
  public string $email;
  #[Validate]
  public $password;
  #[Validate('required|same:password')]
  public $password_confirmation;

  protected function rules() {
    return [
      'password' => [
        'required',
        Password::min(12)->letters()->mixedCase()->numbers()->symbols()->uncompromised()
      ]
    ];
  }

  public function mount($token) {
    $this->token = $token;
    $this->email = request('email');
  }

  #[Title('Restablecimiento de contraseña')]
  public function render() {
    return view('livewire.authentication.password.reset');
  }

  public function resetUserPassword() {
    $this->validate();

    $status = \Password::reset($this->only('email', 'password', 'password-confirmation', 'token'), function (User $user, string $password) {
      $user->forceFill(['password' => $password])->save();

      event(new PasswordReset($user));
    });

    $status === \Password::PASSWORD_RESET ? redirect(route('auth.sign-in'))->with(['message' => __($status), 'type' => 'success']) : $this->addError('form', __($status));
  }
}
