<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Jelajah Nusantara</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item {{ Route::is('page.trending.*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('trending') }}">Trending</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Wisata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
            <div>
                <a href="{{ route('user.login') }}" class="text-white text-decoration-none px-4 py-1 rounded-5"
                    style="background-color: blue">Login</a>
                <a href="{{ route('user.register') }}"
                    class="text-blue text-decoration-none px-3 py-1 rounded-5 border border-primary">Sign Up</a>
            </div>
        </div>
    </div>
</nav>
