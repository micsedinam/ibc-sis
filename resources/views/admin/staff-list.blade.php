@extends('layouts.layout')

@section('page-name')
    Manage Staff
@endsection

@section('title')
    Admin |  Staff
@endsection

@section('sidebar')
    @include('partials.side-nav');
@stop

@section('content') 
	<div class="col-lg-12 col-md-7">

        <div class="card">
            <div class="header">
                 <a class="btn pull-right btn-primary" href="{{ url('admin/staff/create') }}" > Staff <i class="fa fa-plus"></i></a>
                <h4 class="title text-center">Staff</h4>
            </div>
            <div class="content">
            	<div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff as $element)
                                        	<tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $element->firstname. ' '. $element->surname.' '.$element->othername }}</td>
                                            <td>{{ $element->phone }}</td>
                                            <td>{{ $element->email }}</td>
                                            <td><p class="label text-muted label-invese"> {{ strtoupper($element->status) }}</p></td>
                                            <td>
                                                @if ($element->status === 'active')
                                                    
                                                <a href="{{ url('admin/staff/'.$element->id.'/edit') }}" class="label label-primary">Deactivate</a>
                                                @else
                                                <a href="{{ url('admin/staff/'.$element->id.'/edit') }}" class="label label-primary">Activate</a>
                                                @endif
                                            	<a href="{{ url('admin/staff/'.$element->id.'/delete') }}" class="label label-danger"> <i class="ti ti-trash" title="Delete this Staff"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
            </div>
        </div>
    </div>
@stop