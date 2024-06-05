{{--  <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>  --}}




<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Highdmin - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('dashboard_asset') }}/images/favicon.ico">

        <!-- App css -->
        <link href="{{ asset('dashboard_asset') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard_asset') }}/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard_asset') }}/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard_asset') }}/css/style.css" rel="stylesheet" type="text/css" />

        <script src="{{ asset('dashboard_asset') }}/js/modernizr.min.js"></script>

    </head>


    <body class="account-pages">

        <!-- Begin page -->
        <div class="accountbg" style="background: url('{{ asset('dashboard_asset') }}/images/background.jpg');background-size: cover;"></div>

        <div class="wrapper-page account-page-full">

            <div class="card">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box p-5">
                            <h2 class="text-uppercase text-center pb-4">
                                <a href="index.html" class="text-success">
                                    <span><img src="{{ asset('dashboard_asset') }}/images/logo.png" alt="" height="26"></span>
                                </a>
                            </h2>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group m-b-20 row">
                                    <div class="col-12">
                                        <label  for="email" value="{{ __('Email') }}" >Email address</label>
                                        <input id="email" name="email" class="form-control block mt-1 w-full" type="email" id="emailaddress"  required autofocus autocomplete="username">
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <a href="page-recoverpw.html" class="text-muted pull-right"><small>Forgot your password?</small></a>
                                        <label for="password" value="{{ __('Password') }}">Password</label>
                                        <input id="password" class="form-control block mt-1 w-full" type="password" name="password" required autocomplete="current-password">
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">

                                        <div class="checkbox checkbox-custom">
                                            <input id="remember" type="checkbox" checked="">
                                            <label for="remember">
                                                Remember me
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Sign In</button>
                                    </div>
                                </div>

                            </form>

                            <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-dark m-l-5"><b>Sign Up</b></a></p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="account-copyright">2018 © Highdmin. - Coderthemes.com</p>
            </div>

        </div>



        <!-- jQuery  -->
        <script src="{{ asset('dashboard_asset') }}/js/jquery.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/js/popper.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/js/bootstrap.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/js/metisMenu.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/js/waves.js"></script>
        <script src="{{ asset('dashboard_asset') }}/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="{{ asset('dashboard_asset') }}/js/jquery.core.js"></script>
        <script src="{{ asset('dashboard_asset') }}/js/jquery.app.js"></script>

    </body>
</html>
