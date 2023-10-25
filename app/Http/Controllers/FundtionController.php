<?php

namespace App\Http\Controllers;

use App\Models\Fundtion;
use Illuminate\Http\Request;

class FundtionController extends Controller
{
    public function index()
    {  
        $fundtions = Fundtion::latest()->paginate(3);
        return view('function.index',compact('fundtions'))->with(request()->input('page'));
    }
    public function create()
    {
        return view('function.create');
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
            'name'=>'required',
        ]);
        //create a new product in database
        Fundtion::create($request->all());

        //redirect the user and send friendly message
        return redirect()->route('function.index')->with('success','function made  successfully ');
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