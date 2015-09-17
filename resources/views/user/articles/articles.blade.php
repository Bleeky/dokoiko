@foreach ($articles as $article)
    <div class="dokobox">
        <div class="dokobox-title">
            <a href="{{ URL::action('ArticleController@getArticle', ([$article->id])) }}" style="text-decoration: none;">{{ $article->title }}</a>
        </div>
        <a href="{{ URL::action('ArticleController@getArticle', ([$article->id])) }}">{!! HTML::image($article->image, null, (['class' => 'dokobox-img'])) !!}</a>

        <div class="dokobox-date">
            {!! $article->getDate() !!}
        </div>
        <div class="dokobox-intro">
            {!! str_limit($article->introduction, $limit = 420, $end = ' . . .') !!}
        </div>
        <a style="text-decoration: none;" class="btn-article-reader" href="{{ URL::action('ArticleController@getArticle', ([$article->id])) }}">Lire l'article</a>
    </div>
@endforeach
