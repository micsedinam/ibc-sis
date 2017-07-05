@extends('layouts.layout')

@section('page-name')
    Ward Bill
@endsection

@section('title')
    Guardian | Ward Bill
@endsection

@section('sidebar')
    @include('partials.parent-nav');
@stop

@section('content')

                    <div class="col-lg-8  col-lg-offset-2 col-md-7">
                        <div class="card">
                            <div class="header">
                                {{-- <a href="{{url('admin/manage-results')}}"><i class="ti-angle-double-left"></i>Back</a> --}}
                                <h4 class="title text-center">Check Student Bill</h4>
                            </div>
                            <div class="content">
                                <form role="form" method="POST" action="{{ url('guardian/fee') }}">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="form-group {{ $errors->has('studentid') ? ' has-error' : '' }}">
                                                <label for="studentid">Student ID</label>
                                                <input type="text" class="form-control border-input" name="studentid" value="{{ old('studentid') }}">

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
                        </div>
                    </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center text-warning">Ward's Bill</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                @foreach($student as $item)
                                    <h5 class="text-center">{{$item->firstname}} {{$item->surname }}</h5>
                                    <h5 class="text-center">Student ID: {{$item->studentid}} </h5>
                                    <h5 class="text-center">Programme: {{$item->programme}} </h5>
                                @endforeach    
                            </div>
                             <div class="row text-center">
                                @foreach($bill as $item)
                                    <div class="col-md-6">
                                        <h6 class="box-title text-info text-center">ACADEMIC YEAR: {{$item->academicyear}}</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="box-title text-danger text-center">TERM: {{$item->term}}</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                        <p class="text-info">Amount Due: <br>GHC {{$item->amt_due}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-blue">Amount Paid: <br>GHC {{$item->amt_paid}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-danger">Amount Outstanding: <br>GHC {{$item->amt_rem}}</p> 
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="white-box">

                                    <h3 class="text-warning text-center">STUDENT BILL INFORMATION</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>DESCRIPTION</th>
                                                <th>AMOUNT CHARGED (GHC)</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($bills as $element)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $element->description }}</td>
                                                    <td>{{ $element->amount }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@stop