<?php

class AdminController extends BaseController 
{
	public function getIndex() {
		return View::make('Admin.login');
	}
	public function getHome() {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		return View::make('Admin.home');
	}


	public function getPictures() {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		return View::make('Admin.pictures')->with('pictures', Picture::orderBy('date', 'desc')->take(10)->get());
	}
	public function getAddPicture() {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		return View::make('Admin.Picture.new')->with('picture', Picture::max('id'));
	}
	public function postUploadNewPicture() {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		$PictureHtml = Input::get('body');
		$PictureId = Input::get('id') + 1;
		$DOM = new DOMDocument;
		$DOM->loadHTML(mb_convert_encoding($PictureHtml, 'HTML-ENTITIES', 'UTF-8'));
		$paragraphs = $DOM->getElementsByTagName('p');
		foreach ($paragraphs as $paragraph) {
			$class = $paragraph->getAttribute('class');
			if ($class == 'title')
				$PictureTitle = $paragraph->nodeValue;
			else if ($class == 'content')
				$PictureContent = $paragraph->nodeValue;
		}
		$images = $DOM->getElementsByTagName('img');
		foreach ($images as $key => $image) {
			if ($key == 0)
				$PictureImage = $image->getAttribute('src');
		}
		if ($PictureTitle != null && $PictureContent != null && $PictureImage != null) {
			$Picture = Picture::find($PictureId);
			if ($Picture == null)
				$Picture = new Picture;
			$Picture->title = $PictureTitle;
			$PictureImage = explode('/', $PictureImage);
			$Picture->image = end($PictureImage);
			$Picture->content = $PictureContent;
			$Picture->html = $PictureHtml;
			$Picture->status = '0';
			$Picture->save();
		}
	}
	public function postUploadOldPicture() {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		$Picture = Picture::find(Input::get('id'));
		$PictureHtml = Input::get('body');
		$DOM = new DOMDocument;
		$DOM->loadHTML(mb_convert_encoding($PictureHtml, 'HTML-ENTITIES', 'UTF-8'));
		$paragraphs = $DOM->getElementsByTagName('p');
		foreach ($paragraphs as $paragraph) {
			$class = $paragraph->getAttribute('class');
			if ($class == 'title')
				$PictureTitle = $paragraph->nodeValue;
			else if ($class == 'content')
				$PictureContent = $paragraph->nodeValue;
		}
		$images = $DOM->getElementsByTagName('img');
		foreach ($images as $key => $image) {
			if ($key == 0)
				$PictureImage = $image->getAttribute('src');
		}
		if ($PictureTitle != null && $PictureContent != null && $PictureImage != null) {
			$Picture->title = $PictureTitle;
			$PictureImage = explode('/', $PictureImage);
			$Picture->image = end($PictureImage);
			$Picture->content = $PictureContent;
			$Picture->html = $PictureHtml;
			if ($Picture->status == '0') {
				date_default_timezone_set('Europe/Paris');
				$Picture->date = date("Y-m-d H:i:s");
			}
			$Picture->save();
		}
	}
	public function postUploadPictureImage() {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		$filename = Str::random($lenght = 30) . '.' . Input::file('file')->getClientOriginalExtension();
		Input::file('file')->move('public/ressources/pictures/large/', $filename);
		if (Input::file('file')->getClientOriginalExtension() != 'gif') {
			$Image = Image::make('public/ressources/pictures/large/' . $filename);
			if ($Image->width() > 1200)
				$Image->widen(1200);
			$Image->save();
		}
		$Image = Image::make('public/ressources/pictures/large/' . $filename);
		if ($Image->width() > 400)
			$Image->widen(400);
		$Image->save('public/ressources/pictures/small/' . $filename);
		$response = array(
			'link'     => URL::to('/ressources/pictures/large') . '/' . $filename,
			);
		return Response::json($response);
	}
	public function postDeletePictureImage() {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		$filename = explode('/', Input::get('src'));
		File::delete('public/ressources/pictures/large/' . end($filename));
		File::delete('public/ressources/pictures/small/' . end($filename));
	}
	public function postPictureStatus($id, $offset) {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		$Picture = Picture::find($id);
		if ($Picture->status == '0') {
			date_default_timezone_set('Europe/Paris');
			$Picture->date = date("Y-m-d H:i:s");
			$Picture->status = '1';
		}
		else if ($Picture->status == '1')
			$Picture->status = '0';
		$Picture->save();
		return View::make('Admin.Picture.more')->with('pictures', Picture::orderBy('date', 'desc')->skip($offset)->take(10)->get());
	}
	public function getEditPicture($id) {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		return View::make('Admin.Picture.edit')->with('picture', Picture::find($id));
	}
	public function postDeletePicture($id) {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		$Picture = Picture::find($id);
		$DOM = new DOMDocument;
		$DOM->loadHTML(mb_convert_encoding($Picture->html, 'HTML-ENTITIES', 'UTF-8'));
		$images = $DOM->getElementsByTagName('img');
		foreach ($images as $image) {
			$filename = explode('/', $image->getAttribute('src'));
			File::delete('public/ressources/pictures/small/' . end($filename));
			File::delete('public/ressources/pictures/large/' . end($filename));
		}		
		Picture::find($id)->delete();
		return View::make('Admin.Picture.more')->with('pictures', Picture::orderBy('date', 'desc')->take(10)->get());
	}
	public function getPictureTotal() {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		if (Request::ajax()) {
			$total = Picture::count();
			$response = array(
				'total'     => $total,
				);
			return Response::json($response);
		}
	}
	public function getSetOfPictures($offset) {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		return View::make('Admin.Picture.more')->with('pictures', Picture::orderBy('date', 'desc')->skip($offset)->take(10)->get());
	}
	public function getSearchPicture($name) {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		return View::make('Admin.Picture.more')->with('pictures', Picture::where('title', 'LIKE', '%' . $name . '%')->orderBy('date', 'desc')->get());
	}
	public function getLoadDefaultPictures() {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		return View::make('Admin.Picture.more')->with('pictures', Picture::orderBy('date', 'desc')->take(10)->get());		
	}

	

	public function getArticles() {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		return View::make('Admin.articles')->with('articles', Article::orderBy('date', 'desc')->take(10)->get());
	}
	public function getAddArticle() {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		return View::make('Admin.Article.new')->with('article', Article::max('id'));
	}
	public function postUploadNewArticle() {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		$ArticleContent = Input::get('body');
		$ArticleTitle = null;
		$ArticleIntroduction = null;
		$ArticleId = Input::get('id') + 1;
		$DOM = new DOMDocument;
		$DOM->loadHTML(mb_convert_encoding($ArticleContent, 'HTML-ENTITIES', 'UTF-8'));
		$paragraphs = $DOM->getElementsByTagName('p');
		foreach ($paragraphs as $paragraph) {
			$class = $paragraph->getAttribute('class');
			if ($class == 'title' && $ArticleTitle == null)
				$ArticleTitle = $paragraph->nodeValue;
			else if ($class == 'introduction' && $ArticleIntroduction == null)
				$ArticleIntroduction = $paragraph->nodeValue;
		}
		$images = $DOM->getElementsByTagName('img');
		foreach ($images as $key => $image) {
			if ($key == 0)
				$ArticleImage = $image->getAttribute('src');
		}
		if ($ArticleTitle != null && $ArticleIntroduction != null && $ArticleImage != null) {
			$Article = Article::find($ArticleId);
			if ($Article == null)
				$Article = new Article;
			$Article->title = $ArticleTitle;
			$Article->image = $ArticleImage;
			$Article->introduction = $ArticleIntroduction;
			$Article->content = $ArticleContent;
			$Article->status = '0';
			$Article->save();			
		}
	}
	public function postUploadOldArticle() {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		$Article = Article::find(Input::get('id'));
		$ArticleContent = Input::get('body');
		$ArticleTitle = null;
		$ArticleIntroduction = null;
		$DOM = new DOMDocument;
		$DOM->loadHTML(mb_convert_encoding($ArticleContent, 'HTML-ENTITIES', 'UTF-8'));
		$paragraphs = $DOM->getElementsByTagName('p');
		foreach ($paragraphs as $paragraph) {
			$class = $paragraph->getAttribute('class');
			if ($class == 'title' && $ArticleTitle == null)
				$ArticleTitle = $paragraph->nodeValue;
			else if ($class == 'introduction' && $ArticleIntroduction == null)
				$ArticleIntroduction = $paragraph->nodeValue;
		}
		$images = $DOM->getElementsByTagName('img');
		foreach ($images as $key => $image) {
			if ($key == 0)
				$ArticleImage = $image->getAttribute('src');
		}
		if ($ArticleTitle != null && $ArticleIntroduction != null && $ArticleImage != null) {
			$Article->title = $ArticleTitle;
			$Article->image = $ArticleImage;
			$Article->introduction = $ArticleIntroduction;
			$Article->content = $ArticleContent;
			if ($Article->status == '0') {
				date_default_timezone_set('Europe/Paris');
				$Article->date = date("Y-m-d H:i:s");
			}
			$Article->save();			
		}
	}
	public function postUploadArticleImage() {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		$filename = Str::random($lenght = 30) . '.' . Input::file('file')->getClientOriginalExtension();
		Input::file('file')->move('public/ressources/articles/', $filename);
		if (Input::file('file')->getClientOriginalExtension() != 'gif') {
			$Image = Image::make('public/ressources/articles/' . $filename);
			if ($Image->width() > 1200)
				$Image->widen(1200);
			$Image->save();
		}
		$response = array(
			'link'     => URL::to('/ressources/articles') . '/' . $filename,
			);
		return Response::json($response);
	}
	public function postDeleteArticleImage() {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		$filename = explode('/', Input::get('src'));
		File::delete('public/ressources/articles/' . end($filename));
	}
	public function postArticleStatus($id, $offset) {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		$Article = Article::find($id);
		if ($Article->status == '0') {
			date_default_timezone_set('Europe/Paris');
			$Article->date = date("Y-m-d H:i:s");
			$Article->status = '1';
		}
		else if ($Article->status == '1')
			$Article->status = '0';
		$Article->save();
		return View::make('Admin.Article.more')->with('articles', Article::orderBy('date', 'desc')->skip($offset)->take(10)->get());		
	}
	public function getPreviewArticle($id) {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		return View::make('Admin.Article.preview')->with('article', Article::find($id));
	}
	public function getEditArticle($id) {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		return View::make('Admin.Article.edit')->with('article', Article::find($id));
	}
	public function postDeleteArticle($id) {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		$Article = Article::find($id);
		$DOM = new DOMDocument;
		$DOM->loadHTML(mb_convert_encoding($Article->content, 'HTML-ENTITIES', 'UTF-8'));
		$images = $DOM->getElementsByTagName('img');
		foreach ($images as $image) {
			$filename = explode('/', $image->getAttribute('src'));
			File::delete('public/ressources/articles/' . end($filename));
		}
		Article::find($id)->delete();
		return View::make('Admin.Article.more')->with('articles', Article::orderBy('date', 'desc')->take(10)->get());		
	}
	public function getArticleTotal() {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		if (Request::ajax()) {
			$total = Article::count();
			$response = array(
				'total'     => $total,
				);
			return Response::json($response);
		}
	}
	public function getSetOfArticles($offset) {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		return View::make('Admin.Article.more')->with('articles', Article::orderBy('date', 'desc')->skip($offset)->take(10)->get());
	}
	public function getSearchArticle($name) {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		return View::make('Admin.Article.more')->with('articles', Article::where('title', 'LIKE', '%' . $name . '%')->orderBy('date', 'desc')->get());
	}
	public function getLoadDefaultArticles() {
		if (!Auth::check())
			return Redirect::action('AdminController@getIndex');
		return View::make('Admin.Article.more')->with('articles', Article::orderBy('date', 'desc')->take(10)->get());		
	}


	public function postLogin() {
		$userdata = array(
			'username' 	=> Input::get('username'),
			'password' 	=> Input::get('password'),
			);
		if (Auth::attempt($userdata)) {
			return Redirect::action('AdminController@getHome');
		}
		else {
			return Redirect::back();
		}
	}
	public function getLogout() {
		Auth::logout();
		return Redirect::action('AdminController@getIndex');
	}
}
