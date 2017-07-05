@extends('layouts.layout')

@section('page-name')
    Update Student Bill
@endsection

@section('title')
    Admin | Update Student Bill
@endsection

@section('sidebar')
    @include('partials.side-nav');
@stop

@section('content')

        <div class="col-lg-8  col-lg-offset-2 col-md-7">
                        <div class="card">
                            <div class="header">
                                <a href="{{url('admin/feelist')}}"><i class="ti-angle-double-left"></i>Back</a>
                                <h4 class="title text-center">Update Student Bill</h4>
                            </div>
                            <div class="content">
                                <form role="form" method="POST" action="{{ url('admin/fees/'.$fees->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH')}}

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('studentid') ? ' has-error' : '' }}">
                                                <label for="studentid">Student ID</label>
                                                <input type="text" class="form-control border-input" name="studentid" value="{{ $fees->studentid }}">

                                                 @if ($errors->has('studentid'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('studentid') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('academicyear') ? ' has-error' : '' }}">
                                                <label for="academicyear">Academic Year</label>
                                                <input type="text" class="form-control border-input" name="academicyear" value="{{ $fees->academicyear }}">

                                                 @if ($errors->has('academicyear'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('academicyear') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('term') ? ' has-error' : '' }}">
                                                <label for="term">Term</label>
                                                <input type="text" class="form-control border-input" placeholder="Blankson" name="term" value="{{ $fees->term }}">

                                                 @if ($errors->has('term'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('term') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('amt_due') ? ' has-error' : '' }}">
                                                <label for="amt_due">Amount Due</label>
                                                <input type="integer" class="form-control border-input" name="amt_due" value="{{ $fees->amt_due }}" required>

                                                 @if ($errors->has('amt_due'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('amt_due') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('amt_paid') ? ' has-error' : '' }}">
                                                <label for="amt_paid">Amount Paid</label>
                                                <input type="integer" class="form-control border-input" name="amt_paid" value="{{ $fees->amt_paid }}" required>

                                                 @if ($errors->has('amt_paid'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('amt_paid') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('amt_rem') ? ' has-error' : '' }}">
                                                <label for="amt_rem">Amount Outstanding</label>
                                                <input type="integer" class="form-control border-input" disabled name="amt_rem" value="{{ $fees->amt_rem }}" required>

                                                 @if ($errors->has('amt_rem'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('amt_rem') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Bill</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
@stop