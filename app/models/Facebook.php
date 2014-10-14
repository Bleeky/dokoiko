<?php

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;

class Facebook
{
    public function __construct()
    {
        session_start();
        FacebookSession::setDefaultApplication('1520073138237043', '53fd3f934627d04074fd75f37d34ac38');
        $helper = new FacebookRedirectLoginHelper('http://localhost:8000/');
    }

    public function post($message)
    {

    }
}