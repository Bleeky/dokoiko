<?php

class Picture extends Eloquent
{
	public $timestamps = false;
    public $incrementing = false;
	protected $table = 'pictures';
	protected $fillable = array('title', 'content', 'image', 'html', 'status', 'date');

	public function getDate() {
		setlocale (LC_TIME, 'fr_FR');
		return ucfirst(strftime("%A %d ", strtotime($this->date))) . ucfirst(strftime("%B %Y", strtotime($this->date)));
	}

}