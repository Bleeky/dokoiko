<?php

require 'vendor/autoload.php';

class Facebook
{
    protected $config;
    protected $facebook;

    public function __construct()
    {
        $this->config = array();
        $this->config["appId"] = '0';
        $this->config["secret"] = '0';
        $this->config["fileUpload"] = true;
        $this->facebook = new Facebook($this->config);
    }

    public function post($message)
    {
        $params = array(
            "access_token" => "0",
            "message" => $message,
        );
        $this->facebook->api('/RequiemForATrip ID/feed', 'POST', $params);
    }
}