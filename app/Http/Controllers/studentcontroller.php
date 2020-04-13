<?php

namespace App\Http\Controllers;

use App\student;
use Illuminate\Http\Request;

class studentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = student::latest()->paginate(5);
  
        return view('index',compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mssv' => 'required',
            'name' => 'required',
            'phone' => 'required',
        ]);
  
        student::create($request->all());
   
        return redirect()->route('index')
                        ->with('success','student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        return view('show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        return view('edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
        $request->validate([
            'mssv' => 'required',
            'name' => 'required',
            'phone' => 'required',
        ]);
  
        $student->update($request->all());
  
        return redirect()->route('index')
                        ->with('success','student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        $student->delete();
  
        return redirect()->route('index')
                        ->with('success','student deleted successfully');
    }
}
