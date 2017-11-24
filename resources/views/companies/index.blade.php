@extends('layouts.app')
@section('content')

    <h3>Companies and their job offers</h3>

    @foreach($companies as $company)

        <div class="well">
            <a href="/companies/{{$company->id}}"> Company Name : {{$company->name}}</a> <br>
        </div>
        <ul>
            @foreach($company->joboffers as $g)
                <li>{{$g->title}}</li>
            @endforeach
        </ul>

    @endforeach

@endsection