<?php

require __DIR__ . '/../../vendor/autoload.php';

require __DIR__.'/../config.php';

use gtm\Client;
use gtm\Workspace;


/** generate client */
$clientService = new Client();

$clientService->setClientId($configData['clientId']);
$clientService->setClientSecret($configData['clientSecret']);
$clientService->setDeveloperKey($configData['developerToken']);
$clientService->setRefreshToken($configData['refreshToken']);


$client = $clientService->generate();

$accountId = '10825770';
$containerId = '53045390';
$workspaceId = '25';

$data = (new Workspace($client))->get($accountId, $containerId, $workspaceId);

var_dump($data);
