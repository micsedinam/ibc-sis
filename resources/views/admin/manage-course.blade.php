@extends('layouts.layout')

@section('page-name')
    Manage Course
@endsection

@section('title')
    Admin | Manage Course
@endsection

@section('sidebar')
    @include('partials.side-nav')
@stop

@section('content') 

    	<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center text-warning"> <h5 class="text-warning text-center">COURSE LIST</h5></div>
                        <div class="panel-body">
                            <div class="col-md-12">
			                    <a href="{{URL::to('admin/course')}}" class="btn btn-info pull-right"><i class="ti-plus"> Course</i></a>
                            </div> 

                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="white-box">

                                   
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
				                            	<tr>
                                                    <th>#</th>
                                                    <th>COURSE CODE</th>
                                                    <th>COURSE TITLE</th>
                                                    <th>CREDIT HOURS</th>
                                                    <th>MANAGE</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($course as $element)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $element->c_code }}</td>
                                                    <td>{{ $element->c_name }}</td>
                                                    <td>{{ $element->credit_hrs }}</td>
				                                    <td>
				                                        <a href="{{url('admin/course/'.$element->id.'/edit')}}"><i class="ti-pencil-alt"></i></a> - 
				                                        <a href="{{url('admin/course/'.$element->id.'/delete')}}"><i class="ti-trash text-danger"></i></a>
				                                    </td>
				                                </tr>
				                            	@endforeach

				                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@stop            