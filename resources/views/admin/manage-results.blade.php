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
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center text-warning"> <h3 class="text-warning text-center">STUDENT RESULTS LIST</h3></div>
                        <div class="panel-body">
                            <div class="col-md-12">
                            	{{-- <a href="{{url('admin/results')}}" class="btn btn-success"><i class="ti-angle-double-left"></i>Back</a> --}}
                                {{-- <a href="{{URL::to('resultdeleteAll')}}" class="btn btn-danger">Delete All</a> --}}
			                    {{--<a href="{{URL::to('getImport')}}" class="btn btn-success">Import</a>--}}
			                    <a href="{{URL::to('admin/subject-results')}}" class="btn btn-info">Subject Results</a>

                                {{-- <div class="col-md-3 pull-right">
                                    <form method="GET" action="{{url('admin/search')}}" class="pull-right" role="search">
                                        <div class="input-group custom-search-form">
                                            <input type="text" name="search" class="form-control" placeholder="search here...">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-info btn-fill">
                                                    <i class="ti-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div> --}}
                            </div> 
                            <div class="col-md-12">
                                <h6 class="box-title text-center">Sort By Student ID - Subject - Term - Academic Year</h6>
                                    <form role="form" method="POST" action="{{ url('admin/manage-result') }}">
                                    {{ csrf_field() }}

                                     <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group {{ $errors->has('studentid') ? ' has-error' : '' }}">
                                                <!-- <label for="studentid">Student ID</label> -->
                                                <input type="text" class="form-control border-input" placeholder="Student ID" name="studentid" value="{{ old('studentid') }}" required="">

                                                 @if ($errors->has('studentid'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('studentid') }}</strong>
                                                    </span>
                                                @endif
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
                                        <div class="col-md-3">
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
                                            <button type="submit" class="btn btn-info btn-fill btn-wd">Sort Results</button>
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