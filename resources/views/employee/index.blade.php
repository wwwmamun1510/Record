@extends('layouts.starlight')
@section('employee')
active
@endsection

@section('title')
employee
@endsection
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="{{url('/home')}}">Employee Record Management System</a>
<a class="breadcrumb-item" href="{{url('/contact')}}">Contact</a>
<a class="breadcrumb-item" href="{{url('/about')}}">About</a>
<a class="breadcrumb-item" href="{{url('/depart')}}">Department</a>
</nav>
  <div class="sl-pagebody">
<section>
      <div class="container">
        <div class="row">
           <div class="col-lg-8">
           <div class="card">
           <div class="card-header">
          <h3 class="text-center">Employee List Information</h3>
         <a href="{{url('/depart')}}" class="btn btn-secondary">Back previous Page</a>
       </div>
       @if(session('delete'))
               <div class="alert alert-danger mt-1 ">{{session('delete')}}</div>
       @endif
       <div class="card-body">
             <table class="table table-bordered">
             <tr>
             <th>SL</th>
             <th>Employee Name</th>
             <th>Department Name</th>
             <th>Position</th>
             <th>Age</th>
             <th>Salary</th>
             <th>Action</th>
         </tr>
         @foreach($employee as $employ)
         <tr>
           <td>{{$loop->index+1}}</td>
           <td>{{$employ->employee_name}}</td>
           <td>{{$employ->department_name}}</td>
           <td>{{$employ->Position_name}}</td>
           <td>{{$employ->age}}</td>
           <td>{{$employ->salary}}</td>
          <td>
            <a href="{{url('/employ/edit')}}/{{$employ->id}}" class="btn btn-success">Edit</a>
            <a href="{{url('/employ/delete')}}/{{$employ->id}}" class="btn btn-danger">Delete</a>
            
          </td>
         </tr>
         @endforeach
        </table>
         </div>
       </div>
    </div>
    <div class="col-lg-4">
           <div class="card">
           <div class="card-header">
                  <h3 class="text-center">Add Employee List</h3>
                 </div>
                 @if(session('success'))
                    <div class="alert alert-success mt-1 ">{{session('success')}}</div>
                 @endif
                 <div class="card-body">
                 <form action="{{url('/employ/insert')}}" method="POST">
                  @csrf
                  <div class="mt-3">
                   <label for="" class="form-label" >Employee Name </label>
                   <input type="text" name="employee_name" class="form-control">
                 </div>
                 @error('employee_name')
                    <div class="alert alert-danger mt-1 ">{{$message}}</div>
                 @enderror
                 <div class="mt-3">
                   <label for="" class="form-label" >Department Name </label>
                   <input type="text" name="department_name" class="form-control">
                 </div>
                 @error('department_name')
                    <div class="alert alert-danger mt-1 ">{{$message}}</div>
                 @enderror
                 <div class="mt-3">
                   <label for="" class="form-label" >Position</label>
                   <input type="text" name="Position_name" class="form-control">
                 </div>
                 @error('Position_name')
                    <div class="alert alert-danger mt-1 ">{{$message}}</div>
                 @enderror
                 <div class="mt-3">
                   <label for="" class="form-label" >Age</label>
                   <input type="text" name="age" class="form-control">
                 </div>
                 @error('age')
                    <div class="alert alert-danger mt-1 ">{{$message}}</div>
                 @enderror
                 <div class="mt-3">
                   <label for="" class="form-label" >Salary </label>
                   <input type="text" name="salary" class="form-control">
                 </div>
                 @error('Position_name')
                    <div class="alert alert-danger mt-1 ">{{$message}}</div>
                 @enderror
                 <div class="form-group mt-3 text-center">
                    <button type="submit" class="btn btn-danger">Submit</button>
                 </div>
                </form>
                </div>
               </div>
            </div>
         </div>
       </div>
       </div>
     </div>
</section>
</div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection