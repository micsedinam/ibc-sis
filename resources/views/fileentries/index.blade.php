@extends('layouts.layout')
@section('content')
 
    <form action="{{route('addentry', [])}}" method="post" enctype="multipart/form-data">
    	{{ csrf_field() }}
        <input type="file" name="filefield">
        <input type="submit">
    </form>
 
 <h6> Pictures list</h6>
 <div class="row">
        <ul class="thumbnails">
 @foreach($entries as $entry)
            <div class="col-md-2">
                <div class="thumbnail">
                    <img src="{{route('getentry', $entry->filename)}}" alt="ALT NAME" class="img-responsive" />
                    <div class="caption">
                        <p>{{$entry->original_filename}}</p>
                    </div>
                </div>
            </div>
 @endforeach
 </ul>
 </div>
 
@endsection