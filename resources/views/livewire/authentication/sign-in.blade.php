<div class="ui container very padded horizontally fitted basic segment">
  <div class="ui center aligned grid">
    <div class="sixteen wide mobile ten wide tablet seven wide computer column">
      <h1 class="ui header">
        <div class="content">Inicia sesión con tu cuenta</div>
      </h1>
      <div class="ui left aligned top attached segment">
        <form class="ui form" wire:submit="signInTypically" wire:loading.class="loading">
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
            ¿Olvidaste tu contraseña?<div wire:navigate href="{{ route('password.request') }}" class="ui primary tertiary button">Recupérala ahora</div>
          </div>
          <div class="field">
            <div class="ui checkbox" wire:ignore>
              <input type="checkbox" name="remember" id="remember" wire:model.blur="remember">
              <label for="remember">Recordar sesión en este navegador</label>
            </div>
          </div>
          <button class="ui fluid primary button" type="submit"><i class="door open icon"></i> Ingresar</button>
        </form>
        @error('form')
        <div wire:transition class="ui error message">{{$message}}</div>
        @enderror
      </div>
      <div class="ui bottom attached large message">
        ¿Aún no tienes acceso a tu cuenta?<a class="ui primary tertiary button" href="{{ route('auth.sign-up') }}" wire:navigate>Solicítalo ahora</a>
      </div>
    </div>
  </div>
</div>