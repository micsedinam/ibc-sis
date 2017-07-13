@extends('layouts.layout')

@section('page-name')
    Dashboard
@endsection

@section('title')
    Admin | Dashboard
@endsection

@section('sidebar')
    @include('partials.side-nav')
@stop    

@section('content')

    <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-center">
                                    <i class="fa fa-suitcase"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Staff</p>
                                    {{ $s }}
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="stats">Employed
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-success text-center">
                                    <i class="fa  fa-graduation-cap"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Students</p>
                                    {{ $u }}
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="stats"> Enrolled
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-danger text-center">
                                    <i class="fa fa-users"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Parents</p>
                                    {{ $g }}
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="stats">Registeted
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
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
                                    <p>Admins</p>
                                    {{ $a }}
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-lg-5">
           <div class="card">
                <h4>
                <small> &nbsp; Hi {{Auth::user()->firstname}}! <br></small></h4>
                <h5> &nbsp; You are logged in as <strong>ADMIN</strong>!</h5>
           </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-inverse text-center">
                                <i class="fa fa-flash"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p><small>Parent's Request</small></p>
                                {{ $sp }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <hr>
                    <div class="stats">
                        Pending
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="col-lg-4 col-sm-6">--}}
            {{--<div class="card">--}}
                {{--<div class="content">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-xs-5">--}}
                            {{--<div class="icon-big icon-inverse text-center">--}}
                                {{--<i class="fa fa-pencil"></i>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-7">--}}
                            {{--<div class="numbers">--}}
                                {{--<p><small>Results change request</small></p>--}}
                                {{--{{ $rc }}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="footer">--}}
                        {{--<hr>--}}
                        {{--<div class="stats">--}}
                           {{--<p><a href="{{ route('approve.index') }}" class="label label-default"><i class="fa fa-eye"></i> View</a></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>       
@stop
