@extends('layouts.layout')

@section('page-name')
    Manage Programme
@endsection

@section('title')
    Admin | Manage Programme
@endsection

@section('sidebar')
    @include('partials.side-nav')
@stop

@section('content') 

    	<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center text-warning"> <h5 class="text-warning text-center">PROGRAMME LIST</h5></div>
                        <div class="panel-body">
                            <div class="col-md-12">
			                    <a href="{{URL::to('admin/programme')}}" class="btn btn-info pull-right"><i class="ti-plus"> Programme</i></a>
                            </div> 

                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="white-box">

                                   
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
				                            	<tr>
                                                    <th>#</th>
                                                    <th>PROGRAMME CODE</th>
                                                    <th>PROGRAMME TITLE</th>
                                                    <th>MANAGE</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($prog as $element)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $element->code }}</td>
                                                    <td>{{ $element->name }}</td>
				                                    <td>
				                                        <a href="{{url('admin/programme/'.$element->id.'/edit')}}"><i class="ti-pencil-alt"></i></a>
				                                        <a href="{{url('admin/programme/'.$element->id.'/delete')}}"><i class="ti-trash text-danger"></i></a>
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