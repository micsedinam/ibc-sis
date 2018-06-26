@extends('layouts.layout')

@section('page-name')
    Update Course
@endsection

@section('title')
    Admin | Update Course
@endsection

@section('sidebar')
    @include('partials.side-nav');
@stop

@section('content')
	<div class="col-lg-8  col-lg-offset-2 col-md-7">
        <div class="card">
            <div class="header">
                <h4 class="title text-center">Update Course</h4>
            </div>
            <div class="content">
                <form role="form" method="POST" action="{{ url('admin/course/'.$course->id) }}">
					{{ csrf_field() }}
                    {{ method_field('PATCH')}}

                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('c_code') ? ' has-error' : '' }}">
                                <label for="c_code">Course Code</label>
                                <input type="number" pattern=".{3}" onkeypress="validate()" class="form-control border-input" placeholder="101" name="c_code" value="{{ $course->c_code }}" required="">

                                 @if ($errors->has('c_code'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('c_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('c_name') ? ' has-error' : '' }}">
                                <label for="c_name">Course Title</label>
                                <input type="text" class="form-control border-input" placeholder="Accounting" name="c_name" value="{{ $course->c_name }}" required="">

                                 @if ($errors->has('c_name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('c_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-md-4">
                            <div class="form-group {{ $errors->has('semester') ? ' has-error' : '' }}" required>
                                <label for="semester">Semester</label>

                                <select id="semester" class="form-control border-input" name="semester" value="{{ $course->semester }}" required>
                                    <option value="first">First</option>
                                    <option value="second">Second</option>
                                </select>

                                 @if ($errors->has('semester'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('semester') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('level') ? ' has-error' : '' }}" required>
                                <label for="level">Level</label>

                                <select id="level" class="form-control border-input" name="level" value="{{ $course->level }}" required>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="300">300</option>
                                    <option value="400">400</option>
                                </select>

                                 @if ($errors->has('level'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('credit_hrs') ? ' has-error' : '' }}" required>
                                <label for="credit_hrs">Credit Hours</label>

                                <select id="credit_hrs" class="form-control border-input" name="credit_hrs" value="{{ $course->credit_hrs }}" required>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>

                                 @if ($errors->has('credit_hrs'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('credit_hrs') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Course</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>       
@stop