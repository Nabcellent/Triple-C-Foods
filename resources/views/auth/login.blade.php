@extends('layouts.guest')
@section('content')

    <!-- Masthead-->
    <div class="masthead login">
        <div class="masthead-content text-white">
            <div class="container-fluid px-4 px-lg-0">
                <h1 class="fst-italic lh-1 mb-4">Sign In</h1>
                <p class="mb-5">Sign in below to get the best one of bon appetites' favourites!</p>
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show   py-1" role="alert">
                        <div class="row align-items-center">
                            <div class="col-auto pe-0">
                                <strong>
                                    <svg class="bi flex-shrink-0" width="24" height="24" role="img" aria-label="Warning:">
                                        <use xlink:href="#exclamation-triangle-fill"/>
                                    </svg>
                                </strong>
                            </div>
                            <div class="col">
                                {{$errors->first()}}
                                <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" placeholder="Enter your email address"
                               required autocomplete="email" autofocus aria-label>
                    </div>
                    <div class="form-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required
                               autocomplete="current-password" placeholder="Enter your password" aria-label>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
                        </div>
                        <div class="col text-end">
                            @if (Route::has('password.request'))
                                <a class="link-warning small" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-0 justify-content-end">
                        <div class="col-12 col-md-5">
                            <button type="submit" class="btn btn-dark col-12">{{ __('Sign In') }} <i class="fas fa-user-check"></i></button>
                        </div>
                    </div>
                </form>
                <div class="text-center mt-5">
                    <small><a href="{{ route('register') }}" class="link-warning">Create an account!</a></small>
                </div>
            </div>
        </div>
    </div>

    <!-- Social Icons-->
    <div class="social-icons login">
        <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
            <a class="btn btn-dark m-3" href="#!"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-dark m-3" href="#!"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-dark m-3" href="#!"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

@endsection
