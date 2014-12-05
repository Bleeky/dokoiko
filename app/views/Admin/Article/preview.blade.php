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

</head>
<body>
<div class=" froala-element textcolor" style="background-color: white; padding-bottom: 13px;">
		{{ $article->content }}
</div>

	<div class="article-container">
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
</body>
{{ HTML::script('assets/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('assets/js/polyfills.js') }}
{{ HTML::script('assets/js/circle_menu.js') }}
</html>