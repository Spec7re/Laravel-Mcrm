{{--
/**
 * Created by PhpStorm.
 * User: specter
 * Date: 22.03.18
 * Time: 15:20
 */--}}
@extends('layouts.pricing-twitter')

@section('content')
    <div class="row pull-right">
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('change.pass') }}">Change Password</a>
            </div>
    </div>


    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Welcome</h1>
        {{--<p class="lead">You can check your details bellow.</p>--}}
    </div>

    <div class="container">
        <div class="panel-body">
            <div class="card-deck mb-3 text-center">
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Employees' details</h4>
                    </div>
                    <div class="card-body">
                        {{--<h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>--}}
                        <ul class="list-unstyled mt-3 mb-4">
                            <li> <strong>First Name:</strong>
                                {{ $employee->first_name}}
                            </li>
                            <li> <strong>Last Name:</strong>
                                {{ $employee->last_name}}
                            </li>
                            <li> <strong>Email:</strong>
                                {{ $employee->email}}
                            </li>
                            <li><strong>Company:</strong>
                                {{ $employee->company->name }}
                            </li>
                            <li><strong>Occupation:</strong>
                                        @if(isset($employee->occupation->name))
                                            <td>{{ $employee->occupation->name }}</td>
                                        @else
                                                <td> Unsigned</td>
                                        @endif
                            </li>
                        </ul>
                        <a class="btn btn-lg btn-block btn-outline-primary"
                           href="{{ url('/') }}"> Back </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection