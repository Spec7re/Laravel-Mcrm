<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * CompanyController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:admin')->except('dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(5);

        return view('company.index', compact('companies'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyValidation $request)
    {
        if($request->hasFile('logo'))
        {
            $imageName = $request->logo.'.'.$request->logo->getClientOriginalExtension();

            $path = $request->logo->move(public_path('storage/logos'), $imageName);

            $path = substr($path, 42);

        }else{

            $path = 'default1.jpg';
        }

        $company = new Company([

            'name'    => $request->input('name'),

            'email'   => $request->input('email'),

            'website' => $request->input('website'),

            'password'=> bcrypt($request->input('password')),

            'logo'    => $path

        ]);

        $company->save();

        return redirect()->route('company.index')->withErrors($request->only('name','email'))
            ->with('success','Company added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
//        $url = Storage::url('image.jpg');

        return view('company.show', compact('company','url'));
    }

    /**
     * Display a dashboard of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::guard('company')->check()){

            return view('company.dashboard') ;

        }else{

            return redirect()->to('company.login');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */

    public function sendEditForm(CompanyValidation $request, Company $company)
    {
        if($request->hasFile('logo'))
        {
            $imageName = $request->logo.'.'.$request->logo->getClientOriginalExtension();

            $path = $request->logo->move(public_path('storage/logos'), $imageName);

            $path = substr($path, 42);

        }else{

            $path = 'default1.jpg';
        }

        Company::findOrFail($company->id)->update([

            'name'    => $request->input('name'),

            'email'   => $request->input('email'),

            'website' => $request->input('website'),

            'password'=> bcrypt($request->input('password')),

            'logo'    => $path

        ]);


        return redirect()->route('company.index')
            ->with('success','Company updated successfully');


    }

    /*
     *!!! NOT USED!!!
     *
     * */
    public function update(CompanyValidation $request, Company $company)
    {
        if ($request->get('password') == '')
        {
            $company->update($request->except('password'));

        } else {

            $company->update($request->all());
        }

        $company->save();

        return redirect()->route('company.index')
            ->with('success','Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Company::findOrFail($id);
        $item -> delete();

        return redirect()->route('company.index')
            ->with('success','Company removed successfully');
    }
}
