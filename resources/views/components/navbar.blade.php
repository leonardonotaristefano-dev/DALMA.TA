<nav class="navbar navbar-expand-lg p-0" id="navbar">
    <div class="container-fluid pe-lg-2">
        <a class="navbar-brand fw-bold" href="{{ route('homepage') }}"><img
                src="{{ Storage::url('media/imageGruppo.webp') }}" alt="" class="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.index') }}">{{__('ui.allArticles')}}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{__('ui.categories')}}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item text-capitalize"
                                href="{{ route('byCategory', ['category' => $category]) }}">{{__("ui.$category->name")}}</a>

                            </li>
                            @if (!$loop->last)
                                <hr class="dropdown-divider">
                            @endif
                        @endforeach
                    </ul>
                </li>
                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{__('ui.welcome')}}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('login') }}">{{__('ui.login')}}</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">{{__('ui.register')}}</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">...</a></li>
                        </ul>
                    </li>
                @endguest
                @auth
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{__('ui.welcome')}}, {{ Auth::user()->name }}
                            @if (Auth::user()->is_revisor)
                                <span
                                    class="position-absolute top-0 start-10 translate-middle badge rounded-pill bg-danger">{{ App\Models\Article::toBeRevisionedCount() }}</span>
                            @endif
                            </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('create.article') }}">{{__('ui.create')}}</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            @if (Auth::user()->is_revisor)
                                <li class=""><a
                                        class="dropdown-item "
                                        href="{{ route('revisor.index') }}">{{__('ui.revision')}}
                                    </a>
                                </li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{__('ui.logout')}}</a>
                            </li>
                            <form action="{{ route('logout') }}" method="POST" id="form-logout">@csrf</form>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
        <form action="{{ route('article.search') }}" class="d-flex ps-lg-4" role="search" method="GET">
            <div class="input-group">
                <input type="search" name="query" class="form-control" placeholder="{{__('ui.search')}}" aria-label="search">
                <button type="submit" class="input-group-text btn buttonOpacity" id="basic-addon2">
                    {{__('ui.btnSearch')}}
                </button>
            </div>
        </form>
        <div class="ms-lg-2 d-flex justify-content-center w-auto">
            <x-_locale lang="it"/>
            <x-_locale lang="en"/>
            <x-_locale lang="pt"/>
        </div>
    </div>
</nav>
