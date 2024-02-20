<div class="ui container very padded horizontally fitted basic segment">
  <h1 class="ui header">
    <div class="content">Solicitudes de activación de cuentas</div>
  </h1>

  <div class="ui form">
    <div class="fields">
      <div class="six wide field">
        <div class="ui icon input" wire:loading.class="loading" wire:target="search">
          <input type="text" name="search" id="search" placeholder="Buscar solicitudes" wire:model.live.debounce.250="search" maxlength="70" autocomplete="off" autofocus>
          @if(!$search)
            <i wire:click="resetPage" class="circular search link icon"></i>
          @else
            <i wire:click="$set('search', '')" class="circular times link icon"></i>
          @endif
        </div>
      </div>
      @if($selection)
        <div class="field">
          <div wire:click="$dispatch('open-modal', { modal: 'accept-selected' })" class="ui fluid primary button"><i class="users icon"></i>Activar seleccionados</div>
        </div>
        <div class="field">
          <div wire:click="$dispatch('open-modal', { modal: 'decline-selected' })" class="ui fluid secondary button"><i class="users slash icon"></i>Recahazar seleccionados</div>
        </div>
      @endif
    </div>
  </div>

  <div class="ui fitted basic segment">
    <div wire:loading>
      <div class="ui active inverted dimmer">
        <div class="ui text loader">Cargando</div>
      </div>
    </div>
    <table class="ui sortable compact celled definition table">
      <thead class="full-width">
      <tr class="center aligned">
        <th>
          <div class="ui fitted checkbox" wire:init="verifySelection" wire:ignore>
            <input type="checkbox" name="select_all" id="select_all" wire:model.live="select_all">
            <label for="select_all"></label>
          </div>
        </th>
        <th wire:click="$dispatch('sort-by', { column: 'first_name' })">
          Nombre completo @if($sorting === 'first_name')
            <i class="caret {{ $sort_direction ? 'down' : 'up' }} icon"></i>
          @endif
        </th>
        <th wire:click="$dispatch('sort-by', { column: 'email' })">
          Correo electrónico @if($sorting === 'email')
            <i class="caret {{ $sort_direction ? 'down' : 'up' }} icon"></i>
          @endif
        </th>
        <th wire:click="$dispatch('sort-by', { column: 'created_at' })">
          Fecha de solicitud @if($sorting === 'created_at')
            <i class="caret {{ $sort_direction ? 'down' : 'up' }} icon"></i>
          @endif
        </th>
        <th>Acciones</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($users as $user)
        <tr wire:key="{{ $user->id }}" class="center aligned">
          <td>
            <div class="ui fitted checkbox" wire:ignore>
              <input type="checkbox" name="selection" id="{{ $user->id }}" value="{{ $user->id }}" wire:model.live="selection">
              <label for="{{ $user->id }}"></label>
            </div>
          </td>
          <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ ucfirst(\Carbon\Carbon::now()->sub($user->created_at)->diffForHumans()) }}</td>
          <td class="collapsing">
            <div wire:click="$dispatch('open-modal', { modal: 'accept-{{ $user->id }}' })" class="ui primary button"><i class="user icon"></i>Activar</div>
            <div wire:click="$dispatch('open-modal', { modal: 'decline-{{ $user->id }}' })" class="ui secondary icon button"><i class="user slash icon"></i></div>
          </td>
        </tr>

        <livewire:management.sign-up-requests.accept-request :$user :key="'accept-'.$user->id"/>
        <livewire:management.sign-up-requests.decline-request :$user :key="'decline-'.$user->id"/>
      @endforeach
      </tbody>
    </table>
    @if($users->isEmpty())
      <div wire:loading.remove>
        <div class="ui placeholder segment">
          <div class="ui icon header">
            <i class="{{ $search ? 'search' : 'ghost' }} icon"></i>
            {{ $search ? 'No hay coincidencias de búsqueda.' : 'Aún no hay elementos que mostrar.' }}
          </div>
          @if ($search)
            <section class="ui center aligned container inline">
              <div class="ui secondary button" wire:click="$set('search', '')"><i class="times icon"></i>Limpiar búsqueda</div>
            </section>
          @endif
        </div>
      </div>
    @endif
  </div>

  <livewire:management.sign-up-requests.accept-selected wire:model="selection"/>
  <livewire:management.sign-up-requests.decline-selected wire:model="selection"/>

  <div class="ui fitted basic segment">
    {{ $users->links('vendor.livewire.fomantic') }}
  </div>
</div>