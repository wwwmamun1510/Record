@extends('layouts.starlight')

@section('trashed')
active
@endsection

@section('title')
trashed
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
 <div class="sl-pagebody position-center">
 <div class="row">
 <div class="col-lg-12 text-center">
 <div class="card">
     <div class="card-header">
         <h3 class="text-center">Trashed Information Details</h3>
          </div>
          @if(session('restore'))
                   <div class="alert alert-success mt-1">
                {{session('restore')}}
                 </div>
                 @endif
                 @if(session('p_delete'))
                       <div class="alert alert-warning mt-1">
                {{session('p_delete')}}
                </div>
                @endif
               <div class="card-body">
                   <table class="table table-bordered">
                <tr>
                 <th>SL</th>
                 <th>Company Name</th>
                 <th>Department Name</th>
                 <th>Created at</th>
                <th>Action</th>
                @foreach($trashed as $trash)                                                                                                                                                                                                )
                 <tr>
                 <td>{{$loop->index+1}}</td>
                 <td>{{$trash->company_name}}</td>
                 <td>{{$trash->department_name}}</td>
                 <td>{{($trash->created_at->diffforHumans() > 24)?$trash->created_at->format('d/m/y h:i:s A')
                  :$trash->created_at->diffforHumans()}}</td>
                 <td>
                 <a href="{{url('/depart/restore')}}/{{$trash->id}}" class="btn btn-info">Restore</a>
                 <a href="{{url('/depart/permanent/delete')}}/{{$trash->id}}" class="btn btn-danger">Delete</a>
                 </td>
                 </tr>
                 @endforeach
                </table>
                </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection







