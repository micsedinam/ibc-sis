@extends('layouts.layout')

@section('page-name')
    Update Student Bill
@endsection

@section('title')
    Admin | Update Student Bill
@endsection

@section('sidebar')
    @include('partials.side-nav');
@stop

@section('content')

        <div class="col-lg-8  col-lg-offset-2 col-md-7">
                        <div class="card">
                            <div class="header">
                                <a href="{{url('admin/manage-results')}}"><i class="ti-angle-double-left"></i>Back</a>
                                <h4 class="title text-center">Update Student Bill</h4>
                            </div>
                            <div class="content">
                                <form role="form" method="POST" action="{{ url('admin/results/'.$results->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH')}}

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('studentid') ? ' has-error' : '' }}">
                                                <label for="studentid">Student ID</label>
                                                <input type="text" class="form-control border-input" name="studentid" value="{{ $results->studentid }}">

                                                 @if ($errors->has('studentid'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('studentid') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('academicyear') ? ' has-error' : '' }}">
                                                <label for="academicyear">Academic Year</label>
                                                <input type="text" class="form-control border-input" name="academicyear" value="{{ $results->academicyear }}">

                                                 @if ($errors->has('academicyear'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('academicyear') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('term') ? ' has-error' : '' }}">
                                                <label for="term">Term</label>
                                                <input type="text" class="form-control border-input" placeholder="Blankson" name="term" value="{{ $results->term }}">

                                                 @if ($errors->has('term'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('term') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('subject_title') ? ' has-error' : '' }}">
                                                <label for="subject_title">Subject Title</label>
                                                <input type="text" class="form-control border-input" name="subject_title" value="{{ $results->subject_title }}" required>

                                                 @if ($errors->has('subject_title'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('subject_title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('ca_score') ? ' has-error' : '' }}">
                                                <label for="ca_score">Continuous Assesment</label>
                                                <input type="integer" class="form-control border-input" name="ca_score" value="{{ $results->ca_score }}" required>

                                                 @if ($errors->has('ca_score'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('ca_score') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('exam_score') ? ' has-error' : '' }}">
                                                <label for="exam_score">Exam Score</label>
                                                <input type="integer" class="form-control border-input" name="exam_score" value="{{ $results->exam_score }}" required>

                                                 @if ($errors->has('exam_score'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('exam_score') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Student Result</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
@stop