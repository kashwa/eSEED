@extends('layouts.app')

@section('content')
    <div class="container">
          @foreach ($emp as $emp)
              <form action="{{route('employees.update', $emp->id)}}" method="POST">
                {{method_field('PUT')}} {{ csrf_field() }}
                <div class="form-group">
                  <label for="name">Employee Name</label>
                  <input type="text" class="form-control" value="{{$emp->name}}" id="name" placeholder="Enter name" name="emp_name">
                  <br>
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" value="{{$emp->email}}" name="emp_email" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  <br>
                  <label for="mobile_no">Mobile number: </label>
                  <input type="text" class="form-control" id="mobile_no" value="{{$emp->mobile_no}}" name="emp_mobile" placeholder="mobile number">
                  <br>
                  <label for="hire_date">Hire Date: </label>
                  <input type="text" class="form-control" value="{{$emp->hire_date}}" id="hire_date" name="emp_hire">
                </div>
                <br>
                <button type="submit" class="btn btn-success">Create Employee</button>
              </form>
          @endforeach
    </div>
@endsection