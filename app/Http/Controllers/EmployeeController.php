<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\EmployeeValidation;
use App\Occupation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * EmployeeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:company')->except(['dashboard','changePasswordForm','changePasswordPost']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $auth = Auth::guard('company')->id();

            $employees = Employee::where('company_id',$auth)->paginate(5);

            return view('employee.index', compact('employees'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auth = Auth::guard('company')->id();

        $occupations = $this->occupations = DB::table('company_occupations')
            ->Join('occupations', 'id', '=', 'occupation_id')
            ->where('company_id', $auth)
            ->select('id','name')->get();

//        $company = Company::find($auth);
//
//        dd($company->occupations);

//        $occupations = DB::table('company_occupations')->where('company_id', $this->auth)->get();

        return view('employee.create', compact('occupations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeValidation $request)
    {
        $employee = new Employee([

            'first_name' => $request->input('first_name'),

            'last_name'  => $request->input('last_name'),

            'email'      => $request->input('email'),

            'company_id' => Auth::guard('company')->id(),

            'occupation_id' => $request->input('occupation_id'),

            'password'   => bcrypt($request->input('password')),

            'phone'      => $request->input('phone')

        ]);

        $employee->save();

        return redirect()->route('employee.index')
            ->with('success','Employee added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employee.show', compact('employee'));
    }

    /*
     * Showing Form for  Password change
     *
     * */
    public function changePasswordForm(Employee $employee)
    {
        if (Auth::guard('employee')->check()) {

            return view('employee.changePasswordForm', compact('employee'));

        }else{

            return redirect()->route('employee.login');
        }
    }

    /*
     * Send form for Password Change
     *
     *  */
    public function changePasswordPost(Request $request)
    {
        $this->validate($request, [

            'password' => 'required|min:3|confirmed',

        ]);

            DB::table('employees')
                ->where('id',  Auth::guard('employee')->id())
                    ->update(['password' => bcrypt($request->input('password')) ]);

            return redirect()->route('employee.dashboard')
                ->with('success','Employee updated successfully');
    }

    /**
     * Display the dashboard of a resource.
     *
     * @param  \App\Auth
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::guard('employee')->check()){

            $employee = Auth::guard('employee')->user();

            return view('employee.dashboard', compact('employee')) ;

        }else{

            return redirect()->to(route('employee.login'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $auth = Auth::guard('company')->id();

        $occupations = DB::table('company_occupations')
            ->leftJoin('occupations', 'id', '=', 'occupation_id')
            ->where('company_id', $auth)
            ->select('id','name')->get();;

        return view('employee.edit', compact('employee','occupations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function sendEditForm(EmployeeValidation $request, Employee $employee)
    {

        Employee::findOrFail($employee->id)->update([

            'first_name' => $request->input('first_name'),

            'last_name'  => $request->input('last_name'),

            'email'      => $request->input('email'),

            'company_id' => Auth::guard('company')->id(),

            'occupation_id' => $request->input('occupation_id'),

            'password'   => bcrypt($request->input('password')),

            'phone'      => $request->input('phone')

        ]);


        return redirect()->route('employee.index')
            ->with('success','Employee updated successfully');


    }

    // !!! NOT USED !!!
    public function update(Employee $employee)
    {
        $emp = Input::all();

        // Use Eloquent to grab the gift record that we want to update,
        // referenced by the ID passed to the REST endpoint
        $new = Employee::find($employee->id);

        // Call fill on the gift and pass in the data
        $new->fill($emp);

        $new->save();

//        $employee->update($request->all());

        return redirect()->route('employee.index')
            ->with('success','Employee updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Employee::findOrFail($id);
        $item-> delete();

        return redirect()->route('employee.index')
            ->with('success','Employee removed successfully');
    }
}
