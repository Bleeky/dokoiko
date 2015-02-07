<?php namespace Dokoiko;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	public $timestamps = false;
	protected $table = 'articles';
	protected $fillable = ['title', 'introduction', 'content', 'image', 'hashtags', 'status', 'date'];

	public function getDate()
	{
		setlocale(LC_TIME, 'fr_FR');

		return ucfirst(strftime("%A %d ", strtotime($this->date))) . ucfirst(strftime("%B %Y", strtotime($this->date)));
	}

	public function user()
	{
		return $this->belongsTo('Dokoiko\User');
	}
}