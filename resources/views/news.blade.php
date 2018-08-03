@extends(($admin) ? 'layouts.admin' : 'layouts.app')

@section('content')

    <h1>Posts</h1>

    @foreach($posts as $post)
        <div class="post">
            <div class="post-content">
                <a href="{{route('post', $post->id)}}">
                    <h4>{{$post->title}}</h4>
                </a>

                <!-- Preview Image -->
                <img class="img-responsive"
                     style="max-height:450px;max-width:500px;"
                     src="{{$post->photo ? $post->photo : $post->photoPlaceholder()}}" alt="">

                <!-- Post Content -->
                {!! $post->body !!}
            </div>

            <div class="post-footer">
                <div class="author">
                    <span class="fa fa-user-o"></span>&nbsp;

                    {{$post->user ? $post->user->name : 'Antonis'}}
                </div>

                <div class="publish-date">
                    <span class="fa fa-clock-o"></span>&nbsp;Posted {{$post->created_at->diffForHumans()}}
                </div>
            </div>
        </div>
    @endforeach

    <div class="text-center">
        {{$posts->links()}}
    </div>

@stop
