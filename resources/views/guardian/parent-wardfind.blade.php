@extends('layouts.layout')

@section('page-name')
    Wards
@endsection

@section('title')
    Guardian | Wards
@endsection

@section('sidebar')
    @include('partials.parent-nav');
@stop

@section('content') 
	<div class="col-lg-4">
       <div class="card">
       	 <form role="form" method="POST" action="{{ url('guardian/ward/find') }}">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group {{ $errors->has('studentid') ? ' has-error' : '' }}">
                        <label for="studentid">Student ID</label>
                        <input type="text" class="form-control border-input" required name="studentid" value="{{ old('studentid') }}">

                         @if ($errors->has('studentid'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('studentid') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
                    </div> 
            <div class="clearfix"></div>
        </form>
       </div>
       <div class="card">
            <div class="header">
                <h4 class="title">Search Result</h4>
            </div>
            <div class="content">
        		<ul class="list-unstyled team-members">
        		@if ($findcount === 0)
                	<p class="text-center"><i class="fa fa-search"></i>No search results</p>
				@else 
					<li>
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="avatar">
                                    <img alt="Circle Image" class="img-circle img-no-padding img-responsive" src="{{ url('assets/img/faces/face-0.jpg') }}">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                {{ $find->firstname. ' '. $find->surname.' '.$find->othername }}
                                <br>
                                <span class="text-muted"><small>{{ $find->studentid }}</small></span>
                            </div>

                            <div class="col-xs-3 text-right">
                                <a href="{{ url('guardian/ward/'.$find->id.'/add') }}" class="btn btn-sm btn-success btn-icon"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </li>
                @endif
                    
                </ul>
            </div>
        </div>
                  
    </div>
	<div class="col-lg-8">

        <div class="card">
            <div class="header">

                <h4 class="title text-left">{{'s wards'}}</h4>
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
                                                <p class="label label-inverse">{{ $element->state }} </p>
                                                <a href="{{ url('guardian/ward/'.$element->id.'/delete') }}" class="label label-danger"> Delete</a>
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