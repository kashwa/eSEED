@extends('layouts.app') 

@section('content')
  <div class="title"><strong><h2>Manage Attendance</h2></strong></div>
  <hr>
  <div class="container">
    <?php /*$emp = array_column($employees->$id);*/ /*echo dd($employees->toArray())*/
      $emps = $employees->toArray();
      $ids = [];
      $names = [];
      foreach ($emps as $key => $value){
        $ids[] += $value['id'];
        array_push($names, $value['name']);
      }
      // $emp = array_combine($names, $ids);
      dd($emps[6]['id']);
    ?>
    <form action="{{route('submit', ['id' => $emp->id])}}" method="POST">
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