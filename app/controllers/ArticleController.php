<?php

class ArticleController extends BaseController
{
    public function __construct()
    {
        $this->beforeFilter('website_status');
    }

    public function getHome() {
		return View::make('Articles.articles')->with('articles', Article::where('status', '=', '1')->orderBy('date', 'desc')->take(4)->get());
	}
	public function getContent($id) {
		return View::make('Articles.reader')->with('article', Article::find($id));
	}
	public function getArticleTotal() {
		if (Request::ajax()) {
			$total = Article::where('status', '=', '1')->count();
			$response = array(
				'total'     => $total,
				);
			return Response::json($response);
		}
	}
	public function getMoreArticle($offset) {
		return View::make('Articles.more')->with('articles', Article::where('status', '=', '1')->orderBy('date', 'desc')->skip($offset)->take(4)->get());
	}
}