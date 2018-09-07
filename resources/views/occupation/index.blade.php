{{--/**
 * Created by PhpStorm.
 * User: specter
 * Date: 19.03.18
 * Time: 18:05
 */--}}
@extends('layouts.employee-twitter')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Occupation list</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('company.dashboard') }}"> Back</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('occupation.create') }}"> Creat New Occupation</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Handle</th>
        </tr>
        </thead>
        <tbody>
        @foreach($occupations as $occupation)
            <tr>
                <td>{{ @++$i }}</td>
                <td>{{ $occupation->name }}</td>
                <td>
                    {{--<a class="btn btn-info" href="{{ route('occupation.show', $occupation->id) }}" >Show</a>--}}
                    <a class="btn btn-primary" href="{{ route('occupation.edit',$occupation->id) }}">Edit</a>

                    {!! Form::open(['method' => 'DELETE','route' => ['occupation.destroy', $occupation->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $occupations->render() }}

@endsection