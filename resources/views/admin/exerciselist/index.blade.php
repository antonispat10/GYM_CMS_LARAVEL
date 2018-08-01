@extends('layouts.admin')

@section('content')


    <h1>  Exercise List </h1>
    <div class="row">
        @include('error')
    </div>

    <br>

    {!! Form::open(['method'=>'POST', 'action'=>
'AdminExerciseListController@exerciselist_delete_array','files'=>true]) !!}



    {{csrf_field()}}

    {{method_field('delete')}}

    <div class="form-group">
        <select name="checkBoxArray" id="" class="er form-inline col-sm-2 ">

            <option class="form-control" value="">Delete
                selected</option>

        </select>

    </div>
    <div class="form-group">
        <input type="submit" name="delete_all" value="Delete" class="btn btn-danger">
    </div>




    <table class="table table-striped">
        <thead>
        <tr>
            <th><input type="checkbox" id="options" class="sas"></th>

        </tr>
        </thead>
    </table>

    <table class="table table-striped table-responsive">
        <thead>




            @foreach($exerciselists as $index=>$exerciselist)


                    <br />


                    <table class="table table-striped table-responsive">
                        @if($index==0)
                        <tr class="list-group">
                           <h3> ExerciseList Name </h3>

                        </tr>
                        @endif
                        <tbody>

                        <tr class="list-group">
                            <td><input class="checkBoxes"type="checkbox" name="checkBoxArray[]" value="{{$exerciselist->id}}"></td>

                            <td style="width:200px;"><h5>{{$exerciselist->name}}</h5></td>





                            <input type="hidden"  name="exerciselist"value="{{$exerciselist->id}}">

                            <td><div class="form-group"> <input type="submit" name="delete_single" value="Delete" class="btn btn-danger"> </div></td>

                        </tr>
                        </tbody>
                    </table>







            @endforeach


        {!! Form::close() !!}





        @stop

        @section('scripts')

            <script>

                $(document).ready(function(){



                    $('#options').click(function(){

                        if(this.checked){

                            $('.checkBoxes').each(function(){

                                this.checked = true;

                            });
                        }else {

                            $('.checkBoxes').each(function(){

                                this.checked = false;

                            });

                        }

                    });

                });





            </script>


@stop

