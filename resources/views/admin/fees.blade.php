@extends('layouts.layout')

@section('page-name')
    Term Fees
@endsection

@section('title')
    Admin | Term Fees
@endsection

@section('sidebar')
	@include('partials.side-nav');
@stop

@section('content')

        		<div class="col-lg-8  col-lg-offset-2">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">Term Fees</h4>
                                 <a href="{{url('admin/manage-details')}}" class="pull-left">Manage Details</a>
                            	 <a href="{{URL::to('admin/feelist')}}" class="pull-right">Manage Fees</a>
                            </div>
                            <div class="content">
				                <form action="feesImport" method="post" enctype="multipart/form-data">
				                    {{ csrf_field() }}

				                    <div class="row text-center">
				                    	<div class="form-group">
				                        	<label for="material" class="col-md-12">Select File (.csv)</label>
						                        <div class="col-lg-6 col-lg-offset-4">
						                            <input type="file" name="fees">
						                        </div>
				                    	</div>
				                    </div>

				                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Import Fees</button>
                                    </div>
                                    <div class="clearfix"></div>
				                </form>
				            </div>
				        </div>
				</div>
@stop				            