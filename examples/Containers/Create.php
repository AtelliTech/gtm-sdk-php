<?php

require __DIR__ . '/../../vendor/autoload.php';

require __DIR__.'/../config.php';

use gtm\Client;
use gtm\{Container, UsageContext};


/** generate client */
$clientService = new Client();

$clientService->setClientId($configData['clientId']);
$clientService->setClientSecret($configData['clientSecret']);
$clientService->setDeveloperKey($configData['developerToken']);
$clientService->setScopes($configData['scopes']);

$clientService->setRefreshToken($configData['refreshToken']);


$client = $clientService->generate();

$accountId = '6004677764';
$name = '新增測試_Container';
$usageContext = [UsageContext::WEB];

$data = (new Container($client))->create($accountId, $name, $usageContext);

var_dump($data);
