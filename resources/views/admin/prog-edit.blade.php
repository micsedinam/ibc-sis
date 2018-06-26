@extends('layouts.layout')

@section('page-name')
    Update Programme
@endsection

@section('title')
    Admin | Update Programme
@endsection

@section('sidebar')
    @include('partials.side-nav');
@stop

@section('content')
	<div class="col-lg-8  col-lg-offset-2 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">Update Programme</h4>
                            </div>
                            <div class="col-md-12">
                                <a href="{{URL::to('admin/programme-manage')}}" class="btn btn-info">Manage Programme</a>
                            </div> 
                            <div class="content">
                                <form role="form" method="POST" action="{{ url('admin/programme/'.$prog->id) }}">
                					{{ csrf_field() }}
                                    {{ method_field('PATCH')}}

                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                                                <label for="code">Programme Code</label>
                                                <input type="text" class="form-control border-input" placeholder="BUS" name="code" value="{{ $prog->code }}">

                                                 @if ($errors->has('code'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('code') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="name">Programme Title</label>
                                                <input type="text" class="form-control border-input" placeholder="Business" name="name" value="{{ $prog->name }}">

                                                 @if ($errors->has('name'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Programme</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>       
@stop