{{--
/**
 * Created by PhpStorm.
 * User: specter
 * Date: 21.03.18
 * Time: 20:57
 */--}}
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
        <div class="panel-heading">COMPANY Dashboard</div>

        <div class="panel-body">
        @if (session('status'))
        <div class="alert alert-success">
        {{ session('status') }}
        </div>
        @endif
        @component('components.who')
        @endcomponent
        <a class="btn btn-info" href="{{ route('employee.index') }}"> Employees</a>
        <a class="btn btn-info" href="{{ route('occupation.index') }}"> Occupations</a>
        <a class="btn btn-default" href="{{ route('company.logout') }}"> LOGOUT</a>
        </div>
        </div>
        </div>
    </div>
</div>