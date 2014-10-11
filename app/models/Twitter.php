<?php

require 'vendor/autoload.php';

class Twitter
{
    protected $consumer_key = 0;
    protected $consumer_secret = 0;
    protected $access_token = 0;
    protected $access_secret = 0;
    protected $twitter;

    public function __construct()
    {
        Codebird::setConsumerKey($this->consumer_key, $this->consumer_secret);
        $this->twitter = Codebird::getInstance();
        $this->twitter->setToken($this->access_token, $this->access_secret);
    }

    public function tweet($message)
    {
        return $this->twitter->statuses_update(['status' => $message]);
    }

}