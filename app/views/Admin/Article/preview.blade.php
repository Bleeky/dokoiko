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

	<style type="text/css">
		.title {
			text-transform: uppercase;
			font-style: italic;
			line-height: 80px;
			text-shadow: 2px 5px 0 rgba(0,0,0,0.1);
			font-family: 'Josefin Sans', sans-serif;
			max-width: 100%;
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
				width: 800px;
        		padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
                max-width: 100%;
		}
		p:not(:nth-child(1)):not(:nth-child(2)):not(:nth-child(3)) {
		max-width: 100%;
		width: 800px;
		padding-right: 15px !important;
        padding-left: 15px !important;
        margin-right: auto !important;
        margin-left: auto !important;
		}
		p:nth-child(3) {
		max-width: 100%;
		width: 800px;
		padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
        }
		p:nth-child(1) {
		 margin: 0;
		 width: 90%;
		 padding-right: 15px;
         padding-left: 15px;
         margin-right: auto;
         margin-left: auto;
         margin-top: 50px;
		}
		li p {
		    margin-top: none !important;
		}
		.froala-element pre, .froala-element blockquote, .froala-element table, .froala-element hr, .froala-element ul, .froala-element ol {
		max-width: 100%;
		width: 700px;
		padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
		}
		.froala-element blockquote {
		    letter-spacing: 0.01rem;
            line-height: 27px;
		}
		.froala-element ul li{
		    list-style: disc;
		}
		.froala-element ol li {
		    list-style-type: decimal;
		}
		.froala-element ul li p, .froala-element ol li p{
		    margin-top: 0 !important;
		    letter-spacing: 0.01rem !important;
            font-style: normal !important;
            line-height: 27px !important;
		}
		p:nth-child(2) img {
            width: 100%;
		}
		@media (min-width: 1200px) {
            p:nth-child(3) {
                width: 1000px;
            }
		}
		p:nth-child(1) span:nth-child(1) {
		    font-size: 80px !important;
		}
		@media (max-width: 999px) and (min-width: 400px) {
			p:nth-child(1) span:nth-child(1) {
   		        font-size: 50px !important;
			}
		}
		@media (max-width: 400px) {
			p:nth-child(1) span:nth-child(1) {
   		        font-size: 40px !important;
			}
		}

		p:not(:nth-child(1)) span {
		    letter-spacing: 0.01rem !important;
            font-style: normal !important;
            line-height: 27px !important;
		}

	</style>

</head>
<body>
<div class=" froala-element textcolor" style="background-color: white; padding-top: 60px; padding-bottom: 13px;">
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