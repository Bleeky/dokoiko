@extends('layouts.default')
@section('content')

    <div class="container" id="articles">
        @include('User.Articles.articles')
    </div>
    <div id="more-articles" class="text-center">
        <button class="btn-articles" onclick="LoadMoreArticles('{{ URL::action('ArticleController@getMoreArticle') }}');">Plus d'articles</button>
    </div>

<script>
    GetNumberOfArticles('{{ URL::action('ArticleController@getNumberOfArticles') }}')
</script>

@stop
