@extends('layouts.admin')


@section('content')

    <script src="{{asset('js/jq.js') }}"></script>

<h1> Create Users </h1>

    @include('error')

    <?php if(session('user_created')): ?>
    <div class="alert alert-success">
        <?php echo session('user_created'); ?>

    </div>
    <?php endif; ?>

{!! Form::open(['method'=>'POST', 'action'=>
'AdminUsersController@store','files'=>true]) !!}


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







        {!! Form::close() !!}

<div class="form-group">

    {!! Form::submit('Create User', ['class'=>'btn btn-primary'])
     !!}

</div>




@stop
