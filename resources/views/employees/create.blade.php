@extends('layouts.app')

@section('content')
  <div class="container">
    <form action="{{route('employees.store')}}" method="POST">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="name">Employee Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="emp_name">
        <br>
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="emp_email" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        <br>
        <label for="mobile_no">Mobile number: </label>
        <input type="text" class="form-control" id="mobile_no" name="emp_mobile" placeholder="mobile number">
        <br>
        <label for="hire_date">Hire Date: </label>
        <input type="text" class="form-control" id="hire_date" name="emp_hire">
      </div>
      <br>
      <button type="submit" class="btn btn-success">Create Employee</button>
    </form>
  </div>
@endsection