@extends('layouts.layout')

@section('page-name')
    Manage Parents
@endsection

@section('title')
    Admin |  Parents
@endsection

@section('sidebar')
    @include('partials.side-nav');
@stop

@section('content') 
	<div class="col-lg-12 col-md-7">

        <div class="card">
            <div class="header">
                <a class="btn pull-right btn-primary" href="{{ url('admin/parent/create') }}" > Parent <i class="fa fa-plus"></i> </a>
                <h4 class="title text-center">Parents</h4>
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
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($guardian as $element)
                                        	<tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $element->firstname. ' '. $element->surname.' '.$element->othername }}</td>
                                            <td>{{ $element->phone }}</td>
                                            <td>{{ $element->email }}</td>
                                            <td>
                                            	<a href="{{ route('parent.edit', [$element->id]) }}" class="label label-primary"> <i class="ti ti-pencil" title="Edit this Parent"></i></a>
                                            	<a href="{{ url('admin/parent/'.$element->id.'/delete') }}" class="label label-danger"> <i class="ti ti-trash" title="Delete this Parent"></i></a>
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