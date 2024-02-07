@extends('components.layouts.app')

@section('title', 'Inicio')

@section('content')
  <div class="ui inverted secondary vertical center aligned segment" id="nav-section">
    @include('components.partials.navbar.embedded')
    <div class="ui text container">
      <h1 class="ui inverted header">Tu estancia, tu control</h1>
      <h2>Preparación para el éxito profesional.</h2>
      <a href="{{ route('auth.sign-in') }}" class="ui primary huge animated button" tabindex="0">
        <div class="visible content">Comienza ahora</div>
        <div class="hidden content"><i class="right arrow icon"></i></div>
      </a>
    </div>
  </div>

  <div class="ui vertical stripe segment">
    <div class="ui middle aligned stackable grid container">
      <div class="row">
        <div class="seven wide column">
          <h3 class="ui header">Formatos y documentos</h3>
          <p>Accede a toda la información necesaria para tus estadías. Encuentra documentos previos y durante el proceso de estancias académicas en un solo lugar.</p>
          <a class="ui big secondary button">Explorarlos ahora</a>
        </div>
        <div class="nine wide column">
          <img src="{{asset('images/home-docs.jpg')}}" class="ui centered big bordered rounded image">
        </div>
      </div>
    </div>
    <div class="ui middle aligned stackable grid container">
      <div class="row">
        <div class="nine wide tablet computer only column">
          <img src="{{asset('images/home-agreement.jpg')}}" class="ui centered big bordered rounded image">
        </div>
        <div class="seven wide column">
          <h3 class="ui header">Diversidad laboral</h3>
          <p>Descubre oportunidades laborales con empresas asociadas a tu universidad. Explora las vacantes disponibles y conoce las organizaciones con las que tenemos convenio.</p>
          <a class="ui big secondary button">Conocerlas ahora</a>
        </div>
        <div class="nine wide mobile only column">
          <img src="{{asset('images/home-agreement.jpg')}}" class="ui centered big bordered rounded image">
        </div>
      </div>
    </div>
    <div class="ui middle aligned stackable grid container">
      <div class="row">
        <div class="seven wide column">
          <h3 class="ui header">Gestión remota</h3>
          <p>Mantén el control total de tus procesos de estadías académicas. Comunícate con tus asesores, agenda revisiones, envía documentos y realiza un seguimiento completo de cada etapa del proceso desde donde estés.</p>
          <a class="ui big secondary button">¡Tomar el control ahora!</a>
        </div>
        <div class="nine wide column">
          <img src="{{asset('images/home-internship.jpg')}}" class="ui centered big bordered rounded image">
        </div>
      </div>
    </div>
  </div>

  <div class="ui vertical stripe quote segment">
    <div class="ui equal width stackable internally celled grid">
      <div class="center aligned row">
        <div class="column">
          <h3>"Esta estadía me permitió aplicar mis habilidades de desarrollo de software en un entorno real. Aprendí mucho y fortalecí mi perfil profesional."</h3>
          <p>
            <img src="{{asset('images/careers/i.t..png')}}" class="ui avatar image"> <b>José García.</b> Ing. en Desarrollo y Gestión de Sfotware
          </p>
        </div>
        <div class="column">
          <h3>"Gracias a esta estadía, pude llevar mis conocimientos químicos al mundo laboral. Experimenté procesos reales y gané experiencia invaluable para mi carrera."</h3>
          <p>
            <img src="{{asset('images/careers/chemistry.png')}}" class="ui avatar image"> <b>Felipe Castillo</b> Ing. en Procesos Químicos
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="ui vertical stripe segment">
    <div class="ui text container">
      <h3 class="ui header">Recursos para los alumnos</h3>
      <p>Nuestra plataforma te ofrece acceso a una amplia gama de documentos, guías y consejos elaborados por estudiantes experimentados y profesionales en el campo. Desde plantillas de informes hasta tutoriales paso a paso, aquí encontrarás todo lo necesario para optimizar tus estadías.</p>
      <a class="ui large secondary button">Me interesa</a>
      <h4 class="ui horizontal header divider">
        <a href="#">PUBCLICACIONES DE INTERÉS</a>
      </h4>
      <h3 class="ui header">Comunicación efectiva</h3>
      <p>¿En esta sección, podrás iniciar conversaciones, agendar reuniones y compartir documentos de manera eficiente. Mantén un registro de todas tus interacciones y recibe notificaciones importantes para asegurarte de estar siempre al tanto de tu progreso en tus estadías académicas.</p>
      <a class="ui large secondary button">Saber más</a>
    </div>
  </div>
@endsection