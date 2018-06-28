@extends('layouts.layout')

@section('page-name')
    Registered Courses
@stop

@section('title')
    Student | Registered Courses
@stop

@section('crumbs')
    <li><a href="{{ url('/index') }}">Dashboard</a></li>
    <li class="active">Registered Courses</li>
@stop

@section('sidebar')
    @include('partials.stud-nav')
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center text-warning">Registered Courses</div>
                <div class="panel-body">

                    <div class="col-md-12">
                        <h5 class="text-center">{{ Auth::user()->firstname.' '.Auth::user()->surname.' '.Auth::user()->othername }}</h5>
                        <h5 class="text-center">Student ID:@if(Auth::check()) {{strtoupper(Auth::user()->studentid) }} @endif</h5>
                        <h5 class="text-center">Programme:@if(Auth::check()) {{Auth::user()->programme}} @endif</h5>
                    </div>

                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">

                            <h3 class="text-warning text-center">REGISTERED COURSES</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>COURSE CODE/th>
                                        <th>COURSE TITLE</th>
                                        <th>CREDIT HOURS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($show as $element)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $element->c_code }}</td>
                                            <td class="text-center">{{ $element->c_name }}</td>
                                            <td class="text-center">{{ $element->credithrs }}</td>
                                            {{--  <td>
                                                @if (sizeof($requested) != 0)
                                                    @foreach ($requested as $item)
                                                        @if ($item->resultid == $element->id)
                                                            <p class="label label-warning"><small>Requested - </small>{{ strtoupper($item->state) }}</p>
                                                        @else
                                                            <a class="label label-primary" href="{{ url('results/change/'.$element->id) }}">Request change</a>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <a class="label label-primary" href="{{ url('results/change/'.$element->id) }}">Request change</a>
                                                @endif

                                            </td>  --}}
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