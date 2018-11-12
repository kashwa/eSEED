@extends('layouts.app') 

@section('content')
  <div class="title"><strong><h2>Manage Attendance</h2></strong></div>
  <hr>
  <div class="container">
    <div class="row">
      <div class="col">
      <div class="form-group">
        <label for="Emplouee">Select an Employee</label>
        <select class="form-control" name="emp_data">
          @foreach ($employees as $emp)
              <option>{{$emp->name}}</option>
          @endforeach
        </select>
      </div>  
      </div>

      <div class="col">
        <label for="hire_date">Select a Date: </label>
        <input type="date" class="form-control" id="hire_date" name="emp_hire" required>
      </div>
    </div>
  </div>
@endsection