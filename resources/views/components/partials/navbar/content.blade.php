<div class="ui grid">
  <div class="ui mobile only row container">
    <div class="ui dropdown icon item">
      <i class="bars icon"></i>
      <div class="menu">
        <a @class(['item', 'active' => \Illuminate\Support\Facades\Route::currentRouteName() === 'index' || \Illuminate\Support\Facades\Route::currentRouteName() === 'home']) href="{{ route('home') }}"><i class="home icon"></i>Inicio</a>
        <div class="divider"></div>
        <a class="item" href="#"><i class="folder open icon"></i>Documentación</a>
        <a class="item" href="#"><i class="handshake icon"></i>Empresas</a>
        <a class="item" href="#"><i class="sync alternate icon"></i>Procesos</a>
      </div>
    </div>
  </div>
  <div class="tablet computer only row">
    <a @class(['item', 'active' => \Illuminate\Support\Facades\Route::currentRouteName() === 'index' || \Illuminate\Support\Facades\Route::currentRouteName() === 'home']) href="{{ route('home') }}">Inicio</a>
    <a class="item" href="#">Documentación</a>
    <a class="item" href="#">Empresas</a>
    <a class="item" href="#">Procesos</a>
  </div>
</div>
<div class="right menu">
  @auth
    <div class="ui dropdown item">
      {{ strtok(Auth::user()->first_name, ' '). ' '. strtok(Auth::user()->last_name, ' ') }}
      <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item"><i class="user cog icon"></i>Perfil de usuario</a>
        @if(Auth::user()->role==='super')
          <a href="{{ route('manage.user-requests') }}" class="item"><i class="user friends icon"></i>Solicitudes de activación</a>
        @endif
        <div class="divider"></div>
        <livewire:authentication.sign-out/>
      </div>
    </div>
  @endauth
  @guest
    @if(\Illuminate\Support\Facades\Route::currentRouteName()!=='auth.sign-in' && \Illuminate\Support\Facades\Route::currentRouteName()!=='auth.sign-up')
      <div class="item">
        <a href="{{ route('auth.sign-in') }}" class="ui inverted animated fade button" tabindex="0">
          <div class="visible content">¿Ya estudias aquí?</div>
          <div class="hidden content">Inicia sesión ahora</div>
        </a>
      </div>
    @endif
  @endguest
</div>