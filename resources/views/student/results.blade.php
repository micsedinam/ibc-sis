@extends('layouts.layout')

@section('page-name')
    Result
@stop

@section('title')
    Student | Result
@stop

@section('crumbs')
    <li><a href="{{ url('/index') }}">Dashboard</a></li>
    <li class="active">Result</li>
@stop

@section('sidebar')
    @include('partials.stud-nav')
@stop

@section('content')

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center text-warning">My Result</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <h5 class="text-center">{{ Auth::user()->firstname }} {{ Auth::user()->surname }}</h5>
                                <h5 class="text-center">Student ID:@if(Auth::check()) {{Auth::user()->studentid}} @endif</h5>
                                <h5 class="text-center">Programme:@if(Auth::check()) {{Auth::user()->programme}} @endif</h5>
                            </div>
                            {{--  <div class="row text-center">
                                <div class="col-md-6">
                                    <h6 class="box-title text-info text-center">ACADEMIC YEAR: {{$results->academicyear}}</h6>
                                    <h6 class="box-title text-danger text-center">TERM: {{$results->term}}</h6>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="box-title text-danger text-center">TERM: {{$result->term}}</h6>
                                </div>
                            </div> --}}

                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="white-box">

                                    <h3 class="text-warning text-center">STUDENT RESULTS</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>SUBJECT TITLE</th>
                                    <th>CONTINUOUS ASSESSMENT</th>
                                    <th>EXAM SCORE</th>
                                    <th>TOTAL</th>
                                    <th>GRADE</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($result as $element)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $element->subject_title }}</td>
                                        <td class="text-center">{{ $element->ca_score }}</td>
                                        <td class="text-center">{{ $element->exam_score }}</td>
                                        <td class="text-center">{{ $element->total }}</td>
                                        <td class="text-center">{{ $element->grade }}</td>
                                    </tr>
                                @endforeach

                                {{-- <tr>
                                    <td>WEIGHTED AVERAGE</td>
                                    <td>{{$wgt}}</td>
                                    <td></td>
                                    <td>SEMESTER GPA:</td>
                                    <td>{{$sgpa}}</td>
                                    <td></td>
                                    <td>CUMMULATIVE GPA:</td>
                                    <td>{{$cgpa}}</td>
                                </tr> --}}
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