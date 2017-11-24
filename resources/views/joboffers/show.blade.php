@extends('layouts.app')
@section('content')
    <br>
    <br>
    <a href="/joboffers" class="btn btn-default">Go Back</a>

    <h3>Title : {{$job->title}}</h3>
    <div> Description :{{ $job->description }}</div>
    <div> Date :{{ $job->date }}</div>
    <div> Skills:{{ $job->skills }}</div>
    <hr>
    @if(!Auth::guest())



<a href="/joboffers/{{$job->id}}/edit" class="btn btn-primary">Edit</a>


{!! Form::open(['action'=>['JobOfferController@destroy',$job->id],'method'=>'POST','class'=>'pull-right']) !!}
{{Form::hidden('_method','DELETE')}}
{{Form::submit('Delete',['class'=>'btn btn-danger btn-delete'])}}
{!! Form::close() !!}


    @endif
@section('scripts')
        <script src="{{ asset('js/alert.js') }}"></script>
@endsection
@endsection