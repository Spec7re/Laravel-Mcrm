<?php

namespace App\Http\Controllers;

use App\Occupation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OccupationController extends Controller
{
    /**
     * OccupationController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:company');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $occupations = Occupation::paginate(5);
        $auth = Auth::guard('company')->id();
//
//        $occupations = DB::table('occupations')
//            ->join('company_occupations', 'company_id', '=', 'company_id')
//            ->select('occupations.*')->get();

        $occupations = DB::table('company_occupations')
            ->leftJoin('occupations', 'id', '=', 'occupation_id')
            ->where('company_id', $auth)
            ->select('id','name')->paginate(5);
//
//        dd($occupations);

        return view('occupation.index', compact('occupations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('occupation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([

            'name' => 'required|min:3',
        ]);

        $occupation = new Occupation([

            'name'    => $request->input('name'),

        ]);

        $occupation->save();

        DB::table('company_occupations')->insert(
        ['company_id' => Auth::guard('company')->id(), 'occupation_id' => $occupation->id]);


        return redirect()->route('occupation.index')
            ->with('Success','Occupation was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function show(Occupation $occupation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function edit(Occupation $occupation)
    {
        return view('occupation.edit', compact('occupation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Occupation $occupation)
    {
        request()->validate([

            'name' => 'required|min:3',
        ]);

        $occupation->update($request->all());

        return redirect()->route('occupation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Occupation::findOrFail($id);
        $item-> delete();

        return redirect()->route('occupation.index');
    }
}
