@extends(($admin) ? 'layouts.admin' : 'layouts.app')


@section('content')

    <div class="col-xs-12">

        <h1>{{$post->title}}</h1>

        <!-- Preview Image -->
        <img class="img-responsive" style="max-height:400px;" src="\{{$post->photo ? $post->photo : $post->photoPlaceholder()}}" alt="">

        <!-- Post Content -->
        <p><?php echo $post->body ?></p>

        <p>
            <span class="fa fa-clock-o"></span>&nbsp;
            Posted {{$post->created_at->diffForHumans()}}&nbsp;
            by {{$post->user ? $post->user->name : 'Antonis'}}
        </p>

        <div id="disqus_thread"></div>
        <script>

            /**
             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
            /*
            var disqus_config = function () {
            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            */
            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://gym-dev.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

@stop



