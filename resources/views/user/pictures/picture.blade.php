@extends('layouts.default')
@section('content')

    <div class="container pictures" id="latest-daily">
        <div class="row pictures">
            <div class="text-center">
                @if (strstr($picture->image, "http://") == false && strstr($picture->image, "https://") == false)
                    {!! HTML::image('content/pictures/large/' . $picture->image, null, (['class'=>'main-picture'])) !!}
                @else
                    {!! HTML::image($picture->image, null, (['class'=>'main-picture'])) !!}
                @endif
            </div>
        </div>
        <div class="row pictures">
            <div class="text-center">
                <div class="picture-title">{{ $picture->title }}</div>
                <div class="picture-content">{{ $picture->content }}</div>
            </div>
        </div>
    </div>

    <div id="btn-picture-comments" class="text-center pictures">
        <button id="btn-article-reader" class="btn-article-reader">Commentaires</button>
    </div>

    <div class="container disqus" style="display: none;">
        <div id="disqus_thread"></div>
        <script type="text/javascript">
            var disqus_shortname = 'requiemforatrip';
            var disqus_title = "{{ $picture->title }}";
            var disqus_identifier = '{{ $picture->id }}';
            var disqus_url = "{{ action('HomeController@getPicture', $pictures->id) }}";
            (function () {
                var dsq = document.createElement('script');
                dsq.type = 'text/javascript';
                dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by
                Disqus.</a></noscript>
        <a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>
    </div>

@stop
