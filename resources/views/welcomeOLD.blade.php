@extends('layouts.app')


@section('content')
    <script src="{{asset('js/register.js')}}"></script>
    <style>
        html {
            position: relative;
            min-height: 100%;
        }
        .carousel-fade .carousel-inner .item {
            opacity: 0;
            transition-property: opacity;
        }
        .carousel-fade .carousel-inner .active {
            opacity: 1;
        }
        .carousel-fade .carousel-inner .active.left,
        .carousel-fade .carousel-inner .active.right {
            left: 0;
            opacity: 0;
            z-index: 1;
        }
        .carousel-fade .carousel-inner .next.left,
        .carousel-fade .carousel-inner .prev.right {
            opacity: 1;
        }
        .carousel-fade .carousel-control {
            z-index: 2;
        }
        @media all and (transform-3d),
        (-webkit-transform-3d) {
            .carousel-fade .carousel-inner > .item.next,
            .carousel-fade .carousel-inner > .item.active.right {
                opacity: 0;
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
            }
            .carousel-fade .carousel-inner > .item.prev,
            .carousel-fade .carousel-inner > .item.active.left {
                opacity: 0;
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
            }
            .carousel-fade .carousel-inner > .item.next.left,
            .carousel-fade .carousel-inner > .item.prev.right,
            .carousel-fade .carousel-inner > .item.active {
                opacity: 1;
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
            }
        }
        .item:nth-child(1) {
            background: url('/images/welcome_slider/1.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .item:nth-child(2) {
            background: url('/images/welcome_slider/2.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .item:nth-child(3) {
            background: url('/images/welcome_slider/3.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .carousel {
            z-index: -99;
        }
        .carousel .item {
            position: fixed;
            width: 100%;
            height: 100%;
        }
        .title {
            text-align: center;
            padding: 10px;
            text-shadow: 2px 2px #000;
            color: #FFF;
        }

        .navbar{
            margin-bottom:0;
            position:fixed;
            width:100%;
        }

        .panel-heading{
            background:white !important;
            color:#14171a;
            font-weight:500;
            font-size:18px;
            text-shadow: 0 1px 0 rgba(255,255,255,0.6);
        }

        #login-form {
            margin-top: 30%;
        }

        #register-button{
            box-shadow:0 1px 0 #fff;
            height:30px;
            margin:1px 12px 0;
            padding-left:12px;
            padding-right:12px;
            line-height:11px;
            background:#ffad1f;
            background-image:linear-gradient(#ffcc4d,#ffad1f);
            border-color:#f1a02a;
            color:#14171a;
            text-shadow:0 1px 0 rgba(255,255,255,0.5);
            font-size:14px;
            font-weight:bold;
        }

        #login-button{
            height:30px;
            box-shadow:0 1px 0 #fff;
            line-height:11px;
            color:#fff;
            background-color:#1da1f2;
            background-image:linear-gradient(rgba(0,0,0,0),rgba(0,0,0,0.5));
            border:1px solid #3b88c3;
            border-radius:4px;
            cursor:pointer;
            font-size:14px;
            font-weight:bold;
            padding:8px 16px;
            transition: box-shadow .15s ease-in-out;
         }
    </style>

    <script>$('.carousel').carousel();</script>
    <div class="carousel slide carousel-fade" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
            </div>
            <div class="item">
            </div>
            <div class="item">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-8">

            </div>
            <div class="col-xs-4">
                <div class="panel panel-default" id="login-form">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form  class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button id="login-button" type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">

                        <form id="register-form" class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" maxlength="20" value="{{ old('username') }}"><span class="error-form" id="username_error"></span>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('handle') ? ' has-error' : '' }}">
                                <label for="handle" class="col-md-4 control-label">Handle:</label>

                                <div class="col-md-6">
                                    <input id="handle" type="text"  maxlength= "20" class="form-control" name="handle" value="{{ old('handle') }}"> <span class="error-form" id="handle_error"></span>

                                    @if ($errors->has('handle'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('handle') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="register-email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="register-email" type="email" class="form-control" name="email" value="{{ old('email') }}"><span class="error-form" id="email_error"></span>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="register-password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="register-password" type="password" class="form-control" name="password"><span class="error-form" id="password_error"></span>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"><span class="error-form" id="password_confirm_error"></span>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" id="register-button" class="btn btn-primary">
                                         Sign up for Twitter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var $item = $('.carousel .item');
        var $wHeight = $(window).height();
        $item.eq(0).addClass('active');
        $item.height($wHeight);
        $item.addClass('full-screen');

        $('.carousel img').each(function() {
            var $src = $(this).attr('src');
            var $color = $(this).attr('data-color');
            $(this).parent().css({
                'background-image' : 'url(' + $src + ')',
                'background-color' : $color
            });
            $(this).remove();
        });

        $(window).on('resize', function (){
            $wHeight = $(window).height();
            $item.height($wHeight);
        });

        $('.carousel').carousel({
            interval: 600,
            pause: "false"
        });
    </script>


@endsection