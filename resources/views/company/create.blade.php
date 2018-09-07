@extends ('layouts.admin-template')

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@section ('title','Company')

<!-- /resources/views/company/form.blade.php -->

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

    <h1>Add Company</h1>

    <hr>

    <!-- Create Post Form -->

    {!! Form::open( array( 'route' => 'company.store','method'=>'POST', 'files' => true )) !!}

    @include('company.form')

    {!! Form::close() !!}


@endsection
