@extends('layouts.app')

@section('content')

    <div class="first-body col-lg-12">
        <div class="">

            <div class="first-body col-lg-9">
                <div class="panel">

                    <div id="myCarousel" class="carousel slide  " data-ride="carousel" >

                    <!-- Indicators -->
                        <ol class="carousel-indicators">

                            @foreach($posts as $index => $post)

                                @if($index < 3)

                                    <li data-target="#myCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>

                                @endif

                            @endforeach

                        </ol>

                        <div class="carousel-inner">
                            @foreach($posts as $index => $post)

                                @if($index < 3)

                                    <div class="{{ $index == 0 ? 'active item' : 'item' }}  ">
                                        <img class="img-responsive carouselimg" style="
                                    height:400px; width:100%;"
                                              src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400' }}">

                                        <div class="carousel-caption">
                                            <h3><a href="{{route('home.post',$post->slug)}}">{{$post->title}}</a></h3>
                                        </div>

                                    </div>

                                @endif

                            @endforeach
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <div class="panel-body">

                        <div class="ll">
                            @foreach($posts as $index => $post)

                                @if($index > 2)

                                    <div class="lll col-lg-4">

                                        <!-- Preview Image -->
                                        <a href="{{route('home.post', $post->slug)}}">  <img class="img-responsive pic-index"  src="{{$post->photo ? $post->photo->file : $post->photoPlaceholder()}}" alt=""> </a>

                                        <hr>

                                        <h4 style="font-size:17px;"> <a href="{{route('home.post', $post->slug)}}"><?php echo str_limit($post->title,70)?> </a></h4>

                                        <!-- Author -->
                                        <p class="lead" style="font-size:16px;">
                                            by <a href="{{route('home.post', $post->slug)}}">{{$post->user ? $post->user->name : "no user" }}</a>
                                        </p>

                                        <hr>

                                        <!-- Date/Time -->
                                        <p><span class="glyphicon glyphicon-time"></span>Posted {{$post->created_at->diffForHumans()}}</p>

                                        <hr>

                                        <!-- Post Content -->
                                        <p>{!! str_limit($post->body,1100) !!}</p>
                                        <hr>

                                    </div>

                                @endif

                            @endforeach

                        </div>

                    </div>
                    <div class="text-center">
                        {!! $posts->links() !!}
                    </div>

                </div>
            </div>
        </div>


        <script src="{{asset('js/jq.js') }}"></script>
@endsection





