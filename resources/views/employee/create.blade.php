{{--
  Created by PhpStorm.
  User: specter
  Date: 19.03.18
  Time: 14:42
 /--}}

@extends ('layouts.employee-twitter')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@section ('title','Employee')

<!-- /resources/views/company/create.blade.php -->

<!-- Create Post Form -->

@section ('content')

    @if ($errors->any())
        <h1>Wrong input</h1>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Add Employee</h1>

    <hr>

    {!! Form::open(array('route' => 'employee.store','method'=>'POST')) !!}
    @include('employee.form')
    {!! Form::close() !!}

@endsection
