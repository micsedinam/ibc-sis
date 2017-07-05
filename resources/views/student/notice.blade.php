@extends('layouts.layout')

@section('page-name')
    Notice
@stop

@section('title')
    Student | Notice
@stop

@section('crumbs')
    <li><a href="{{ url('/index') }}">Dashboard</a></li>
    <li class="active">Notice</li>
@stop

@section('sidebar')
    @include('partials.stud-nav')
@stop

@section('content')

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center text-warning">My Notices</div>
                        <div class="panel-body">

                            @foreach($notice as $item)
                                <div class="#">
                                    <h6 class="box-title">Post Date: {{$item->date}}</h6>
                                    <h6 class="box-title text-info">Category: {{$item->post_category}}</h6>
                                    <h6 class="box-title">Title: {{$item->post_title}}</h6>
                                    <p><h6 class="box-title text-dark">Message: </h6>{{$item->message}}</p>
                                    <hr>
                                </div>
                            @endforeach



                        @foreach($general as $item)
                            <div class="#">
                                <h5 class="box-title">Post Date: {{$item->date}}</h5>
                                <h6 class="box-title text-success">Category: {{$item->post_category}}</h6>
                                <h6 class="box-title">Title: {{$item->post_title}}</h6>
                                <p><h6 class="box-title text-dark">Message: </h6>{{$item->message}}</p>
                                <hr>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
@stop