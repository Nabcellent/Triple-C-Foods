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
                        <a href="{{ route('products.index') }}" class="nav-link {{ !Route::is('product*') ?: 'active' }}" data-toggle="modal"
                           data-target="#profile_modal">Kitchen
                        </a>
                    </li>
                    <li class="nav-item position-relative dropdown">
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <a href="#" class="nav-link dropdown-toggle {{ !Route::is('cart.*') ?: 'active' }}" data-bs-toggle="dropdown" title="Cart">
                            Cart
                            <i class="fab fa-opencart">
                                <span class="position-absolute top-0 font-size-10">{{ count((array) session('cart')) === 0 ? '' : count((array) session('cart')) }}</span>
                            </i>
                            <span class="font-size-10">{{ $total === 0 ? '' : $total }}</span>
                        </a>
                        @if(session('cart'))
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><h6 class="dropdown-header text-center font-size-12">Items in cart</h6></li>
                                @foreach(session('cart') as $id => $details)
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="row d-flex align-items-center font-size-10">
                                                <div class="col-2 p-0">
                                                    <img src="{{ asset('images/kuku/' . $details['image']) }}" class="img-fluid rounded-circle"
                                                         style="width:1rem; height:1rem" alt=""/>
                                                </div>
                                                <div class="col-10 p-0">
                                                    <p>{{ $details['title'] }}</p>
                                                    <span class="price text-danger">KSH {{ $details['price'] }}</span>
                                                    <span class="count"> Qty:{{ $details['quantity'] }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                                <h6 class="dropdown-divider"></h6>
                                <li><a href="{{ route('cart.index') }}" class="dropdown-item text-center">View All</a></li>
                            </ul>
                        @endif
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
