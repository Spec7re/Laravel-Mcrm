@extends('layouts.company-twitter')

@section('content')

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Welcome</h1>
        <p class="lead">Quickly create and effectively manage your employees with this dashboard.</p>
    </div>

    <div class="container">
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Employees' list</h4>
                </div>
                <div class="card-body">
                    {{--<h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>--}}
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Manage</li>
                        <li>your</li>
                        <li>Employees</li>
                    </ul>

                    <a class="btn btn-lg btn-block btn-primary"
                            href="{{ route('employee.index') }}">Create New</a>
                </div>
            </div>
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Occupations' list</h4>
                </div>
                <div class="card-body">
                    {{--<h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>--}}
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Manage</li>
                        <li>your</li>
                        <li>occupations</li>
                    </ul>
                    <a class="btn btn-lg btn-block btn-primary"
                       href="{{ route('occupation.index') }}">Create New</a>
                </div>
            </div>
        </div>
                    <div align="center">
                        @component('components.who')
                        @endcomponent
                    </div>
    </div>
</div>

@endsection