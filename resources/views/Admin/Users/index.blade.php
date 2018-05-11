@extends('layouts.admin')


@section('content')


    <h1> Users </h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Weight</th>
            <th>Telephone</th>
            <th>Address</th>
            <th>User</th>
            <th>Author</th>
            <th>Admin</th>
            <th>Assign Role</th>
            <th>Edit</th>
            <th>Program</th>

        </tr>
        </thead>



        @if($users)

            @foreach($users as $user)

                <tbody>

                <tr style="height:50px;">
                    {!! Form::open(['method'=>'POST', 'action'=>
'AdminUsersController@postAdminAssignRoles','files'=>true]) !!}
                    <input type="text" name="id"
                          hidden value="{{$user->id}}">
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->surname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->weight ? $user->weight->count : 'unknown'}}</td>
                    <td>{{$user->telephone}}</td>
                    <td>{{$user->address}}</td>
                    <td><input type="checkbox" {{ $user->hasAnyRole
                    ('User') ? 'checked' : '' }} name="role_user">
                    </td>
                    <td><input type="checkbox" {{ $user->hasAnyRole
                    ('Author') ? 'checked' : '' }}
                        name="role_author"> </td>
                    <td><input type="checkbox" {{ $user->hasAnyRole
                    ('Admin') ? 'checked' : '' }} name="role_admin">
                    </td>
                    <td>

                        {!! Form::submit('Assign Role',
                        ['class'=>'btn btn-primary'])
    !!}


                        {!! Form::close() !!}
                    </td>
                    {{--<td>{{$user->weight->count}}</td>--}}
                    <td><a href="{{route('admin.users.edit',
                    $user->id)}}"/>Edit</td>
                    <td><a href="{{route('admin_exercises_edit_per_user',$user->id)
                    }}"/>Program</td>

                </tr>

                @endforeach
                @endif

                </tbody>
    </table>

    <div class="row">

    </div>



@stop