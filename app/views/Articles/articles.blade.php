@extends('Layouts.default')
@section('content')

<div class="page-container">
<div class="container" id="newslisting">
    @include('Articles.more')
</div>
<div id="button_more_articles" class="text-center" style="margin-top: 13px; margin-bottom: 13px;">
	<button class="btn-more buttoncolor" onclick="RequestMoreArticles();">Plus d'articles</button>
</div>
</div>


<script type="text/javascript">

var offset_articles = 0;
function RequestMoreArticles() {
	offset_articles = offset_articles + 4;
		if (offset_articles + 4 >= max_articles) {
			$("#button_more_articles").fadeOut("slow");
		}
	$.ajax({
		url: '{{ URL::action('ArticleController@getMoreArticle') . '/' }}' + offset_articles,
		type: 'GET',
		dataType: 'html',
		success : function(code_html, statut){
			$(code_html).appendTo("#newslisting").hide().fadeIn("slow");
			$(".newsbox").on("mouseenter", function () {
				$news = $(this);
				$button = $news.children(".boxreader");
				$img = $news.children(".boximg");
				$button.addClass("hovered", 1000);
				$img.addClass("zoomed", 1000)
			});
			$(".newsbox").on("mouseleave", function () {
				$news = $(this);
				$button = $news.children(".boxreader");
				$img = $news.children(".boximg");
				$button.removeClass("hovered", 1000);
				$img.removeClass("zoomed", 1000)
			})
		}
	});
}

$.ajax({
		url : '{{ URL::action('ArticleController@getArticleTotal') }}',
		type : 'GET',
		dataType : 'json',
		success : function (result) {
			max_articles = result['total'];
			if (offset_articles + 4 >= max_articles)
				$("#button_more_articles").fadeOut();
		},
		error : function () {
			bootbox.alert("Oups. There was a problem while getting articles.", function() {});
		}
	});

$(".newsbox").on("mouseenter", function () {
	$news = $(this);
	$button = $news.children(".boxreader");
	$img = $news.children(".boximg");
	$button.addClass("hovered", 1000);
	$img.addClass("zoomed", 1000)
});

$(".newsbox").on("mouseleave", function () {
	$news = $(this);
	$button = $news.children(".boxreader");
	$img = $news.children(".boximg");
	$button.removeClass("hovered", 1000);
	$img.removeClass("zoomed", 1000)
});

</script>

@stop