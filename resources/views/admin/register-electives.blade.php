@extends('layouts.layout')

@section('page-name')
    Register Subjects
@endsection

@section('title')
    Admin | Register Subjects
@endsection

@section('sidebar')
    @include('partials.side-nav');
@stop

@section('content')

                    <div class="col-lg-4  {{-- col-lg-offset-1 --}} col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">Register Core</h4>
                            </div>
                            <div class="content">
                                <form role="form" method="POST" action="{{ url('core') }}">
                					{{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('subjectid') ? ' has-error' : '' }}">
                                                <label for="subjectid">Subject ID</label>
                                                <input type="text" class="form-control border-input" placeholder="ENG121" name="subjectid" value="{{ old('subjectid') }}" required>

                                                 @if ($errors->has('subjectid'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('subjectid') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('subject_title') ? ' has-error' : '' }}">
                                                <label for="subject_title">Subject Title</label>
                                                <input type="text" class="form-control border-input" placeholder="English Language" name="subject_title" value="{{ old('subject_title') }}" required>

                                                 @if ($errors->has('subject_title'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('subject_title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Register Core</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div> 

                    <div class="col-lg-4 {{-- col-lg-offset-1 --}} col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">Register Elective</h4>
                            </div>
                            <div class="content">
                                <form role="form" method="POST" action="{{ url('elective') }}">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('subjectid') ? ' has-error' : '' }}">
                                                <label for="subjectid">Subject ID</label>
                                                <input type="text" class="form-control border-input" placeholder="FM221" name="subjectid" value="{{ old('subjectid') }}" required>

                                                 @if ($errors->has('subjectid'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('subjectid') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('subject_title') ? ' has-error' : '' }}">
                                                <label for="subject_title">Subject Title</label>
                                                <input type="text" class="form-control border-input" placeholder="Further Mathematics" name="subject_title" value="{{ old('subject_title') }}" required>

                                                 @if ($errors->has('subject_title'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('subject_title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                      <div class="row">
                                        {{-- <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('programme') ? ' has-error' : '' }}">
                                                <label for="programme">Programme</label>

                                                <select class="form-control"  name="programme" required="">
                                                    @foreach($programme as $item)
                                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>

                                                 @if ($errors->has('programme'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('programme') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="form-group {{ $errors->has('class') ? ' has-error' : '' }}">
                                                <label for="class">Class</label>

                                                <select id="class" class="form-control border-input" name="class" value="{{ old('class') }}" required>
                                                    <option value="b1">Business</option>
                                                    <option value="a1">General Arts 1</option>
                                                    <option value="a2">General Arts 2</option>
                                                    <option value="a3">General Arts 3</option>
                                                    <option value="s1">General Science</option>
                                                    <option value="h1">Home Economics</option>
                                                    <option value="v1">Visual Arts</option>
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
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Register Elective</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div> 


                    <div class="col-lg-4  {{-- col-lg-offset-1 --}} col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">Register Optional</h4>
                            </div>
                            <div class="content">
                                <form role="form" method="POST" action="{{ url('optional') }}">
                                    {{ csrf_field () }}

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('subjectid') ? ' has-error' : '' }}">
                                                <label for="subjectid">Subject ID</label>
                                                <input type="text" class="form-control border-input" placeholder="CRS321" name="subjectid" value="{{ old('subjectid') }}" required>

                                                 @if ($errors->has('subjectid'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('subjectid') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('subject_title') ? ' has-error' : '' }}">
                                                <label for="subject_title">Subject Title</label>
                                                <input type="text" class="form-control border-input" placeholder="Catholic Religious Studies" name="subject_title" value="{{ old('subject_title') }}" required>

                                                 @if ($errors->has('subject_title'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('subject_title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                      <div class="row">
                                        {{-- <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('programme') ? ' has-error' : '' }}">
                                                <label for="programme">Programme</label>

                                                <select class="form-control"  name="programme" required="">
                                                    @foreach($programme as $item)
                                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>

                                                 @if ($errors->has('programme'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('programme') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="form-group {{ $errors->has('class') ? ' has-error' : '' }}">
                                                <label for="class">Class</label>

                                                <select id="class" class="form-control border-input" name="class" required>
                                                    <option value="b1">Business</option>
                                                    <option value="a1">General Arts 1</option>
                                                    <option value="a2">General Arts 2</option>
                                                    <option value="a3">General Arts 3</option>
                                                    <option value="s1">General Science</option>
                                                    <option value="h1">Home Economics</option>
                                                    <option value="v1">Visual Arts</option>
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
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Register Optional</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div> 



@stop                          