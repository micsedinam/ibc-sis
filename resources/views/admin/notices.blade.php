@extends('layouts.layout')

@section('page-name')
    Manage Notices
@endsection

@section('title')
    Admin | Manage Notices
@endsection

@section('sidebar')
    @include('partials.side-nav')
@stop

@section('content')

        <div class="rows">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading text-center"><h6 class="text-warning">Manage Notices</h6></div>
                        <div class="panel-body">
                            <div class="row col-md-12">
                               <a href="{{url('admin/notice')}}"><i class="ti-angle-double-left">Back</i></a> 
                            </div>
                            <hr>
                            @foreach($notice as $item)
                                <article class="post">
                                    <div class="#">
                                        <h6 class="#">Post Date: {{$item->date}}</h6>
                                        <h6 class="box-title text-info">Category: {{$item->post_category}}</h6>
                                        <h6 class="box-title text-warning">Group: {{$item->group}}</h6>
                                        <h6 class="box-title">Title: {{$item->post_title}}</h6>
                                        <p><h6 class="box-title text-dark">Message: </h6>{{$item->message}}</p>
                                    </div>
                                        <div class="interaction">
                                            <a href="{{url('admin/notice/'.$item->id.'/edit')}}"><i class="ti-pencil-alt"></i></a>
                                            <a href="{{url('admin/notice/'.$item->id.'/delete')}}"><i class="ti-close text-danger"></i></a>
                                        </div>
                                </article>
                                <hr>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
@stop