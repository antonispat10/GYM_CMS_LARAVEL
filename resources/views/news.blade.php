
@extends(($admin) ? 'layouts.admin' : 'layouts.app')


@section('content')









            @if($posts)

                @foreach($posts as $post)

                    <a href="{{route('post',$post->id)}}"><h3>{{$post->title}}</h3></a>

                    <!-- Author -->
                    <p class="lead">
                        by {{$post->user ? $post->user->name : 'Antonis'}}
                    </p>

                    <hr>

                    <!-- Date/Time -->
                    <p><span class="glyphicon glyphicon-time"></span>Posted {{$post->created_at->diffForHumans()}}</p>

                    <hr>

                    <!-- Preview Image -->
                    <img class="img-responsive"
                         style="max-height:450px;max-width:500px;"
                         src="{{$post->photo ? $post->photo: $post->photoPlaceholder()}}" alt="">

                    <hr>

                    <!-- Post Content -->
                    <p><?php $post->body ?></p>
                    <hr>





        @endforeach

        @endif
            <div class="text-center">
                {{$posts->links()}}

            </div>






@stop
