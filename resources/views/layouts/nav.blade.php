<style>
    body {
        background-color: #D6F0F3;
    }

    .navbar {
        font-size: 1.25rem;
    }

    .navbar-brand, .nav-link, .dropdown-item {
        color: #000 !important;
        font-weight: bold;
    }

    .navbar-brand:hover, .nav-link:hover, .dropdown-item:hover {
        color: #555 !important;
    }

    .dropdown-item.text-danger {
        color: red !important;
    }

    .navbar-toggler-icon {
        filter: invert(1);
    }
</style>
<div id="app">
    @auth
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #D6F0F3; padding: 1rem;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><i class="bi-hexagon-fill me-2"></i>SIUNS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('beasiswas.index') }}" class="nav-link">Beasiswa</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="" class="nav-link">Lomba</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="" class="nav-link">Loker</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="bi bi-lock"></i>{{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endauth
</div>

