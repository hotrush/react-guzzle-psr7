<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;
use React\EventLoop\Factory;
use WyriHaximus\React\RingPHP\HttpClientAdapter;

// Create eventloop
$loop = Factory::create();

(new Client([
    'handler' => new HttpClientAdapter($loop),
]))->get('http://blog.wyrihaximus.net/atom.xml', [
    'future' => true,
])->then(function(Response $response) { // Success callback
    var_export((string)$response->getBody());
}, function($error) { // Error callback
    var_export($error);
});

$loop->run();