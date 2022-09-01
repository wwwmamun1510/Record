@extends('layouts.starlight')
@section('department')
active
@endsection

@section('title')
Edit department
@endsection
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="{{url('/home')}}">Employee Record Management System</a>
<a class="breadcrumb-item" href="{{url('/depart')}}">Department</a>
<a class="breadcrumb-item" href="{{url('/depart/trashed')}}">Trashed</a>
</nav>
  <div class="sl-pagebody">
<div class="">
<div class="row">
    <div class="col-lg-6 m-auto">
            <div class="card">
                 <div class="card-header">
                        <h2 class="card-title text-center" >Edit Department List</h2>
                        <a href="{{url('/depart')}}" class="btn btn-secondary">Back previous Page</a>
                 </div>
                        <div class="card-body">
                            <form action="{{url('/depart/update')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-label">Company Name</label>
                                    <input type="hidden" name="company_id" class="form-control" value="{{$edit->id}}">
                                   <input type="text" name="company_name" class="form-control" value="{{$edit->company_name}}">
                                   @error('company_name')
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
                                <div class="form-group pt-2 text-center">
                                    <button type="submit" class="btn btn-primary">Update Department</button>
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
