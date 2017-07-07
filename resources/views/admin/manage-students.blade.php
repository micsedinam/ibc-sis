@extends('layouts.layout')

@section('page-name')
    Manage Students
@endsection

@section('title')
    Admin | Manage Students
@endsection

@section('sidebar')
    @include('partials.side-nav')
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading text-center text-warning"> <h3 class="text-warning text-center">EXPORT CLASS LIST</h3></div>
                <div class="panel-body">
                    <div class="col-md-10">
                        <a href="{{URL::to('admin/student')}}" class="btn btn-info"><i class="ti-plus"> Student</i></a>
                    </div>
                    <div class="col-md-12 col-md-offset-1">
                        <h6 class="box-title text-center">Sort By Class</h6>
                        <form role="form" method="POST" action="{{ url('admin/studentList') }}">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control"  name="class" required="">
                                            <!-- <option>Select</option> -->
                                            @foreach($class as $item)
                                                <option value="{{$item->class}}">{{$item->class}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                            <input type="number" pattern=".{6}" onkeypress="validate()" placeholder="Format: 017018" name="academicyear" class="form-control border-input" value="{{ old('academicyear') }}" required>
                                    </div>
                                </div>

                                <div class=" col-md-4 text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Export Class List</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop            