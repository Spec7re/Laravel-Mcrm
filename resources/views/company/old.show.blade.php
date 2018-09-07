{{--
/**
 * Created by PhpStorm.
 * User: specter
 * Date: 25.03.18
 * Time: 19:48
 */--}}
@extends('layouts.company-twitter')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Company Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('company.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $company->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $company->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Website:</strong>
                {{ $company->website }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee:</strong>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Logo:</strong>
            </div>
        </div>
    </div>
    <img width="400px" src="{{asset('storage/logos/').'/'.$company->logo}}">
    {{--    <img width="400px" src="{{ $company->logo }}">--}}
    {{--<img src="logos/'"."{{$company->logo}}'" />--}}
    {{--<img src="logos/1521826737.jpg">--}}
    {{--<img width="150" src='image.jpg'/>--}}
    {{--<img src="images/image.jpg">--}}

@endsection