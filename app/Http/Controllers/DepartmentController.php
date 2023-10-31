<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {  
        $departments = Department::latest()->paginate(3);
        return view('organizationsetup.department.index',compact('departments'))->with(request()->input('page'));
    }
    public function create()
    {
        return view('organizationsetup.department.create');
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
            'department'=>'required',
            'department_code'=>'required',
        ]);
        //create a new product in database
        Department::create([
            'department' => request()->get('department'),
            'department_code' => request()->get('department_code'),
            'detail' => request()->get('detail'),
            'status' => 'DEACTIVE',
        ]);

        //redirect the user and send friendly message
        return redirect()->route('department.index')->with('success','department made  successfully ');
    }

    /**
     * Display the specified resource.
     *
     
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         //validate the input
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
