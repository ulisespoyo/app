 <nav class="navbar navbar-primary navbar-expand-lg bg-white shadow-sm">
   <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">
         {{ config('app.name') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link {{ setActive('home') }}" href="{{ route('home') }}">@lang('Home')</a></li>
            <li class="nav-item"><a class="nav-link {{ setActive('about') }}" href="{{ route('about') }}">@lang('About')</a></li>
            <li class="nav-item"><a class="nav-link {{ setActive('projects.*') }}" href="{{ route('projects.index') }}">@lang('Projects')</a></li>
            <li class="nav-item"><a class="nav-link {{ setActive('messages') }}" href="{{ route('messages.create') }}">@lang('Contact')</a></li>
            <li class="nav-item"><a class="nav-link {{ setActive('messages') }}" href="{{ route('messages.index') }}">Mensajes</a></li>
         </ul>
         <form class="form-inline my-2 my-lg-0">

          <ul  class="nav navbar-nav navbar-right">
             <li class="dropdown">
               <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  @if(auth()->check())   {{ auth()->user()->name }} @else {{ 'Invitado' }}  @endif
               </a>
               <ul class="dropdown-menu">
                  @if(auth()->check())
                     @if(auth()->user()->hasRoles(['admin']))
                           <li class="nav-link"><a href="{{ route('Usuarios.index') }}">Usuarios</a></li>
                           <li class="nav-link"><a href="{{ route('Roles.index') }}">Roles</a></li>
                     @endif
                     <li class="nav-link"><a href="/Usuarios/{{ auth()->id() }}/editar">Mi cuenta</a></li>
                     <li class="nav-link"><a href="#"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Cerrar sesión</a></li>
                  @else
                        <li class="nav-link {{ setActive('login') }}" ><a  href="{{ route('login') }}">Login</a></li>
                  @endif
               </ul>

            </li>
         </ul>
      </form>
   </div>
</div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>