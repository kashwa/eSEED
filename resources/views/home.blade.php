@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{url('/employees')}}">View Employees at eSEED</a>
                    <br>
                    <br>
                    <a href="{{route('employees.create')}}">Create New Employee</a>
                    <br>
                    <br>
                    <a href="{{route('employee.attendance')}}">Manage employee attendance</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
