@extends('layouts.layout')

@section('page-name')
    Create Notice
@endsection

@section('title')
    Admin | Create Notice
@endsection

@section('sidebar')
    @include('partials.side-nav')
@stop

@section('content')

        <div class="col-lg-8  col-lg-offset-2 col-md-7">
                        <div class="card">
                            <div class="header">
                                <a href="{{url('admin/notices')}}" class="btn btn-info">Manage Notices</a>
                                <h4 class="title text-center">Create Notice</h4>
                            </div>
                            <div class="content">
                                <form role="form" method="POST" action="{{ url('admin/notice') }}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group {{ $errors->has('post_title') ? ' has-error' : '' }}">
                                                <label for="post_title">Title</label>
                                                <input type="text" class="form-control border-input" placeholder="Title of notice goes here" name="post_title" value="{{ old('post_title') }}">

                                                @if ($errors->has('post_title'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('post_title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
                                                <label for="date">Date</label>
                                                <input type="date" class="form-control border-input" name="date" value="{{ old('date') }}">

                                                 @if ($errors->has('date'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('date') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('post_category') ? ' has-error' : '' }}">
                                                <label for="post_category">Category</label>
                                                <input type="text" class="form-control border-input" placeholder="memo, general notice, etc" name="post_category" value="{{ old('post_category') }}">

                                                 @if ($errors->has('post_category'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('post_category') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('group') ? ' has-error' : '' }}">
                                                <label for="group">Group</label>

                                                <select id="group" class="form-control border-input" name="group" value="{{ old('group') }}" required>
                                                    <option>Select</option>
                                                    <option>Business</option>
                                                    <option>General Arts</option>
                                                    <option>General Science</option>
                                                    <option>Home Economics</option>
                                                    <option>Visual Arts</option>
                                                    <option>Staff</option>
                                                    <option>Guardian</option>
                                                    <option>General Notice</option>
                                                </select>

                                                 @if ($errors->has('group'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('group') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group {{ $errors->has('message') ? ' has-error' : '' }}">
                                                <label for="">Message</label>
                                                <textarea rows="5" class="form-control border-input" placeholder="Here can be your description" name="message" value="{{ old('message') }}" required></textarea>

                                                 @if ($errors->has('message'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('message') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Create Notice</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
@stop