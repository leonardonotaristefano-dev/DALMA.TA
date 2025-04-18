<nav class="navbar navbar-expand-lg px-4" id="navbar">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="{{route('homepage')}}">Presto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          @guest
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
                </a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
                <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>
          @endguest
          @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Ciao, {{Auth::user()->name}}
                </a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('create.article')}}">Crea</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
                <form action="{{route('logout')}}" method="POST" id="form-logout">@csrf</form>
                </ul>
            </li>
          @endauth
        </ul>
      </div>
    </div>
</nav>
