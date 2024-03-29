@extends('layouts.layout')

@section('page-name')
    Register Student
@endsection

@section('title')
    Admin | Register Student
@endsection

@section('sidebar')
    @include('partials.side-nav');
@stop

@section('content')

        <div class="col-lg-10  col-lg-offset-1 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">Register Student</h4>
                            </div>
                            <div class="content">
                                <form role="form" method="POST" action="{{ url('admin/student') }}">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('firstname') ? ' has-error' : '' }}">
                                                <label for="firstname">First Name</label>
                                                <input type="text" class="form-control border-input" placeholder="George" name="firstname" value="{{ old('firstname') }}">

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
                                                <input type="text" class="form-control border-input" placeholder="Smith" name="surname" value="{{ old('surname') }}" required>

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
                                                <input type="date" class="form-control border-input" placeholder="yyyy-mm-dd" name="dob" value="{{ old('dob') }}" required>

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
                                        <div class="col-md-4">
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
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                                <label for="phone">Phone</label>
                                                <input type="number" class="form-control border-input" placeholder="0240000000" name="phone" value="{{ old('phone') }}" required>

                                                 @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('phone') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('studentid') ? ' has-error' : '' }}" required>
                                                <label for="studentid">Student ID</label>
                                                <input type="number"  pattern=".{3}" onkeypress="validate()" class="form-control border-input" placeholder="Enter number on roll = 002" name="studentid" value="{{ old('studentid') }}">

                                                 @if ($errors->has('studentid'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('studentid') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                        
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="form-group {{ $errors->has('class') ? ' has-error' : '' }}" required>
                                                <label for="class">Class</label>

                                                <select id="class" class="form-control border-input" name="class" value="{{ old('class') }}" required>
                                                    <option value="rtp">Radio and Television Presentation</option>
                                                    <option value="tp">Television Presentation</option>
                                                    <option value="rp">Radio Presentation</option>
                                                    <option value="tpfa">Television Presentation and Film Acting</option>
                                                    <option value="vch">Video Editing and Camera Handling</option>
                                                    <option value="ved">Video Editing</option>
                                                    <option value="ch">Camera Handling</option>
                                                    <option value="vse">Video Editing and Sound Engineering</option>
                                                    <option value="av">Animation and Video Editing</option>
                                                    <option value="fda">Film Directing and Acting</option>
                                                </select>

                                                 @if ($errors->has('class'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('class') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Register Student</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
@stop