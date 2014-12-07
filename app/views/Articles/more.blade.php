@foreach ($articles as $count => $article)
	    <div class="newsbox">
		<div class="boxtitle">
			<a href="{{ URL::action('ArticleController@getContent', array($article->id)) }}" style="text-decoration: none;"><div class="title">{{ $article->title }}</div></a>
		</div>
		<div class="boximg">
			<a href="{{ URL::action('ArticleController@getContent', array($article->id)) }}">{{ HTML::image($article->image, null) }}</a>
		</div>
		<div class="boxdate">
			{{ $article->getDate() }}
		</div>
		<div class="boxintro">
			{{ str_limit($article->introduction, $limit = 250, $end = ' . . .') }}
		</div>
		<div class="boxreader">
			<a style="font-size: 13px; text-decoration: none;" class="btn-author buttoncolor" href="{{ URL::action('ArticleController@getContent', array($article->id)) }}">LIRE L'ARTICLE</a>
		</div>
		</div>
@endforeach
