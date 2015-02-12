<?php

namespace Dokoiko\Http\Controllers;

use Dokoiko\Picture;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Response;

use Intervention\Image\Facades\Image;

use DOMDocument;


class PictureAdminController extends AdminController {

	public function __construct()
	{
		$this->middleware('super-admin');
	}

	public function getHome()
	{
		return view('Admin.Pictures.home')->with('pictures', Picture::orderBy('date', 'desc')->take(20)->get());
	}

	public function getNumberOfPictures()
	{
		$total = Picture::count();
		$response = array(
			'total' => $total,
		);

		return Response::json($response);
	}

	public function getEditPicture($id)
	{
		return view('Admin.Pictures.edit')->with('picture', Picture::find($id));
	}

	public function getChangePictureStatus($id, $offset)
	{
		$Picture = Picture::find($id);
		if ($Picture->status == '0')
		{
			date_default_timezone_set('Europe/Paris');
			$Picture->date = date("Y-m-d H:i:s");
			$Picture->status = '1';
		} else if ($Picture->status == '1')
			$Picture->status = '0';
		$Picture->save();

		return view('Admin.Pictures.pictures')->with('pictures', Picture::orderBy('date', 'desc')->skip($offset)->take(20)->get());
	}

	public function postDeletePicture()
	{
		$Picture = Picture::find(Input::get('id'));
		$DOM = new DOMDocument;
		$DOM->loadHTML(mb_convert_encoding($Picture->html, 'HTML-ENTITIES', 'UTF-8'));
		$images = $DOM->getElementsByTagName('img');
		foreach ($images as $image)
		{
			$filename = explode('/', $image->getAttribute('src'));
			if (end($filename) != 'holder.png')
			{
				File::delete('Content/pictures/small/' . end($filename));
				File::delete('Content/pictures/large/' . end($filename));
			}
		}
		Picture::find($Picture->id)->delete();

		return view('Admin.Pictures.pictures')->with('pictures', Picture::orderBy('date', 'desc')->take(20)->get());

	}

	public function getAddPicture()
	{
		$Picture = new Picture;
		$Picture->title = "New Picture Title";
		$Picture->content = "This is a small picture content. You should write your own here. Have fun !";
		$Picture->html = "
		<p class=\"title\" style=\"text-align: center;\"><em><span style=\"font-family: 'Open Sans'; font-size: 60px;\">New Picture Title</span></em></p>
        <p><img src=" . URL::to('Content/pictures/large/holder.png') . " class=\"fr-fin\" data-fr-image-preview=\"false\" alt=\"Image title\" width=\"100%\"></p>
        <p class=\"content\"><span style=\"font-family: 'Open Sans'; font-size: 16px;\">This is a small picture introduction. You should write your own here. Have fun !</span></p>
		";
		$Picture->image = URL::to('Content/pictures/large/holder.png');
		$Picture->status = '0';
		$Picture->save();

		return view('Admin.Pictures.pictures')->with('pictures', Picture::orderBy('date', 'desc')->take(20)->get());
	}

	public function getSetOfPictures($offset)
	{
		return view('Admin.Pictures.pictures')->with('pictures', Picture::orderBy('date', 'desc')->skip($offset)->take(20)->get());
	}

	public function postUploadPictureImage()
	{
		$filename = Str::random($lenght = 30) . '.' . Input::file('file')->getClientOriginalExtension();
		Input::file('file')->move('Content/pictures/large/', $filename);
		if (Input::file('file')->getClientOriginalExtension() != 'gif')
		{
			$Image = Image::make('Content/pictures/large/' . $filename);
			if ($Image->width() > 1080)
				$Image->widen(1080);
			$Image->save();
		}
		$Image = Image::make('Content/pictures/large/' . $filename);
		if ($Image->width() > 400)
			$Image->widen(400);
		$Image->save('Content/pictures/small/' . $filename);
		$response = array(
			'link' => URL::to('Content/pictures/large') . '/' . $filename,
		);

		return Response::json($response);

	}

	public function postDeletePictureImage()
	{
		$filename = explode('/', Input::get('src'));
		File::delete('Content/pictures/large/' . end($filename));
		File::delete('Content/pictures/small/' . end($filename));
	}

	public function postSavePicture()
	{
		$Picture = Picture::find(Input::get('id'));
		$PictureHtml = Input::get('body');
		$PictureContent = null;
		$PictureImage = null;
		$PictureTitle = null;
		$DOM = new DOMDocument;
		$DOM->loadHTML(mb_convert_encoding($PictureHtml, 'HTML-ENTITIES', 'UTF-8'));
		$paragraphs = $DOM->getElementsByTagName('p');
		foreach ($paragraphs as $paragraph)
		{
			$class = $paragraph->getAttribute('class');
			if (strstr($class, 'title') != false && $PictureTitle == null)
				$PictureTitle = $paragraph->nodeValue;
			else if (strstr($class, 'content') != false && $PictureContent == null)
				$PictureContent = $paragraph->nodeValue;
		}
		$images = $DOM->getElementsByTagName('img');
		foreach ($images as $key => $image)
		{
			if ($key == 0)
				$PictureImage = $image->getAttribute('src');
		}
		if ($PictureTitle != null && $PictureImage != null)
		{
			$Picture->title = $PictureTitle;
			if (strstr($PictureImage, url()) ==  true) {
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
	}

}