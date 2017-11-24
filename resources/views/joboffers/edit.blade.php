@extends('layouts.app')
@section('content')

    <h1>Edit JobOffer</h1>
    {!! Form::open(['action'=> ['JobOfferController@update', $job->id ], 'method'=> 'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title', $job->title ,['class'=> 'form-control', 'placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('description','Description')}}
        {{Form::textarea('description', $job->description ,[ 'class'=> 'form-control', 'placeholder'=>'Post Content'])}}
    </div>
    <div class="form-group">
        {{Form::label('date','Date')}}
        {{Form::date('date',$job->date,[ 'class'=> 'form-control', 'placeholder'=>'Date '])}}
    </div>
    <div class="form-group">
        {{Form::label('skills','Skills')}}
        {{Form::text('skills',$job->skills,['class'=> 'form-control', 'placeholder'=>'Skills'])}}
    </div>

    <div class="form-group">
        {!! Form::Label('company_id', 'Company') !!}
        <select class="form-control" name="company_id">
            @foreach($companies as $company)
                <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
        </select>
    </div>

    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection

