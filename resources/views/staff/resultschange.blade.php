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
	<div class="col-md-12 col-lg-12 col-sm-12">
        <div class="white-box">
            <h3 class="text-warning text-center">RESULT change requests</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>StudendID</th>
                        <th>C.A</th>
                        <th>EXAM SCORE</th>
                        <th>TOTAL</th>
                        <th>GRADE</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $element)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ strtoupper($element->studentid) }}</td>
                            <td class="">{{ $element->ca_score }}</td>
                            <td class="">{{ $element->exam_score }}</td>
                            <td class="">{{ $element->total }}</td>
                            <td class="">{{ $element->grade }}</td>
                            <td>
	                            <a class="label label-primary" href="{{ url('staff/result/change/'.$element->changeid.'/edit') }}">Take a look</a> 
	                            @if ($element->state == 'denied')
	                            	<p class="label label-danger">Denied</p> 
	                            @endif
	                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop