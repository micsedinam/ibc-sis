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
			<div class="col-lg-3">
	        <div class="panel panel-primary">
	         <div class="panel-body">
	         <p><strong>Approve Changes</strong></p>
	            <hr>
	               <h6>Student ID : {{ $item->studid }} <h6>
	               <h6>Request : {{ $item->request }}</h6>
	               <h6>Old: CA = {{ $item->ca_score }} Exam = {{ $item->exam_score }}</h6>
	               <h6>New: CA = {{ $item->new_ca }} Exam =  {{ $item->new_exam}}</h6>
				 <hr>
	               <div class="row">
	               	<div class="col-md-6">
	               		<form action="{{ route('approve.store') }}" >
	               	{{ csrf_field() }}

	               	<input type="text" name="request" hidden>
	               	<input type="text" name="update" hidden>
	               	<input type="text" name="id" hidden>
	               	<button class="btn btn-xs btn-primary">Approve</button>
	               </form>
	             
	               	</div>
	               	<div class="col-md-6">
	               		<form action="{{ route('approve.store') }}" >
	               	{{ csrf_field() }}

	               	<input type="text" hidden>
	               	<button class="btn btn-xs btn-danger">Cancel</button>
	               </form>
	             
	               	</div>
	               </div>
	           
	            </div>
	        </div>
	    </div>
		@endforeach
	</div>
@stop