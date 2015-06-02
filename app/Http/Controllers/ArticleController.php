<?php

namespace Dokoiko\Http\Controllers;

use Dokoiko\Article;
use Response;

class ArticleController extends Controller {

	public function getHome()
	{
		return view('user.articles.home')->with('articles', Article::where('status', '=', '1')->orderBy('date', 'desc')->take(4)->get());
	}

	public function getArticle($id)
	{
		return view('user.articles.reader')->with('article', Article::find($id));
	}

	public function getMoreArticle($offset)
	{
		return view('user.articles.articles')->with('articles', Article::where('status', '=', '1')->orderBy('date', 'desc')->skip($offset)->take(4)->get());
	}

	public function getNumberOfArticles()
	{
		$total = Article::where('status', '=', '1')->count();
		$response = array(
			'total' => $total,
		);

		return Response::json($response);
	}

}