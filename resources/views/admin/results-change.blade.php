@extends('layouts.layout')

@section('page-name')
    Change Results 
@endsection

@section('title')
    Admin | Change Results 
@endsection

@section('sidebar')
    @include('partials.side-nav')
@stop

@section('content') 
	<div class="row">
		@foreach ($request as $item)
			@if ($item->state_ === 'pending')
				<div class="col-lg-3">
	        <div class="panel panel-primary">
	         <div class="panel-body">
	         <p><strong>Approve Changes</strong></p>
	            <hr>
	               <h6> <small>Student ID :</small> {{ $item->studid }} <h6>
	               <h6><small>Request :</small> {{ $item->request }}</h6>
	               <h6><small>Old: CA =</small> {{ $item->ca_score }} <small>Exam =</small> {{ $item->exam_score }}</h6>
	               <h6><small>New: CA =</small> {{ $item->new_ca }} <small>Exam = </small>  {{ $item->new_exam}}</h6>
				 <hr>
	               <div class="row">
	               	<div class="col-md-6">
	               		<form action="{{ route('approve.store') }}" method="POST" >
	               	{{ csrf_field() }}

	               	<input type="text" name="result" value="{{ $item->resultid }}" hidden>
	               	<input type="text" name="update" value="{{ $item->id }}" hidden>
	               	<input type="text" name="requested" value="{{ $item->requestid }}" hidden>
	               	<input type="text" name="new_ca" value="{{ $item->new_ca }}" hidden>
	               	<input type="text" name="new_exam" value="{{ $item->new_exam}}" hidden>
	               	<button class="btn btn-xs btn-primary">Approve</button>
	               </form>
	             
	               	</div>
	               	<div class="col-md-6">
	               		
	               	</div>
	               </div>
	           
	            </div>
	        </div>
	    </div>
	    	@else
	    		<div class="panel panel-primary">
		         <div class="panel-body">
		         	<p>Nothing to Approve</p>
		         </div>
		         </div>
			@endif
		@endforeach
	</div>
@stop