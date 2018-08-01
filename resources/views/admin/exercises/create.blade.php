@extends('layouts.admin')


@section('content')

    <script src="{{asset('js/jq.js') }}"></script>

    <?php if(session('failed')): ?>
    <div class="alert alert-danger">
        <?php echo session('failed'); ?>

    </div>
    <?php endif; ?>

<h1> Create Exercises for the user </h1>

    <div class="row">
        @include('error')
    </div>


{!! Form::open(['method'=>'POST', 'action'=>
'AdminExercisesController@store','files'=>true]) !!}



    <div class="form-group">

        {!! Form::label('user_id', 'User Name') !!}
        {!! Form::select('user_id', [''=>'Choose
        User'] + $users ,null,
        ['class'=>'form-control'])!!}

    </div>


    <div class="form-group">

        {!! Form::label('exercise_list_id', 'Exercise Name') !!}
        {!! Form::select('exercise_list_id', [''=>'Choose
        Exercise'] + $exercise_list ,null,
        ['class'=>'form-control'])!!}

    </div>

    <div class="form-group">

        {!! Form::label('day_id', 'Choose which day') !!}
        {!! Form::select('day_id[]', [''=>'Choose
        Day'] + $days ,null, ['class'=>'form-control',
        'multiple'=>'multiple'])!!}


    </div>


    <div class= "form-group">
        {!! Form::label('set', 'Set:') !!}
        {!! Form::text('set', null,
        ['class'=>'form-control'])!!}
    </div>

    <div class= "form-group">
        {!! Form::label('reps', 'Reps:') !!}
        {!! Form::text('reps', null,
        ['class'=>'form-control'])!!}






<div class="form-group">

    {!! Form::submit('Create Exercise', ['class'=>'btn btn-primary'])
     !!}

</div>

{!! Form::close() !!}


@stop
