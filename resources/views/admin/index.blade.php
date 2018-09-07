@extends('layouts.admin-template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">ADMIN Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @component('components.who')
                            @endcomponent
                            <a class="btn btn-info" href="{{ route('company.index') }}">Company manager</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection