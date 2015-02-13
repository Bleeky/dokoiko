<?php

namespace Dokoiko\Http\Controllers;

use Dokoiko\Article;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

use DOMDocument;

class ArticleAdminController extends AdminController {

	public function getHome()
	{
		return view('Admin.Articles.home')->with('articles', Article::orderBy('date', 'desc')->get());
	}

	public function getChangeArticleStatus($id)
	{
		$Article = Article::find($id);
		if ($Article->status == '0')
		{
			date_default_timezone_set('Europe/Paris');
			$Article->date = date("Y-m-d H:i:s");
			$Article->status = '1';
		} else if ($Article->status == '1')
			$Article->status = '0';
		$Article->save();

		return view('Admin.Articles.articles')->with('articles', Article::orderBy('date', 'desc')->get());
	}

	public function postDeleteArticle()
	{
		$Article = Article::find(Input::get('id'));
		$DOM = new DOMDocument;
		if ($Article->content)
		{
			@$DOM->loadHTML(mb_convert_encoding($Article->content, 'HTML-ENTITIES', 'UTF-8'));
			$images = $DOM->getElementsByTagName('img');
			foreach ($images as $image)
			{
				$filename = explode('/', $image->getAttribute('src'));
				if (end($filename) != 'holder.png')
					File::delete('public/Content/articles/' . end($filename));
			}
		}
		Article::find($Article->id)->delete();

		return view('Admin.Articles.articles')->with('articles', Article::orderBy('date', 'desc')->get());
	}

	public function getPreviewArticle($id)
	{
		return view('Admin.Articles.preview')->with('article', Article::find($id));
	}

	public function getEditArticle($id)
	{
		return view('Admin.Articles.edit')->with('article', Article::find($id));
	}


	public function postUploadArticleImage()
	{
		$filename = Str::random($lenght = 30) . '.' . Input::file('file')->getClientOriginalExtension();
		Input::file('file')->move('Content/articles/', $filename);
		$response = array(
			'link' => URL::to('Content/articles') . '/' . $filename,
		);

		return Response::json($response);
	}

	public function postDeleteArticleImage()
	{
		$filename = explode('/', Input::get('src'));
		File::delete('Content/articles/' . end($filename));
	}

	public function getAddArticle()
	{
		$Article = new Article;
		$Article->title = "New Article Title";
		$Article->introduction = "This is a small article introduction. You should write your own here. Have fun !";
		$Article->content = "
		<p class=\"title\" style=\"text-align: center;\"><em><span style=\"font-family: 'Open Sans'; font-size: 60px;\">New Article Title</span></em></p>
        <p><img src=" . URL::to('Content/articles/holder.png') . " class=\"fr-fin\" data-fr-image-preview=\"false\" alt=\"Image title\" width=\"100%\"></p>
        <p class=\"introduction\"><span style=\"font-family: 'Open Sans'; font-size: 16px;\">This is a small article introduction. You should write your own here. Have fun !</span></p>
		";
		$Article->image = URL::to('Content/articles/holder.png');
		$Article->status = '0';
		$Article->user_id = Auth::id();
		$Article->save();

		return view('Admin.Articles.articles')->with('articles', Article::orderBy('date', 'desc')->get());
	}

	public function postSaveArticle()
	{
		$Article = Article::find(Input::get('id'));
		$ArticleTitle = null;
		$ArticleIntroduction = null;
		$ArticleImage = null;
		$ArticleContent = Input::get('body');
		$DOM = new DOMDocument;
		@$DOM->loadHTML(mb_convert_encoding($ArticleContent, 'HTML-ENTITIES', 'UTF-8'));
		$paragraphs = $DOM->getElementsByTagName('p');
		$images = $DOM->getElementsByTagName('img');
		foreach ($paragraphs as $paragraph)
		{
			$class = $paragraph->getAttribute('class');
			if (strstr($class, 'title') != false && $ArticleTitle == null)
				$ArticleTitle = $paragraph->nodeValue;
			else if (strstr($class, 'introduction') != false && $ArticleIntroduction == null)
				$ArticleIntroduction = $paragraph->nodeValue;
		}
		foreach ($images as $key => $image)
		{
			if ($key == 0)
				$ArticleImage = $image->getAttribute('src');
		}
		if ($ArticleTitle != null && $ArticleIntroduction != null && $ArticleImage != null)
		{
			$Article->title = $ArticleTitle;
			$Article->image = $ArticleImage;
			$Article->introduction = $ArticleIntroduction;
			$Article->content = $ArticleContent;
			if ($Article->status == '0')
			{
				date_default_timezone_set('Europe/Paris');
				$Article->date = date("Y-m-d H:i:s");
			}
			$Article->save();
		}
	}

	public function postEditArticleHashtags()
	{
		$Article = Article::find(Input::get('id'));
		$Article->hashtags = Input::get('hashtags');
		$Article->save();

		return view('Admin.Articles.articles')->with('articles', Article::orderBy('date', 'desc')->get());
	}

}