@extends('layouts.layout')

@section('page-name')
    Register Courses
@endsection

@section('title')
    Student | Register Courses 
@endsection

@section('sidebar')
    @include('partials.stud-nav')
@stop

@section('content') 

	<div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading text-center text-warning"> <h3 class="text-warning text-center">REGISTER COURSES</h3></div>
                <div class="panel-body">
                    <div class="col-md-12">
                    	{{-- <a href="{{url('admin/results')}}" class="btn btn-success"><i class="ti-angle-double-left"></i>Back</a> --}}
                        {{-- <a href="{{URL::to('resultdeleteAll')}}" class="btn btn-danger">Delete All</a> --}}
	                    {{--<a href="{{URL::to('getImport')}}" class="btn btn-success">Import</a>--}}
	                    <!-- <a href="{{URL::to('admin/subject-results')}}" class="btn btn-info">Subject Results</a> -->
                    </div> 
                    <div class="col-md-12">
                        <h6 class="box-title text-center">Sort By Semester - Level</h6>
                        <form role="form" method="POST" action="{{ url('/mycourses') }}">
                            {{ csrf_field() }}

                             <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control"  name="semester" required="">
                                            @foreach($courses as $item)
                                                <option value="{{$item->semester}}">{{$item->semester}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control"  name="level" required="">
                                            @foreach($courses as $item)
                                                <option value="{{$item->level}}">{{$item->level}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class=" col-md-4 text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Get Courses</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
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
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($course as $element)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $element->c_code }}</td>
                                            <td>{{ $element->c_name }}</td>
                                            <td>{{ $element->credit_hrs }}</td>
		                                    <!-- <td>
		                                        <a href="{{url('student/results/'.$element->id.'/edit')}}"><i class="ti-pencil-alt"></i></a> - 
		                                        <a href="{{url('student/results/'.$element->id.'/delete')}}"><i class="ti-close text-danger"></i></a>
		                                    </td> -->
		                                </tr>
		                            	@endforeach

		                            </tbody>
                                </table>
                                <form role="form" method="POST" action="{{ url('/mycourse') }}">
                                    {{ csrf_field() }}

                                     <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('semester') ? ' has-error' : '' }}">
                                                <input type="hidden" class="form-control border-input" name="semester" value="{{ $mysemester }}" required="">

                                                 @if ($errors->has('semester'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('semester') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('level') ? ' has-error' : '' }}">
                                                <input type="hidden" class="form-control border-input" name="level" value="{{ $mylevel }}" required="">

                                                 @if ($errors->has('level'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('level') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class=" col-md-12 text-center">
                                            <button type="submit" class="btn btn-info btn-fill btn-wd">Register Courses</button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop            