<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeeLoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * AdminLoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest:employee', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('auth.employee-login');
    }

    public function login(Request $request)
    {
        //Validate the form data

        $this->validate($request,[

            'email'   => 'required|email',

            'password'=> 'required|min:3'

        ]);

        //Attempt to login in admin in

        if(Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            //if successful redirect to where they want to go
            return redirect()->to(route('employee.dashboard'));
        }

        //if unsuccessful redirect back to login
        return redirect()->back()->withInput($request->only('email','remember'));

    }


    public function logout()
    {

        Auth::guard('employee')->logout();

        return redirect('/');
    }
}
