@extends('layouts.admin-template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Company list</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.dashboard') }}"> Back</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('company.create') }}"> Create New Company</a>
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
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Website</th>
            <th width="245px">Handle</th>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr>
                <td>{{ @++$i }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->website }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('company.show', $company->id) }}" >Show</a>
                    <a class="btn btn-primary" href="{{ route('company.edit',$company->id) }}">Edit</a>

                    {!! Form::open(['method' => 'DELETE','route' => ['company.destroy', $company->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $companies->render() }}

@endsection