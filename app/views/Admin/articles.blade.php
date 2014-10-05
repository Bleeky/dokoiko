@extends('Layouts.admindefault')
@section('content')

<div id="HomeArticleMenu">
	<div class="container" style="padding-top: 50px; padding-bottom: 30px;">
		<div class="left">
			<button class="btn-circle-large btn-dailys" onclick="AddArticle();"><i class="fa fa-plus"></i></button>
		</div>
		{{ Form::open(array('id'=>'search_article', 'style'=>'float: right;')) }}
		{{ Form::text('name_article', null, array('placeholder'=>'Search', 'class'=>'form-control', 'autocomplete'=>'off', 'id'=>'name_article')) }}
		{{ Form::close() }}
	</div>

	<div class="container">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Title</th>
						<th>Publication date</th>
					</tr>
				</thead>
				<tbody id="articles_list">
					@foreach($articles as $article)
					<tr class="{{ ($article->status == 1) ? 'success' : 'danger'}}">
						<td>{{ $article->title }}</td>
						<td>{{ $article->getDate() }}</td>
						<td style="text-align: center;"><a onclick="EditArticle({{ $article->id }});" class="btn btn-info">Edit</a></td>
						<td style="text-align: center;"><a href="{{ URL::action('AdminController@getPreviewArticle', array($article->id)) }}" class="btn btn-success">Preview</a></td>
						<td style="text-align: center;"><a onclick="DeleteArticle({{ $article->id }});" class="btn btn-danger">Delete</a></td>
						<td style="text-align: center;">
							<div class="btn-group btn-toggle"> 
								<button id="ArticlePublished" class="btn btn-xs {{ ($article->status == 0) ? 'btn-default active' : 'btn-info'}}" onclick="ArticleStatus({{ $article->id }})">ON</button>
								<button id="ArticleNotPublished" class="btn btn-xs {{ ($article->status == 0) ? 'btn-info	' : 'btn-default active'}}" onclick="ArticleStatus({{ $article->id }})">OFF</button>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="container" style="text-align: center; padding-bottom: 50px;">
		<div class="left">
			<button id="morerecent" class="btn-circle-large btn-dailys" onclick="PreviousSetOfArticles();"><i class="fa fa-arrow-left"></i></button>
		</div>
		<div class="right">
			<button id="morerecent" class="btn-circle-large btn-dailys" onclick="NextSetOfArticles();"><i class="fa fa-arrow-right"></i></button>
		</div>
	</div>
</div>

<script type="text/javascript">

	function ArticleStatus(id) {
		$.ajax({
			url: '{{ URL::action('AdminController@postArticleStatus') . '/'}}' + id + '/' + offset,
			type: 'post',
			dataType: 'html',
			success : function(code_html, statut){
				$(code_html).replaceAll("#articles_list").hide().fadeIn("slow");
			}		
		});
	}

	$('.btn-toggle').click(function() {
		var btn = $(this);
		btn.find('.btn').toggleClass('active');

		if (btn.find('.btn-info').size() > 0) {
			btn.find('.btn').toggleClass('btn-info');
		}
		btn.find('.btn').toggleClass('btn-default');
	});


	$.ajax({
		url : '{{ URL::action('AdminController@getArticleTotal') }}',
		type : 'GET',
		dataType : 'json',
		success : function (result) {
			total = result['total'];
		},
		error : function () {
			alert("Error : could not count pictures.");
		}
	});

	$("#search_article").submit(function(e) {
		e.preventDefault();
	});

	$(document).ready(function () {
		$("#name_article").keyup(function () {
			$field = $(this);
			$("#articles_list").html("");
			if ($field.val().length >= 1) {
				$.ajax({
					type: "GET",
					dataType: 'html',
					url: '{{ URL::action('AdminController@getSearchArticle') . '/' }}' + $(this).val(),
					success: function (code_html, statut) {
						$(code_html).replaceAll("#articles_list").hide().fadeIn("slow");
					}
				})
			}
			else {
				$.ajax({
					type: "GET",
					dataType: 'html',
					url: '{{ URL::action('AdminController@getLoadDefaultArticles') }}',
					success: function (code_html, statut) {
						$(code_html).replaceAll("#articles_list").hide().fadeIn("slow");
					}
				})		
			}
		})
	});

	function AddArticle() {
		$.ajax({
			url: '{{ URL::action('AdminController@getAddArticle') }}',
			type: 'GET',
			dataType: 'html',
			success : function(code_html, statut){
				$(code_html).replaceAll("#HomeArticleMenu").hide().fadeIn("slow");
			}
		});
	}
	function EditArticle(id) {
		$.ajax({
			url: '{{ URL::action('AdminController@getEditArticle') . '/' }}' + id,
			type: 'GET',
			dataType: 'html',
			success : function(code_html, statut){
				$(code_html).replaceAll("#HomeArticleMenu").hide().fadeIn("slow");
			}
		});
	}
	function DeleteArticle(id) {
		bootbox.confirm("Are you sure?", function(result) {
			if (result == true) {
				$.ajax({
					url: '{{ URL::action('AdminController@postDeleteArticle') . '/' }}' + id,
					type: 'POST',
					dataType: 'html',
					success : function(code_html, statut){
						$(code_html).replaceAll("#articles_list").hide().fadeIn("slow");
					}
				});
			}
		}); 
	}

	var offset = 0;
	function NextSetOfArticles() {
		if ((offset + 10) < total) {
			offset = offset + 10;
		}
		$.ajax({
			url: '{{ URL::action('AdminController@getSetOfArticles') . '/' }}' + offset,
			type: 'GET',
			dataType: 'html',
			success : function(code_html, statut){
				$(code_html).replaceAll("#articles_list").hide().fadeIn("slow");
			}
		});
	}
	function PreviousSetOfArticles() {
		if ((offset) > 0) {
			offset = offset - 10
		}
		$.ajax({
			url: '{{ URL::action('AdminController@getSetOfArticles') . '/' }}' + offset,
			type: 'GET',
			dataType: 'html',
			success : function(code_html, statut){
				$(code_html).replaceAll("#articles_list").hide().fadeIn("slow");
			}
		});
	}
</script>

@stop