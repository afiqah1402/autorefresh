<?php

require dirname(__DIR__) . '/../vendor/autoload.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use AutoRefreshApp\Communication;

$server = IoServer::factory(
                new HttpServer(
                new WsServer(
                new Communication()
                )
                ), 2000
);

$server->run();