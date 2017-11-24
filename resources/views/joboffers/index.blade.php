@extends('layouts.app')
@section('content')

    <h3>List of All JobOffers</h3>

    @foreach($joboffers as $job)

        <div class="well">
            <a href="/joboffers/{{$job->id}}">  Name : {{$job->title}}</a> <br>
            <a href="/joboffers/{{$job->id}}/add_to_fav" class="btn btn-primary"> Add to Favourites</a>
        </div>

    @endforeach



@endsection