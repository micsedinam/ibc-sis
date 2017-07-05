@extends('layouts.layout')

@section('page-name')
    Create Post
@endsection

@section('title')
    Admin | Create Post
@endsection

@section('sidebar')
    @include('partials.side-nav')
@stop

@section('content')

        <div class="col-lg-8  col-lg-offset-2 col-md-7">
            <div class="card">
                <div class="header">
                    <h4 class="title text-center">Create Post</h4>
                </div>
                <div class="content">
                    <form role="form" method="POST" action="{{ url('admin/forum') }}">
                        {{ csrf_field()}}

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group {{ $errors->has('forum_title') ? ' has-error' : '' }}">
                                    <label for="forum_title">Title</label>
                                    <input type="text" class="form-control border-input" placeholder="Title of post goes here" name="forum_title" value="{{ old('forum_title') }}">

                                    @if ($errors->has('forum_title'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('forum_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('forum_category') ? ' has-error' : '' }}">
                                    <label for="forum_category">Category</label>
                                    <input type="text" class="form-control border-input" placeholder="memo, general notice, etc" name="forum_category" value="{{ old('forum_category') }}">

                                     @if ($errors->has('forum_category'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('forum_category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('forum_body') ? ' has-error' : '' }}">
                                    <label for="">Message</label>
                                    <textarea rows="2" class="form-control border-input" placeholder="Here can be your description" name="forum_body" value="{{ old('forum_body') }}" required></textarea>

                                     @if ($errors->has('forum_body'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('forum_body') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">Create Post</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>


        <div class="rows">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center text-warning"><h6>What others are saying</h6></div>
                        <div class="panel-body">
                            @foreach($post as $item)
                                <article class="post">
                                    <h5 class="text-success"><strong class="text-success">TITLE:</strong> {{ $item->forum_title }}</h5>
                                    <p>{{ $item->forum_body }}</p>
                                        <div class="info">
                                            Posted by {{ $item->admin->firstname }} on {{ $item->created_at }}
                                        </div>
                                        <div class="interaction">
                                            <a href="#"><i class="ti-thumb-up"></i></a> |
                                            <a href="#"><i class="ti-pencil-alt"></i></a> |
                                            <a href="#"><i class="ti-comment-alt"></i></a>
                                        </div>
                                </article>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
@stop