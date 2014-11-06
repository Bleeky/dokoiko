<?php

class Video extends Eloquent
{
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'videos';
    protected $fillable = array('title', 'youtubeid', 'status', 'date');
}