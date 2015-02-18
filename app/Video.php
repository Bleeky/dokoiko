<?php

namespace Dokoiko;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {
	public $timestamps = false;
	protected $table = 'videos';
	protected $fillable = array('title', 'youtubeid', 'status', 'date');
}