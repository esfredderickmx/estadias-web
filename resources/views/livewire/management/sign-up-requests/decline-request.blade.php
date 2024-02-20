<div>
  @teleport('body')
  <div class="ui tiny modal" modal="decline-{{ $user->id }}" wire:ignore.self>
    <div class="ui top attached grey inverted segment">
      <div class="ui large header">Rechazar solicitud</div>
    </div>
    <div class="ui attached segment content">
      <span class="ui large text">¿Está seguro de que desea rechazar la solicitud de activación de la cuenta para <strong><span class="ui secondary text">{{ $user->first_name . ' ' . $user->last_name }}</span></strong>?</span>
    </div>
    <div class="ui bottom attached segment actions">
      <div class="ui labeled icon secondary button" wire:click="declineUserRequest">
        <i class="trash icon" wire:loading.class.remove="trash" wire:loading.class="loading spinner"></i>Estoy seguro
      </div>
      <div class="ui cancel button">Cancelar</div>
    </div>
  </div>
  @endteleport
</div>