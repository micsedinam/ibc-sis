@extends('layouts.layout')

@section('page-name')
    Register Admin
@endsection

@section('title')
    Admin | Register Admin
@endsection

@section('sidebar')
    @include('partials.side-nav');
@stop

@section('content')
	<div class="col-lg-8  col-lg-offset-2 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">Register Admin</h4>
                            </div>
                            <div class="content">
                                <form role="form" method="POST" action="{{ url('admin/add-admin') }}">
                					        {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('firstname') ? ' has-error' : '' }}">
                                                <label for="firstname">First Name</label>
                                                <input type="text" class="form-control border-input" placeholder="George" name="firstname" value="{{ old('firstname') }}" required="">

                                                 @if ($errors->has('firstname'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('firstname') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('surname') ? ' has-error' : '' }}">
                                                <label for="surname">Last Name</label>
                                                <input type="text" class="form-control border-input" placeholder="Smith" name="surname" value="{{ old('post_category') }}" required="">

                                                 @if ($errors->has('surname'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('surname') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('othername') ? ' has-error' : '' }}">
                                                <label for="othername">Other Names</label>
                                                <input type="text" class="form-control border-input" placeholder="Blankson" name="othername" value="{{ old('othername') }}" required="">

                                                 @if ($errors->has('othername'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('othername') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email">E-mail</label>
                                                <input type="email" class="form-control border-input" placeholder="name@domain.com" name="email" value="{{ old('email') }}" required="">

                                                 @if ($errors->has('email'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                                <label for="phone">Phone</label>
                                                <input type="number" class="form-control border-input" placeholder="0240000000" name="phone" value="{{ old('phone') }}" required="">

                                                 @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('phone') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Register Admin</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
@stop
