<?php

use Codebird\Codebird;

class Twitter
{
    protected $consumer_key = "ar3mpg2zEdT5uw8Dg91s9HELo";
    protected $consumer_secret = "OgQnZxVQznVyhGvNkj2Xt6Pbd7NrDJ5eJHJ5mIyK53bMW6GbbD";
    protected $access_token = "1358943996-8iqJpopOzHQSBaJ4HwIYFvT7S7pWDi488FSjdIQ";
    protected $access_secret = "DjHjYleHUlnPhkXmAqXgjKuO2FU7ucTyTmmAlBRm426w1";
    protected $twitter;

    public function __construct()
    {
        Codebird::setConsumerKey($this->consumer_key, $this->consumer_secret);
        $this->twitter = Codebird::getInstance();
        $this->twitter->setToken($this->access_token, $this->access_secret);
    }

    public function tweet($message)
    {
        $this->twitter->statuses_update(['status' => $message]);
    }
}