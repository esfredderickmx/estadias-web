<div>
  @teleport('body')
  <div class="ui tiny modal" modal="accept-selected" wire:ignore.self>
    <div class="ui top attached teal inverted segment">
      <div class="ui large header">Aceptar solicitudes seleccionadas</div>
    </div>
    <div class="ui attached segment content">
      <span class="ui large text">
        ¿Está seguro de que desea activar una cuenta para <strong><span class="ui secondary text">cada una de las personas seleccionadas</span></strong> como
        <div class="ui input" wire:ignore>
          <div class="ui floating dropdown">
            <span class="ui large text">seleccionar</span>
            <i class="dropdown icon"></i>
            <div class="menu" x-data="{ accounts: '' }" x-modelable="accounts" wire:model.live="roles">
              <div class="header">Tipo de cuenta</div>
              <div x-on:click="accounts = 'student'" class="item" data-value="student">alumnos</div>
              <div x-on:click="accounts = 'advisor'" class="item" data-value="advisor">asesores</div>
              <div x-on:click="accounts = 'head'" class="item" data-value="head">gerentes académicos</div>
              <div x-on:click="accounts = 'admin'" class="item" data-value="admin">administrativos</div>
            </div>
          </div>
        </div>
        ?
      </span>
      @error('roles')
      <div wire:transition class="ui error message">{{ $message }}</div>
      @enderror
    </div>
    <div class="ui bottom attached segment actions">
      <div class="ui labeled icon primary button" wire:click="acceptSelectedRequests">
        <i class="check icon" wire:loading.class.remove="trash" wire:loading.class="loading spinner"></i>Estoy seguro
      </div>
      <div wire:click="cancel" class="ui cancel button">Cancelar</div>
    </div>
  </div>
  @endteleport
</div>