@extends('layouts.starlight')
@section('department')
active
@endsection

@section('title')
department
@endsection
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="{{url('/home')}}">Employee Record Management System</a>
<a class="breadcrumb-item" href="{{url('/contact')}}">Contact</a>
<a class="breadcrumb-item" href="{{url('/about')}}">About</a>
<a class="breadcrumb-item" href="{{url('/employ')}}">Employee</a>
<a class="breadcrumb-item" href="{{url('/depart/trashed')}}">Trashed</a>
</nav>
<div class="sl-pagebody">
<section>
      <div class="container">
        <div class="row">
           <div class="col-lg-8">
           <div class="card">
           <div class="card-header">
          <h3 class="text-center">Department List Information</h3>
          <a href="{{url('/employ')}}" class="btn btn-secondary">Dtails Information</a>
       </div>
       @if(session('delete'))
               <div class="alert alert-danger mt-1 ">{{session('delete')}}</div>
       @endif
       <div class="card-body">
             <table class="table table-bordered">
          <tr>
             <th>SL</th>
             <th>Company Name</th>
             <th>Department Name</th>
             <th>Created at</th>
             <th>Action</th>
         </tr>
         @foreach($departments as $depart)
         <tr>
           <td>{{$loop->index+1}}</td>
           <td>{{$depart->company_name}}</td>
           <td>{{$depart->department_name}}</td>
           <td>{{($depart->created_at->diffforHumans() > 24)?$depart->created_at->format('d/m/y h:i:s A')
            :$depart->created_at->diffforHumans()}}</td>
           <td>
            <a href="{{url('/depart/edit')}}/{{$depart->id}}" class="btn btn-success">Edit</a>
            <a href="{{url('/depart/delete')}}/{{$depart->id}}" class="btn btn-danger">Delete</a>
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
                    <h3>Add Department List Information</h3>
                    @if(session('success'))
                    <div class="alert alert-success mt-1 ">{{session('success')}}</div>
                   @endif
                  <div class="card-body">
                  <form action="{{url('/depart/insert')}}" method="POST">
                  @csrf
                 <div class="mt-3">
                   <label for="" class="form-label" >Company Name </label>
                   <input type="text" name="company_name" class="form-control">
                 </div>
                 @error('company_name')
                    <div class="alert alert-danger mt-1 ">{{$message}}</div>
                 @enderror
                 <div class="mt-3">
                   <label for="" class="form-label" >Department Name </label>
                   <input type="text" name="department_name" class="form-control">
                 </div>
                 @error('department_name')
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