<tbody id="articles-table">
@foreach($articles as $article)
    <tr>
        <td>{{ str_limit($article->title, $limit = 70, $end = ' . . .')}}</td>
        <td>{{ $article->user->username }}</td>
        @if ($article->status == 0)
            <td>Not published</td>
        @else
            <td>{{ $article->getDate() }}</td>
        @endif
        <td style="text-align: center;"><a
                    href="{{ URL::action('ArticleAdminController@getEditArticle', array($article->id)) }}"
                    class="btn btn-info">Edit</a></td>
        <td style="text-align: center;"><a
                    onclick="EditArticleHashtags('{{ URL::action('ArticleAdminController@postEditArticleHashtags') }}', '{{ $article->id }}', '{{ $article->hashtags }}', '{{ csrf_token() }}')"
                    class="btn btn-primary">Hashtags</a></td>
        <td style="text-align: center;"><a
                    href="{{ URL::action('ArticleAdminController@getPreviewArticle', array($article->id)) }}"
                    class="btn btn-success">Preview</a></td>
        <td style="text-align: center;"><a
                    onclick="DeleteArticle('{{ URL::action('ArticleAdminController@postDeleteArticle') }}', '{{ $article->id }}', '{{ csrf_token() }}')"
                    class="btn btn-danger">Delete</a></td>
        <td style="text-align: center;"
            onclick="ChangeArticleStatus('{{ URL::action('ArticleAdminController@getChangeArticleStatus') }}', '{{ $article->id }}')">
            <div class="btn-group btn-toggle">
                <button id="ArticlePublished"
                        class="btn btn-xs {{ ($article->status == 0) ? 'btn-default active' : 'btn-warning'}}">ON
                </button>
                <button id="ArticleNotPublished"
                        class="btn btn-xs {{ ($article->status == 0) ? 'btn-warning' : 'btn-default active'}}">OFF
                </button>
            </div>
        </td>
    </tr>
@endforeach
</tbody>
