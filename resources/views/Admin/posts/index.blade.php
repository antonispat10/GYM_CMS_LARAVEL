@extends('layouts.admin')


@section('content')


    <h1> Posts </h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>

        </tr>
        </thead>

        @if($posts)

            @foreach($posts as $post)

        <tbody>

        <tr>
            <td>{{$post->id}}</td>
            <td><img height="50" src="\{{$post->photo ? $post->photo: $post->photoPlaceholder()}}"></td>
            <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user ? $post->user->name : 'Antonis'}}</a></td>
            <td>{{$post->title}}</td>
            <td>{{str_limit($post->body,30)}}</td>
            <td>{{$post->created_at->diffForhumans()}}</td>
            <td>{{$post->updated_at->diffForhumans()}}</td>
        </tr>

        @endforeach
          @endif

        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">

            {{$posts->render()}}

        </div>
    </div>



    @stop