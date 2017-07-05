@extends('layouts.layout')

@section('page-name')
    Grade Report
@endsection

@section('title')
    Admin | Grade Report
@endsection

@section('sidebar')
    @include('partials.side-nav')
@stop

@section('content') 

    	<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center text-warning"> <h3 class="text-warning text-center">CLASS PERFORMANCE ON SUBJECT</h3></div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <a href="{{url('admin/subject-results')}}" class="btn btn-success"><i class="ti-angle-double-left"></i>Back</a>
			                    {{-- <a href="{{URL::to('admin/resultsExport')}}" class="btn btn-info">Generate Grade Report</a> --}}
                            </div> 
                            <div class="col-md-12">
                                <h6 class="box-title text-center">Sort By Class - Subject - Term - Academic Year</h6>
                                    <form role="form" method="POST" action="{{ url('admin/report') }}">
                                    {{ csrf_field() }}

                                     <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control"  name="class" required="">
                                                    <!-- <option>Select</option> -->
                                                    @foreach($class as $item)
                                                        <option value="{{$item->class}}">{{$item->class}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control"  name="subject" required="">
                                                    <!-- <option>Select</option> -->
                                                    @foreach($subject as $item)
                                                        <option value="{{$item->subject_title}}">{{$item->subject_title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <select class="form-control"  name="term" required="">
                                                    <!-- <option>Select</option> -->
                                                    @foreach($term as $item)
                                                        <option value="{{$item->term}}">{{$item->term}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <select class="form-control"  name="academic" required="">
                                                    <!-- <option>Select</option> -->
                                                    @foreach($academic as $item)
                                                        <option value="{{$item->academicyear}}">{{$item->academicyear}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class=" col-md-2 text-center">
                                            <button type="submit" class="btn btn-info btn-fill btn-wd">Generate Report</button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-warning">
                                        <div class="panel-heading text-center text-success"> <h3 class="text-success text-center">CLASS PERFORMANCE REPORT</h3></div>
                                        <div class="panel-body">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@stop            