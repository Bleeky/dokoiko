<?php

class AdminController extends BaseController 
{
    public function __construct() {
        $this->beforeFilter('administration');
    }


    public function postWebsiteStatus() {
        $Website = Website::first();
        if ($Website->status == '1')
        $Website->status = '0';
        else
            $Website->status = '1';
        $Website->save();
        return View::make('Admin.Home.status')->with('website', Website::first());
    }

    public function postTweet() {
        $tw = new Twitter;
        $tw->tweet(Input::get('message'));
        return View::make('Admin.home.tweet');
    }


	public function getIndex() {
		return View::make('Admin.home')->with('website', Website::first());
	}
	public function getPictures() {
		return View::make('Admin.pictures')->with('pictures', Picture::orderBy('date', 'desc')->take(10)->get());
	}
	public function getAddPicture() {
		return View::make('Admin.Picture.new')->with('picture', Picture::max('id'));
	}
	public function postUploadNewPicture() {
		$PictureHtml = Input::get('body');
		$PictureId = Input::get('id') + 1;
        $PictureContent = null;
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
		if ($PictureTitle != null && $PictureImage != null) {
            $Picture = Picture::find($PictureId);
            if ($Picture == null)
                $Picture = new Picture;
            $Picture->id = $PictureId;
    		$Picture->title = $PictureTitle;
            if (strstr($PictureImage, "http://") == false && strstr($PictureImage, "https://") == false) {
                $PictureImage = explode('/', $PictureImage);
                $Picture->image = end($PictureImage);
            }
            else
                $Picture->image = $PictureImage;
            if ($PictureContent != null)
    			$Picture->content = $PictureContent;
            else
                $Picture->content = "";
			$Picture->html = $PictureHtml;
			$Picture->status = '0';
			$Picture->save();
            dd($Picture->id);
		}
        else
            return false;
	}
	public function postUploadOldPicture() {
		$Picture = Picture::find(Input::get('id'));
		$PictureHtml = Input::get('body');
        $PictureContent = null;
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
		if ($PictureTitle != null && $PictureImage != null) {
			$Picture->title = $PictureTitle;
            if (strstr($PictureImage, "http://") == false && strstr($PictureImage, "https://") == false) {
                $PictureImage = explode('/', $PictureImage);
                $Picture->image = end($PictureImage);
            }
            else
                $Picture->image = $PictureImage;
            if ($PictureContent != null)
                $Picture->content = $PictureContent;
            else
                $Picture->content = "";
			$Picture->html = $PictureHtml;
			if ($Picture->status == '0') {
				date_default_timezone_set('Europe/Paris');
				$Picture->date = date("Y-m-d H:i:s");
			}
			$Picture->save();
		}
        else
            return false;
	}
	public function postUploadPictureImage() {
		$filename = Str::random($lenght = 30) . '.' . Input::file('file')->getClientOriginalExtension();
		Input::file('file')->move('public/ressources/pictures/large/', $filename);
		if (Input::file('file')->getClientOriginalExtension() != 'gif') {
			$Image = Image::make('public/ressources/pictures/large/' . $filename);
			if ($Image->width() > 1080)
				$Image->widen(1080);
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
		$filename = explode('/', Input::get('src'));
		File::delete('public/ressources/pictures/large/' . end($filename));
		File::delete('public/ressources/pictures/small/' . end($filename));
	}
	public function postPictureStatus($id, $offset) {
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
		return View::make('Admin.Picture.edit')->with('picture', Picture::find($id));
	}
	public function postDeletePicture($id) {
		$Picture = Picture::find($id);
		$DOM = new DOMDocument;
		$DOM->loadHTML(mb_convert_encoding($Picture->html, 'HTML-ENTITIES', 'UTF-8'));
		$images = $DOM->getElementsByTagName('img');
		foreach ($images as $image) {
			$filename = explode('/', $image->getAttribute('src'));
            if (end($filename) != 'holder.png') {
                File::delete('public/ressources/pictures/small/' . end($filename));
                File::delete('public/ressources/pictures/large/' . end($filename));
            }
		}
		Picture::find($id)->delete();
		return View::make('Admin.Picture.more')->with('pictures', Picture::orderBy('date', 'desc')->take(10)->get());
	}
	public function getPictureTotal() {
		if (Request::ajax()) {
			$total = Picture::count();
			$response = array(
				'total'     => $total,
				);
			return Response::json($response);
		}
	}
	public function getSetOfPictures($offset) {
		return View::make('Admin.Picture.more')->with('pictures', Picture::orderBy('date', 'desc')->skip($offset)->take(10)->get());
	}
	public function getSearchPicture($name) {
		return View::make('Admin.Picture.more')->with('pictures', Picture::where('title', 'LIKE', '%' . $name . '%')->orderBy('date', 'desc')->get());
	}
	public function getLoadDefaultPictures() {
		return View::make('Admin.Picture.more')->with('pictures', Picture::orderBy('date', 'desc')->take(10)->get());
	}


    public function getVideos() {
        return View::make('Admin.videos')->with('videos', Video::orderBy('date', 'desc')->get());
    }
    public function postAddVideo($title, $youtubeid) {
        $Video = new Video;
        $Video->title = $title;
        $Video->youtubeid = $youtubeid;
        $Video->status = '0';
        $Video->save();
        return View::make('Admin.Video.more')->with('videos', Video::orderBy('date', 'desc')->get());
    }
    public function postEditVideo($id, $title, $youtubeid) {
        $Video = Video::find($id);
        $Video->title = $title;
        $Video->youtubeid = $youtubeid;
        $Video->save();
        return View::make('Admin.Video.more')->with('videos', Video::orderBy('date', 'desc')->get());
    }
    public function postVideoStatus($id) {
        $video = Video::find($id);
        if ($video->status == '0') {
            date_default_timezone_set('Europe/Paris');
            $video->date = date("Y-m-d H:i:s");
            $video->status = '1';
        }
        else if ($video->status == '1')
            $video->status = '0';
        $video->save();
        return View::make('Admin.Video.more')->with('videos', Video::orderBy('date', 'desc')->get());
    }
    public function postDeleteVideo($id) {
        Video::find($id)->delete();
        return View::make('Admin.Video.more')->with('videos', Video::orderBy('date', 'desc')->get());
    }
    public function getSearchVideo($name) {
        return View::make('Admin.Video.more')->with('videos', Video::where('title', 'LIKE', '%' . $name . '%')->orderBy('date', 'desc')->get());
    }
	public function getLoadDefaultVideos() {
        return View::make('Admin.Video.more')->with('videos', Video::orderBy('date', 'desc')->get());
    }

	public function getArticles() {
		return View::make('Admin.articles')->with('articles', Article::orderBy('date', 'desc')->take(10)->get());
	}
	public function getAddArticle() {
		return View::make('Admin.Article.new')->with('article', Article::max('id'));
	}
	public function postUploadNewArticle() {
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
            $Article->id = $ArticleId;
			$Article->title = $ArticleTitle;
			$Article->image = $ArticleImage;
			$Article->introduction = $ArticleIntroduction;
			$Article->content = $ArticleContent;
			$Article->status = '0';
			$Article->save();
		}
        else
            return false;
	}
	public function postUploadOldArticle() {
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
        else
            return false;
	}
	public function postUploadArticleImage() {
		$filename = Str::random($lenght = 30) . '.' . Input::file('file')->getClientOriginalExtension();
		Input::file('file')->move('public/ressources/articles/', $filename);
		if (Input::file('file')->getClientOriginalExtension() != 'gif') {
			$Image = Image::make('public/ressources/articles/' . $filename);
			if ($Image->width() > 1920)
				$Image->widen(1920);
			$Image->save();
		}
		$response = array(
			'link'     => URL::to('/ressources/articles') . '/' . $filename,
			);
		return Response::json($response);
	}
	public function postDeleteArticleImage() {
		$filename = explode('/', Input::get('src'));
		File::delete('public/ressources/articles/' . end($filename));
	}
	public function postArticleStatus($id, $offset) {
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
		return View::make('Admin.Article.preview')->with('article', Article::find($id));
	}
	public function getEditArticle($id) {
		return View::make('Admin.Article.edit')->with('article', Article::find($id));
	}
	public function postDeleteArticle($id) {
		$Article = Article::find($id);
		$DOM = new DOMDocument;
		$DOM->loadHTML(mb_convert_encoding($Article->content, 'HTML-ENTITIES', 'UTF-8'));
		$images = $DOM->getElementsByTagName('img');
		foreach ($images as $image) {
			$filename = explode('/', $image->getAttribute('src'));
            if (end($filename) != 'holder.png')
			File::delete('public/ressources/articles/' . end($filename));
		}
		Article::find($id)->delete();
		return View::make('Admin.Article.more')->with('articles', Article::orderBy('date', 'desc')->take(10)->get());		
	}
	public function getArticleTotal() {
		if (Request::ajax()) {
			$total = Article::count();
			$response = array(
				'total'     => $total,
				);
			return Response::json($response);
		}
	}
	public function getSetOfArticles($offset) {
		return View::make('Admin.Article.more')->with('articles', Article::orderBy('date', 'desc')->skip($offset)->take(10)->get());
	}
	public function getSearchArticle($name) {
		return View::make('Admin.Article.more')->with('articles', Article::where('title', 'LIKE', '%' . $name . '%')->orderBy('date', 'desc')->get());
	}
	public function getLoadDefaultArticles() {
		return View::make('Admin.Article.more')->with('articles', Article::orderBy('date', 'desc')->take(10)->get());
	}
}
