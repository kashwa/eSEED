@extends('layouts.app') 

@section('content')
  <div class="title"><strong><h3>Manage Attendance</h3></strong></div>
  <hr>
  <div class="container">
    <script>
      $(document).ready(function () {
        $('select').click(function() { var id = $("option:selected").val();
        return id;
      });
    </script>
    <form action="{{route('submit', ['id' => id ])}}" method="POST">
      {{ csrf_field() }}
    <div class="row">
      <div class="col">
      <div class="form-group">
        <label for="Emplouee">Select an Employee</label>
        <select class="form-control" name="emp_data">
          @foreach ($employees as $emp)
            <option value={{$emp->id}}>{{$emp->name}}</option>
          @endforeach
        </select>
      </div>  
      </div>

      <div class="col">
        <label for="hire_date">Select a Date: </label>
        <input type="date" class="form-control" id="hire_date" name="emp_hire" required>
      </div>

      <div class="col">
        <label for="work_hours">Work Hours: </label>
        <input type="text" class="form-control" id="work_hours" name="work_hours" placeholder="ex: 7.50" required>
      </div>
    </div>
    <div class="title"><h3>Status & Attendance:</h3></div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="Emplouee">Select Employee Status</label>
          <select class="form-control" name="emp_data">
            <option value=true>Present</option>
            <option value=true>Absent</option>
            <option value=true>Sick leave</option>
          </select>
        </div>
      </div>
      <div class="col">
        <label for="day_off">Day Off</label>
        <input type="text" class="form-control" id="day_off" placeholder="ex: 'Saturday'" name="day_off" required>
      </div>
    </div>
    <button type="submit" style="margin-top: 20px;" class="btn btn-success">Submit</button>
  </form>
  </div>
@endsection
