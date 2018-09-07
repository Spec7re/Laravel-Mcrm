{{--
/**
 * Created by PhpStorm.
 * User: specter
 * Date: 21.03.18
 * Time: 17:43
 */--}}

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>MyCRM Laravel</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    {{--Added by Developer--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>

<div id="app">

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">

        @auth('company')
        <h5 class="my-0 mr-md-auto font-weight-normal">{{ Auth::guard('company')->user()->name }}</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="{{ route('employee.index') }}">Employees</a>
                <a class="p-2 text-dark" href="{{ route('occupation.index') }}">Occupations</a>
            </nav>
            <a class="btn btn-outline-primary" href="{{ route('company.logout') }}">Sign out</a>
        @else
            <a class="btn btn-outline-primary" href="{{ route('company.login') }}">Company</a>
        @endauth
    </div>
</div>

<div class="container">

    @yield('content')

</div>
<div class="container">
<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
        <div class="col-12 col-md">
            <img class="mb-2" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
            <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
        </div>
        <div class="col-6 col-md">
            {{--<h5>Features</h5>--}}
            <ul class="list-unstyled text-small">
            </ul>
        </div>
        <div class="col-6 col-md">
            {{--<h5>Resources</h5>--}}
            <ul class="list-unstyled text-small">
            </ul>
        </div>
        <div class="col-6 col-md">
            {{--<h5>About</h5>--}}
            <ul class="list-unstyled text-small">
            </ul>
        </div>
    </div>
</footer>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>