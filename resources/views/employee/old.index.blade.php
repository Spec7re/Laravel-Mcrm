@extends('layouts.employee-twitter')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employee list</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('company.dashboard') }}"> Back</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employee.create') }}"> Add New Employee</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Company</th>
            <th>Occupation</th>
            <th width="245px">Operation</th>
        </tr>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->company->name }}</td>
                    @if(isset($employee->occupation->name))
                    <td>{{ $employee->occupation->name }}</td>
                    @else
                        <td> Unsigned</td>
                    @endif
                    <td>
                        <a class="btn btn-info" href="{{ route('employee.show', $employee->id) }}" >Show</a>
                        <a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}">Edit</a>
                        {{--<a class="btn btn-small btn-info" href="{{ URL::to('employee/' . $employee->id . '/edit') }}">Edit this Employee</a>--}}
                        {{--<a class="btn btn-danger" href="{{ route('employee.destroy' , $employee->id) }}">Delete</a>--}}
                        {{--<form method="post" action="{{route("employee.destroy", $employee->id)}}"> {{method_field('DELETE')}} {{csrf_field()}} <input type="submit" class="bnt btn-danger" value = "delete"> </form>--}}
                        {!! Form::open(['method' => 'DELETE','route' => ['employee.destroy', $employee->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
    </table>

{{ $employees->render() }}


@endsection