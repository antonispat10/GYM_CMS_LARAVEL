@extends('layouts.admin')


@section('content')

    <script src="{{asset('js/jq.js') }}"></script>

    <div class="row">
        @include('error')
    </div>


    {!! Form::model($user,['method'=>'PATCH', 'action'=>
    ['UserPanelController@update_profile_per_user', $user->id],'files'=>true]) !!}


    <div class= "form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null,
        ['class'=>'form-control', 'disabled'])!!}
    </div>

    <div class= "form-group">
        {!! Form::label('surname', 'Surname:') !!}
        {!! Form::text('surname', null, ['class'=>'form-control', 'disabled'])!!}
    </div>




    <div class= "form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class'=>'form-control'])!!}
    </div>



        <div class= "form-group">
            {!! Form::label('weight', 'Weight:') !!}
            {!! Form::text('w', null,
            ['class'=>'form-control'])!!}




            <div class="form-group">

                {!! Form::submit('Edit User', ['class'=>'btn
                btn-primary'])
                 !!}

            </div>

    {!! Form::close() !!}


@stop
