@extends('layouts.layout')

@section('page-name')
    Manage Results 
@endsection

@section('title')
    Admin | Manage Results 
@endsection

@section('sidebar')
    @include('partials.side-nav')
@stop

@section('content')

    	<div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center text-warning"> <h3 class="text-warning text-center">STUDENT RESULTS LIST</h3></div>
                        <div class="panel-body">
                            <div class="col-md-12">
                            	<a href="{{url('admin/results')}}" class="btn btn-success"><i class="ti-angle-double-left"></i>Back</a>
                                {{-- <a href="{{URL::to('resultdeleteAll')}}" class="btn btn-danger">Delete All</a> --}}
			                    {{--<a href="{{URL::to('getImport')}}" class="btn btn-success">Import</a>--}}
			                    <a href="{{URL::to('admin/resultsExport')}}" class="btn btn-info">Export to Excel</a>
                            </div> 

                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="white-box">

                                   
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
				                            	<tr>
                                                    <th>#</th>
                                                    <th>STUDENT ID</th>
                                                    <th>SUBJECT TITLE</th>
                                                    <th>CONTINUOUS ASSESSMENT</th>
                                                    <th>EXAM SCORE</th>
                                                    <th>TOTAL</th>
                                                    <th>GRADE</th>
                                                    <th>MANAGE</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($results as $element)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $element->studentid }}</td>
                                                    <td>{{ $element->subject_title }}</td>
                                                    <td class="text-center">{{ $element->ca_score }}</td>
                                                    <td class="text-center">{{ $element->exam_score }}</td>
                                                    <td class="text-center">{{ $element->total }}</td>
                                                    <td class="text-center">{{ $element->grade }}</td>
				                                    <td>
				                                        <a href="{{url('admin/results/'.$element->id.'/edit')}}"><i class="ti-pencil-alt"></i></a>
				                                        <a href="{{url('admin/results/'.$element->id.'/delete')}}"><i class="ti-close text-danger"></i></a>
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