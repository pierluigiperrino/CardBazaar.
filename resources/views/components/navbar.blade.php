<nav class="navbar navbar-expand-lg fixed-top border-nav">
    <div class="container-fluid col-11">
        {{-- Elementi della Navbar a SINISTRA --}}
        <a class="navbar-brand text-light" href="{{ route('homepage') }}"> <img src="/assets/images/logo_CB.png"
                alt="Logo_img" width="15px" height="auto" class="d-inline-block align-text-bottom"> CardBazaar.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item @if (Route::currentRouteName() == 'homepage') active @endif">
                    <a class="nav-link" aria-current="page" href="{{ route('homepage') }}">{{ __('custom.nav1') }}</a>
                </li>
                <li class="nav-item @if (Route::currentRouteName() == 'announcements.index') active @endif">
                    <a class="nav-link" href="{{ route('announcements.index') }}">{{ __('custom.nav2') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle @if (Route::currentRouteName() == 'categories.index') active @endif" href="#"
                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('custom.nav3') }}
                    </a>
                    <ul class="dropdown-menu drop-nav shadow" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('categories.show', $category->name) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                @auth
                    <li class="nav-item @if (Route::currentRouteName() == 'announcements.create') active @endif">
                        <a class="nav-link" href="{{ route('announcements.create') }}" tabindex="-1"
                            aria-disabled="true">{{ __('custom.nav5') }}</a>
                    </li>
                @endauth
            </ul>
            <div class="nav-item">
                {{-- Utenza, Revisor --}}
                @if (Auth::user() && Auth::user()->is_revisor)
                    <a href="{{ route('revisor.index') }}" class="btn btn-warning mb-3 mt-md-2 m-md-2"><i
                            class="fa-solid fa-user-secret fa-lg"></i> {{ __('') }}</a>
                    {{-- <span class="revisorCounter translate-middle badge rounded-pill bg-dark text-warning">
                        {{ app\Models\Announcement::toBeRevisionedCount() }}
                        <span class="visually-hidden">messaggi non letti</span>
                    </span> --}}
                @endif
            </div>
            {{-- Elementi della Navbar a DESTRA --}}
            <form action="{{ route('announcements.search') }}" method="GET" class="d-flex" role="search">
                <input name="searched" class="form-control me-2" type="search" placeholder="{{ __('custom.nav6') }}"
                    aria-label="Search">
                <button class="btn btn-warning" type="submit"><i
                        class="fa-solid fa-magnifying-glass"></i>{{ __('') }}</button>
            </form>

            <ul class="navbar-nav">

                {{-- Utenza, Login e Logout --}}
                @guest
                    <div class="nav-item">
                        <a class="btn btn-warning mt-2 mt-md-2 m-md-2" href="{{ route('login') }}">{{ __('custom.nav8') }}
                            <i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                    </div>
                @else
                    <div class="nav-item">
                        <a class="btn btn-warning mt-2 mt-md-2 m-md-2" href="{{ route('user_announcements') }}"><i
                                class="fa-solid fa-user"></i>
                            {{ __('') }} {{ Auth::user()->name }}
                        </a>
                    </div>
                    <div class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a class="btn btn-warning mt-3 mb-2 mt-md-2 m-md-2"
                                onclick="event.preventDefault(); this.closest('form').submit();"><i
                                    class="fa-solid fa-arrow-right-from-bracket"></i>
                                {{ __('custom.nav10') }}
                            </a>
                        </form>
                    </div>
                @endguest
            </ul>
        </div>
    </div>
</nav>
