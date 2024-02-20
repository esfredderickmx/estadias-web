<div class="ui container very padded horizontally fitted basic segment">
  <div class="ui center aligned grid">
    <div class="sixteen wide mobile ten wide tablet seven wide computer column">
      <h1 class="ui header">
        <div class="content">Solicita un restablecimiento de contraseña</div>
      </h1>
      <div class="ui left aligned top attached segment">
        <form class="ui form" wire:submit="requestPasswordReset" wire:loading.class="loading">
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
          <button class="ui fluid primary button" type="submit"><i class="bell icon"></i> Solictar restablecimiento</button>
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