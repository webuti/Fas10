<?php


namespace Qmerfp\LaravelNats;



class LaravelNats
{

    public function __construct()
    {


    }

    static function publish($key, $value)
    {

        $client = new \Nats\Connection();
        $client->connect();
        $client->publish($key, $value);
        $client->close();


    }
}
