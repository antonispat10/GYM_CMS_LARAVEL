@extends('layouts.admin')


@section('content')

    <script src="{{asset('js/jq.js') }}"></script>

    <h1> Add type of exercise (e.g. Push ups) </h1>

    <div class="row">
        @include('error')
    </div>


    <?php if(session('exercise_created')): ?>
    <div class="alert alert-success">
        <?php echo session('exercise_created'); ?>

    </div>
    <?php endif; ?>

    {!! Form::open(['method'=>'POST', 'action'=> 'AdminExerciseListController@store','files'=>true]) !!}


    <div class= "form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control'])!!}
    </div>





    <div class="form-group">

        {!! Form::submit('Create Exercise', ['class'=>'btn btn-primary']) !!}

    </div>

    {!! Form::close() !!}


    </div>




@stop
