@extends('layouts.layout')

@section('page-name')
    Manage
@endsection

@section('title')
    Admin | Parent
@endsection

@section('sidebar')
    @include('partials.side-nav');
@stop

@section('content') 
    <div class="col-lg-4">
       <div class="card card-user">
                    <div class="image">
                        <img alt="..." src="{{ url('assets/img/background.jpg') }}">
                    </div>
                    <div class="content">
                        <div class="author">
                          <img alt="..." class="avatar border-white" src="{{ url('assets/img/faces/face-0.jpg') }}">
                          <h4 class="title">{{ $parent->firstname. ' '. $parent->surname.' '.$parent->othername }}<br>
                             <a href="#"><small>{{  $parent->email }}</small></a>
                          </h4>
                        </div>
                        <p class="description text-center">
                            Phone : <code> {{ $parent->phone }}</code>
                        </p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1">
                                <h5>{{ $parent->gender }}<br><small>Gender</small></h5>
                            </div>
                            <div class="col-md-4">
                                <h5>{{ $wardcount }}<br><small>Wards</small></h5>
                            </div>
                            <div class="col-md-3">
                                <h5>{{ $parent->group }}<br><small>Group</small></h5>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
	<div class="col-lg-8">

        <div class="card">
            <div class="header">

                <h4 class="title text-left">{{ $parent->firstname.'\'s wards'}}</h4>
            </div>
            <div class="content">
            <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            @if ($wardcount != 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>StudentID</th>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                           @foreach ($wards as $element)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ strtoupper($element->studentid) }}</td>
                                            <td>{{ $element->firstname. ' '. $element->surname.' '.$element->othername }}</td>
                                            <td>
                                             @php
                                                switch ($element->class) {
                                                    case 's1':
                                                        echo 'Science 1';
                                                        break;
                                                    case 'a1':
                                                        echo 'Arts 1';
                                                        break;
                                                    case 'a2':
                                                        echo 'Arts 2';
                                                        break;
                                                    case 'a3':
                                                        echo 'Arts 3';
                                                        break;
                                                    case 'h1':
                                                       echo 'Home Economics';
                                                        break;                                 
                                                    default:
                                                        echo 'Business';
                                                        break;
                                                }
                                               @endphp

                                            </td>
                                            <td>
                                                
                                                @if ($element->state == 'pending')
                                                    <a href="{{ url('admin/parent/'.$element->id.'/confirm') }}" class="label label-success"> Confirm</a>
                                                @else
                                                    <a href="{{ url('admin/parent/'.$element->id.'/deny') }}" class="label label-danger"> Deny</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                 @else
                                <div class="text-center"> <p>Requests Yet</p></div>
                              @endif 
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
            </div>
        </div>
    </div>
@stop