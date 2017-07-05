@extends('layouts.layout')

@section('page-name')
    Dashboard
@endsection

@section('title')
    Guardian | Dashboard
@endsection

@section('sidebar')
    @include('partials.parent-nav');
@stop

@section('content')

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Dashboard</div>
                        <div class="panel-body">
                            Hi {{Auth::user()->firstname}}! <br>
                            You are logged in as <strong>GUARDIAN!</strong>
                        </div>
                    </div>
                </div>
            </div>
@stop
