<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Interfaces\EmpRepoInterface;
use Illuminate\Http\Request;

class HrController extends Controller
{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * return view to submit attendance.
     *
     * @param Request $request
     * @return void
     */
    public function attendance(Request $request)
    {
        $employees = Employee::all();

        return view('employees.attendance')->withEmployees($employees);
    }

    /**
     * let Hr select employee and a date,
     * then apply attendance function.
     *
     * @return void
     */
    public function submitAttendance(Request $request)
    {
        return $request->all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmpRepoInterface $employeeRepository)
    {
        /**
         * Here i'll apply Repository design pattern.
         * 1) make:provider
         * 2) add to /config/app.php
         * 3) bind in register || try to use it without binding.
         * **************
         * 4) write method in interface.
         * 5) implement it in repo class.
         * 6) inject interface in controller || try to inject it without binding.
         */

        $employees = $employeeRepository->getAllEmployees();
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
        return redirect()->route('employees.index');
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
