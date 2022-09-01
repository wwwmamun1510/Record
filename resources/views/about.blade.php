@extends('layouts.starlight')
@section('about')
active
@endsection

@section('title')
about
@endsection
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="{{url('/home')}}">Employee Record Management System</a>
<a class="breadcrumb-item" href="{{url('/employ')}}">Employee</a>
<a class="breadcrumb-item" href="{{url('/depart')}}">Department</a>
</nav>
<div class="sl-pagebody">
<h1 class="text-center">Company Overview for a Business Plan</h1>
<p1>A company overview provides the reader of your business plan with basic background information about your company so they have an understanding of what you do, who the management team.</p1>
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