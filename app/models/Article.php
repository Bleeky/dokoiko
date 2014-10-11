<?php

class Article extends Eloquent
{
	public $timestamps = false;
    public $incrementing = false;
	protected $table = 'articles';
	protected $fillable = array('title', 'introduction', 'content', 'image', 'status', 'date');

	public function getDate() {
		setlocale (LC_TIME, 'fr-FR');
		return "• " . ucfirst(strftime("%A %d ", strtotime($this->date))) . ucfirst(strftime("%B %Y", strtotime($this->date))) . " •";
	}
}