<?php namespace Dokoiko;

use Illuminate\Database\Eloquent\Model;

class Place extends Model {
	public $timestamps = false;
	protected $table = 'places';

	protected $fillable = ['formatted_address', 'lat', 'lng', 'current'];
}
