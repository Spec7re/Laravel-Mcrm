@extends('layouts.admin-twitter')

@section('content')
    {{--<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">--}}
        {{--<h1 class="display-4">Welcome</h1>--}}
        {{--<p class="lead">See your company details</p>--}}
    {{--</div>--}}

    <div class="container">
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Company's details</h4>
                    </div>
                    <div class="card-body col-xs-12 col-sm-12 col-md-12 col-lg-11">

                            <div align="center">
                                <h1 class="card-title pricing-card-title"><small class="text-muted">Trade Mark</small></h1>
                            </div>

                        <ul class="list-unstyled mt-3 mb-4">
                            <div align="center">
                                <li>
                                    <img align="center" width="500px" src="{{asset('storage/logos/').'/'.$company->logo}}">
                                </li>
                            </div>
                                <li><strong>Name:</strong>
                                    {{ $company->name }}
                                </li>
                                <li><strong>Email:</strong>
                                    {{ $company->email }}
                                </li>
                                <li><strong>Website:</strong>
                                    {{ $company->website }}
                                </li>
                        </ul>
                        <a class="btn btn-lg btn-block btn-primary"
                           href="{{ route('company.index') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
