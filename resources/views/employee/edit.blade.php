{{--/**
 * Created by PhpStorm.
 * User: specter
 * Date: 19.03.18
 * Time: 15:32
 */--}}
@extends('layouts.employee-twitter')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
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

    {!! Form::model($employee, ['route' => ['employee.edit.submit', $employee->id],'method' => 'POST']) !!}

    {{ csrf_field() }}

    @include('employee.form')

    {!! Form::close() !!}

@endsection