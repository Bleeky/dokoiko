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
		return view('Admin.Places.home')->with('places', Place::all());
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

		return view('Admin.Places.search')->with('place', $place);
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

		return view('Admin.Places.places')->with('places', Place::all());
	}

	public function postDeletePlace() {
		Place::find(Input::get('id'))->delete();

		return view('Admin.Places.places')->with('places', Place::all());
	}
}