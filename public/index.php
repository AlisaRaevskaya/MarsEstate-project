<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

$request = new \Alisa\MarsEstate\Base\Request();

$config = __DIR__ . '/../config.json';

$app = new \Alisa\MarsEstate\Base\Application($config);
$response = $app->handleRequest($request);
$response->send();

