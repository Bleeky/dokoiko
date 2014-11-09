<!DOCTYPE html>
<head>
	<title>Dokoiko</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('ressources/assets/ico.png') }}"/>
	{{ HTML::style('assets/bootstrap/css/bootstrap.min.css') }}

	{{ HTML::style('assets/font-awesome/css/font-awesome.min.css') }}

	{{ HTML::style('assets/css/style.css') }}
	{{ HTML::style('assets/css/articles.css') }}
	{{ HTML::style('assets/css/circlemenu.css') }}

	{{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300') }}
	{{ HTML::style('http://fonts.googleapis.com/css?family=Lato|Josefin+Sans:100,400,100italic,300italic') }}

	{{ HTML::script('assets/js/jquery-2.1.1.min.js') }}
	{{ HTML::script('assets/js/modernizr.min.js') }}

	{{ HTML::style('assets/froala/css/froala_style.min.css') }}
	{{ HTML::style('assets/froala/css/froala_content.min.css') }}


	<?php $PreviousArticle = DB::table('articles')->where('status', '=', '1')->where('date', '<', $article->date)->orderBy('date', 'desc')->first() ?>
	<?php $NextArticle = DB::table('articles')->where('status', '=', '1')->where('date', '>', $article->date)->orderBy('date', 'asc')->first() ?>

	<style type="text/css">
		.title {
			text-transform: uppercase;
			font-style: italic;
			line-height: 80px;
			text-shadow: 2px 5px 0 rgba(0,0,0,0.1);
			font-family: 'Josefin Sans', sans-serif;
		}
		@media (max-width: 999px) {
			.title {
			    line-height: 50px;
			}
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
		.article-container {
				width: 900px;
        		padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
                max-width: 100%;
		}
		p:not(:nth-child(1)):not(:nth-child(2)) {
		max-width: 100%;
		width: 900px;
		padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
		}
		p:nth-child(1) {
		 margin: 0;
		}
		p:nth-child(2) img {
            width: 100%;
		}
		p:nth-child(1) span:nth-child(1) {
		    font-size: 80px !important;
		}
		@media (max-width: 999px) {
			p:nth-child(1) span:nth-child(1) {
   		        font-size: 50px !important;
			}
		}

	</style>

</head>
<body>
<div class=" froala-element textcolor" style="background-color: white; padding-top: 60px; padding-bottom: 13px;">
		{{ $article->content }}
</div>
<div class="article-container">
			<div class="text-right" style="padding-bottom: 13px; font-size: 18px;" id="name">
				Quentin Hausser
			</div>

			<div id="author" class="text-center" style="z-index: 2;">
				<button class="btn-author buttoncolor right" style="margin-bottom: 13px;">A Propos de l'auteur</button>
			</div>

			<div id="About" class="content-author">
			        <div style="padding: 26px; display: table;">
			        <div class="image-author-placement">
    					{{ HTML::image('ressources/assets/author.jpg', null, array('class' => 'image-author')) }}
			        </div>
					<div class="text-author">
						Voyageur à ses heures perdues, passioné d'animation Japonaise, féru de science-fiction et accessoirement étudiant en informatique à 
						Epitech, le créateur de ce site est un peu touche à tout. Malgré ses solides racines en France, le citoyen du monde que je suis
						a un appétit de découverte insatiable. Vulgariser, partager et vous faire découvrir de nouvelles choses est un défi que je relève avec enthousiasme ! Suivez le guide,
						et bon voyage !
					</div>
	            </div>
			</div>

			<div style="margin-top: 13px;">
				<div id="disqus_thread"></div>
				<script type="text/javascript">
					var disqus_shortname = 'requiemforatrip';
					var disqus_title = '{{ $article->title }}';
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
</body>

<script type="text/javascript">

	$('.btn-author').click(function() {
		$('#author').hide();
		$('#name').hide();
		$('#About').fadeIn('slow');
	});
</script>


{{ HTML::script('assets/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('assets/js/polyfills.js') }}
{{ HTML::script('assets/js/circle_menu.js') }}
</html>