<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employeeflag;
use Illuminate\Http\Request;

class EmployeeflagController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeflags = Employeeflag::latest()->paginate();
        return view('employee.employeeflag.index',compact('employeeflags'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.employeeflag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validate the input
         $request->validate([
            'employeeflag'=>'required',
            'is_active' => 'integer|in:0,1'
            
        ]);
        //create a new product in database
        Employeeflag::create([
            'employeeflag' => request()->get('employeeflag'),
            'employeeflag_code' => request()->get('employeeflag_code'),
            'detail' => request()->get('detail', ),
            'is_active' => request()->get('is_active', 0),
        ]);
        //redirect the user and send friendly message
        return redirect()->route('employeeflag.index')->with('success','Record Created successfully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $employeflg = Employeeflag::find($id);
        return view('employee.employeeflag.update',compact('employeflg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employeflg = Employeeflag::findorfail($id);
        $employeflg ->update([
            'employeeflag'=>$request->input('employeeflag'),
            'employeeflag_code'=>$request->input('employeeflag_code'),
            'detail'=>$request->input('detail'),
            'is_active'=>$request->has('is_active') ? 1 : 0,
        ]);
        return redirect()->route('employeeflag.index')->with('success','Employee-Flag successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
