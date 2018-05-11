@extends('layouts.app')


@section('content')
<body>


<h3 class="text-center">{{ $day->name }}'s Program</h3>
<br />

    <div class="table-responsive">
    <table class="table thead-light " >
        <thead>
        <tr>
            <th>Exercise</th>
            <th>Set</th>
            <th>Reps</th>

        </tr>
        </thead>







        @foreach($exercises as $exercise)

            <tbody>
            <tr>

                    <td class="">{{
                    $exercise->exerciselists->name}}</td>



                <td class="">{{ $exercise->set}}</td>
                <td class="">{{ $exercise->reps}}</td>

            </tr>

            @endforeach

        </tbody>
    </table>
    </div>




</body>

    @stop