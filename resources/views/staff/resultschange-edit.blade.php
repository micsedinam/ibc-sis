@extends('layouts.layout')

@section('page-name')
    Manage Results Changes  
@endsection

@section('title')
    Staff | Results 
@endsection

@section('sidebar')
    @include('partials.staff-nav')
@stop

@section('content') 
	<div class="row">
    <div class="col-md-6">
        <div class="card">
            <p class="text-center"><strong>Complaint </strong> </p>
            <blockquote>
                <p>{{ $result->request }}</p>
                <small>Student ID
                    <cite title="Source Title"> <code>{{ $result->studid }}</code></cite>
                </small>
            </blockquote>
            <hr>
            @if ($result->state === 'pending')
                <p class="text-center"><a href="{{ url('staff/result/change/'.$result->id.'/deny') }}" class=" text-center label label-warning">Decline changes</a></p>
            @else
                <p class="text-center"> <span class=" label label-info">{{ $result->state }}</span></p>
            @endif
        </div>
    </div>
    @if ($result->state === 'pending')
         <div class="col-md-6">
         <div class="card">
             <form action="{{ url('staff/result/change/'.$result->id) }}" method="POST">
             {{ csrf_field() }}
                 {{method_field('PATCH')}}
                 <div class="form-group{{ $errors->has('ca_score') ? ' has-error' : '' }}">
                    <label for="ca_score" class="col-md-4 control-label">Class Score</label>

                    <div class="col-md-6">
                        <input id="ca_score" type="text" onkeypress="validate()" class="form-control" name="ca_score" value="{{ $result->ca_score }}" required autofocus>

                        @if ($errors->has('ca_score'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ca_score') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                 <div class="form-group{{ $errors->has('exam_score') ? ' has-error' : '' }}">
                    <label for="exam_score" class="col-md-4 control-label">Exam Score</label>

                    <div class="col-md-6">
                        <input id="exam_score" type="text"  onkeypress="validate()" class="form-control" name="exam_score" value="{{ $result->exam_score }}" required >

                        @if ($errors->has('exam_score'))
                            <span class="help-block">
                                <strong>{{ $errors->first('exam_score') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                 
                 <div class="text-center">
                      <button type="submit" class="btn btn-primary"> Update</button>
                 </div>
             </form>
             <div class="clearfix"></div>
         </div>
     </div> 
     @else
        <div class="col-md-6">
            <div class="card">
                <h4 class="text-center">Admins response</h4>
                <p class="text-center"> <span class="label label-info">{{ $response->state }}</span></p>
            </div>
        </div>  
     @endif 
    </div>
@stop