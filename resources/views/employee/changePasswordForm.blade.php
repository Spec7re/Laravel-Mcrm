{{--
/**
 * Created by PhpStorm.
 * User: specter
 * Date: 25.03.18
 * Time: 18:34
 */--}}
@extends('layouts.pricing-twitter')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Change Employee's Password</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employee.dashboard') }}"> Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($employee, ['method' => 'POST','route' => ['change.pass.submit', $employee->id]]) !!}

    {{--<input type="hidden" name="_method" value="PATCH">--}}
    {{ csrf_field() }}


    <div class="form-group mx-sm-3 mb-2">
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Required Password">
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <label for="password_confirmation" class="sr-only">Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="inputPassword2" placeholder="Confirm Password">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

    {!! Form::close() !!}
    
@endsection