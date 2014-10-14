<tbody id="articles_list">
	@foreach($articles as $article)
	<tr class="{{ ($article->status == 1) ? 'success' : 'danger'}}">
		<td style="vertical-align: middle;">{{ str_limit($article->title, $limit = 70, $end = ' . . .')}}</td>
		<td style="vertical-align: middle;">{{ $article->getDate() }}</td>
		<td style="text-align: center; vertical-align: middle;"><a onclick="EditArticle({{ $article->id }});" class="btn btn-info">Edit</a></td>
		<td style="text-align: center; vertical-align: middle;"><a href="{{ URL::action('AdminController@getPreviewArticle', array($article->id)) }}" class="btn btn-success">Preview</a></td>
		<td style="text-align: center; vertical-align: middle;"><a onclick="DeleteArticle({{ $article->id }});" class="btn btn-danger">Delete</a></td>
		<td style="text-align: center; vertical-align: middle;">
			<div class="btn-group btn-toggle"> 
				<button id="ArticlePublished" class="btn btn-xs {{ ($article->status == 0) ? 'btn-default active' : 'btn-info'}}" onclick="ArticleStatus({{ $article->id }})">ON</button>
				<button id="ArticleNotPublished" class="btn btn-xs {{ ($article->status == 0) ? 'btn-info	' : 'btn-default active'}}" onclick="ArticleStatus({{ $article->id }})">OFF</button>
			</div>
		</td>
	</tr>
	@endforeach
</tbody>