@extends('layouts.app')

@section('content')
    
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Employees</div>
            @foreach ($employees as $emp)
            <div class="row">
              <div class="col">
                <div class="card-body">
                  <strong>Name: </strong> {{$emp->name}} <br>
                  <strong>Email: </strong> {{$emp->email}} <br>
                  <strong>Hired at: </strong> {{$emp->hire_date}} <br>
                  <strong>Phone: </strong> {{$emp->mobile_no}} <br>
                </div>
              </div>
              <div class="col">
                <div class="container" style="margin-top: 20px;">
                  <form id="DeleteBtn" action="{{ route('employees.destroy', ['id' => $emp->id]) }}" method="POST">
                    <input type="submit" value="delete" style="background-color: #f2134b; color: white" class="button is-outlined" onclick="return confirm('Are you sure, You want to delete Post?')">      {{ method_field('DELETE') }} {!! csrf_field() !!}
              
                    <a style="margin-left: 5%" class="btn btn-primary" href="{{route('employees.edit', $emp->id)}}">Edit</a>
                  </form>
                </div>
              </div>
            </div>
            @endforeach
            <div class="container" style="margin: 20px; padding-left:15px">
                <a href="{{route('home')}}">Return back to Home</a>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection