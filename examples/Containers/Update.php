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

$containerId = '50828248';
$accountId = '6004677764';
$name = '更新Container';
$usageContext = [UsageContext::WEB];

$data = (new Container($client))->update($containerId, $accountId, $name, $usageContext);

var_dump($data);
