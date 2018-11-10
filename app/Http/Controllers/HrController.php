<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class HrController extends Controller
{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index')->withEmployees($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
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
            'emp_name' => 'required|max:255',
            'emp_email' => 'required|email',
            'emp_mobile' => 'required|min:4',
            'emp_hire' => 'required'
        ]);

        $emp = new Employee();
        $emp->name = $request['emp_name'];
        $emp->email = $request['emp_email'];
        $emp->mobile_no = $request['emp_mobile'];
        $emp->hire_date = $request['emp_hire'];

        $emp->save();
        return redirect()->back();
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
        $emp = Employee::where('id', $id)->get();
        return view('employees.edit', ["emp"=> $emp]);
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
        $request->validate([
            'emp_name' => 'required',
            'emp_email' => 'required|email',
            'emp_mobile' => 'required',
            'emp_hire' => 'required'
        ]);

        $empEd = Employee::findOrFail($id);
        $empEd->name = $request['emp_name'];
        $empEd->email = $request['emp_email'];
        $empEd->mobile_no = $request['emp_mobile'];
        $empEd->hire_date =  $request['emp_hire'];

        $empEd->save();
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = Employee::where('id', $id);
        $emp->delete();
        return redirect()->back();
    }
}
