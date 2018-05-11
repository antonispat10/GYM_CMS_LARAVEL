@extends('layouts.admin')


@section('content')

    @include('includes.tinyeditor')
    <h1> Create Users </h1>
    <script src="{{asset('js/jq.js') }}"></script>



    <div class="row">

        @include('error')


    </div>


    {!! Form::open(['method'=>'POST', 'action'=> 'AdminUsersController@store','files'=>true]) !!}



    <div class= "form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control'])!!}
    </div>


    <div class= "form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', null, ['class'=>'form-control'])!!}

    </div>




    <div class= "form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class'=>'form-control'])!!}
    </div>

    <div class= "form-group">
        {!! Form::label('surname', 'Surname:') !!}
        {!! Form::text('surname', null, ['class'=>'form-control'])!!}
    </div>



    <div class= "form-group">
        {!! Form::label('telephone', 'Telephone:') !!}
        {!! Form::text('telephone', null,
        ['class'=>'form-control'])!!}
    </div>



    <div class= "form-group">
        {!! Form::label('weight', 'Weight:') !!}
        {!! Form::text('weight', null,
        ['class'=>'form-control'])!!}

    </div>

    <div class= "form-group">
        {!! Form::label('address', 'Address:') !!}
        {!! Form::text('address', null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">

        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}

    </div>


    {!! Form::close() !!}









@stop