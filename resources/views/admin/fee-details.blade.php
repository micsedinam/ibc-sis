@extends('layouts.layout')

@section('page-name')
    Fee Details 
@endsection

@section('title')
    Admin | Fee Details 
@endsection

@section('sidebar')
    @include('partials.side-nav')
@stop

@section('content')

                    <div class="col-lg-8  col-lg-offset-2">
                        <div class="card">
                            <div class="header">
                                <a href="{{url('admin/fees')}}"><i class="ti-angle-double-left"></i>Back</a>
                                <h4 class="title text-center">Fee Details</h4>
                            </div>
                            <div class="content">
                                <form action="detailsImport" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="row text-center">
                                        <div class="form-group">
                                            <label for="material" class="col-md-12">Select File (.csv)</label>
                                                <div class="col-lg-6 col-lg-offset-4">
                                                    <input type="file" name="fees">
                                                </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Import Fee Details</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
@stop