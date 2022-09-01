@extends('layouts.starlight')
@section('employee')
active
@endsection

@section('title')
Edit employee
@endsection
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="{{url('/home')}}">Employee Record Management System</a>
<a class="breadcrumb-item" href="{{url('/employ')}}">Employee</a>
</nav>
  <div class="sl-pagebody">
<div class="row">
    <div class="col-lg-6 m-auto">
            <div class="card">
                 <div class="card-header">
                        <h2 class="card-title text-center" >Edit Employee List</h2>
                        <a href="{{url('/employ')}}" class="btn btn-secondary">Back previous Page</a>
                 </div>
                        <div class="card-body">
                            <form action="{{url('/employ/update')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-label">Employee Name</label>
                                    <input type="hidden" name="employee_id" value="{{$edit->id}}">
                                    <input type="text" name="employee_name" class="form-control" value="{{$edit->employee_name}}">
                                    @error('employee_name')
                                      <strong class="text-danger pt-2">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Department Name</label>
                                  <input type="hidden" name="department_id" class="form-control" value="{{$edit->id}}">
                                  <input type="text" name="department_name" class="form-control" value="{{$edit->department_name}}">
                                    @error('department_name')
                                      <strong class="text-danger pt-2">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                   <label for="" class="form-label" >Position Name </label>
                                   <input type="hidden" name="Position_id" class="form-control" value="{{$edit->id}}">
                                   <input type="text" name="Position_name" class="form-control" value="{{$edit->Position_name}}">
                                   @error('Position_name')
                                      <strong class="text-danger pt-2">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                  <label for="" class="form-label" >Age</label>
                                  <input type="hidden" name="id" class="form-control" value="{{$edit->id}}">
                                  <input type="text" name="age" class="form-control" value="{{$edit->age}}">
                                   @error('age')
                                      <strong class="text-danger pt-2">{{$message}}</strong>
                                    @enderror
                                 </div>
                                 <div class="form-group">
                                   <label for="" class="form-label" >Salary </label>
                                   <input type="hidden" name="id" class="form-control" value="{{$edit->id}}">
                                   <input type="text" name="salary" class="form-control" value="{{$edit->salary}}">
                                   @error('salary')
                                      <strong class="text-danger pt-2">{{$message}}</strong>
                                    @enderror
                                 </div> 
                                <div class="form-group pt-2 text-center">
                                    <button type="submit" class="btn btn-primary">Update Employee</button>
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