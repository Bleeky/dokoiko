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
	{{ HTML::style('css/Froala/froala_page.min.css') }}

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
			<div class="text-right" style="padding-top: 40px;">
				<h4articleimg>Quentin Hausser</h4articleimg><br>
			</div>
			<div class="circlemenu" style="padding-top: 80px;">
				<button class="cn-button" id="cn-button">+</button>
				<div class="cn-wrapper" id="cn-wrapper">
					<ul>
						<li><a href="{{ URL::action('AdminController@getPreviewArticle', $article->id) }}"><i class="fa fa-reply"></i></a></li>
						<li><a href="{{ URL::action('AdminController@getArticles') }}"><i class="fa fa-home"></i></a></li>
						<li><a href="{{ URL::action('AdminController@getPreviewArticle', $article->id) }}"><i class="fa fa-share"></i></a></li>
					</ul>
				</div>
				<div id="cn-overlay" class="cn-overlay"></div>
			</div>
		</div>
	</div>
</body>
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/polyfills.js') }}
{{ HTML::script('js/circle_menu.js') }}
</html>