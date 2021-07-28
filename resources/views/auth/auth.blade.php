@extends('layouts.guest')
@section('content')

    <section id="auth" class="container">
        @if($errors->any())
            <div class="alert alert-danger py-1 px-1 mb-1" role="alert">
                <strong>Oops! </strong>{{$errors->first()}}
            </div>
        @endif
        <div class="auth_center">
            <div class="cont_login">
                <div class="cont_info_log_sign_up">
                    <div class="col_md_login">
                        <div class="cont_ba_opcitiy">
                            <h2>LOGIN</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <button class="btn_login" onclick="_login()">LOGIN</button>
                        </div>
                    </div>
                    <div class="col_md_sign_up">
                        <div class="cont_ba_opcitiy">
                            <h2>SIGN UP</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <button class="btn_sign_up" onclick="_sign_up()">SIGN UP</button>
                        </div>
                    </div>
                </div>

                <div class="cont_back_info">
                    <div class="cont_img_back_grey"><img src="{{ asset('images/index.jpg') }}" alt=""/></div>
                </div>
                <div class="cont_forms">
                    <div class="cont_img_back"><img src="{{ asset('images/index.jpg') }}" alt=""/></div>
                    <div class="login_form">
                        <a href="#" onclick="_login_sign_up()">X</a>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <h2>LOGIN</h2>
                                <input type="email" class="form-control mb-2" name="email" placeholder="Email" value="{{ old('email') }}"
                                       aria-label="" required>
                                <input type="password" class="form-control mb-2" name="password" placeholder="Password" aria-label="" required>
                                <button class="btn_login" onclick="_login()">LOGIN</button>
                            </div>
                        </form>
                    </div>
                    <div class="sign_up_form">
                        <a href="#" onclick="_login_sign_up()">X</a>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <h2>SIGN UP</h2>
                                <input type="text" name="name" class="form-control mb-2" placeholder="Name" aria-label=""/>
                                <input type="email" name="email" class="form-control mb-2" placeholder="Email" aria-label=""/>
                                <input type="password" name="password" class="form-control mb-2" placeholder="Password" aria-label=""/>
                                <input type="password" name="password_confirmation" class="form-control mb-2" placeholder="Confirm Password"
                                       aria-label=""/>
                                <button class="btn_sign_up" onclick="_sign_up()">SIGN UP</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        function _login() {
            document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_login";
            document.querySelector('.login_form').style.display = "block";
            document.querySelector('.sign_up_form').style.opacity = "0";

            setTimeout(function () {
                document.querySelector('.login_form').style.opacity = "1";
            }, 400);
            setTimeout(function () {
                document.querySelector('.sign_up_form').style.display = "none";
            }, 200);
        }

        function _sign_up() {
            document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_sign_up";
            document.querySelector('.sign_up_form').style.display = "block";
            document.querySelector('.login_form').style.opacity = "0";

            setTimeout(function () {
                document.querySelector('.sign_up_form').style.opacity = "1";
            }, 100);
            setTimeout(function () {
                document.querySelector('.login_form').style.display = "none";
            }, 400);
        }

        function _login_sign_up() {
            document.querySelector('.cont_forms').className = "cont_forms";
            document.querySelector('.sign_up_form').style.opacity = "0";
            document.querySelector('.login_form').style.opacity = "0";

            setTimeout(function () {
                document.querySelector('.sign_up_form').style.display = "none";
                document.querySelector('.login_form').style.display = "none";
            }, 500);
        }
    </script>

@endsection
