@foreach ($articles as $count => $article)
	@if ($count % 2 == 1)
		<div class='newsbox right'>
	@else
		<div class='newsbox left'>
	@endif
		<div class="boxtitle">
			<a href="{{ URL::action('ArticleController@getContent', array($article->id)) }}" style="text-decoration: none;"><boxtitle>{{ $article->title }}</boxtitle></a>
		</div>
		<div class="boximg">
			<a href="{{ URL::action('ArticleController@getContent', array($article->id)) }}">{{ HTML::image($article->image, null) }}</a>
		</div>
		<div class="boxdate">
			{{ $article->getDate() }}
		</div>
		<br>
		<div class="boxintro">
			{{ str_limit($article->introduction, $limit = 260, $end = ' . . .') }}
		</div>
		<br>
		<div class="boxreader">
			<a href="{{ URL::action('ArticleController@getContent', array($article->id)) }}"><button style="font-size: 13px;" class="btn-author buttoncolor">LIRE L'ARTICLE</button></a>
		</div>
		</div>
@endforeach
