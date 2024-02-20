<div class="ui container very padded horizontally fitted basic segment">
  <div class="ui center aligned grid">
    <div class="sixteen wide mobile ten wide tablet seven wide computer column">
      <h1 class="ui header">
        <div class="content">Restablece tu contraseña</div>
      </h1>
      <div class="ui left aligned top attached segment">
        <form class="ui form" wire:submit="resetUserPassword" wire:loading.class="loading">
          <input type="hidden" name="token" wire:model="token" disabled>
          <div class="field required @error('email') error @enderror">
            <label for="email">Correo electrónico</label>
            <div class="ui left icon input">
              <i class="envelope icon"></i>
              <input type="text" name="email" id="email" placeholder="Correo electrónico" wire:model.blur="email" maxlength="256" autocomplete="off" autofocus disabled>
            </div>
            @error('email')
            <span class="ui small error text">{{$message}}</span>
            @enderror
          </div>
          <div class="field required @error('password') error @enderror">
            <label for="password">Contraseña</label>
            <div class="ui left icon action input" wire:ignore>
              <i class="lock icon"></i>
              <input type="password" name="password" id="password" placeholder="Contraseña" wire:model.blur="password" autocomplete="off" autofocus>
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
              <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Contraseña" wire:model.blur="password_confirmation" autocomplete="off">
              <div class="ui toggle icon button" data-tooltip="Mostrar/ocultar contraseña" data-position="bottom right" data-variation="small">
                <i class="eye outline icon"></i>
              </div>
            </div>
            @error('password_confirmation')
            <div><span class="ui small error text">{{$message}}</span></div>
            @enderror
          </div>
          <button class="ui fluid primary button" type="submit"><i class="sync alternate in icon"></i> Restablecer contraseña</button>
          <div class="ui error message"></div>
        </form>
        @error('form')
        <div wire:transition class="ui error message">{{$message}}</div>
        @enderror
      </div>
      <div class="ui bottom attached large message">
        ¿Recordaste tu contraseña?<a class="ui primary tertiary button" href="{{ route('auth.sign-in') }}" wire:navigate>Ingresa ahora</a>
      </div>
    </div>
  </div>
</div>