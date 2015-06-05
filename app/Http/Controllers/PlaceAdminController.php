<?php

namespace Dokoiko\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Dokoiko\Place;


class PlaceAdminController extends AdminController {

	public function __construct()
	{
		$this->middleware('super-admin');
	}

	public function getHome()
	{
		return view('admin.places.home')->with(array('places' => Place::all(), 'current' => Place::where('current', '=', 1)->first()));
	}

	public function postSearchPlace()
	{
		$json_string = json_encode(Input::get('json'));
		$json_object = json_decode($json_string);

		$place = new Place;
		$place->formatted_address = $json_object->formatted_address;
		$place->lat = $json_object->geometry->location->lat;
		$place->lng = $json_object->geometry->location->lng;
		$place->json_data = $json_string;

		return view('admin.places.search')->with('place', $place);
	}

	public function postAddNewPlace()
	{
		$json_object = json_decode(Input::get('json'));

		$place = new Place;
		$place->formatted_address = $json_object->formatted_address;
		$place->lat = $json_object->geometry->location->lat;
		$place->lng = $json_object->geometry->location->lng;
		$place->json_data = Input::get('json');
		$place->save();

		return view('admin.places.places')->with('places', Place::all());
	}

	public function postDeletePlace() {
		Place::find(Input::get('id'))->delete();

		return view('admin.places.places')->with('places', Place::all());
	}

	public function postSetCurrentPlace() {
		$newCurrentPlace = Place::find(Input::get('id'));
		$oldCurrentPlace = Place::where('current', '=', 1)->first();

		$newCurrentPlace->current = 1;
		$oldCurrentPlace->current = 0;
		$newCurrentPlace->save();
		$oldCurrentPlace->save();
		return view('admin.places.currentPlace')->with('current', $newCurrentPlace);
	}
}
