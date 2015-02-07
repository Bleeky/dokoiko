<?php namespace Dokoiko\Http\Controllers;

use Dokoiko\Picture;
use Dokoiko\Place;
use Dokoiko\Video;
use Response;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getHome()
	{
		return view('User.Pictures.home')->with('pictures', Picture::where('status', '=', '1')->orderBy('date', 'desc')->take(8)->get());;
	}

	public function getNumberOfPictures()
	{
		$total = Picture::where('status', '=', '1')->count();
		$recentPictureID = Picture::where('status', '=', '1')->orderBy('date', 'desc')->take(1)->get();
		$oldPictureID = Picture::where('status', '=', '1')->orderBy('date', 'asc')->take(1)->get();
		$response = array(
			'total'             => $total,
			'recent-picture-id' => $recentPictureID->first()->id,
			'old-picture-id'    => $oldPictureID->first()->id,
		);

		return Response::json($response);

	}

	public function getPicture($id)
	{
		return view('User.Pictures.picture')->with('picture', Picture::find($id));
	}

	public function getSelectedPicture($id)
	{
		return view('User.Pictures.selected')->with('picture', Picture::find($id));
	}

	public function getNextPicture($id)
	{
		$currentPicture = Picture::find($id);

		return view('User.Pictures.selected')->with('picture', Picture::where('date', '<', $currentPicture->date)->where('status', '=', '1')->orderBy('date', 'desc')->first());
	}

	public function getPreviousPicture($id)
	{
		$currentPicture = Picture::find($id);

		return view('User.Pictures.selected')->with('picture', Picture::where('date', '>', $currentPicture->date)->where('status', '=', '1')->orderBy('date', 'asc')->first());
	}

	public function getSetOfPictures($offset)
	{
		return view('User.Pictures.setOfPictures')->with('pictures', Picture::where('status', '=', '1')->orderBy('date', 'desc')->skip($offset)->take(8)->get());
	}

	public function getPays()
	{
		return view('User.pays')->with('places', Place::all()->toJson());
	}

	public function getContact()
	{
		return view('User.contact');
	}

	public function postSendMail()
	{

	}

	public function getVideos()
	{
		return view('User.videos')->with('videos', Video::where('status', '=', '1')->orderBy('date', 'desc')->get());
	}

}
