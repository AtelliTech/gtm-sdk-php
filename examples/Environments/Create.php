<?php

require __DIR__ . '/../../vendor/autoload.php';

require __DIR__.'/../config.php';

use gtm\Client;
use gtm\Environment;


/** generate client */
$clientService = new Client();

$clientService->setClientId($configData['clientId']);
$clientService->setClientSecret($configData['clientSecret']);
$clientService->setDeveloperKey($configData['developerToken']);
$clientService->setScopes($configData['scopes']);

$clientService->setRefreshToken($configData['refreshToken']);


$client = $clientService->generate();

$config = [
    'account_id' => '6004677764',
    'container_id' => '50828248'
];

$name = '測試新增Workspace';
$enableDebug = 'true';
$description = '測試描述';
$url = 'http://google.com.tw';

$data = (new Environment($client))->create($config, $name, $enableDebug, $description, $url);

var_dump($data);
