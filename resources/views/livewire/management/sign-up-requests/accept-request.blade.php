<div>
  @teleport('body')
  <div class="ui tiny modal" modal="accept-{{ $user->id }}" wire:ignore.self>
    <div class="ui top attached teal inverted segment">
      <div class="ui large header">Aceptar solicitud</div>
    </div>
    <div class="ui attached segment content">
      <span class="ui large text">
        ¿Está seguro de que desea activar una cuenta para <strong><span class="ui secondary text">{{ $user->first_name . ' ' . $user->last_name }}</span></strong> como
        <div class="ui input" wire:ignore>
          <div class="ui floating dropdown">
            <span class="ui large text">seleccionar</span>
            <i class="dropdown icon"></i>
            <div class="menu" x-data="{ account: '' }" x-modelable="account" wire:model.live="role">
              <div class="header">Tipo de cuenta</div>
              <div x-on:click="account = 'student'" class="item" data-value="student">alumno</div>
              <div x-on:click="account = 'advisor'" class="item" data-value="advisor">asesor</div>
              <div x-on:click="account = 'head'" class="item" data-value="head">gerente académico</div>
              <div x-on:click="account = 'admin'" class="item" data-value="admin">administrativo</div>
            </div>
          </div>
        </div>
        ?
      </span>
      @error('role')
      <div wire:transition class="ui error message">{{ $message }}</div>
      @enderror
    </div>
    <div class="ui bottom attached segment actions">
      <div class="ui labeled icon primary button" wire:click="acceptUserRequest">
        <i class="check icon" wire:loading.class.remove="trash" wire:loading.class="loading spinner"></i>Estoy seguro
      </div>
      <div wire:click="cancel" class="ui cancel button">Cancelar</div>
    </div>
  </div>
  @endteleport
</div>