@extends('layouts.layout')

@section('page-name')
    Dashboard
@endsection

@section('title')
    Staff | Dashboard
@endsection

@section('sidebar')
    @include('partials.staff-nav');
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    Hi {{Auth::user()->firstname}}! <br>
                    You are logged in as <strong>STAFF!</strong>
                </div>
            </div>
        </div>

     {{--<div class="col-lg-4 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-info text-center">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Results Change requests</p>
                                    {{ $rn }}
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <a class="label label-primary" href="{{ url('/staff/result/change') }}">Respond</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}
        </div>
@stop
