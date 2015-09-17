<!DOCTYPE html>
<head>
    <title>Dokoiko</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--<link rel="icon" href="{{ asset('ressources/assets/ico.png') }}"/>--}}

    {!! HTML::style('css/dependencies.css') !!}
    {!! HTML::style('css/app.css') !!}
    {!! HTML::style('css/reader_dependencies.css') !!}

    {!! HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300|Josefin+Sans:100') !!}

    {!! HTML::script('js/dependencies.min.js') !!}

    <?php
    use Dokoiko\Article;

    $PreviousArticle = Article::where('status', '=', '1')->where('date', '<', $article->date)->orderBy('date', 'desc')->first();
    $NextArticle = Article::where('status', '=', '1')->where('date', '>', $article->date)->orderBy('date', 'asc')->first();

    ?>
</head>
<body>
<div class="froala-element" style="background-color: white; padding-bottom: 13px;">
    {!! $article->content !!}
</div>
<div class="article-container">
    <div class="text-right author-signature" id="author-name">{{ $article->user->full_name }}</div>

    <div id="author-about-btn" class="text-center" style="z-index: 2;">
        <a class="btn-article-reader right" style="text-decoration: none;">A Propos de l'auteur</a>
    </div>

    <div id="author-about" class="author-about">
        {!! HTML::image('content/author/' . $article->user->image, null, (['class' => 'image-author'])) !!}
        <div class="text-author">
            {{ $article->user->description }}
        </div>
    </div>

    <a class="btn-article-reader facebook-color left" style="z-index: 2; text-decoration: none; margin-right: 13px;"
       onclick="window.open(this.href,
                 'Share Dokoiko on Facebook !', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"
       href="http://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank">Facebook
    </a>
    <a class="btn-article-reader twitter-color left" style="z-index: 2; text-decoration: none; margin-right: 13px;"
       onclick="window.open(this.href,
                 'Share Dokoiko on Twitter !', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"
       href="https://twitter.com/intent/tweet?hashtags=dokoiko&text={{ $article->title }}&url={{ Request::url() }}"
       target="_blank">Twitter
    </a>
    <a class="btn-article-reader google-plus-color left" style="z-index: 2; text-decoration: none;"
       href="https://plus.google.com/share?url={{ Request::url() }}" onclick="window.open(this.href,
              'Share Dokoiko on Google+ !', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">Google+
    </a>

    <div id="disqus_thread"></div>
    <script type="text/javascript">
        var disqus_shortname = 'dokoiko';
        var disqus_title = "{{ $article->title }}";
        var disqus_identifier = '{{ $article->id }}';
        var disqus_url = "{{ Request::url() }}";
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

    <div class="circlemenu" style="padding-top: 80px;">
        <button class="cn-button" id="cn-button">+</button>
        <div class="cn-wrapper" id="cn-wrapper">
            <ul>
                @if ($NextArticle != null)
                    <li><a href="{{ URL::action('ArticleController@getArticle', $NextArticle->id) }}"><i
                                    class="fa fa-lg fa-reply"></i></a></li>
                @else
                    <li><a></a></li>
                @endif
                <li><a href="{{ URL::action('ArticleController@getHome') }}"><i class="fa fa-lg fa-home"></i></a></li>
                @if ($PreviousArticle != null)
                    <li><a href="{{ URL::action('ArticleController@getArticle', $PreviousArticle->id) }}"><i
                                    class="fa fa-lg fa-share"></i></a></li>
                @else
                    <li><a></a></li>
                @endif
            </ul>
        </div>
        <div id="cn-overlay" class="cn-overlay"></div>
    </div>
</div>
</body>

{!! HTML::script('js/reader_dependencies.min.js') !!}

</html>
