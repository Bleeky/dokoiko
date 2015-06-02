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

</head>
<body>
<div class="froala-element" style="background-color: white; padding-bottom: 13px;">
    {!! $article->content !!}
</div>
<div class="article-container">
    <div class="circlemenu" style="padding-top: 80px;">
        <button class="cn-button" id="cn-button">+</button>
        <div class="cn-wrapper" id="cn-wrapper">
            <ul>
                <li><a></a></li>
                <li><a href="{{ URL::action('ArticleAdminController@getHome') }}"><i class="fa fa-lg fa-home"></i></a></li>
                <li><a></a></li>
            </ul>
        </div>
        <div id="cn-overlay" class="cn-overlay"></div>
    </div>
</div>
</body>

{!! HTML::script('js/reader_dependencies.min.js') !!}

</html>