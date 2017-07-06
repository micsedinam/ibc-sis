@extends('layouts.layout')

@section('page-name')
    Subject Results
@endsection

@section('title')
    Staff | Subject Results
@endsection

@section('sidebar')
    @include('partials.staff-nav');
@endsection

@section('content')

        		<div class="col-lg-8  col-lg-offset-2">
                        <div class="card">
                            <div class="header">
                            	<a href="{{url('staff/manage-results')}}" class="btn btn-info">Manage Results</a>
                                <h4 class="title text-center">Subject Results</h4>
                            </div>
                            <div class="content">
				                <form action="resultsImport" method="post" enctype="multipart/form-data">
				                    {{ csrf_field() }}

				                    <div class="row text-center">
				                    	<div class="form-group">
				                        	<label for="material" class="col-md-12">Select File (.csv)</label>
						                        <div class="col-lg-6 col-lg-offset-4">
						                            <input type="file" name="results">
						                        </div>
				                    	</div>
				                    </div>

				                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Upload Results</button>
                                    </div>
                                    <div class="clearfix"></div>
				                </form>
				            </div>
				        </div>
				</div>
@stop				            