@extends('layouts.admin')


@section('content')

    @include('includes.tinyeditor')
    <h1> Create Posts </h1>

    <div class="row">
        @include('error')
    </div>



    {!! Form::open(['method'=>'POST', 'action'=> 'AdminPostsController@store','files'=>true]) !!}


    <div class= "form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control'])!!}
    </div>


    <div class= "form-group">
        {!! Form::label('photo', 'Photo:') !!}
        {!! Form::file('photo', null ,
        ['class'=>'form-control'])!!}
    </div>

    <div class= "form-group">
        {!! Form::label('body', 'Description:') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3])!!}
    </div>




    <div class="form-group">

        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}

    </div>

    {!! Form::close() !!}





    <div class="row">

        @include('includes.form_error')


    </div>




@stop