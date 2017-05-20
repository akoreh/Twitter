@extends('layouts.temp')

@section('content')
    <script src="{{asset('js/register.js')}}"></script>
    <style>
        .slide {
            background-image: url('/images/welcome_slider/1.jpg');
            background-position: 50% 50%;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .slide-2 {
            background-image: url('/images/welcome_slider/2.jpg');
            background-position: 50% 50%;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: scroll;
        }

        .slide-3 {
            background-image: url('/images/welcome_slider/3.jpg');
            background-position: 50% 50%;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: scroll;
        }
    </style>

    <div class="navbar w-nav" data-animation="default" data-collapse="medium" data-duration="400">
        <div class="w-container">
            <a class="w-nav-brand" href="#">
                <div class="logo"></div>
            </a>
            <nav class="nav-menu w-nav-menu" role="navigation"><a class="nav-link w-nav-link" href="#">Home</a><a class="nav-link w-nav-link" href="#">About</a>
            </nav>
            <div class="w-nav-button">
                <div class="w-icon-nav-menu"></div>
            </div>
        </div>
    </div>
    <div class="row w-row">
        <div class="w-clearfix w-col w-col-8 w-col-medium-6 w-col-small-6 welcome-left-column">
            <div class="w-clearfix welcome-left-wrapper">
                <h1 class="welcome-heading">Welcome to Twitter.</h1>
                <h3 class="welcome-subheading">Connect with your friends - and other fascinating<br>people. Get in-the-moment updates on the things<br>that interest you. And watch events unfold, in real <br>time, from every angle.</h3>
            </div>
        </div>
        <div class="w-col w-col-4 w-col-medium-6 w-col-small-6 welcome-right-column">
            <div class="welcome-right-wrapper">
                <div class="w-form">

                    <form class="login-form w-clearfix" data-name="login-form" id="wf-form-login-form" method="post" name="wf-form-login-form" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <input class="text-field w-input"  id="email" name="email" placeholder="Email" required="required" type="email" value="{{old('email')}}">
                        @if ($errors->has('email'))
                            <h5 class="form-field-error">
                                       {{ $errors->first('email') }}
                            </h5>
                        @endif
                        <input class="login-password-field w-input"  id="password" name="password" placeholder="Password" required="required" type="password">
                        @if ($errors->has('password'))
                            <h5 class="form-field-error">
                                       {{ $errors->first('password') }}
                           </h5>
                        @endif

                        <input class="login-button w-button" id="login-button" data-wait="Please wait..." type="submit" value="Login">

                        <div class="checkbox-field w-checkbox w-clearfix">
                            <input checked="checked" class="w-checkbox-input" id="Remember-me" name="remember" type="checkbox">
                            <label class="login-remember-me-label w-form-label" for="Remember-me">Remember me</label>
                        </div><a class="forgot-password-link" href="{{ url('/password/reset') }}">Forgot password?</a>

                    </form>

                </div>

                <div class="w-form">

                    <form class="login-form register-form w-clearfix"  id="register-form" role="form" method="POST"  action="{{ route('register') }}" >
                        {{ csrf_field() }}

                        <h3 class="heading-2">New to Twitter? <span class="text-span">Sign up</span></h3>

                        <input class="text-field w-input"  id="username"  name="username" placeholder="Full Name"  type="text" maxlength="20">
                        <h5 class="form-field-error" id="username_error"></h5>

                        @if ($errors->has('username'))
                            <h5 class="form-field-error">
                                      {{ $errors->first('username') }}
                             </h5>
                        @endif

                        <input class="text-field w-input"  id="handle"  name="handle" placeholder="Twitter Handle"  type="text" maxlength="20" value="{{old('handle')}}">
                        <h5 class="form-field-error" id="handle_error"></h5>

                        @if ($errors->has('handle'))
                            <h5 class="form-field-error">
                                {{ $errors->first('handle') }}
                            </h5>
                        @endif

                        <input class="text-field w-input"  id="register-email"  name="email" placeholder="Email"  type="email">

                        <h5 class="form-field-error" id="email_error"></h5>


                        <input class="register-password-field w-input"  id="register-password"  name="password" placeholder="Password"  type="password">

                        <h5 class="form-field-error" id="password_error"></h5>

                        @if ($errors->has('password'))
                            <h5 class="form-field-error">
                                {{ $errors->first('password') }}
                            </h5>
                        @endif

                        <input class="register-password-field w-input"  id="password-confirm"  name="password_confirmation" placeholder="Confirm Password"  type="password">

                        <h5 class="form-field-error" id="password_confirm_error"></h5>

                        @if ($errors->has('password_confirmation'))
                            <h5 class="form-field-error">
                                {{ $errors->first('password_confirmation') }}
                            </h5>
                        @endif

                        <input class="register-button w-button" data-wait="Please wait..." type="submit" id="register-button" value="Sign up for Twitter">
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="w-slider welcome-slider" data-animation="outin" data-autoplay="1" data-delay="7000" data-disable-swipe="1" data-duration="700" data-infinite="1">
        <div class="w-slider-mask">
            <div class="slide w-slide"></div>
            <div class="slide-2 w-slide"></div>
            <div class="slide-3 w-slide"></div>
        </div>
    </div>

    @endsection