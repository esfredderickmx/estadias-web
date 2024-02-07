<?php

namespace App\Livewire\Authentication;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SignUp extends Component {

  #[Validate('required|string|max:70')]
  public $first_name;
  #[Validate('required|string|max:70')]
  public $last_name;
  #[Validate('required|email:rfc,dns|max:256|unique:users,email')]
  public $email;
  #[Validate]
  public $phone_extension;
  #[Validate('required|numeric|digits:10')]
  public $phone_number;
  #[Validate]
  public $password;
  #[Validate('required|same:password')]
  public $password_confirmation;
  #[Validate('required|accepted')]
  public $terms = false;
  #[Validate('required|accepted')]
  public $policy = false;

  protected function rules() {
    return [
      'phone_extension' => [
        'required',
        Rule::in($this->phone_extension)
      ],
      'password' => [
        'required',
        Password::min(12)->letters()->mixedCase()->numbers()->symbols()->uncompromised()
      ]
    ];
  }

  public array $phone_extensions = [
    '52' => 'mx', // México
    '34' => 'es', // España
    '1' => 'us', // Estados Unidos
    '44' => 'gb', // Reino Unido
    '33' => 'fr', // Francia
    '39' => 'it', // Italia
    '49' => 'de', // Alemania
    '86' => 'cn', // China
    '850' => 'kp', // Corea del Norte
    '82' => 'kr', // Corea del Sur
    '81' => 'jp'  // Japón
  ];

  #[Title('Solicitud de activación')]
  public function render() {
    return view('livewire.authentication.sign-up');
  }

  public function requestSignUp() {
    $this->validate();

    $request = User::create($this->all());
    $request->delete();

    redirect(route('sign-in'))->with(['message' => '¡Solicitud realizada correctamente!', 'type' => 'success']);
  }
}
