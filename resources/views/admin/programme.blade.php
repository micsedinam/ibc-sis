@extends('layouts.layout')

@section('page-name')
    Register Programme
@endsection

@section('title')
    Admin | Register Programme
@endsection

@section('sidebar')
    @include('partials.side-nav');
@stop

@section('content')
	<div class="col-lg-8  col-lg-offset-2 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">Register Programme</h4>
                            </div>
                            <div class="content">
                                <form role="form" method="POST" action="{{ url('admin/programme') }}">
                					{{ csrf_field() }}

                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                                                <label for="code">Programme Code</label>
                                                <input type="text" class="form-control border-input" placeholder="BUS" name="code" value="{{ old('code') }}" required="">

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
                                                <input type="text" class="form-control border-input" placeholder="Business" name="name" value="{{ old('name') }}" required="">

                                                 @if ($errors->has('name'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Register Programme</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>       
@stop