<!DOCTYPE html>
<head>
	<title>Dokoiko</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('ressources/assets/ico.png') }}"/>
	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/style.css') }}
	{{ HTML::style('css/font-awesome.min.css') }}
	{{ HTML::style('css/articles.css') }}
	{{ HTML::style('css/circlemenu.css') }}
	{{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300') }}
	{{ HTML::style('http://fonts.googleapis.com/css?family=Lato|Josefin+Sans:100,400,100italic,300italic') }}
	{{ HTML::script('js/jquery-2.1.1.min.js') }}
	{{ HTML::script('js/modernizr.min.js') }}
	{{ HTML::style('css/Froala/froala_style.min.css') }}
	{{ HTML::style('css/Froala/froala_content.min.css') }}


	<?php $PreviousArticle = DB::table('articles')->where('status', '=', '1')->where('date', '<', $article->date)->orderBy('date', 'desc')->first() ?>
	<?php $NextArticle = DB::table('articles')->where('status', '=', '1')->where('date', '>', $article->date)->orderBy('date', 'asc')->first() ?>

	<style type="text/css">
		.title {
			margin: 1em 0 0.5em 0;
			text-transform: uppercase;
			font-style: italic;
			line-height: 80px;
			font-size: 60px;
			text-shadow: 2px 5px 0 rgba(0,0,0,0.1);
			-webkit-font-smoothing: antialiased;
			font-family: 'Josefin Sans', sans-serif;
		}
		img {
			max-width: 100%;
			height: auto;
		}
		@media (max-width: 700px) {
			img {
				width: 100%;
				padding: none !important;
			}
		}
	</style>

</head>
<body>
	<div style="background-color: #EEEEEE;">
		<div class="container froala-element textcolor" style="background-color: white; padding-top: 60px;">
			{{ $article->content }}
			<div class="text-right" style="padding-top: 40px;" id="name">
				<h4articleimg>Quentin Hausser</h4articleimg>
			</div>

			<div id="author" class="text-center" style="padding-bottom: 50px; padding-top: 20px;">
				<button class="btn-author buttoncolor right">A Propos de l'auteur</button>
			</div>

			<div id="About" class="content-author">
				<div style='padding: 20px;'>
					{{ HTML::image('ressources/assets/author.jpg', null, array('class' => 'image-author')) }}
					<div style="font-size: 16px; text-align: justify;">
						Voyageur à ses heures perdues, passioné d'animation Japonaise, féru de science-fiction et accessoirement étudiant en informatique à 
						Epitech, le créateur de ce site est un peu touche à tout. Malgré ses solides racines en France, le citoyen du monde que je suis
						a un appétit de découverte insatiable. Vulgariser, partager et vous faire découvrir de nouvelles choses est un défi que je relève avec enthousiasme ! Suivez le guide,
						et bon voyage !
					</div>
				</div>
			</div>

			<div style="margin-top: 50px;">
				<div id="disqus_thread"></div>
				<script type="text/javascript">
					var disqus_shortname = 'requiemforatrip';
					(function() {
						var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
						dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
						(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
					})();
				</script>
				<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
				<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
			</div>
			<div class="circlemenu" style="padding-top: 80px;">
				<button class="cn-button" id="cn-button">+</button>
				<div class="cn-wrapper" id="cn-wrapper">
					<ul>
						@if ($NextArticle != null)
						<li><a href="{{ URL::action('ArticleController@getContent', $NextArticle->id) }}"><i class="fa fa-reply"></i></a></li>
						@else
						<li><a href="{{ URL::action('ArticleController@getContent', $article->id) }}"><i class="fa fa-reply"></i></a></li>
						@endif
						<li><a href="{{ URL::action('ArticleController@getHome') }}"><i class="fa fa-home"></i></a></li>
						@if ($PreviousArticle != null)
						<li><a href="{{ URL::action('ArticleController@getContent', $PreviousArticle->id) }}"><i class="fa fa-share"></i></a></li>
						@else
						<li><a href="{{ URL::action('ArticleController@getContent', $article->id) }}"><i class="fa fa-share"></i></a></li>
						@endif
					</ul>
				</div>
				<div id="cn-overlay" class="cn-overlay"></div>
			</div>
		</div>
	</div>
</body>

<script type="text/javascript">
	$('#author').click(function() {
		$(this).hide();
		$('#name').hide();
		$('#About').fadeIn('slow');
	});
</script>


{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/polyfills.js') }}
{{ HTML::script('js/circle_menu.js') }}
</html>