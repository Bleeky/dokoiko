<!DOCTYPE html>
<head>
	<title>Dokoiko</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('ressources/assets/ico.png') }}"/>
	{{ HTML::style('assets/bootstrap/css/bootstrap.min.css') }}

	{{ HTML::style('assets/font-awesome/css/font-awesome.min.css') }}

	{{ HTML::style('assets/froala/css/froala_style.min.css') }}
    {{ HTML::style('assets/froala/css/froala_content.min.css') }}

	{{ HTML::style('assets/css/style.css') }}
	{{ HTML::style('assets/css/articles.css') }}
	{{ HTML::style('assets/css/circlemenu.css') }}

	{{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300') }}
	{{ HTML::style('http://fonts.googleapis.com/css?family=Lato|Josefin+Sans:100,400,100italic,300italic') }}

	{{ HTML::script('assets/js/jquery-2.1.1.min.js') }}
	{{ HTML::script('assets/js/modernizr.min.js') }}


	<?php $PreviousArticle = DB::table('articles')->where('status', '=', '1')->where('date', '<', $article->date)->orderBy('date', 'desc')->first() ?>
	<?php $NextArticle = DB::table('articles')->where('status', '=', '1')->where('date', '>', $article->date)->orderBy('date', 'asc')->first() ?>
</head>
<body>
<div class=" froala-element textcolor" style="background-color: white; padding-bottom: 13px;">
		{{ $article->content }}
</div>
<div class="article-container">
			<div class="text-right" style="padding-bottom: 13px; font-size: 18px;" id="name">Quentin Hausser</div>

			<div id="author" class="text-center" style="z-index: 2;">
				<a class="btn-author buttoncolor right" style="margin-bottom: 13px; text-decoration: none;">A Propos de l'auteur</a>
			</div>

			<div id="About" class="content-author">
			        <div style="padding: 26px; display: table;">
			        <div class="image-author-placement">
    					{{ HTML::image('ressources/assets/author.jpg', null, array('class' => 'image-author')) }}
			        </div>
					<div class="text-author">
						Voyageur à ses heures perdues, passioné d'animation, fasciné par l'univers, féru de science-fiction, podcasteur régulier et étudiant en informatique à
						Epitech, le créateur de ce site est un peu touche à tout. L'envie de partager me pousse aujourd'hui à me lancer dans l'écriture,
					    pour le meilleur comme pour le pire !
					</div>
	            </div>
			</div>

			<a class="btn-author facebook-color left" style="margin-bottom: 13px; z-index: 2; text-decoration: none; margin-right: 13px;" onclick="javascript:window.open(this.href,
                 '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="http://www.facebook.com/sharer/sharer.php?u={{ Request::url(); }}" target="_blank">Facebook
            </a>
            <a class="btn-author twitter-color left" style="z-index: 2; text-decoration: none; margin-right: 13px;" onclick="javascript:window.open(this.href,
                 '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://twitter.com/intent/tweet?hashtags=dokoiko&text={{ $article->title }}&url={{ Request::url() }}" target="_blank">Twitter
            </a>
            <a class="btn-author google-plus-color left" style="z-index: 2; text-decoration: none;" href="https://plus.google.com/share?url={{ Request::url() }}" onclick="javascript:window.open(this.href,
              '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">Google+
            </a>

			<div style="margin-top: 13px;">
				<div id="disqus_thread"></div>
				<script type="text/javascript">
					var disqus_shortname = 'requiemforatrip';
					var disqus_title = "{{ $article->title }}";
					(function() {
						var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
						dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
						(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
					})();
				</script>
				<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
				<a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>
			</div>
			<div class="circlemenu" style="padding-top: 80px;">
				<button class="cn-button" id="cn-button">+</button>
				<div class="cn-wrapper" id="cn-wrapper">
					<ul>
						@if ($NextArticle != null)
						<li><a href="{{ URL::action('ArticleController@getContent', $NextArticle->id) }}"><i class="fa fa-reply"></i></a></li>
						@else
						<li><a></a></li>
						@endif
						<li><a href="{{ URL::action('ArticleController@getHome') }}"><i class="fa fa-home"></i></a></li>
						@if ($PreviousArticle != null)
						<li><a href="{{ URL::action('ArticleController@getContent', $PreviousArticle->id) }}"><i class="fa fa-share"></i></a></li>
						@else
						<li><a></a></li>
						@endif
					</ul>
				</div>
				<div id="cn-overlay" class="cn-overlay"></div>
			</div>
		</div>
</body>

<script type="text/javascript">
	$('#author').click(function() {
		$('#author').hide();
		$('#name').hide();
		$('#About').fadeIn('slow');
	});
</script>


{{ HTML::script('assets/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('assets/js/polyfills.js') }}
{{ HTML::script('assets/js/circle_menu.js') }}
</html>