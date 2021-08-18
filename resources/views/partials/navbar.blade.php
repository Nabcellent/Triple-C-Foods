<div id="navigation-sticky">

    <!-- Navigation -->

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
            <a href="{{ route('home') }}" class="navbar-brand d-flex">
                <img src="{{ asset('images/logo.png') }}" alt="logo" title="home logo">FOODCELLENT
            </a>
            <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbar_responsive">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar_responsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link {{ !Route::is('home') ?: 'active' }}">Home</a></li>
                    <li class="nav-item">
                        <a href="{{ route('products') }}" class="nav-link {{ !Route::is('product*') ?: 'active' }}" data-toggle="modal"
                           data-target="#profile_modal">Kitchen</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cart.index') }}" class="nav-link {{ !Route::is('cart.*') ?: 'active' }}" title="Cart">
                            <i class="fab fa-opencart"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }} <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if(isAdmin())
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            @endif
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Info</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   href="{{ route('logout') }}">{{ __('Sign Out') }}</a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navigation -->
