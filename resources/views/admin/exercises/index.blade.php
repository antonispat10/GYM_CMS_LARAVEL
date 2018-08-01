@extends('layouts.admin')

@section('content')


    <h1> User {{$user->name}} Exercises </h1>
    <input name="user_id" value="{{$user->id}}"hidden>
    <div class="row">
        @include('error')
    </div>

    <br>

    {!! Form::open(['method'=>'POST', 'action'=>
'AdminExercisesController@exercises_delete_array','files'=>true]) !!}



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


  <?php  $count=0; ?>
                @foreach($days as $day)

                    <tr class="list-group"><h3 class="text-center">{{$day->name}} </h3></tr>

                    @foreach($exercises as $exercise)
                        @if($day->id == $exercise->day_id)
                            <h3 class="text-center">
<!--                             --><?php //  $day_id = $exercise->day_id;
//
//                                            if($day_id!=$prev)
//                                            {
//                                echo  "<tr class=\"list-group\">" ."<h3 class=\"text-center\">" .$day->name ."</h3>" ."</tr>";
//
//                                             }
//$prev = $exercise->day_id;
//                                 ?>


                            </h3>

                            <br />


                            <table class="table table-striped table-responsive">
                                <thead>
                                <tr class="list-group">
                                    <th></th>
                                    <th>Exercise Name</th>
                                    <th>Added on</th>

                                </tr>
                                </thead>
<tbody>

<tr class="list-group">
                            <td><input class="checkBoxes"type="checkbox" name="checkBoxArray[]" value="{{$exercise->id}}"></td>

                            <td style="width:200px;">{{$exercise->exerciselists->name}}</td>

                       <td>{{$exercise->created_at ? $exercise->created_at : 'no date' }} </td>




                            <input type="hidden"  name="exercise"value="{{$exercise->id}}">

                            <td><div class="form-group"> <input type="submit" name="delete_single" value="Delete" class="btn btn-danger"> </div></td>

                        </tr>
</tbody>
                    </table>






                        @endif

                        @endforeach
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
        console.log('ss');





    </script>


@stop

