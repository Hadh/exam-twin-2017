@extends('layouts.app')
@section('content')

<h2> Create a jobOFfer </h2>

{!! Form::open(['action'=> 'JobOfferController@store', 'method'=> 'POST','enctype'=>'multipart/form-data']) !!}
<div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title','',['class'=> 'form-control', 'placeholder'=>'Title'])}}
</div>
<div class="form-group">
    {{Form::label('description','Description')}}
    {{Form::textarea('description','',[ 'class'=> 'form-control', 'placeholder'=>'Description'])}}
</div>
<div class="form-group">
    {{Form::label('date','Date')}}
    {{Form::date('date','',[ 'class'=> 'form-control', 'placeholder'=>'Date '])}}
</div>
<div class="form-group">
    {{Form::label('skills','Skills')}}
    {{Form::text('skills','',['class'=> 'form-control', 'placeholder'=>'Skills'])}}
</div>

<div class="form-group">
    {!! Form::Label('company_id', 'Company') !!}
    <select class="form-control" name="company_id">
        @foreach($companies as $company)
            <option value="{{$company->id}}">{{$company->name}}</option>
        @endforeach
    </select>
</div>


{{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
{!! Form::close() !!}



@endsection