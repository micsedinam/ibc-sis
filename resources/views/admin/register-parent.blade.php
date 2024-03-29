@extends('layouts.layout')

@section('page-name')
    Register Parent
@endsection

@section('title')
    Admin | Register Parent
@endsection

@section('sidebar')
    @include('partials.side-nav');
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <a class="btn btn-primary" href="{{ route('parent.index') }}" > Manage Parents</a>
        <hr>
    </div>
</div>

	<div class="col-lg-10  col-lg-offset-1 col-md-7">

        <div class="card">
            <div class="header">
                <h4 class="title text-center">Register Parent</h4>
            </div>
            <div class="content">
                <form role="form" method="POST" action="{{ route('parent.create') }}">
					{{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control border-input" autofocus="" placeholder="George" name="firstname" value="{{ old('firstname') }}">

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
                                <input type="text" class="form-control border-input" placeholder="Smith" name="surname" value="{{ old('post_category') }}">

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
                                <input type="text" class="form-control border-input" placeholder="Blankson" name="othername" value="{{ old('othername') }}">

                                 @if ($errors->has('othername'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('othername') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('dob') ? ' has-error' : '' }}">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control border-input" name="dob" value="{{ old('dob') }}" required>

                                @if ($errors->has('dob'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control border-input" placeholder="name@domain.com" name="email" value="{{ old('email') }}" required>

                                 @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label for="gender">Gender</label>

                                <select id="gender" class="form-control border-input" name="gender" value="{{ old('gender') }}" required>
                                    <option>Female</option>
                                    <option>Male</option>
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address">Residential Address</label>
                                <input type="text" class="form-control border-input" placeholder="Fiapre" name="address" value="{{ old('address') }}" required>

                                 @if ($errors->has('address'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone">Phone</label>
                                <input type="tel" pattern=".{10}" onkeypress="validate()" class="form-control border-input" placeholder="0240000000" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Register Parent</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
            
@stop