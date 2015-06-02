<?php

namespace Dokoiko\Http\Controllers;

use Dokoiko\Video;
use Illuminate\Support\Facades\Input;

class VideoAdminController extends AdminController {

	public function __construct()
	{
		$this->middleware('super-admin');
	}

	public function getHome()
	{
		return view('admin.videos.home')->with('videos', Video::orderBy('date', 'desc')->get());
	}

	public function getAddVideo()
	{
		$Video = new Video;
		$Video->title = "New Video Title";
		$Video->status = '0';
		$Video->save();

		return view('admin.videos.videos')->with('videos', Video::orderBy('date', 'desc')->get());
	}

	public function postDeleteVideo()
	{
		Video::find(Input::get('id'))->delete();

		return view('admin.videos.videos')->with('videos', Video::orderBy('date', 'desc')->get());
	}

	public function postEditVideo()
	{
		$Video = Video::find(Input::get('id'));
		$Video->title = Input::get('title');
		$Video->youtubeid = Input::get('youtubeid');
		$Video->save();

		return view('admin.videos.videos')->with('videos', Video::orderBy('date', 'desc')->get());
	}

	public function getChangeVideoStatus($id)
	{
		$video = Video::find($id);
		if ($video->status == '0')
		{
			date_default_timezone_set('Europe/Paris');
			$video->date = date("Y-m-d H:i:s");
			$video->status = '1';
		} else if ($video->status == '1')
			$video->status = '0';
		$video->save();

		return view('admin.videos.videos')->with('videos', Video::orderBy('date', 'desc')->get());
	}
}