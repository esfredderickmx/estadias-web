<div class="ui container very padded horizontally fitted basic segment">
  <div class="ui center aligned grid">
    <div class="sixteen wide mobile thirteen wide tablet ten wide computer column">
      <h1 class="ui header">
        <div class="content">Solicita la activación de tu cuenta</div>
      </h1>
      <div class="ui left aligned top attached segment">
        <form class="ui form" wire:submit="requestSignUp" wire:loading.class="loading">
          <div class="two fields">
            <div class="field required @error('first_name') error @enderror">
              <label for="first_name">Nombre(s)</label>
              <div class="ui left icon input">
                <i class="quote left icon"></i>
                <input type="text" name="first_name" id="first_name" placeholder="Nombre(s)" wire:model.blur="first_name" maxlength="70" autocomplete="off" autofocus>
              </div>
              @error('first_name')
              <span class="ui small error text">{{$message}}</span>
              @enderror
            </div>
            <div class="field required @error('last_name') error @enderror">
              <label for="last_name">Apellido(s)</label>
              <div class="ui left icon input">
                <i class="quote right icon"></i>
                <input type="text" name="last_name" id="last_name" placeholder="Apellido(s)" wire:model.blur="last_name" maxlength="70" autocomplete="off" autofocus>
              </div>
              @error('last_name')
              <span class="ui small error text">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="two fields">
            <div class="field required @error('email') error @enderror">
              <label for="email">Correo electrónico</label>
              <div class="ui left icon input">
                <i class="envelope icon"></i>
                <input type="text" name="email" id="email" placeholder="Correo electrónico" wire:model.blur="email" maxlength="256" autocomplete="off" autofocus>
              </div>
              @error('email')
              <span class="ui small error text">{{$message}}</span>
              @enderror
            </div>
            <div class="field required @error('phone_number') error @else @error('phone_extension') error @enderror @enderror">
              <label for="phone_number">Número de teléfono</label>
              <div class="ui left action icon input" wire:ignore>
                <div class="ui compact selection dropdown" data-tooltip="No use el teclado para seleccionar" data-position="top left" data-variation="small">
                  <input type="hidden" name="phone_extension">
                  <div class="default text">Extensión</div>
                  <div class="menu" x-data="{ext: ''}" x-modelable="ext" wire:model.live="phone_extension">
                    @foreach($phone_extensions as $key => $value)
                      <div x-on:click="ext = '{{$value}}'" class="item" data-value="{{$value}}"><i class="{{$value}} flag"></i>+{{$key}}</div>
                    @endforeach
                  </div>
                </div>
                <input type="tel" name="phone_number" id="phone_number" placeholder="Número" wire:model.blur="phone_number" maxlength="10" autocomplete="off" autofocus>
                <i class="phone alternate icon"></i>
              </div>
              @error('phone_extension')
              <span class="ui small error text">Extensión: {{$message}}</span>
              @else
                @error('phone_number')
                <span class="ui small error text">Número: {{$message}}</span>
                @enderror
              @enderror
            </div>
          </div>
          <div class="two fields">
            <div class="field required @error('password') error @enderror">
              <label for="password">Contraseña</label>
              <div class="ui left icon action input" wire:ignore>
                <i class="lock icon"></i>
                <input type="password" name="password" id="password" placeholder="Contraseña" wire:model.blur="password" autocomplete="off">
                <div class="ui toggle icon button" data-tooltip="Mostrar/ocultar contraseña" data-position="bottom right" data-variation="small">
                  <i class="eye outline icon"></i>
                </div>
              </div>
              @error('password')
              <div><span class="ui small error text">{{$message}}</span></div>
              @enderror
            </div>
            <div class="field required @error('password_confirmation') error @enderror">
              <label for="password_confirmation">Confirmar contraseña</label>
              <div class="ui left icon action input" wire:ignore>
                <i class="unlock icon"></i>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar contraseña" wire:model.blur="password_confirmation" autocomplete="off">
                <div class="ui toggle icon button" data-tooltip="Mostrar/ocultar contraseña" data-position="bottom right" data-variation="small">
                  <i class="eye outline icon"></i>
                </div>
              </div>
              @error('password_confirmation')
              <div><span class="ui small error text">{{$message}}</span></div>
              @enderror
            </div>
          </div>
          <div class="field required @error('terms') error @enderror">
            <div class="ui checkbox" wire:ignore>
              <input type="checkbox" name="terms" id="terms" wire:model.live="terms">
              <label for="terms">Aceptar los términos y las condiciones de uso</label>
            </div>
            @error('terms')
            <div><span class="ui small error text">{{$message}}</span></div>
            @enderror
          </div>
          <div class="field required @error('policy') error @enderror">
            <div class="ui checkbox" wire:ignore>
              <input type="checkbox" name="policy" id="policy" wire:model.live="policy">
              <label for="policy">Aceptar las políticas de privacidad</label>
            </div>
            @error('policy')
            <div><span class="ui small error text">{{$message}}</span></div>
            @enderror
          </div>
          <button class="ui fluid primary button" type="submit"><i class="bell icon"></i> Solicitar activación</button>
        </form>
        @error('form')
        <div class="ui error message">{{$message}}</div>
        @enderror
      </div>
      <div class="ui bottom attached large message">
        ¿Ya está activo el acceso a tu cuenta?<a class="ui primary tertiary button" href="{{ route('auth.sign-in') }}" wire:navigate>Ingresa ahora</a>
      </div>
    </div>
  </div>
</div>