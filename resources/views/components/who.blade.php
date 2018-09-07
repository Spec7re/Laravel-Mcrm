@if(Auth::guard('admin')->check())
    <p class="text-success">
        You are logged in as <strong>ADMINISTRATOR</strong>!
    </p>
@else
    <p class="text-danger">
        You are logged OUT as <strong>ADMINISTRATOR</strong>!
    </p>

@endif

@if(Auth::guard('company')->check())
    <p class="text-success">
        You are logged in as <strong>COMPANY</strong> :: {{Auth::guard('company')->user()->name}} !
    </p>
@else
    <p class="text-danger">
        You are logged OUT as <strong>COMPANY</strong>!
    </p>

@endif

@if(Auth::guard('employee')->check())
    <p class="text-success">
        You are logged in as <strong>EMPLOYEE</strong>!
    </p>
@else
    <p class="text-danger">
        You are logged OUT as <strong>EMPLOYEE</strong>!
    </p>

@endif

