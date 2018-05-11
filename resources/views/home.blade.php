@extends('layouts.app')

@section('content')



    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <div class="first-body col-lg-12">
        <div class="">

            <meta name="csrf-token" content="{{ csrf_token() }}" />

            <div class="first-body col-lg-9">
                <div class="panel">
                    <br>


                    <div id="myCarousel" class="carousel slide  " data-ride="carousel" >

                    <?php $i=0; ?>




                    <!-- Indicators -->
                        <ol class="carousel-indicators">


                            @foreach($posts as $index => $post)

                                <?php if ($index < 3) { ?>

                                <li data-target="#myCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>

                                <?php } ?>

                            @endforeach

                        </ol>

                        <?php
                        $x = 0;
                        ?>





                        <div class="carousel-inner">
                            @foreach($postz as $index => $post)

                                <?php if ($index < 3) { ?>
                                <div class="{{ $index == 0 ? 'active item' : 'item' }}  ">
                                    <img  class="img-responsive
                                    carouselimg" style="
                                    height:400px; width:100%;"
                                          src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400' }}">

                                    <div class="carousel-caption">
                                        <h3><a href="{{route('home.post',$post->slug)}}">{{$post->title}}</a></h3>
                                    </div>

                                </div>

                                <?php } ?>

                                <br>
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

                        </br>
                        </br>
                        </br>





                        <div class="ll">
                            @foreach($posts as $index => $post)
                                <?php if ($index > 2 ) { ?>
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
                                    <p><?php echo str_limit($post->body,1100) ?></p>
                                    <hr>

                                </div>

                                <?php } ?>

                            @endforeach



                        </div>








                    </div>
                    <div class="text-center">
                        {{$posts->links()}}

                    </div>

                    {{--<!-- Begin MailChimp Signup Form -->--}}
                    {{--<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">--}}
                    {{--<style type="text/css">--}}
                    {{--#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }--}}
                    {{--/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.--}}
                    {{--We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */--}}
                    {{--</style>--}}
                    {{--<div id="mc_embed_signup " class="col-md-7">--}}
                    {{--<form action="https://sssss.us17.list-manage.com/subscribe/post?u=25a2c234b4bd9183d6772aa25&amp;id=817975fdd5" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>--}}
                    {{--<div id="mc_embed_signup_scroll">--}}
                    {{--<h2>Εγγραφή στο Newsletter</h2>--}}
                    {{--<div class="mc-field-group ">--}}
                    {{--<label for="mce-EMAIL">Διεύθυνση email</label>--}}

                    {{--<input type="email" value="" style="max-width:300px;" name="EMAIL" class="required email form-control " id="mce-EMAIL">--}}

                    {{--</div>--}}
                    {{--<div id="mce-responses" class="clear">--}}
                    {{--<div class="response" id="mce-error-response" style="display:none"></div>--}}
                    {{--<div class="response" id="mce-success-response" style="display:none"></div>--}}
                    {{--</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->--}}
                    {{--<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_25a2c234b4bd9183d6772aa25_817975fdd5" tabindex="-1" value=""></div>--}}
                    {{--<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary" style="margin-left:0px;"></div>--}}
                    {{--</div>--}}
                    {{--</form>--}}
                    {{--</div>--}}
                    {{--<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='BIRTHDAY';ftypes[3]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>--}}
                    {{--<!--End mc_embed_signup-->--}}

                    {{--<button type="button" class="btn btn-warning" id="getRequest">getRequest</button>--}}

                    {{--<div class="row col-lg-6">--}}

                    {{--<h2>Register Form</h2>--}}
                    {{--<form action="" id="register">--}}

                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                    {{--<label for="firstname"></label>--}}
                    {{--<input type="text" id="firstname" class="form-control">--}}

                    {{--<label for="lastname"></label>--}}
                    {{--<input type="text" id="lastname" class="form-control">--}}

                    {{--<input type="submit" value="Register" class="btn btn-primary">--}}

                    {{--</form>--}}

                    {{--</div>--}}


                    {{--<div id="getRequestData"> </div>--}}

                    {{--<div id="postRequestData"> </div>--}}



                </div>
            </div>
        </div>


        <script src="{{asset('js/jq.js') }}"></script>
@endsection





