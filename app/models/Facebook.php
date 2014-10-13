<?php

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

class Facebook
{
    protected $config;
    protected $facebook;

    public function __construct()
    {
        FacebookSession::setDefaultApplication('0', '0');
        $this->facebook = $session = new FacebookSession('access-token-here');
    }

    public function post($message)
    {

    }
}