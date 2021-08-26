@extends('layouts.guest')

@section('content')

    <!-- Masthead-->
    <div class="masthead register">
        <div class="position-absolute" style="top: 1rem; right: 1rem">
            @if($isAdmin)
                <a href="{{ route('register') }}" class="link-secondary">Client</a>
            @else
                <a href="{{ route('register', ['user' => 'admin']) }}" class="link-secondary">Admin</a>
            @endif
        </div>

        <div class="masthead-content text-white">
            <div class="container-fluid px-4 px-lg-0">
                <h1 class="fst-italic lh-1 mb-4">{{ $isAdmin ? 'Admin' : 'Customer' }} Sign Up</h1>
                <p class="mb-5">
                    Hellooo! Sign up below as
                    {{ $isAdmin ? 'an admin and sell the best food you customers will ever have.' : ' a customer and order the best meal you never had.' }}
                </p>
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show py-1" role="alert">
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
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" name="is_admin" value="{{ $isAdmin ?? 'false' }}">
                    <div class="form-group mb-3">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" aria-label
                               value="{{ old('name') }}" placeholder="Enter your full name" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" aria-label
                               value="{{ old('email') }}" placeholder="Enter your email address" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                   placeholder="Enter new password" aria-label required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                   placeholder="Confirm password" required aria-label autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group row mb-0 justify-content-between align-items-center">
                        <div class="col-auto">
                            <a class="link-warning" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                        </div>
                        <div class="col-12 col-md-5">
                            <button type="submit" class="btn btn-dark col-12">{{ __('Sign Up') }} <i class="fas fa-user-plus"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Social Icons-->
    <div class="social-icons register">
        <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
            <a class="btn btn-dark m-3" href="#!"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-dark m-3" href="#!"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-dark m-3" href="#!"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

@endsection
