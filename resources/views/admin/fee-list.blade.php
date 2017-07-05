@extends('layouts.layout')

@section('page-name')
    Fee Details 
@endsection

@section('title')
    Admin | Fee Details 
@endsection

@section('sidebar')
    @include('partials.side-nav')
@stop

@section('content')

    	<div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center text-warning"> <h3 class="text-warning text-center">STUDENT BILL LIST</h3></div>
                        <div class="panel-body">
                            <div class="col-md-12">
                            	<a href="{{url('admin/fees')}}" class="btn btn-success"><i class="ti-angle-double-left"></i>Back</a>
                                {{-- <a href="{{URL::to('feesdeleteAll')}}" class="btn btn-danger">Delete All</a> --}}
			                    {{--<a href="{{URL::to('getImport')}}" class="btn btn-success">Import</a>--}}
			                    <a href="{{URL::to('getExport')}}" class="btn btn-info">Export to Excel</a>
                            </div> 

                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="white-box">

                                   
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
				                            <tr>
				                                <th>#</th>
				                                <th>STUDENT ID</th>
				                                <th>ACADEMIC YEAR</th>
				                                <th>TERM</th>
				                                <th>AMOUNT DUE (GHC)</th>
				                                <th>AMOUNT PAID (GHC)</th>
				                                <th>AMOUNT OUSTANDING (GHC)</th>
				                                <th>MANAGE</th>
				                            </tr>
				                            </thead>
				                            <tbody>
				                            @foreach($fees as $element)
				                                <tr>
				                                    <td>{{ $loop->iteration }}</td>
				                                    <td>{{ $element->studentid }}</td>
				                                    <td>{{ $element->academicyear }}</td>
				                                    <td>{{ $element->term }}</td>
				                                    <td>{{ $element->amt_due }}</td>
				                                    <td>{{ $element->amt_paid }}</td>
				                                    <td>{{ $element->amt_rem }}</td>
				                                    <td>
				                                        <a href="{{url('admin/fees/'.$element->id.'/edit')}}"><i class="ti-pencil-alt"></i></a>
				                                        <a href="{{url('admin/fees/'.$element->id.'/delete')}}"><i class="ti-close text-danger"></i></a>
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