@extends('layouts.layout')

@section('page-name')
    Result
@stop

@section('title')
    Student | Result
@stop

@section('crumbs')
    <li><a href="{{ url('/index') }}">Dashboard</a></li>
    <li >Results</li>
    <li class="active">Request change</li>
@stop

@section('sidebar')
    @include('partials.stud-nav')
@stop

@section('content') 
	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<h5>What should be changed? and to what?</h5>
				<form action="{{ url('results/change/'.$result->id) }}" method="POST">
				{{ csrf_field() }}

					<div class="form-group">
						<label for="request">Type your request here.</label>
						<textarea name="request" id="request" cols="30" autofocus="" required="" class="form-control" rows="5"></textarea>
					</div> 
					<p class="text-muted"><i>Example: <code>My class score should be changed to 30 </code></i></p>
					<button type="submit" class="btn btn-primary"> Request</button>
				</form>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
			<div class="table-responsive">
                <table class="table">
                    <thead>
			        <tr>
			            <th>SUBJECT TITLE</th>
			            <th>CONTINUOUS ASSESSMENT</th>
			            <th>EXAM SCORE</th>
			            <th>TOTAL</th>
			            <th>GRADE</th>
			            
			        </tr>
			        </thead>
			        <tbody>
			            <tr>
			                <td>{{ $result->subject_title }}</td>
			                <td class="text-center">{{ $result->ca_score }}</td>
			                <td class="text-center">{{ $result->exam_score }}</td>
			                <td class="text-center">{{ $result->total }}</td>
			                <td class="text-center">{{ $result->grade }}</td>
			                
			            </tr>
			        </tbody>
                </table>
            </div>
            <h4>NB</h4><p>You can only do this Once, if your problem still persist See the Assistant Head Academic.</p>
		</div>
		</div>
		
	</div>
@stop