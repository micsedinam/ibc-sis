@extends('layouts.layout')

@section('page-name')
    Bill
@stop

@section('title')
    Student | Bill
@stop

@section('crumbs')
    <li><a href="{{ url('/index') }}">Dashboard</a></li>
    <li class="active">Bill</li>
@stop

@section('sidebar')
    @include('partials.stud-nav')
@stop

@section('content')

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center text-warning">MY BILL</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <h5 class="text-center">{{ Auth::user()->firstname }} {{ Auth::user()->surname }}</h5>
                                <h5 class="text-center">Student ID:@if(Auth::check()) {{Auth::user()->studentid}} @endif</h5>
                                <h5 class="text-center">Programme:@if(Auth::check()) {{Auth::user()->programme}} @endif</h5>
                            </div>
                            <div class="row text-center">
                                <div class="col-md-6">
                                    <h6 class="box-title text-info text-center">ACADEMIC YEAR: {{$bill->academicyear}}</h6>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="box-title text-danger text-center">TERM: {{$bill->term}}</h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                    <p class="text-info">Amount Due: <br>GHC {{$bill->amt_due}}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-blue">Amount Paid: <br>GHC {{$bill->amt_paid}}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-danger">Amount Outstanding: <br>GHC {{$bill->amt_rem}}</p> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="white-box">

                                    <h3 class="text-warning text-center">STUDENT BILL INFORMATION</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>DESCRIPTION</th>
                                                <th>AMOUNT CHARGED (GHC)</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($bills as $element)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $element->description }}</td>
                                                    <td>{{ $element->amount }}</td>
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