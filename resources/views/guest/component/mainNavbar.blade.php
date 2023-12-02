<nav class="navbar navbar-expand-lg" data-bs-theme="dark" style="background-color: rgba(0, 0, 0, 0.7)">
    <div class="container-fluid">
        @auth
        <div class="me-3">
            <a class="btn border-white border-1" data-bs-toggle="offcanvas" href="#sidebar" role="button"
                aria-controls="offcanvasExample" style="background-color: rgba(224, 195, 252, 0.2)">
                <i class="bi bi-list"></i>
            </a>
        </div>
        @endauth
        <a class="navbar-brand" href="/">MPEPEL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link @if (request()->is('/')) active @endif" href="/">Home</a>
                <a class="nav-link @if (request()->is('event')) active @endif" href="/event">Event</a>
            </div>
            <div class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i>
                                    Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                {{-- <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                        Logout</button>
                                </form> --}}
                                <a class="dropdown-item" href="/logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                        </ul>
                    </li>
                @else
                    <a class="nav-link" href="/login"><i class="bi bi-person"></i>Login</a>
                </div>
                @endauth
            {{-- @guest
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="/login"><i class="bi bi-person"></i>Login</a>
                </div>
            @endguest --}}
        </div>
    </div>
</nav>
