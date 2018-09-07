{{--
/**
 * Created by PhpStorm.
 * User: specter
 * Date: 19.03.18
 * Time: 19:20
 */--}}
@extends('layouts.employee-twitter')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Occupation</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('occupation.index') }}"> Back</a>
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

    {!! Form::model($occupation, ['method' => 'PATCH','route' => ['occupation.update', $occupation->id]]) !!}

    @include('occupation.form')

    {!! Form::close() !!}
@endsection