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

$environmentId = '38';
$name = '測試更新Workspace';
$enableDebug = 'true';
$description = '測試更新描述';
$url = 'http://google.com.tw';

$data = (new Environment($client))->update($config, $environmentId, $name, $enableDebug, $description, $url);

var_dump($data);
